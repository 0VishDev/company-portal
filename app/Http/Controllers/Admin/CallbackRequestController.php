<?php

namespace ZigKart\Http\Controllers\Admin;

use Illuminate\Http\Request;
use ZigKart\Http\Controllers\Controller;
use ZigKart\Models\CallbackRequest;
use ZigKart\Models\RequestFeedback;

class CallbackRequestController extends Controller
{
    //
    public function __construct()
    {
        
    }

    public function callbacks() 
    {
        $data['callbacks'] = CallbackRequest::where('is_attended', false)->orderBy('created_at', 'desc')->get();
        return view('admin.callbacks', $data);
    }

    public function done($id) 
    {
        $callback_request = CallbackRequest::where('id', $id)->first();
        
        if(!is_null($callback_request)) {
            $callback_request->update(array(
                "is_attended" => true
            ));
            return redirect()->back()->with('success', 'Callback request completed successfully!');
        } else {
            return redirect()->back()->with('error', 'Cannot complete operation. Try Again!');
        }
    }
    
    public function delete($id){
        $isDelete = CallbackRequest::where('id', $id)->delete();
        
         return redirect()->back()->with('success', 'Success! Callback request deleted.');
    }
    
    public function addComment(Request $request){
        $isUpdated = CallbackRequest::where('id', $request->inquiry_id)->update(['comment' => $request->comment]);
        
        return redirect()->back()->with('success', 'Succes! Callback request comment added.');
    }
    
     public function feedbacks(){   
         $requestFeebacks = RequestFeedback::orderBy('created_at', 'desc')->get();
         
        return view('admin.feedback', compact('requestFeebacks'));
    }
    
    public function verifyFeedbacks($id){
        $isUpdated = RequestFeedback::where('id', $id)->update(['is_verify' => 1]);
        
        return redirect()->back()->with('success', 'Success! Feedback request verified.');
    }
    
    public function deleteFeedbacks($id){
        $isDelete = RequestFeedback::where('id', $id)->delete();
        
        return redirect()->back()->with('success', 'Success! Feedback request deleted.');
    }
    
    public function addCommentFeedbacks(Request $request){
        $isUpdated = RequestFeedback::where('id', $request->inquiry_id)->update(['comment' => $request->comment]);
        
        return redirect()->back()->with('success', 'Succes! Feedback request comment added.');
    }
}

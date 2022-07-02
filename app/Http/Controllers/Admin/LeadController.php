<?php

namespace ZigKart\Http\Controllers\Admin;

use Illuminate\Http\Request;
use ZigKart\Http\Controllers\Controller;
use ZigKart\Models\Lead;
use ZigKart\User;
use Carbon\Carbon;

class LeadController extends Controller
{
    //
    public function __construct()
    {
        
    }

    public function leads() 
    {
        $users = User::where('user_type','=', 'vendor')->where('drop_status','=','no')->orderBy('id', 'desc')->get();
        
        $leads = Lead::all();
        
        return view('admin.leads', compact('users', 'leads'));
    }

    public function verify($id)
    {
        $lead = Lead::where('id', $id)->first();
        if(!is_null($lead)) {
            $lead->update(array(
                'is_verified' => true
            ));
            return redirect()->back()->with('success', 'The lead has been successfully verified!');
        }
        return redirect()->back()->with('error', 'Could not verify the lead. Try Again!');
    }

    public function post($id)
    {
        $lead = Lead::where('id', $id)->first();
        if(!is_null($lead)) {
            $lead->update(array(
                'is_posted' => true
            ));
            return redirect()->back()->with('success', 'The lead has been successfully posted!');
        }
        return redirect()->back()->with('error', 'Could not post the lead. Try Again!');
    }

    public function delete($id)
    {
        $lead = Lead::where('id', $id)->first();
        if(!is_null($lead)) {
            $lead->delete();
            return redirect()->back()->with('success', 'The lead has been successfully posted!');
        }
        return redirect()->back()->with('error', 'Could not post the lead. Try Again!');
    }
    
    public function addComment(Request $request){
        $isUpdated = User::where('id', $request->inquiry_id)->update(['comment' => $request->comment]);
        
        return redirect()->back()->with('success', 'Succes! Seller lead comment added.');
    }

}

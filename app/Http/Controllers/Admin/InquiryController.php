<?php

namespace ZigKart\Http\Controllers\Admin;

use Illuminate\Http\Request;
use ZigKart\Http\Controllers\Controller;
use ZigKart\Models\Notification;

use ZigKart\Models\Product;
use ZigKart\Models\ProductInquiry;
use ZigKart\Models\ProductInquirySellers;
use ZigKart\Helpers;


class InquiryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inquiries() {
        $productInquiry = ProductInquiry::with('product')->with('inquiry_sellers')->orderBy('created_at', 'desc')->get();
        
        $products = Product::where('product_status', '=', 1)->where('product_drop_status', '=', 'no')->with('user')->orderBy('product_id', 'desc')->get();
      
        return view("admin.inquiries", compact('productInquiry', 'products'));
    }
    
    public function verify($id)
    {
        $isUpdated = ProductInquiry::where('inquiry_id', $id)->update(['is_verify' => 1]);
        
        $productInquiry = ProductInquiry::where('inquiry_id', $id)->first();
        $productName = (isset($productInquiry->product->product_name) ? $productInquiry->product->product_name : $productInquiry->product_name);
        $products = Product::where('product_name', 'like', '%'.$productName.'%')->get()->unique('user_id');
    
        foreach($products as $product){
            $inquirySeller = new ProductInquirySellers;
            $inquirySeller->product_inquiry_id =  $productInquiry->inquiry_id;
            $inquirySeller->user_id = $product->user_id;
            $inquirySeller->is_buy_lead = 1;
            $inquirySeller->save();
        }
        
        return redirect()->back()->with("success", "Success ! Inquiry verified.");
    }
    
    public function send($id)
    {
        $productInquiry = ProductInquiry::where('inquiry_id', $id)->first();
        $productName = (isset($productInquiry->product->product_name) ? $productInquiry->product->product_name : $productInquiry->product_name);
        $products = Product::where('product_name', 'like', '%'.$productName.'%')->get()->unique('user_id');
    
        foreach($products as $product){
            $userId = (isset($productInquiry->product->user_id) ? $productInquiry->product->user_id : 0);
            
            $isBuyLead = 1;
            
            if($userId != $product->user_id){
                if(isset($product->user->package_tag)){
                    $totalLead = (int) $product->user->package_tag->service_provider->total_lead;  
                    
                    $sellerLeadCount = (int) ProductInquirySellers::where('user_id', $product->user_id)->where('is_buy_lead', 0)->count();
                    
                    $isBuyLead = ($sellerLeadCount > $totalLead ? 1 : 0);
                    
                    if($isBuyLead == 0){
                        $subject = 'Product Inquiry Alert - Venicered';
                        $data['userName'] = $product->user->name;
                        $data['productInquiry'] = $productInquiry;
        
                        $isSend = Helpers::sendMail($product->user->email, 'mail.send-seller-product-inquiry', $subject, $data);                        
                    }
                }
            }
            
            $inquirySeller = ProductInquirySellers::where('product_inquiry_id', $productInquiry->inquiry_id)->where('user_id', $product->user_id)->first();
            
            if(empty($inquirySeller)){
                $inquirySeller = new ProductInquirySellers;
                $inquirySeller->product_inquiry_id =  $productInquiry->inquiry_id;
                $inquirySeller->user_id = $product->user_id;
            }
        
            $inquirySeller->is_buy_lead = $isBuyLead;
            $inquirySeller->save();
        }
        
        $isUpdated = ProductInquiry::where('inquiry_id', $id)->update(['is_send_to_seller' => 1]);
        
        return redirect()->back()->with("success", "Success ! Inquiry send to seller.");
    }

    public function delete($id) {
        $isDeleted = ProductInquiry::where('inquiry_id', $id)->delete();
        
        return redirect()->back()->with("success", "Success ! Inquiry deleted.");
    }
    
    public function addComment(Request $request){
        $isUpdated = ProductInquiry::where('inquiry_id', $request->inquiry_id)->update(['comment' => $request->comment]);
        
        return redirect()->back()->with('success', 'Succes! Inquiry comment added.');
    }
}

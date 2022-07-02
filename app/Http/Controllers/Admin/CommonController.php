<?php

namespace ZigKart\Http\Controllers\Admin;

use Illuminate\Http\Request;
use ZigKart\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use ZigKart\Models\Pages;
use ZigKart\Models\export;
use ZigKart\Models\deal;
use ZigKart\Models\Settings;
use ZigKart\Models\Events;
use ZigKart\Models\Members;
use ZigKart\Models\ServiceProviders;
use ZigKart\Models\Services;
use Auth;
use Mail;
use Purifier;
use ZigKart\Models\IsoCertifications;
use ZigKart\Models\BusinessInsurance;
use ZigKart\Models\BusinessLoans;
use ZigKart\Models\PopupInquiry;
use ZigKart\Models\Freights;
use ZigKart\Models\PackageTags;
use ZigKart\User;
use ZigKart\Models\Jobs;
use ZigKart\Models\Distributorships;
use ZigKart\Models\eFilings;
use ZigKart\Models\SellerInquiry;
use ZigKart\Models\BusinessInquiry;
use ZigKart\Models\Logistics;
use ZigKart\Models\MetterSheets;
use ZigKart\Models\DistributorshipSheetProducts;
use ZigKart\Models\DistributorshipSheets;
use ZigKart\Models\Contacts;
use Carbon\Carbon;
use ZigKart\Models\Paymentsheets;
use ZigKart\Models\PaymentsheetPayments;
use ZigKart\Models\DeliveryStatus;

class CommonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
		
    }
    
	public function logout(Request $request) {
	  Auth::logout();
	  return redirect('/');
    }
	
	
	public function view_seller_contact()
	{
	   $sellerInquiry = SellerInquiry::orderBy('created_at', 'desc')->get();
	   
	    return view('admin.seller-contact', compact('sellerInquiry'));
	}
	
	public function verifySellerContactInquiry($id){
        $isUpdated =  SellerInquiry::where('id', $id)->update(['is_verify' => 1]);   
        
        return redirect('admin/seller-contact')->with('success', 'Success! Seller contact inquiry verified.');
    }
    
    public function deleteSellerContactInquiry($id){
        $isDeleted =  SellerInquiry::destroy($id);   
        
        return redirect('admin/seller-contact')->with('success', 'Success! Seller contact inquiry deleted.');
    }
    
    public function addCommentSellerContactInquiry(Request $request){
        $isUpdated =  SellerInquiry::where('id', $request->inquiry_id)->update(['comment' => $request->comment]);   
        
        return redirect('admin/seller-contact')->with('success', 'Success! Seller contact inquiry comment added.');
    }
    
    public function view_contact()
	{
	   $contactInquiry = Contacts::orderBy('created_at', 'desc')->get();
	   
	    return view('admin.contact', compact('contactInquiry'));
	}
	
	public function verifyContactInquiry($id){
        $isUpdated =  Contacts::where('id', $id)->update(['is_verify' => 1]);   
        
        return redirect('admin/contact')->with('success', 'Success! Contact inquiry verified.');
    }
    
    public function deleteContactInquiry($id){
        $isDeleted =  Contacts::destroy($id);   
        
        return redirect('admin/contact')->with('success', 'Success! Contact inquiry deleted.');
    }
    
    public function addCommentContactInquiry(Request $request){
        $isUpdated =  Contacts::where('id', $request->inquiry_id)->update(['comment' => $request->comment]);   
        
        return redirect('admin/contact')->with('success', 'Success! Contact inquiry comment added.');
    }
    
    public function view_business_contact()
	{
	   $businessInquiry = BusinessInquiry::orderBy('created_at', 'desc')->get();
	   
	    return view('admin.business-contact', compact('businessInquiry'));
	}
	
	public function verifyBusinessContactInquiry($id){
        $isUpdated =  BusinessInquiry::where('id', $id)->update(['is_verify' => 1]);   
        
        return redirect('admin/business-contact')->with('success', 'Success! Business contact inquiry verified.');
    }
    
    public function deleteBusinessContactInquiry($id){
        $isDeleted =  BusinessInquiry::destroy($id);   
        
        return redirect('admin/business-contact')->with('success', 'Success! Business contact inquiry deleted.');
    }
    
    public function addCommentBusinessContactInquiry(Request $request){
        $isUpdated =  BusinessInquiry::where('id', $request->inquiry_id)->update(['comment' => $request->comment]);   
        
        return redirect('admin/business-contact')->with('success', 'Success! Business contact inquiry comment added.');
    }
	
	public function view_newsletter()
	{
	  
	  $newsData['view'] = Pages::getnewsletterData();
	  $data = array('newsData' => $newsData);
	  return view('admin.newsletter')->with($data);
	
	}
	
	
	public function view_add_contact()
	{
	    return view('admin.add-contact');
	}
	
	public function PaymentSheeet()
	{
	    $paymentSheets = Paymentsheets::orderBy('created_at', 'desc')->get();
	    
	    return view('admin.paymentsheet', compact('paymentSheets'));
	}
	
	public function deletePaymentSheeet($id)
	{
	    $isDeleted = Paymentsheets::destroy($id);
	    
	    $isDeleted = PaymentsheetPayments::where('paymentsheet_id', $id)->delete();
	    
	    return redirect()->back()->with('success', 'Success! Paymentsheet deleted.');
	}
	
	public function deletePaymentSheeetTransactions($id)
	{
	    $isDeleted = PaymentsheetPayments::destroy($id);
	    
	    return redirect()->back()->with('success', 'Success! Paymentsheet transaction deleted.');
	}
	
	public function DeliveryStatus()
	{
	    $deliverystatus = Deliverystatus::orderBy('created_at', 'desc')->get();
	    
	    return view('admin.delivery-status', compact('deliverystatus'));
	}
	public function AddDeliveryStatus()
	{
	    $vendorsList = User::whereNotNull('company_name')->where('company_name', '<>', '')->where('user_type', 'vendor')->where('drop_status', '=', 'no')->orderBy('company_name', 'asc')->get();
	   	
	   	$serviceProviders = ServiceProviders::get();
	   	
	    return view('admin.add-delivery-status', compact('vendorsList', 'serviceProviders'));
	}
	
	public function SaveDeliveryStatus(Request $request){
	    
	    $deliverystatus = Deliverystatus::where('user_id', $request->user_id)->first();
	   
	    if(empty($deliverystatus)){
	       $deliverystatus = new Deliverystatus;   
	       $deliverystatus->user_id = $request->user_id;
	    }
	   
        $deliverystatus->delivery_status = $request->delivery_status;
        $deliverystatus->company_name = $request->company_name;
        $deliverystatus->customer_name = $request->customer_name;
        $deliverystatus->mobile = $request->mobile;
        $deliverystatus->email = $request->email;
        $deliverystatus->package_name = $request->package_name;
        $deliverystatus->contract_amount = $request->contract_amount;
        $deliverystatus->payment_status = $request->payment_status;
        $deliverystatus->developer_name = $request->developer_name;
        $deliverystatus->project_assign_date = $request->project_assign_date;
        $deliverystatus->remaining_work = $request->remaining_work;
        $deliverystatus->project_delivery_date = $request->project_delivery_date;
        $deliverystatus->domain_status = $request->domain_status;
        $deliverystatus->domain_name = $request->domain_name;
        $deliverystatus->comment = $request->comment;
        $deliverystatus->save();
        
        return redirect('admin/delivery-status')->with('success', 'Success! Delivery Status saved.');
	}
	
	public function editDeliveryStatus($id)
	{
	    $vendorsList = User::whereNotNull('company_name')->where('company_name', '<>', '')->where('user_type', 'vendor')->where('drop_status', '=', 'no')->orderBy('company_name', 'asc')->get();
	   	
	   	$serviceProviders = ServiceProviders::get();
	    
	    $mode = 'edit';
	    
	    $deliverystatus = Deliverystatus::find($id); 
	    
	    return view('admin.edit-delivery-status', compact('vendorsList',  'serviceProviders', 'mode', 'deliverystatus'))->with('success', 'Success! Delivery Status Update.');;
	}
	
	public function deleteDeliveryStatus($id)
	{
	    $isDeleted = deliverystatus::destroy($id);
	    
	    return redirect()->back()->with('success', 'Success! Delivery status deleted.');
	}
	
	public function B2BSheet()
	{
	    $metterSheets = MetterSheets::orderBy('created_at', 'desc')->get();
	    
	    return view('admin.b2b-sheet', compact('metterSheets'));
	}
	
	public function deleteB2BSheet($id)
	{
	    $isDeleted = MetterSheets::destroy($id);
	    
	    return redirect()->back()->with('success', 'Success! B2B Metter Sheet deleted.');
	}
	
	public function DistributorshipSheet()
	{
        $distributorshipSheets = DistributorshipSheets::orderBy('created_at', 'desc')->get();
        
        foreach($distributorshipSheets as $key => $distributorshipSheet){
           $distributorshipSheets[$key]->products = DistributorshipSheetProducts::where('distributorship_sheet_id', $distributorshipSheet->id)->get();   
        }
        
	    return view('admin.distributorship-sheet', compact('distributorshipSheets'));
	}
	
	public function deleteDistributorshipSheet($id)
	{
	    $isDeleted = DistributorshipSheets::destroy($id);
	    
	    return redirect()->back()->with('success', 'Success! Distributorship Metter Sheet deleted.');
	}
	
	public function update_contact(Request $request)
	{
	
	  $from_name = $request->input('from_name');
	  $from_email = $request->input('from_email');
	  $message_text = $request->input('message_text');
	  
	  $contact_count = Members::getcontactCount($from_email);
	  if($contact_count == 0)
	  {
	  $record = array('from_name' => $from_name, 'from_email' => $from_email, 'message_text' => $message_text, 'contact_date' => date('Y-m-d'));
	  Members::saveContact($record);
	  
	  return redirect('admin/add-contact')->with('success','Added successfully');
	  }
	  else
	  {
	  return redirect('admin/add-contact')->with('error','Sorry! Contact details already added');
	  }
	  
	  
	
	}
	
	
	public function view_contact_delete($id)
	{
	   Pages::deleteContact($id);
	   return redirect()->back()->with('success','Delete successfully.');
	}
	
	
	public function view_newsletter_delete($id)
	{
	   Pages::deleteNewsletter($id);
	   return redirect()->back()->with('success','Delete successfully.');
	}
	
	public function view_send_updates()
	{
	  $newsData['view'] = Pages::getactiveNewsletter();
	  $data = array('newsData' => $newsData);
	  return view('admin.send-updates')->with($data);
	}
	
	
	public function send_updates(Request $request)
	{
	   
	   
	   $news_heading = $request->input('news_heading');
	   $news_content = Purifier::clean($request->input('news_content'));
	   $news_email = $request->input('news_email');
	   
	     
         
		 $request->validate([
		 
							
					'news_heading' => 'required',
					'news_content' => 'required',		
							
							
         ]);
		 
		  
		 
         
		 
		 $rules = array(
				
				
				
	     );
		 
		 $messsages = array(
		      
	    );
		 
		$validator = Validator::make(Input::all(), $rules,$messsages);
		
		if ($validator->fails()) 
		{
		 $failedRules = $validator->failed();
		 return back()->withErrors($validator);
		} 
		else
		{
		   
		   foreach($news_email as $to_email)
		   {
		     
			    $sid = 1;
				$setting['setting'] = Settings::editGeneral($sid);
				$from_name = $setting['setting']->sender_name;
				$from_email = $setting['setting']->sender_email;
				$record = array('news_heading' => $news_heading, 'news_content' => $news_content);
				Mail::send('admin.newsletter_update_mail', $record, function($message) use ($from_name, $from_email, $to_email) {
					$message->to($to_email)
							->subject('Newsletter Updates');
					$message->from($from_email,$from_name);
				});
		
		   
		   }
		
			
           return redirect()->back()->with('success', 'Your message has been sent successfully.');
            
 
        } 
     
	
	
	}
	
	
	public function view_gallery()
	{
	  
	  $get['gallery'] = Events::getadminGallery();
	  return view('admin.gallery',[ 'get' => $get]); 
	 
	}
	
	public function view_add_gallery()
	{
	  
	  
	  return view('admin.add-gallery'); 
	  
	}
	
	
	public function update_add_gallery(Request $request)
	{
	
	   
	   $gallery_status = $request->input('gallery_status');
	   $image_size = $request->input('image_size');
	   
	   
	   
	   $request->validate([
							
							'gallery_status' => 'required',
							'gallery_image' => 'required|mimes:jpeg,jpg,png|max:'.$image_size,
							
							
         ]);
		 $rules = array(
								
				
				
	     );
		 
		 $messsages = array(
		      
	    );
		 
		$validator = Validator::make(Input::all(), $rules,$messsages);
		
		if ($validator->fails()) 
		{
		 $failedRules = $validator->failed();
		 return back()->withErrors($validator);
		} 
		else
		{
	   
	      if ($request->hasFile('gallery_image')) {
		     
				   
			$image = $request->file('gallery_image');
			$img_name = time() . '.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/storage/gallery');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$gallery_image = $img_name;
		  }
		  else
		  {
		     $gallery_image = "";
		  }
	      
		   $data = array('gallery_image' => $gallery_image, 'gallery_status' => $gallery_status);
 
            
            
			Events::savegalleryData($data);
            return redirect('/admin/gallery')->with('success', 'Insert successfully.');
	   
	   
	   }
	   
	   
	
	}
	
	public function delete_gallery($token)
	{
	  $gallery_id = base64_decode($token);
	  Events::dropGallery($gallery_id);
	  return redirect('/admin/gallery')->with('success', 'Delete successfully.');
	}
	
	
	public function edit_gallery($token)
	{
	  $gallery_id = base64_decode($token);
	  $edit['gallery'] = Events::editsingleGallery($gallery_id);
	  return view('admin.edit-gallery',['edit' => $edit]);
	}
	
	
	public function update_gallery(Request $request)
	{
	
	   
	   $gallery_status = $request->input('gallery_status');
	   $save_gallery_image = $request->input('save_gallery_image');
	   $gallery_id = base64_decode($request->input('gallery_id'));
	   $image_size = $request->input('image_size');
	   
	   $request->validate([
							
							'gallery_status' => 'required',
							'gallery_image' => 'mimes:jpeg,jpg,png|max:'.$image_size,
							
							
         ]);
		 $rules = array(
								
				
				
	     );
		 
		 $messsages = array(
		      
	    );
		 
		$validator = Validator::make(Input::all(), $rules,$messsages);
		
		if ($validator->fails()) 
		{
		 $failedRules = $validator->failed();
		 return back()->withErrors($validator);
		} 
		else
		{
	   
	      if ($request->hasFile('gallery_image')) {
		     Events::droGalleryPhoto($gallery_id);
				   
			$image = $request->file('gallery_image');
			$img_name = time() . '.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/storage/gallery');
			$imagePath = $destinationPath. "/".  $img_name;
			$image->move($destinationPath, $img_name);
			$gallery_image = $img_name;
		  }
		  else
		  {
		     $gallery_image = $save_gallery_image;
		  }
	      
		   $data = array('gallery_image' => $gallery_image, 'gallery_status' => $gallery_status);
 
            
            
			Events::upgalleryData($gallery_id,$data);
            return redirect('/admin/gallery')->with('success', 'Update successfully.');
	   
	   
	   }
	}
	
	public function viewPackageTag()
	{
	    $packageTags = PackageTags::get();
	    
	    return view('admin.package-tag', compact('packageTags'));
	}
	
	public function createPackageTag()
	{
	    $vendors = User::where('user_type','=','vendor')->where('drop_status','=','no')->orderBy('id', 'desc')->get(); 
	    
	    $serviceProviders = ServiceProviders::get();
	    
	    $mode = 'add';
	    
	    return view('admin.add-package-tag', compact('vendors',  'serviceProviders', 'mode'));
	}
	
	function savePackageTag(Request $request)
	{
	   // $packageTag = (strlen($request->package_tag_id) > 0 ? PackageTags::find($request->package_tag_id) : new PackageTags);
	   // $packageTag->user_id = $request->user_id;
	   // $packageTag->service_provider_id = $request->service_provider_id;
	   // $packageTag->save();
	   
	   $packageTag = [
	     'user_id' => $request->user_id, 
	     'service_provider_id' => $request->service_provider_id, 
	     'contract_amount' => $request->contract_amount, 
	     'start_date' => Carbon::parse($request->start_date)->format('Y-m-d H:i:s'),
	     'expiry_date' => Carbon::parse($request->expiry_date)->format('Y-m-d H:i:s'), 
	     'packege_details' => $request->packege_details
	   ];
	  
	    if(Input::hasFile('packege_invoice')){
            $file = $request->file('packege_invoice');
			$fileName = str_random(10).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
			$uploads = $file->move(public_path() . '/storage/service-providers', $fileName);
			
			$packageInvoice = PackageTags::where('user_id', $request->user_id)->pluck('packege_invoice')->first();
			
			$packageInvoiceArr = array_filter(explode(',', $packageInvoice));
		
			array_push($packageInvoiceArr, $fileName);
			
			$packageTag['packege_invoice'] = implode(',', $packageInvoiceArr);
        }
	   
	   $packageTagId = PackageTags::updateOrCreate(['user_id' => $request->user_id], $packageTag);
	    
	    return redirect('admin/package-tag')->with('success', 'Success! Package tag saved.');
	}
	
	public function editPackageTag($id)
	{
	    $vendors = User::where('user_type','=','vendor')->where('drop_status','=','no')->orderBy('id', 'desc')->get(); 
	    
	    $serviceProviders = ServiceProviders::get();
	    
	    $mode = 'edit';
	    
	    $packageTag = PackageTags::find($id);
	    
	    return view('admin.add-package-tag', compact('vendors',  'serviceProviders', 'mode', 'packageTag'));
	}
	
	public function deletePackageTag($id)
	{
	    $isDeleted = PackageTags::destroy($id);
	    
	    return redirect('admin/package-tag')->with('success', 'Success! Package tag deleted.');
	}
	
	public function deletePackageTagInvoice($id)
	{
	    
	    $packageTag = PackageTags::find($id);
	    
	    $invoice = \Request::query('invoice');
	    
	    $invoiceArr = explode(',', $packageTag->packege_invoice);
	    
	    $packageInvoiceArr = array_combine($invoiceArr, $invoiceArr);
	    
	    unset($packageInvoiceArr[$invoice]);
	    
	    $packageTag->packege_invoice = implode(',', $packageInvoiceArr);
	    
	    $packageTag->save();
	    
	     return redirect('admin/package-tag')->with('success', 'Success! Package tag invoice deleted.');
	}
	
	public function viewServiceProviders()
	{
	    $serviceProviders = ServiceProviders::get();
	    
	    return view('admin.service-providers.list', compact('serviceProviders'));
	}
	
	public function export_billing()
	{
	    $serviceProviders = export::orderBy('id', 'desc')->get();
	    
	    return view('admin.service-providers.export', compact('serviceProviders'));
	   
	}
	
	public function addCommentExportBilling(Request $request){
	    $isUpdated =  export::where('id', $request->inquiry_id)->update(['comment' => $request->comment]);   
        
        return redirect()->back()->with('success', 'Success! Export bill comment added.');
	}
	
	public function services_dealing()
	{
	    $serviceProviders = deal::orderBy('id', 'desc')->get();
	    
	    return view('admin.service-providers.dealing', compact('serviceProviders'));
	}
	
	public function addCommentServiceDealing(Request $request){
	    $isUpdated =  deal::where('id', $request->inquiry_id)->update(['comment' => $request->comment]);   
        
        return redirect()->back()->with('success', 'Success! Service provider comment added.');
	}
	
    public function addServiceProvider()
    {
        $mode = 'add';
        
        return view('admin.service-providers.form', compact('mode'));
    }
    
    public function saveServiceProvider(Request $request)
    {
        $serviceProvider = new ServiceProviders();
        $serviceProvider->user_id = Auth::user()->id;
        $serviceProvider->provider_name = $request->provider_name;
        $serviceProvider->service_price = $request->service_price;
        $serviceProvider->total_lead = $request->total_lead;
        
        if(Input::hasFile('provider_image')){
            $file = $request->file('provider_image');
			$fileName = str_random(30).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
			$uploads = $file->move(public_path() . '/storage/service-providers', $fileName);
			
			$serviceProvider->provider_image = $fileName;
        }
        
        if(Input::hasFile('provider_small_image')){
            $file = $request->file('provider_small_image');
			$fileName = str_random(30).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
			$uploads = $file->move(public_path() . '/storage/service-providers', $fileName);
			
			$serviceProvider->provider_small_image = $fileName;
        }
        
        if(Input::hasFile('service_docs')){
            $file = $request->file('service_docs');
			$fileName = str_random(30).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
			$uploads = $file->move(public_path() . '/storage/service-providers', $fileName);
			
			$serviceProvider->service_docs = $fileName;
        }
        
        $serviceProvider->save();
        
        return redirect('admin/service-providers')->with('success', 'Success! Service provider saved.');
    }
    
    public function editServiceProvider($id)
    {
        $mode = 'edit';
        
        $serviceProvider = ServiceProviders::where('id', $id)->first();
        
        return view('admin.service-providers.form', compact('mode', 'serviceProvider'));
    }
    
    public function updateServiceProvider(Request $request, $id)
    {
        $serviceProvider = ServiceProviders::where('id', $id)->first();
        $serviceProvider->provider_name = $request->provider_name;
        $serviceProvider->service_price = $request->service_price;
        $serviceProvider->total_lead = $request->total_lead;
        
        if(Input::hasFile('provider_image')){
            $file = $request->file('provider_image');
			$fileName = str_random(30).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
			$uploads = $file->move(public_path() . '/storage/service-providers', $fileName);
			
			$serviceProvider->provider_image = $fileName;
        }
        
        if(Input::hasFile('provider_small_image')){
            $file = $request->file('provider_small_image');
			$fileName = str_random(30).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
			$uploads = $file->move(public_path() . '/storage/service-providers', $fileName);
			
			$serviceProvider->provider_small_image = $fileName;
        }
        
        if(Input::hasFile('service_docs')){
            $file = $request->file('service_docs');
			$fileName = str_random(30).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
			$uploads = $file->move(public_path() . '/storage/service-providers', $fileName);
			
			$serviceProvider->service_docs = $fileName;
        }
        
        $serviceProvider->save();
        
        return redirect('admin/service-providers')->with('success', 'Success! Service provider updated.');
    }
    
     public function deleteexportdata($id)
    {
        $isDelete = export::where('id', $id)->delete();
        
         return redirect('admin/export-billing')->with('success', 'Success! export record deleted.');
    }
    
     public function deletedealdata($id)
    {
        $isDelete = deal::where('id', $id)->delete();
        
         return redirect('admin/services-dealing')->with('success', 'Success! Services Dealing Record Deleted.');
    }
    
    public function deleteServiceProvider($id)
    {
        $isDelete = ServiceProviders::where('id', $id)->delete();
        
         return redirect('admin/service-providers')->with('success', 'Success! Service provider deleted.');
    }
    
    public function viewService()
	{
	    $services = Services::get();
	    
	    return view('admin.services.list', compact('services'));
	}
	
    public function addService()
    {
        $mode = 'add';
        
        return view('admin.services.form', compact('mode'));
    }
    
    public function saveService(Request $request)
    {
        $service = new Services();
        $service->user_id = Auth::user()->id;
        $service->service_name = $request->service_name;
        $service->service_type = $request->service_type;
        
        if(Input::hasFile('service_image')){
            $file = $request->file('service_image');
			$fileName = str_random(30).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
			$uploads = $file->move(public_path() . '/storage/services', $fileName);
			
			$service->service_image = $fileName;
        }
        
        if(Input::hasFile('service_docs')){
            $file = $request->file('service_docs');
			$fileName = str_random(30).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
			$uploads = $file->move(public_path() . '/storage/services', $fileName);
			
			$service->service_docs = $fileName;
        }
        
        $service->save();
        
        return redirect('admin/services')->with('success', 'Success! Service saved.');
    }
    
    public function editService($id)
    {
        $mode = 'edit';
        
        $service = Services::where('id', $id)->first();
        
        return view('admin.services.form', compact('mode', 'service'));   
    }
    
    public function updateService(Request $request, $id)
    {
        $service = Services::where('id', $id)->first();
        $service->service_name = $request->service_name;
        $service->service_type = $request->service_type;
        
        if(Input::hasFile('service_image')){
            $file = $request->file('service_image');
			$fileName = str_random(30).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
			$uploads = $file->move(public_path() . '/storage/services', $fileName);
			
			$service->service_image = $fileName;
        }
        
        if(Input::hasFile('service_docs')){
            $file = $request->file('service_docs');
			$fileName = str_random(30).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
			$uploads = $file->move(public_path() . '/storage/services', $fileName);
			
			$service->service_docs = $fileName;
        }
        
        $service->save();
        
        return redirect('admin/services')->with('success', 'Success! Service updated.');
    }
    
    public function deleteService($id)
    {
         $isDelete = Services::where('id', $id)->delete();
        
         return redirect('admin/services')->with('success', 'Success! Service deleted.');
    }
    
    public function viewBusinessEnquiries()
    {
        $isoCertifications = IsoCertifications::orderBy('created_at', 'desc')->get();
    
        $businessInsurances =  BusinessInsurance::orderBy('created_at', 'desc')->get();
        
        $businessLoans = BusinessLoans::orderBy('created_at', 'desc')->get();
        
        return view('admin.business-enquiries', compact('isoCertifications', 'businessInsurances', 'businessLoans'));
    }
    
    public function deleteBusinessEnquiries($id)
    {
        $inquiryType = \Request::query('type');
        
        if($inquiryType == 'isoCertification'){
            $isDeleted = IsoCertifications::destroy($id);
            
        }else if($inquiryType == 'businessInsurance'){
            $isDeleted = BusinessInsurance::destroy($id);
        }
        else{
            $isDeleted = BusinessLoans::destroy($id);
        }
        
        return redirect()->back()->with('success', 'Success! Business inquiry deleted.');
    }
    
    public function addCommentBusinessEnquiries(Request $request)
    {
        if($request->inquiry_type == 'isoCertification'){
            $businessInquiry = IsoCertifications::find($request->inquiry_id);
            
        }else if($request->inquiry_type == 'businessInsurance'){
            $businessInquiry = BusinessInsurance::find($request->inquiry_id);
        }
        else{
            $businessInquiry = BusinessLoans::find($request->inquiry_id);
        }
        
        $businessInquiry->comment = $request->comment;
        $businessInquiry->save();
        
        return redirect()->back()->with('success', 'Success! Business inquiry comment added');
    }
    
    public function viewModalEnquiries()
    {
        $popupInquiry =  PopupInquiry::orderBy('created_at', 'desc')->get();
        
        return view('admin.popup-inquiry', compact('popupInquiry'));
    }
    
    public function viewFreights(){
        $freights =  Freights::orderBy('created_at', 'desc')->get();   
        
        return view('admin.freights', compact('freights'));
    }
    
    public function verifyFreights($id){
        $isUpdated =  Freights::where('id', $id)->update(['is_verify' => 1]);   
        
        return redirect('admin/freights')->with('success', 'Success! Freights verified.');
    }
    
    public function deleteFreights($id){
        $isDeleted =  Freights::destroy($id);   
        
        return redirect('admin/freights')->with('success', 'Success! Freights deleted.');
    }
    
    public function addCommentFreights(Request $request){
        $isUpdated =  Freights::where('id', $request->inquiry_id)->update(['comment' => $request->comment]);   
        
        return redirect('admin/freights')->with('success', 'Success! Freights comment added.');
    }
    
    public function distributorships(){   
         $distributorships = Distributorships::orderBy('created_at', 'desc')->get();
         
        return view('admin.distributorships', compact('distributorships'));
    }
    
    public function verifyDistributorships($id){
        $isUpdated = Distributorships::where('id', $id)->update(['is_verify' => 1]);
        
        return redirect()->back()->with('success', 'Success! Distributorship verified.');
    }
    
    public function deleteDistributorships($id){
        $isDelete = Distributorships::where('id', $id)->delete();
        
        return redirect()->back()->with('success', 'Success! Distributorship deleted.');
    }
    
    public function addCommentDistributorships(Request $request){
        $isUpdated =  Distributorships::where('id', $request->inquiry_id)->update(['comment' => $request->comment]);   
        
        return redirect()->back()->with('success', 'Success! Distributorship comment added.');
    }
    
    public function jobs(){   
         $jobs = Jobs::orderBy('created_at', 'desc')->get();
         
        return view('admin.jobs', compact('jobs'));
    }
    
    public function verifyJobs($id){
        $isUpdated = Jobs::where('id', $id)->update(['is_verify' => 1]);
        
        return redirect()->back()->with('success', 'Success! Jobs verified.');
    }
    
    public function deleteJobs($id){
        $isDelete = Jobs::where('id', $id)->delete();
        
        return redirect()->back()->with('success', 'Success! Job deleted.');
    }
    
    public function addCommentJobs(Request $request){
        $isUpdated =  Jobs::where('id', $request->inquiry_id)->update(['comment' => $request->comment]);   
        
        return redirect()->back()->with('success', 'Success! Job comment added.');
    }
    
    public function eFilings(){   
         $eFilings = eFilings::orderBy('created_at', 'desc')->get();
         
        return view('admin.e-filings', compact('eFilings'));
    }
    
    public function verifyEFilings($id){
        $isUpdated = eFilings::where('id', $id)->update(['is_verify' => 1]);
        
        return redirect()->back()->with('success', 'Success! E-filing verified.');
    }
    
    public function deleteEFilings($id){
        $isDelete = eFilings::where('id', $id)->delete();
        
        return redirect()->back()->with('success', 'Success! E-filing deleted.');
    }
    
    public function addCommentEFilings(Request $request){
        $isUpdated =  eFilings::where('id', $request->inquiry_id)->update(['comment' => $request->comment]);   
        
        return redirect()->back()->with('success', 'Success! E-filing comment added.');
    }
    
    public function logistics(){   
         $logistics = Logistics::orderBy('created_at', 'desc')->get();
         
        return view('admin.logistics', compact('logistics'));
    }
    
    public function verifyLogistics($id){
        $isUpdated = Logistics::where('id', $id)->update(['is_verify' => 1]);
        
        return redirect()->back()->with('success', 'Success! Logistics verified.');
    }
    
    public function deleteLogistics($id){
        $isDelete = Logistics::where('id', $id)->delete();
        
        return redirect()->back()->with('success', 'Success! Logistics deleted.');
    }
    
    public function addCommentLogistics(Request $request){
        $isUpdated =  Logistics::where('id', $request->inquiry_id)->update(['comment' => $request->comment]);   
        
        return redirect()->back()->with('success', 'Success! Logistics comment added.');
    }
    
    public function vrTrustList(){
        $vendors = User::where('user_type','=','vendor')->where('drop_status','=','no')->orderBy('id', 'desc')->get(); 
        
        return view('admin.vr-trust-list', compact('vendors'));
    }
    
    public function addVRTrustIcon(Request $request)
    {
        $user = User::find($request->user_id);
        
        if(Input::hasFile('icon')){
            $file = $request->file('icon');
			$fileName = str_random(30).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
			$uploads = $file->move(public_path() . '/storage/vr-trust', $fileName);
			
			$user->vr_trust_icon = $fileName;
        }
        
        if(Input::hasFile('icon_docs')){
            $file = $request->file('icon_docs');
			$fileName = str_random(30).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
			$uploads = $file->move(public_path() . '/storage/vr-trust', $fileName);
			
			$user->vr_trust_docs = $fileName;
        }
        
        $user->save();
        
        return redirect()->back()->with('success', 'Success! VR Trust icon added.');
    }
    
    public function deleteVRTrustIcon(Request $request)
    {
        $user = User::find($request->user_id);
        
        if($request->type == 'icon'){
			$user->vr_trust_icon = NULL;
        }
        
        if($request->type == 'docs'){
			$user->vr_trust_docs = NULL;
        }
        
        $user->save();
        
        return 1;
    }
    
    public function addPopupInquiryComment(Request $request)
    {
        $isUpdated = PopupInquiry::where('id', $request->inquiry_id)->update(['comment' => $request->comment]);
        
        return redirect()->back()->with('success', 'Succes! Popup inquiry comment added.');
    }
    
    
    public function deletePopupInquiryComment($id){
        $isDeleted = PopupInquiry::where('id', $id)->delete();
        
        return redirect()->back()->with('success', 'Succes! Popup inquiry deleted.');
    }
    
    public function wtc()
    {
        return view("wtc-certificate");
    }
    
   
}

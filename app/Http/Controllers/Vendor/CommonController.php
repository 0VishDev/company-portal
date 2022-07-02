<?php

namespace ZigKart\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use ZigKart\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use ZigKart\Models\Country;
use ZigKart\Models\State;
use ZigKart\Models\City;
use ZigKart\Models\Members;
use ZigKart\Models\Product;
use ZigKart\Models\Category;
use ZigKart\Models\SubCategory;
use ZigKart\Models\Attribute;
use ZigKart\Models\AttributeValue;
use ZigKart\Models\ProductImages;
use ZigKart\Models\ProductDocs;
use ZigKart\Models\ProductVariants;
use ZigKart\Models\ProductInquiry;
use ZigKart\User;
use Auth;
use Carbon\Carbon;
use ZigKart\Models\ServiceProviders;
use ZigKart\Helpers;
use ZigKart\Models\ProductInquirySellers;
use ZigKart\Models\Settings;

class CommonController extends Controller
{
    //
    public function dashboard() 
    {
        $user = Auth::user();
        
        $countries = Country::get();
        
        if(strlen($user->country_id) > 0){
            $states = State::where('country_id','=', $user->country_id)->get();
            $cities = City::where('state_id','=', $user->state_id)->get();
        }else{
            $country = Country::where('country_name', 'India')->first();
            $states = State::where('country_id','=', $country->country_id)->get();
            $cities = City::where('state_id','=', $states[0]['id'])->get();
        }
        
        return view('vendor-dash.index', compact('user', 'countries', 'states', 'cities'));
    }

    public function premium_services() 
    {
        $serviceProviders = ServiceProviders::get();
        
        return view('vendor-dash.premium-services', compact('serviceProviders'));
    }
    
    public function Lead_desk() 
    {   
        $productInquiry = ProductInquiry::has('inquiry_seller')->where('is_send_to_seller', 1)->with('product')->orderBy('created_at', 'desc')->get();

        return view('vendor-dash.lead-desk', compact('productInquiry'));
    }
    
    public function Lead_view($id) 
    {
        $inquiry = ProductInquiry::where('inquiry_id', $id)->with('inquiry_seller')->first();
        
        $isUpdated = ProductInquirySellers::where('id', $inquiry->inquiry_seller->id)->update(['is_consumed' => 1]);
        
        return view('vendor-dash.view-lead', compact('inquiry'));
    }

    public function contact_profile() 
    {
        $user = Auth::user();
        $userArr = explode(' ', $user->name);
        $user->first_name = (isset($userArr[0]) ? $userArr[0] : '');
        $user->last_name = (isset($userArr[1]) ? $userArr[1] : '');
        
        $promoterArr = explode(' ', $user->promoter_name);
        $user->promoter_first_name = (isset($promoterArr[0]) ? $promoterArr[0] : '');
        $user->promoter_last_name = (isset($promoterArr[1]) ? $promoterArr[1] : '');
        
        $countries = Country::get();
        
        if(strlen($user->country_id) > 0){
            $states = State::where('country_id','=', $user->country_id)->get();
            $cities = City::where('state_id','=', $user->state_id)->get();
        }else{
            $country = Country::where('country_name', 'India')->first();
            $states = State::where('country_id','=', $country->country_id)->get();
            $cities = City::where('state_id','=', $states[0]['id'])->get();
        }
        
        return view('vendor-dash.contact-profile', compact('user', 'countries', 'states', 'cities'));
    }

    public function business_profile() 
    {
        $user = Auth::user();
        
        $promoterArr = explode(' ', $user->promoter_name);
        $user->promoter_first_name = (isset($promoterArr[0]) ? $promoterArr[0] : '');
        $user->promoter_last_name = (isset($promoterArr[1]) ? $promoterArr[1] : '');
        
        $primaryTypes = Members::primaryTypes();
        $ownershipTypes = Members::ownershipTypes();
        $noOfEmployees = Members::noOfEmployees();
        $annualTurnovers = Members::annualTurnovers();
        $secondoryBusinesses = Members::secondoryBusiness();
        
        return view('vendor-dash.business-profile', compact('user', 'primaryTypes', 'ownershipTypes', 'noOfEmployees', 'annualTurnovers', 'secondoryBusinesses'));
    }

    public function statutory_profile() 
    {
        $user = Auth::user();
        
        return view('vendor-dash.statutory-profile', compact('user'));
    }

    public function bank_details() 
    {
        $user = Auth::user();
        
        return view('vendor-dash.bank-details', compact('user'));
    }

    public function relevant_leads() 
    {
        $productIds = Product::where('user_id', Auth::user()->id)->get()->pluck('product_id')->toArray();
    
        $productInquiry = ProductInquiry::where(function($query) use ($productIds){
                            $query->whereIn('product_id', $productIds)->where('created_at', '<=',  Carbon::now()->subHours(24))->where('is_verify', 1);
                        })->orWhere(function($query) {
                            $query->has('buy_inquiry_seller')->where('created_at', '<=',  Carbon::now()->subHours(24))->where('is_verify', 1);
                        })->orderBy('created_at', 'desc')->get();
                        
        $sid = 1;
		$siteSetting = Settings::editGeneral($sid);
            
        return view('vendor-dash.relevant-leads', compact('productInquiry', 'siteSetting'));
    }

    public function recent_leads() 
    {
        $productIds = Product::where('user_id', Auth::user()->id)->get()->pluck('product_id')->toArray();
        
        $productInquiry = ProductInquiry::where(function($query) use ($productIds){
                            $query->whereIn('product_id', $productIds)->whereBetween('created_at', [Carbon::now()->subHours(24), Carbon::now()])->where('is_verify', 1);
                        })->orWhere(function($query) {
                            $query->has('buy_inquiry_seller')->whereBetween('created_at', [Carbon::now()->subHours(24), Carbon::now()])->where('is_verify', 1);
                        })->with('product')->orderBy('created_at', 'desc')->get();
                        
        $sid = 1;
		$siteSetting = Settings::editGeneral($sid);
        
        return view('vendor-dash.recent-leads', compact('productInquiry', 'siteSetting'));
    }

    public function shortlisted_leads() 
    {
        $productIds = Product::where('user_id', Auth::user()->id)->get()->pluck('product_id')->toArray();
        
        $productInquiry = ProductInquiry::where(function($query) use ($productIds){
                            $query->has('shortlist_inquiry_seller')->whereIn('product_id', $productIds)->where('is_verify', 1);
                        })->orWhere(function($query) {
                            $query->has('shortlist_inquiry_seller')->where('is_verify', 1);
                        })->with('product')->orderBy('created_at', 'desc')->get();
                        
        $sid = 1;
		$siteSetting = Settings::editGeneral($sid);
        
        return view('vendor-dash.shortlisted-leads', compact('productInquiry', 'siteSetting'));
    }

    public function consumed_leads() 
    {
        $productInquiry = ProductInquiry::has('consumed_inquiry_seller')->where('is_send_to_seller', 1)->with('product')->orderBy('created_at', 'desc')->get();
        
        return view('vendor-dash.consumed-leads', compact('productInquiry'));
    }
    
    public function shortlistInquiry($id)
    {
        $productInquiry = ProductInquiry::where('inquiry_id', $id)->first();
        
        if(isset($productInquiry->buy_inquiry_seller) && !empty($productInquiry->buy_inquiry_seller)){
            $inquirySeller = $productInquiry->buy_inquiry_seller;
            $inquirySeller->is_shortlist = 1;
            $inquirySeller->save();
        }else{
            $inquirySeller = new ProductInquirySellers;
            $inquirySeller->product_inquiry_id = $id;
            $inquirySeller->user_id = Auth::user()->id;
            $inquirySeller->is_buy_lead = 1;
            $inquirySeller->is_shortlist = 1;
            $inquirySeller->save();
        }
        
        return redirect()->back()->with("success", "Success ! Inquiry shortlisted.");
    }

    public function transaction_history() 
    {
        return view('vendor-dash.transaction-history');
    }

    public function manage_products() 
    {
        $attribute = Attribute::where('attribute_name', 'Unit')->orWhere('attribute_name', 'unit')->first();
        
        $activeProducts = Product::where('user_id', Auth::user()->id)->where('product_status', '=', 1)->where('product_drop_status', 'no')->with('variants')->get();
        
        foreach($activeProducts as $key => $product){
            if(strlen($product->product_attribute_type) > 0 && strlen($product->product_attribute) > 0){
                $types = explode(',', $product->product_attribute_type);
                $attributes = explode(',', $product->product_attribute);
            
                if(in_array($attribute->attribute_id, $types)){
                    $attrKey = array_search($attribute->attribute_id, $types);
                    $activeProducts[$key]->product_unit = AttributeValue::where('attribute_value_id', $attributes[$attrKey])->pluck('attribute_value')->first();
                }
            }
            
            $categoryArr = explode('subcat-', $product->product_category);
            $activeProducts[$key]->subCategory = SubCategory::where('subcat_id', $categoryArr[count($categoryArr) -1])->first();   
        }
        
        $inActiveProducts = Product::where('user_id', Auth::user()->id)->where('product_status', '=', 0)->where('product_drop_status', 'no')->with('variants')->get();
        
        foreach($inActiveProducts as $key => $product){
            if(!empty($product->product_attribute_type) && !empty($product->product_attribute)){
                $types = explode(',', $product->product_attribute_type);
                $attributes = explode(',', $product->product_attribute);
                
                if(in_array($attribute->attribute_id, $types)){
                    $attrKey = array_search($attribute->attribute_id, $types);
                    $inActiveProducts[$key]->product_unit = AttributeValue::where('attribute_value_id', $attributes[$attrKey])->pluck('attribute_value')->first();
                }
            }
            
            $categoryArr = explode('subcat-', $product->product_category);
            $inActiveProducts[$key]->subCategory = SubCategory::where('subcat_id', $categoryArr[count($categoryArr) -1])->first();   
        }
        
        return view('vendor-dash.manage-products', compact('activeProducts', 'inActiveProducts'));
    }
    
    public function deleteProduct($productId){
        $isUpdated  = Product::where('product_id', $productId)->update(['product_drop_status' => 'yes']);
        
        return redirect('vendor/manage-products')->with('success', 'Success! Product deleted.');
    }
    
    public function addEditVariant(Request $request)
    {
        $productId = $request->product_id;
        
        if(!empty($request->variants)){
            foreach($request->variants as $key => $variant){
                $productVariant = ($key == 0 ? new ProductVariants() : ProductVariants::where('id', $key)->first());
                $productVariant->product_id = $productId;
                $productVariant->origin = (isset($variant['origin']) ? $variant['origin'] : '');
                $productVariant->brand = (isset($variant['brand']) ? $variant['brand'] : '');
                $productVariant->color = (isset($variant['color']) ? $variant['color'] : '');
                $productVariant->style = (isset($variant['style']) ? $variant['style'] : '');
                $productVariant->size = (isset($variant['size']) ? $variant['size'] : '');
                $productVariant->package_type = (isset($variant['package_type']) ? $variant['package_type'] : '');
                $productVariant->save();
            }
        }
        
        return redirect('vendor/manage-products')->with('success', 'Success! Product specification saved.');
    }

    public function my_drive() 
    {
        $productDocs = ProductDocs::where('user_id', Auth::user()->id)->get()->groupBy('file_type');
        
        return view('vendor-dash.my-drive', compact('productDocs'));
    }
    
    public function uploadProductDocs(Request $request) 
    {
        if(Input::hasFile('file')){
            $file = $request->file('file');
			$fileName = str_random(30).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
			$uploads = $file->move(public_path() . '/storage/product-docs', $fileName);
			
			$productDocs = new ProductDocs;
			$productDocs->user_id = Auth::user()->id;
			$productDocs->file_name = $file->getClientOriginalName();
			$productDocs->upload_file_name = $fileName;
			$productDocs->file_type = strtoupper($request->type);
			$productDocs->save();
        }
        
        return redirect('vendor/my-drive')->with('success', 'Success! Product docs uploaded.');
    }
    
    public function updateProductDocs(Request $request)
    {
         $productDocs = ProductDocs::where('id', $request->docs_id)->first();
         $productDocs->file_name = $request->file_name;
         $productDocs->save();
         
         return redirect('vendor/my-drive')->with('success', 'Success! Product docs updated.');
    }
    
    public function deleteProductDocs($docsId)
    {
         $isDelete = ProductDocs::where('id', $docsId)->delete();
         
         return redirect('vendor/my-drive')->with('success', 'Success! Product docs deleted.');
    }

    public function add_product() 
    {
        $categories = Category::where('drop_status','=','no')->orderBy('category_name', 'asc')->get();
        
        $brands = Product::homebrandData();
        
        $mode = 'add';
        
        return view('vendor-dash.add-product', compact('brands', 'mode', 'categories'));
    }
    
    public function saveProduct(Request $request)
    {
        $request->validate([
            'product_image' => 'required|max:150',
            'gallery_images' => 'max:150',
            'product_name' => 'required',
            //'price' => 'required',
            //'minimum_order_qty' => 'required',
            //'minimum_order_unit' => 'required',
            'category' => 'required',
            'product_type' => 'required',
            //'product_short_desc' => 'required|max:350',
            //'product_desc' => 'required',
            // 'product_featured' => 'required',
            // 'brand' => 'required',
            'product_status' => 'required'
        ]);
        
        $product_attribute = '';
        $product_attribute_type = '';
        
        if (!empty($request->product_attribute)) {
            $attributes = array();
            $types = array();
            foreach ($request->input('product_attribute') as $attribute) {
                $split = explode("-", $attribute);
                if(isset($split[0]) && isset($split[1])){
                    array_push($attributes, trim($split[0]));
                    array_push($types, trim($split[1]));   
                }
            }
            $product_attribute = implode(',', $attributes);
            $product_attribute_type = implode(',', $types);
        }
        
        $productToken = $this->generateRandomString();
        
        $product = new Product;
        $product->user_id = Auth::user()->id;
        $product->product_name = $request->product_name;
        $product->product_slug = str_slug($request->product_name, '-').'-'.Helpers::createRandomString(7);
        $product->product_category = 'subcat-'.$request->category;
        $product->product_short_desc = $request->product_short_desc;
        $product->product_desc = $request->product_desc;
        $product->product_status = $request->product_status;
        $product->product_price = $request->price;
        $product->product_token = $productToken;
        $product->product_featured = $request->product_featured;
        $product->product_type = $request->product_type;
        // $product->product_brand = $request->brand;
        $product->product_attribute = $product_attribute;
        $product->product_attribute_type = $product_attribute_type;
        $product->minimum_order_qty = $request->minimum_order_qty;
        $product->minimum_order_unit = $request->minimum_order_unit;
        
        if(Input::hasFile('product_image')){
            $file = $request->file('product_image');
			$fileName = str_random(30).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
			$uploads = $file->move(public_path() . '/storage/product', $fileName);
	
			$product->product_image = $fileName;
        }
        
        if(Input::hasFile('gallery_images')){
            $files = $request->file('gallery_images');
            
            foreach($files as $file){
                $fileName = str_random(30).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
			    $uploads = $file->move(public_path() . '/storage/product', $fileName);
			    
			    $imgData = array('product_token' => $productToken, 'product_image' => $fileName);
                Product::saveproductImages($imgData);
            }
        }
        
        $product->save();
        
        return redirect('vendor/manage-products')->with('success', 'Success! Product saved.');
    }
    
    public function searchAutoCompleteProduct(Request $request)
	{
	    $data = array();
	    $keyword = $request->term;
	    
	    if(strlen($keyword) > 0){
		    $query = Product::query();
		    
		    $query = $query->where(function($q) use ($keyword){
                            $q->where('product_name', 'like', '%'.$keyword.'%')->where('product_drop_status', '=', 'no');
                        });
                        
		    $products = $query->get();
		    
		    foreach ($products as $product) {
    			$data[] = array('value' => $product->product_name, 'id' => $product->product_id);
    		}
		}
		
		if (!empty($data)){
		    return $data;   
		}
		else{
			return ['value' => 'No Result Found', 'id' => ''];
		}
	}
    
    public function generateRandomString($length = 25)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    public function editProduct($productId) {
        $product = Product::where('product_id', $productId)->first();
        
        $brands = Product::homebrandData();
        
        $subCategories = SubCategory::where('drop_status','=','no')->get();
        
        $mode = 'edit';
        
        $galleryImages = ProductImages::where('product_token', $product->product_token)->get();
        
        $productAttributes = array();
        
        if(!empty($product->product_attribute_type) && !empty($product->product_attribute)){
            $types = explode(',', $product->product_attribute_type);
            $attributes = explode(',', $product->product_attribute);
            
            foreach($types as $key => $type){
                $attribute = $attributes[$key].'-'.$type;
                array_push($productAttributes, $attribute);
            }
        }
        
        $categories = Category::where('drop_status','=','no')->orderBy('category_name', 'asc')->get();
        
        $subCatArr = explode('subcat-', $product->product_category);
        $subCatId = (isset($subCatArr[1]) ? $subCatArr[1] : '');
        
        $subCategory = SubCategory::where('subcat_id', $subCatId)->first();
        
        return view('vendor-dash.add-product', compact('brands', 'mode', 'subCategory', 'product', 'galleryImages', 'productAttributes', 'categories'));
    }
    
    public function updateProduct(Request $request, $productId) 
    {
        $request->validate([
            'product_image' => 'required|max:150',
            'gallery_images' => 'max:150',
            'price' => 'required',
            'minimum_order_qty' => 'required',
            'minimum_order_unit' => 'required',
            'category' => 'required',
            'product_type' => 'required',
            'product_short_desc' => 'required|max:350',
            'product_desc' => 'required',
            // 'product_featured' => 'required',
            // 'brand' => 'required',
            'product_status' => 'required'
        ]);
        
        $product = Product::where('product_id', $productId)->first();
        
        $product_attribute = '';
        $product_attribute_type = '';
        
        if (!empty($request->product_attribute)) {
            $attributes = array();
            $types = array();
            foreach ($request->input('product_attribute') as $attribute) {
                $split = explode("-", $attribute);
                if(isset($split[0]) && isset($split[1])){
                    array_push($attributes, trim($split[0]));
                    array_push($types, trim($split[1]));   
                }
            }
            $product_attribute = implode(',', $attributes);
            $product_attribute_type = implode(',', $types);
        }
        
        $productArr = [
            'product_name' => $request->product_name,
            'product_slug' => str_slug($request->product_name, '-').'-'.Helpers::createRandomString(7),
            'product_category' => 'subcat-'.$request->category,
            'product_short_desc' => $request->product_short_desc,
            'product_desc' => $request->product_desc,
            'product_status' => $request->product_status,
            'product_price' => $request->price,
            'product_featured' => $request->product_featured,
            // 'product_brand' => $request->brand,
            'product_type' => $request->product_type,
            'minimum_order_qty' => $request->minimum_order_qty,
            'minimum_order_unit' => $request->minimum_order_unit,
            'product_attribute' => $product_attribute,
            'product_attribute_type' => $product_attribute_type
        ];
        
        if(Input::hasFile('product_image')){
            $file = $request->file('product_image');
			$fileName = str_random(30).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
			$uploads = $file->move(public_path() . '/storage/product', $fileName);
	
			$product['product_image'] = $fileName;
        }
        
        if(Input::hasFile('gallery_images')){
            $files = $request->file('gallery_images');
            
            foreach($files as $file){
                $fileName = str_random(30).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
			    $uploads = $file->move(public_path() . '/storage/product', $fileName);
			    
			    $imgData = array('product_token' => $product->product_token, 'product_image' => $fileName);
                Product::saveproductImages($imgData);
            }
        }
        
        $isUpdated = Product::where('product_id', $productId)->update($productArr);
        
        return redirect('vendor/manage-products')->with('success', 'Success! Product updated.');
    }
    
    public function deleteProductImage ($imageId)
    {
        $isDeleted = ProductImages::where('proimg_id', $imageId)->delete();
        
        return redirect()->back()->with('success', 'Success! Product image deleted.');
    }
    
    public function Notification() 
    {
        $user = Auth::user();
        
        return view('vendor-dash.notification', compact('user'));
    }
    
    public function updateNotification(Request $request){
        
        $user = User::find(Auth::user()->id);
        $user->send_inquiry = $request->send_inquiry;
        $user->follow_up_remainder = $request->follow_up_remainder;
        $user->buyer_from = $request->buyer_from;
        $user->latest_buyer_from = $request->latest_buyer_from;
        $user->consumed_buyer_from = $request->consumed_buyer_from;
        $user->deactivate_account = $request->deactivate_account;
        $user->new_offer = $request->new_offer;
        $user->save();
        
        return redirect()->back()->with('success', 'Success! Notification updated.');
    }
    
    public function Account() 
    {
        return view('vendor-dash.account');
    }
    
    public function ChangePass() 
    {
        return view('vendor-dash.changepassword');
    }
    
    public function updatePassword(Request $request) {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);
        
        $user = User::find(Auth::user()->id);
        $user->password = bcrypt($request->password);
        $user->save();
        
        return redirect()->back()->with('success', 'Success! Password updated.');
    }
    
    public function Location() 
    {
        return view('vendor-dash.location');
    }
    
    public function updateBusinessDetail(Request $request)
    {
        $request->validate([
            'seller_name' => 'required',
            // 'company_name' => 'required',
            // 'business_address' => 'required',
            // 'locality' => 'required',
            // 'primary_mobile' => 'required',
            'primary_email' => 'required',
            // 'country' => 'required',
            // 'state' => 'required',
            // 'city' => 'required',
            // 'pincode' => 'required'
       ]);
       
        $user = User::find(Auth::user()->id);
        $user->name = $request->seller_name;
        $user->company_name = $request->company_name;
        $user->business_address = $request->business_address;
        $user->locality = $request->locality;
        $user->mobile = $request->primary_mobile;
        $user->email = $request->primary_email;
        $user->mobile2 = $request->alternate_mobile;
        $user->email2 = $request->alternate_email;
        $user->country_id = $request->country;
        $user->state_id = $request->state;
        $user->city_id = $request->city;
        $user->pincode = $request->pincode;
        $user->save();
        
        $success = ['success' => 'Success! Seller detail updated.', 'type' => 'document'];
        
        return redirect('vendor/dashboard')->with($success);
    }
    
    public function updateDocumentDetail(Request $request)
    {
        if(!empty($request->mode)){
            $request->validate([
                // 'pan_no' => 'required',
                // 'gstin' => 'required',
                // 'tan_no' => 'required',
                // 'cin_no' => 'required',
                // 'dgft_code' => 'required',
            ]);
           
            $user = User::find(Auth::user()->id);
            $user->pan_no = $request->pan_no;
            $user->gst_no = $request->gstin;
            $user->tan_no = $request->tan_no;
            $user->cin_no = $request->cin_no;
            $user->dgft_code = $request->dgft_code;
            $user->save();
            
            return redirect('vendor/bank-details')->with('success', 'Success! Document detail updated.');
        }else{
            $request->validate([
                // 'pan_no' => 'required',
                // 'gst_no' => 'required'
            ]);
           
            $user = User::find(Auth::user()->id);
            $user->pan_no = $request->pan_no;
            $user->gst_no = $request->gst_no;
            $user->save();
            
            $success = ['success' => 'Success! Document detail updated.', 'type' => 'verify'];
            
            return redirect('vendor/dashboard')->with($success);
        }
    }
    
    public function updateCompanyDetail(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_logo' => 'max:150',
            // 'promoter_first_name' => 'required',
            // 'promoter_last_name' => 'required',
            // 'designation' => 'required',
            // 'address_building_no' => 'required',
            // 'address_area' => 'required',
            // 'landmark' => 'required',
            // 'company_website' => 'required',
            // 'company_name' => 'required',
            // 'locality' => 'required',
            // 'primary_mobile' => 'required',
            'primary_email' => 'required',
            // 'country' => 'required',
            // 'state' => 'required',
            // 'city' => 'required',
            // 'pincode' => 'required'
       ]);
       
        $user = User::find(Auth::user()->id);
        $user->name = $request->first_name.' '.$request->last_name;
        $user->promoter_name = $request->promoter_first_name.' '.$request->promoter_last_name;
        $user->designation = $request->designation;
        $user->user_address = $request->address_building_no.' '.$request->address_area.' '.$request->landmark.' - '.$request->pincode;
        $user->address_building_no = $request->address_building_no;
        $user->address_area = $request->address_area;
        $user->landmark = $request->landmark;
        $user->company_website = $request->company_website;
        $user->company_name = $request->company_name;
        $user->business_address = $request->business_address;
        $user->locality = $request->locality;
        $user->mobile = $request->primary_mobile;
        $user->email = $request->primary_email;
        $user->mobile2 = $request->alternate_mobile;
        $user->email2 = $request->alternate_email;
        $user->country_id = $request->country;
        $user->state_id = $request->state;
        $user->city_id = $request->city;
        $user->pincode = $request->pincode;
        
        if(Input::hasFile('file')){
            $file = $request->file('file');
			$fileName = str_random(30).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
			$uploads = $file->move(public_path() . '/storage/users', $fileName);
	
			$user->user_photo = $fileName;
        }
        $user->save();
        
        return redirect('vendor/business-profile')->with('success', 'Success! Contact profile updated.');
    }
    
    public function updateBusinessProfile(Request $request) {
        $request->validate([
            // 'year_of_establishment' => 'required',
            // 'additional_contact_name' => 'required',
            // 'primary_type' => 'required',
            // 'ownership_type' => 'required',
            // 'no_of_employees' => 'required',
            // 'annual_turnover' => 'required',
            // 'secondoryBusiness' => 'required',
            // 'promoter_first_name' => 'required',
            // 'promoter_last_name' => 'required',
            // 'company_website' => 'required',
            // 'company_name' => 'required',
       ]);
       
        $user = User::find(Auth::user()->id);
        $user->year_of_establishment = $request->year_of_establishment;
        $user->additional_contact_name = $request->additional_contact_name;
        $user->nature_of_business = $request->primary_type;
        $user->primary_type = $request->primary_type;
        $user->legal_status_of_firm = $request->ownership_type;
        $user->ownership_type = $request->ownership_type;
        $user->no_of_employees = $request->no_of_employees;
        $user->annual_turnover = $request->annual_turnover;
        $user->secondory_business = (!empty($request->secondoryBusiness) ? implode(',', $request->secondoryBusiness) : '');
        $user->promoter_name = $request->promoter_first_name.' '.$request->promoter_last_name;
        $user->company_website = $request->company_website;
        $user->user_about = $request->company_about;
        $user->company_name = $request->company_name;
        $user->mobile2 = $request->alternate_mobile;
        $user->email2 = $request->alternate_email;
        $user->facebook_link = $request->facebook_link;
        $user->linkedin_link = $request->linkedin_link;
        $user->instagram_link = $request->instagram_link;
        $user->twitter_link = $request->twitter_link;
        
        if(Input::hasFile('company_logo')){
            $file = $request->file('company_logo');
			$fileName = str_random(30).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
			$uploads = $file->move(public_path() . '/storage/company-logo', $fileName);
	
			$user->company_logo = $fileName;
        }
        
        if(Input::hasFile('business_card_front_view')){
            $file = $request->file('business_card_front_view');
			$fileName = str_random(30).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
			$uploads = $file->move(public_path() . '/storage/business-card', $fileName);
	
			$user->business_card_front_view = $fileName;
        }
        
        if(Input::hasFile('business_card_back_view')){
            $file = $request->file('business_card_back_view');
			$fileName = str_random(30).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
			$uploads = $file->move(public_path() . '/storage/business-card', $fileName);
	
			$user->business_card_back_view = $fileName;
        }
        $user->save();
        
        return redirect('vendor/statutory-profile')->with('success', 'Success! Business profile updated.');
    }
    
    public function updateBankDetail(Request $request)
    {
        $request->validate([
            // 'ifsc_code' => 'required',
            // 'bank_name' => 'required',
            // 'account_no' => 'required',
            // 'account_type' => 'required',
        ]);
       
        $user = User::find(Auth::user()->id);
        $user->ifsc_code = $request->ifsc_code;
        $user->bank_name = $request->bank_name;
        $user->account_no = $request->account_no;
        $user->account_type = $request->account_type;
        $user->save();
        
        return redirect('vendor/my-drive')->with('success', 'Success! Bank detail updated.');
    }
    
    public function scratch_card()
    {
        return view("vendor-dash.scratch-card");
    }
}

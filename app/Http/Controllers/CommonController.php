<?php

namespace ZigKart\Http\Controllers;;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use ZigKart\Models\export_data;
use ZigKart\Models\scratch;

use ZigKart\Models\export;
use ZigKart\Models\deal;
use ZigKart\Models\Members;
use ZigKart\Models\Settings;
use ZigKart\Models\Slideshow;
use ZigKart\Models\Product;
use ZigKart\Models\Category;
use ZigKart\Models\SubCategory;
use ZigKart\Models\Attribute;
use ZigKart\Models\Country;
use ZigKart\Models\State;
use ZigKart\Models\ProductInquiry;
use ZigKart\Models\PopupInquiry;
use ZigKart\Models\City;
use ZigKart\User;
use ZigKart\Models\ServiceProviders;
use ZigKart\Models\Services;
use Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use URL;
use Cookie;
use Illuminate\Http\Response;
use Redirect;
use Illuminate\Support\Facades\DB;
use ZigKart\Models\CallbackRequest;
use ZigKart\Models\RequestFeedback;
use ZigKart\Models\Lead;
use ZigKart\Models\IsoCertifications;
use ZigKart\Models\BusinessInsurance;
use ZigKart\Models\BusinessLoans;
use ZigKart\Models\Freights;
use Carbon\Carbon;
use Auth;
use ZigKart\Models\ProductDocs;
use ZigKart\Helpers;
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
use Illuminate\Pagination\LengthAwarePaginator;
use ZigKart\Models\ProductInquirySellers;
use ZigKart\Models\Visitors;
use ZigKart\Models\Paymentsheets;
use ZigKart\Models\PaymentsheetPayments;

class CommonController extends Controller
{
    
    public function test(){
        
        $productInquiries = ProductInquiry::where('is_send_to_seller', 1)->get();
        
        foreach($productInquiries as $productInquiry){
            
            $productName = (isset($productInquiry->product->product_name) ? $productInquiry->product->product_name : $productInquiry->product_name);
            $products = Product::where('product_name', 'like', '%'.$productName.'%')->get()->unique('user_id');
        
            foreach($products as $product){
                $userId = (isset($productInquiry->product->user_id) ? $productInquiry->product->user_id : 0);
                
                $isDeleted = ProductInquirySellers::where('product_inquiry_id', $productInquiry->inquiry_id)->delete();
                
                $isBuyLead = 1;
            
                if($userId != $product->user_id){
                    if(isset($product->user->package_tag)){
                        $totalLead = (int) $product->user->package_tag->service_provider->total_lead;  
                        
                        $sellerLeadCount = (int) ProductInquirySellers::where('user_id', $product->user_id)->count();
                        
                        $isBuyLead = ($sellerLeadCount > $totalLead ? 1 : 0);
                    }
                }
                
                $inquirySeller = new ProductInquirySellers;
                $inquirySeller->product_inquiry_id =  $productInquiry->inquiry_id;
                $inquirySeller->user_id =  $product->user_id;
                $inquirySeller->is_buy_lead = $isBuyLead;
                $inquirySeller->save();
            }   
        }
    }
    public function freights()
	{
		return view('freights');
	}
	
	public function savefreights(Request $request){
	    $type = $request->freights_type;
	    $freights = $request->freights[$type];
	    $freights['freights_type'] = $type;
	    $freights['created_at'] = Carbon::now();
	    
	    if(Auth::check()){
	        $freights['user_name'] = Auth::user()->name;
	        $freights['email'] = Auth::user()->email;
	        $freights['mobile'] = (!empty(Auth::user()->mobile) ? Auth::user()->mobile : (!empty(Auth::user()->user_phone) ? Auth::user()->user_phone : NULL));
	    }else{
	        $freights['user_name'] = $request->user_name;
	        $freights['email'] = $request->user_email;
	        $freights['mobile'] = $request->contact_no;
	    }
	    
	    if(strlen($freights['shipment_day']) > 0 && strlen($freights['shipment_month']) > 0 && strlen($freights['shipment_year']) > 0){
	       $freights['shipment_date'] = Carbon::parse($freights['shipment_day'].'-'.$freights['shipment_month'].'-'.$freights['shipment_year'])->format('Y-m-d H:i:s'); 
	    }
	    
	    if($type == 'air' && strlen($freights['offer_validity_day']) > 0 && strlen($freights['offer_validity_month']) > 0 && strlen($freights['offer_validity_year']) > 0){
	       $freights['offer_validity_date'] = Carbon::parse($freights['offer_validity_day'].'-'.$freights['offer_validity_month'].'-'.$freights['offer_validity_year'])->format('Y-m-d H:i:s'); 
	    }
	    
	    unset($freights['shipment_day']); unset($freights['shipment_month']); unset($freights['shipment_year']);
	    if($type == 'air'){ unset($freights['offer_validity_day']); unset($freights['offer_validity_month']); unset($freights['offer_validity_year']); }
	    $freightId = Freights::insertGetId($freights);
	    
	    return redirect()->back()->with('success', 'Success! Freights details saved.');
	}

	public function cookie_translate($id)
	{

		Cookie::queue(Cookie::make('translate', $id, 3000));
		return Redirect::route('index')->withCookie('translate');
	}

	public function post_buy_requirement(Request $request) 
	{
		$data = array(
			'product_name' => $request->get("product_name"),
			'requirement' => $request->get("requirement"),
			'email' => $request->get("email"),
			'mobile_no' => $request->get("mobile_no")
		);

		$buy_requirement = Lead::create($data);
		return response()->json(array(
			'code' => 200,
			'status' => 'success',
			'message' => 'Your request has registered.',
			'data' => $buy_requirement
		));
	}

	public function request_callback(Request $request) 
	{
		$data = array(
			'name' => $request->get("name"),
			'email' => $request->get("email"),
			'mobile_no' => $request->get("mobile_no")
		);

		$callback = CallbackRequest::create($data);
		return response()->json(array(
			'code' => 200,
			'status' => 'success',
			'message' => 'Your request has been registered. We will contact you shortly.',
			'data' => $callback
		));
	}
	
	public function request_feedback(Request $request) 
	{
		$data = array(
			'feed_first_name' => $request->get("feed-first-name"),
			'feed_last_name' => $request->get("feed-last-name"),
			'feed_email' => $request->get("feed-email"),
			'feed_mobile' => $request->get("feed-mobile"),
			'feed_purpose' => $request->get("feed-purpose"),
			'feed_detail' => $request->get("feed-detail"),
			'created_at' => Carbon::now()
		);

		$feedback = RequestFeedback::insertGetId($data);
		return redirect()->back()->with('success', 'Success! Request feedback saved.');
	}

	public function newProduct()
	{
		return view('new-product');
	}

	public function searchLeads()
	{
	    $keyword = \Request::query('search');
	    
	    $query = ProductInquiry::query();
        
		if(strlen($keyword) > 0){
		    $query2 = Product::query();
		    
		    $query2 = $query2->where(function($q) use ($keyword){
                            $q->where('product_name', 'like', '%'.$keyword.'%')->where('product_drop_status', '=', 'no');
                        });
                        
            $cityIds = City::where('city_name', 'like', '%'.$keyword.'%')->get()->pluck('id')->toArray();
                        
            $userIds = User::whereIn('city_id', $cityIds)->whereNotNull('city_id')->where('user_type', 'vendor')->get()->pluck('id')->toArray();
                        
            if(!empty($userIds)){
	            $query2 = $query2->orWhere(function($q) use ($userIds){
                        $q->whereIn('user_id', $userIds)->where('product_drop_status', '=', 'no');
                    });
	        }
		    
		    $productIds = $query2->get()->pluck('product_id')->toArray();
		    
		    $query = $query->where(function($query) use ($productIds){
                    $query = $query->whereIn('product_id', $productIds)->where('is_verify', 1);
                })->orWhere(function($query)  use ($keyword){
                    $query = $query->where('product_name', 'like', '%'.$keyword.'%')->where('is_verify', 1);
                });
		}else{
		    $query = $query->where('is_verify', 1);
		}
		
		$productInquiry = $query->with('product')->orderBy('created_at', 'desc')->paginate(20);
		
		$sid = 1;
		$siteSettings = Settings::editGeneral($sid);
		
		return view('search-leads', compact('productInquiry', 'siteSettings'));
	}

	public function logistics()
	{
		return view('logistics.index');
	}
	
	public function saveLogistics(Request $request)
	{
	    $logistics = new Logistics;
	    $logistics->user_name = $request->user_name;
	    $logistics->email = $request->email;
	    $logistics->mobile = $request->mobile;
	    $logistics->load_type = $request->load_type;
	    $logistics->pickup_date = (!empty($request->pickup_date) ? Carbon::parse($request->pickup_date)->format('Y-m-d H:i:s') : NULL);
	    $logistics->shipment_price = $request->shipment_price;
	    $logistics->pickup_pincode = $request->pickup_pincode;
	    $logistics->delivery_code = $request->delivery_code;
	    $logistics->pickup_addrress = $request->pickup_address;
	    $logistics->delivery_address = $request->delivery_address;
	    $logistics->weight = $request->weight;
	    $logistics->weight_type = $request->weight_type;
	    $logistics->types_of_material = $request->types_of_material;
	    $logistics->product_url = $request->product_url;
	    
	    if(Input::hasFile('shipment_image')){
            $file = $request->file('shipment_image');
			$fileName = str_random(30).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
			$uploads = $file->move(public_path() . '/storage/logistics', $fileName);
	
			$logistics->shipment_image = $fileName;
        }
        
	    $logistics->save();
	    
	    return redirect()->back()->with('success', 'Success! Logistics detail saved.');
	}

    public function export_data()
	{
		return view('logistics.export');
	}

    public function worldtrade_lending()
	{
		return view('lending.business-loan');
	}
	
	public function worldtrade_insurance()
	{
		return view('lending.business-insurance');
	}
	
	public function worldtrade_iso()
	{
		return view('lending.iso-certification');
	}
	
	public function worldtrade_efiling()
	{
		return view('lending.e-filing');
	}
		public function worldtrade_jobs()
	{
		return view('lending.jobs');
	}
		public function worldtrade_distributor()
	{
		return view('lending.distributor');
	}
	public function saveBusinessInsuarance(Request $request)
	{
	    $request->validate([
	        'first_name' => 'required',
	        'last_name' => 'required',
	        'email' => 'required',
	        'mobile' => 'required',
	    ]);
	    
	    $businessInsurance = new BusinessInsurance();
	    $businessInsurance->first_name = $request->first_name;
	    $businessInsurance->last_name = $request->last_name;
	    $businessInsurance->email = $request->email;
	    $businessInsurance->mobile = $request->mobile;
	    $businessInsurance->business_name = $request->business_name;
	    $businessInsurance->nature_business = $request->nature_business;
	    $businessInsurance->city = $request->city;
	    $businessInsurance->insurance_type = $request->insurance_type;
	    $businessInsurance->gst_no = $request->gst;
	    $businessInsurance->save();
	    
	    return redirect()->back()->with('success', 'Success! Business insuarance details saved.');
	}
	
    public function saveBusinessLoan(Request $request)
    {
        $request->validate([
	        'first_name' => 'required',
	        'last_name' => 'required',
	        'email' => 'required',
	        'mobile' => 'required',
	    ]);
	    
	    $businessLoan = new BusinessLoans();
	    $businessLoan->first_name = $request->first_name;
	    $businessLoan->last_name = $request->last_name;
	    $businessLoan->email = $request->email;
	    $businessLoan->mobile = $request->mobile;
	    $businessLoan->business_name = $request->business_name;
	    $businessLoan->business_type = $request->business_type;
	    $businessLoan->city = $request->city;
	    $businessLoan->loan_amount = $request->loan_amount;
	    $businessLoan->gst_no = $request->gst;
	    $businessLoan->pan_no = $request->pan_no;
	    $businessLoan->loan_tanure = $request->loan_tenure;
	    $businessLoan->save();
	    
	    return redirect()->back()->with('success', 'Success! Business loan details saved.');
    }
    
    public function saveIsoCertification(Request $request)
    {
        $request->validate([
	        'first_name' => 'required',
	        'last_name' => 'required',
	        'email' => 'required',
	        'mobile' => 'required',
	    ]);
	    
	    $isoCertification = new IsoCertifications();
	    $isoCertification->first_name = $request->first_name;
	    $isoCertification->last_name = $request->last_name;
	    $isoCertification->email = $request->email;
	    $isoCertification->mobile = $request->mobile;
	    $isoCertification->business_name = $request->business_name;
	    $isoCertification->gst_no = $request->gst;
	    $isoCertification->pan_no = $request->pan_no;
	    $isoCertification->certification_required = $request->certification_required;
	    $isoCertification->save();
	    
	    return redirect()->back()->with('success', 'Success! ISO certification details saved.');
    }
	
	public function loan_contact()
	{
		return view('lending.contact-loan');
	}
	
	 public function insurance_contact()
	{
		return view('lending.contact-insurance');
	}
	
	 public function iso_contact()
	{
		return view('lending.contact-iso');
	}

    public function vrTrust()
	{
		return view('vrtrust');
	}

    public function advertise()
	{
	    $serviceProviders = ServiceProviders::get();
	    
		return view('advertise-us', compact('serviceProviders'));
	}
	public function ServicesProvide()
	{
	    $services = Services::get();
	    
		return view('services-provide', compact('services'));
	}
		public function SellerProfile()
	{
		return view('seller-profile');
	}
	public function categories()
	{
		return view('all-categories');
	}

	public function sub_category($id)
	{
	    $category = Category::where('category_slug', Helpers::splitString($id))->first();   
	    $category['subCategories'] = SubCategory::where('cat_id', $category->cat_id)->where('drop_status','=','no')->get();
	    
		return view('sub-categories', compact('category'));
	}

    public function sub_products($id)
	{
	    $subCategory = SubCategory::where('subcategory_slug', $id)->first();
	   
	    $categories = $this->productCategory();
	    
	    $products = array();
	    
	    if(isset($categories[$subCategory->cat_id])){
	        $subCategories = $categories[$subCategory->cat_id]['subCategories'];
    	    foreach($subCategories as $subCategory1){
    	        if($subCategory1['subcat_id'] == $subCategory->subcat_id){
    	            $products = $subCategory1['products'];
    	        }
    	    }   
	    }
	    
	    $subCategory->products = $products;
	    
		return view('sub-products', compact('subCategory'));
	}

	public function locations()
	{
		$states = Settings::getstateData();
		return view('locations', array(
			'states' => $states
		));
	}

	public function regions($id)
	{
		$state_id = implode(' ', explode('-', $id));
		
		
		// Find cities with state id
		$cities = DB::table('city')
			->join('country', 'city.country_id', '=', 'country.country_id')
			->join('state', 'city.state_id', '=', 'state.id')
			->orderBy('city_name', 'asc')
			->where('state.state_name', '=', $state_id)
			->select(['city.*', 'country.*', 'state.state_name', 'state.id as state_id'])
			->get();
		return view('regions', array(
			'state' => DB::table('state')->where('state_name', '=', $state_id)->first(),
			'cities' => $cities
		));
	}

	public function city($id)
	{
	    $city_id = implode(' ', explode('-', $id));
		// Find category for city
		$city = DB::table('city')
			->join('country', 'city.country_id', '=', 'country.country_id')
			->join('state', 'city.state_id', '=', 'state.id')
			->orderBy('city_name', 'asc')
			->where('city.city_name', '=', $city_id)
			->select(['city.*', 'country.*', 'state.state_name', 'state.id as state_id'])
			->first();
			
		$categoryAll = $this->productCategory(0, $city->id);
	
		return view('region', array(
			'city' => $city,
			'categoryAll' => $categoryAll
		));
	}

	public function view_index()
	{
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		$slideshow['view'] = Slideshow::viewSlideshow();
		$phy_limit = $setting['setting']->site_home_physical;
		$phy_display =  $setting['setting']->site_physical_order;
		$ext_limit = $setting['setting']->site_home_external;
		$ext_display =  $setting['setting']->site_external_order;
		$dig_limit = $setting['setting']->site_home_digital;
		$dig_display =  $setting['setting']->site_digital_order;
		$deal_limit = $setting['setting']->site_home_deal;
		$deal_display =  $setting['setting']->site_deal_order;
		$today_date = date('Y-m-d h:i a');
		$physical['product'] = Product::with('ProductImages')->where('product_type', '=', 'physical')->where('product_status', '=', 1)->where('product_drop_status', '=', 'no')->take($phy_limit)->orderBy('product_id', $phy_display)->get();
		$external['product'] = Product::with('ProductImages')->where('product_type', '=', 'external')->where('product_status', '=', 1)->where('product_drop_status', '=', 'no')->take($ext_limit)->orderBy('product_id', $ext_display)->get();
		$digital['product'] = Product::with('ProductImages')->where('product_type', '=', 'digital')->where('product_status', '=', 1)->where('product_drop_status', '=', 'no')->take($dig_limit)->orderBy('product_id', $dig_display)->get();
		$deal['product'] = Product::with('ProductImages')->where('flash_deal_start_date', '<=', $today_date)->where('flash_deal_end_date', '>=', $today_date)->where('flash_deals', '=', 1)->where('product_status', '=', 1)->where('product_drop_status', '=', 'no')->take($deal_limit)->orderBy('product_id', $deal_display)->get();
		$brand['view'] = Product::homebrandData();
		$data = array('setting' => $setting, 'slideshow' => $slideshow, 'physical' => $physical, 'external' => $external, 'digital' => $digital, 'deal' => $deal, 'brand' => $brand);
		$data['likeSubCategories'] = SubCategory::where('drop_status','=','no')->inRandomOrder()->take(6)->get();
		
		$data['states'] = DB::table('state')->where('show_in_home', 1)->limit(6)->orderBy('state_name', 'asc')->get();
		$export_data = export_data::all();
		
		$post = DB::table('export_data')->get('*')->toArray();
    	foreach($post as $row)
    	{
    		$chart[] = array
    		(
    			'label'=>$row->container_no,
    			'y'=>$row->vgm_weight,

    		);
    	}
		
		return view('index',compact("export_data","chart"))->with($data );
	}

	public function view_best_sellers()
	{
		$sid = 1;
		
		$keyword = \Request::query('search');
		$vendors = array();
		
		$vendorsList = User::where(function($q) use ($keyword){
                            $q->where('name', 'like', '%'.$keyword.'%')->where('user_type', 'vendor')->where('drop_status', '=', 'no');
                        })->orWhere(function($q) use ($keyword){
                            $q->where('email', 'like', '%'.$keyword.'%')->where('user_type', 'vendor')->where('drop_status', '=', 'no');
                        })->orWhere(function($q) use ($keyword){
                            $q->where('company_name', 'like', '%'.$keyword.'%')->where('user_type', 'vendor')->where('drop_status', '=', 'no');
                        })->orWhere(function($q) use ($keyword){
                            $q->where('mobile', 'like', '%'.$keyword.'%')->where('user_type', 'vendor')->where('drop_status', '=', 'no');
                        })->orWhere(function($q) use ($keyword){
                            $q->where('user_address', 'like', '%'.$keyword.'%')->where('user_type', 'vendor')->where('drop_status', '=', 'no');
                        })->with('products')->get();
                        
        foreach($vendorsList as $key => $vendor){
            $servicePrice = (isset($vendor->package_tag) ? $vendor->package_tag->service_provider->service_price : 0);
            $vendors[$key]['servicePrice'] = str_replace( ',', '', $servicePrice);
            $vendors[$key]['vendor'] = $vendor;
        }
        
        array_multisort(array_column($vendors, 'servicePrice'), SORT_DESC, $vendors);
    
        // Get current page form url e.x. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
 
        // Create a new Laravel collection from the array data
        $vendorCollection = collect($vendors);
 
        // Define how many products we want to be visible in each page
        $perPage = 20;
 
        // Slice the collection to get the products to display in current page
        $currentPageVendors = $vendorCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
 
        // Create our paginator and pass it to the view
        $paginatedVendors= new LengthAwarePaginator($currentPageVendors , count($vendorCollection), $perPage);
 
        // set url path for generted links
        $paginatedVendors->setPath(\Request::url());
	
		return view('best-sellers', ['vendors' => $paginatedVendors]);
	}

	public function view_track_order()
	{
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		$check_track_order = 0;
		$without = 0;
		$data = array('setting' => $setting, 'check_track_order' => $check_track_order, 'without' => $without);
		return view('track-order')->with($data);
	}

	public function get_track_order(Request $request)
	{
		$order_id = $request->input('order_number');
		$check_track_order = Product::orderTrackCount($order_id);
		$track_order = Product::orderTrack($order_id);
		$without = 1;
		$data = array('check_track_order' => $check_track_order, 'track_order' => $track_order, 'without' => $without, 'order_id' => $order_id);
		return view('track-order')->with($data);
	}

	public function view_new_releases()
	{
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		$today_date = date('Y-m-d h:i a');
		$shop['product'] = Product::with('ProductImages')->where('product_status', '=', 1)->where('product_drop_status', '=', 'no')->orderBy('product_id', 'desc')->get();
		$data = array('setting' => $setting, 'shop' => $shop);
		return view('new-releases')->with($data);
	}

	public function view_start_sellings()
	{
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		$data = array('setting' => $setting);
		return view('start-sellings')->with($data);
	}


	public function view_top_deals()
	{
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		$today_date = date('Y-m-d h:i a');
		$deal['product'] = Product::with('ProductImages')->where('flash_deal_start_date', '<=', $today_date)->where('flash_deal_end_date', '>=', $today_date)->where('flash_deals', '=', 1)->where('product_status', '=', 1)->where('product_drop_status', '=', 'no')->orderBy('product_id', 'desc')->get();
		$data = array('setting' => $setting, 'deal' => $deal);
		return view('top-deals')->with($data);
	}

	public function view_user($slug)
	{
	    $sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
	    $subCatId = \Request::query('subcat_id');
	    
	    $sellers = User::where('user_type', 'vendor')->where('drop_status', '=', 'no')->get();
	    
	    foreach($sellers as $seller){
	        $userName = (!empty($seller->company_name) ? $seller->company_name : $seller->name);
	        
            if (preg_match('/^[\w\s?]+$/si', $userName)) {
                $userNameSlug = str_slug($userName, '-');
            } else {
                $userNameSlug = str_slug($seller->name, '-');
            }
        
	        if($slug == $userNameSlug){
	            $user_details = $seller;
	            break;
	        }
	    }
	    
	    Helpers::addVisitor($user_details->id);
	    
	    $visitCount = Visitors::where('user_id', $user_details->id)->sum('visit_count');
	   
	    $userId = $user_details->id;
	    
	    $categories = $this->productCategory($userId);
	    
	    $getreview  = Product::getreviewData($userId);
	    
	    $query = Product::query();
	    
	    if(strlen($subCatId) > 0){
	        $subCatId = Helpers::splitString($subCatId);
		    $subCategory = SubCategory::where('subcategory_slug', $subCatId)->first();
		    $query = $query->where('product_category', 'like', '%subcat-'.$subCategory->subcat_id);
		}
	   
		$shop['product'] = $query->with('ProductImages')->where('product_status', '=', 1)->where('product_drop_status', '=', 'no')->where('user_id', '=', $userId)->orderBy('product_id', 'desc')->get();
		
		if ($getreview != 0) {
			$review['view'] = Product::getreviewStore($userId);
			$top = 0;
			$bottom = 0;
			foreach ($review['view'] as $review) {
				if ($review->rating == 1) {
					$value1 = $review->rating * 1;
				} else {
					$value1 = 0;
				}
				if ($review->rating == 2) {
					$value2 = $review->rating * 2;
				} else {
					$value2 = 0;
				}
				if ($review->rating == 3) {
					$value3 = $review->rating * 3;
				} else {
					$value3 = 0;
				}
				if ($review->rating == 4) {
					$value4 = $review->rating * 4;
				} else {
					$value4 = 0;
				}
				if ($review->rating == 5) {
					$value5 = $review->rating * 5;
				} else {
					$value5 = 0;
				}

				$top += $value1 + $value2 + $value3 + $value4 + $value5;
				$bottom += $review->rating;
			}
			if (!empty(round($top / $bottom))) {
				$count_rating = round($top / $bottom);
			} else {
				$count_rating = 0;
			}
		} else {
			$count_rating = 0;
		}
		
		$productDocs = ProductDocs::where('user_id', $user_details->id)->where('file_type', 'PDF')->first();

		return view('vendor-themes.' . $user_details->vendor_theme . '.index', compact('setting', 'user_details', 'count_rating', 'shop', 'categories', 'productDocs', 'visitCount'));
	}
	
	public function addContactInquiry(Request $request)
	{
	    $sellerInquiry = new SellerInquiry;
	    $sellerInquiry->user_id = $request->user_id;
	    $sellerInquiry->user_name = $request->user_name;
	    $sellerInquiry->email = $request->email;
	    $sellerInquiry->mobile = $request->mobile;
	    $sellerInquiry->message = $request->message;
	    $sellerInquiry->save();
	    
	    $vendor = User::find($request->user_id);
	    
	    $subject = 'Profile Inquiry Alert - Business World Trade';
	    
	    $data['userName'] = $vendor->name;
	    $data['inquiryUserName'] = $request->user_name;
	    $data['inquiryEmail'] = $request->email;
	    $data['inquiryMobile'] = $request->mobile;
	    $data['inquiryMessage'] = $request->message;
	    
	    $isSend = Helpers::sendMail($vendor->email, 'mail.vendor-profile-inquiry', $subject, $data);
	    
	    return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Success! Inquiry send to seller.'
            ]);
	}
	
	public function productCategory($userId = 0, $cityId = 0){
	    
	    $query = Product::query();
	    
	    if($userId != 0){
	        $query = $query->where('user_id', '=', $userId);
	    }
	    
	    if($cityId != 0){
	        $userIds = $userIdList = User::where('city_id', $cityId)->where('user_type', 'vendor')->get()->pluck('id')->toArray();
	        $query->whereIn('user_id', $userIds);
	    }
	    
	    $productList = $query->with('ProductImages')->where('product_status', '=', 1)->where('product_drop_status', '=', 'no')->orderBy('product_id', 'desc')->get();
		
		$subCatIds = array();
		$products = array();
		
		foreach($productList as $product){
		    $categoryArr = explode('subcat-', $product->product_category);
		    $subCatId = $categoryArr[count($categoryArr) - 1];
		    
		    $productsArr = array();
	        
	        if(array_key_exists($subCatId, $products)){
	            $productsArr= $products[$subCatId];            
	        }
		    
		    array_push($subCatIds, $subCatId);
		    array_push($productsArr, $product->toArray());
		    $products[$subCatId] = $productsArr;
		}
		
		$subCategories = SubCategory::whereIn('subcat_id', $subCatIds)->with('Category')->get();
		
		
		$categories = array();

		foreach($subCategories as $key => $subCategory){
		    if(isset($subCategory->Category)){
		        
		        $categoryId = $subCategory->Category->cat_id;    
		            
    	        $subCats = array();
    	        
    	        if(array_key_exists($categoryId, $categories)){
    	            $subCats= $categories[$categoryId]['subCategories'];            
    	        }
    	        
    	        $subCategory = $subCategory->toArray();
    	        $subCategory['products'] = $products[$subCategory['subcat_id']];
    	        array_push($subCats, $subCategory);
    	        
    	        $subCategory['category']['subCategories'] = $subCats;
    	        
    	        $categories[$categoryId] = $subCategory['category'];
    	    }   
		}
	    
	    return $categories;
	}

	public function send_message(Request $request)
	{
		$message_text = $request->input('message_text');
		$from_email = $request->input('from_email');
		$phone = $request->input('phone');
		$from_name = $request->input('from_name');
		$to_email = $request->input('to_email');
		$to_name = $request->input('to_name');

		$record = array('message_text' => $message_text, 'from_name' => $from_name, 'from_email' => $from_email, 'phone' => $phone);
		Mail::send('user_mail', $record, function ($message) use ($from_name, $from_email, $to_email, $to_name) {
			$message->to($to_email, $to_name)
				->subject('New message received');
			$message->from($from_email, $from_name);
		});

		return redirect()->back()->with('success', 'Your message has been sent successfully');
	}

	public function view_product($slug)
	{
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		$shop = Product::with('ProductImages')->leftJoin('brands', 'brands.brand_id', 'product.product_brand')->where('product_status', '=', 1)->where('product_slug', '=', $slug)->where('product_drop_status', '=', 'no')->orderBy('product_id', 'desc')->first();
		$typer = $shop->product_attribute_type;
		$product_type = $shop->product_type;

		$attributer['display'] = Attribute::with('AttributeValue')->where('attribute_status', '=', '1')->where('attribute_drop_status', '=', 'no')->whereIn('attribute_id', explode(',', $typer))->orderBy('attribute_order', 'asc')->get();
		$seller_id = $shop->user_id;
		$seller = Members::logindataUser($seller_id);
		$product_tag = explode(",", $shop->product_tags);
		$query = Product::with('ProductImages');
		
		if(!empty($shop->product_category)){
		    $subCategoryId = explode('subcat-', $shop->product_category)[1];
		    $query = $query->where('product_category', 'like', '%subcat-'.$subCategoryId);
		}
		
		$another['product'] = $query->where('product_status', '=', 1)->where('product_type', '=', $product_type)->where('product_slug', '!=', $slug)->where('product_drop_status', '=', 'no')->take(4)->orderBy(DB::raw('RAND()'))->get();
		
		$getreview  = Product::getreviewCount($shop->product_id);
		if ($getreview != 0) {
			$review['view'] = Product::getreviewView($shop->product_id);
			$top = 0;
			$bottom = 0;
			foreach ($review['view'] as $review) {
				if ($review->rating == 1) {
					$value1 = $review->rating * 1;
				} else {
					$value1 = 0;
				}
				if ($review->rating == 2) {
					$value2 = $review->rating * 2;
				} else {
					$value2 = 0;
				}
				if ($review->rating == 3) {
					$value3 = $review->rating * 3;
				} else {
					$value3 = 0;
				}
				if ($review->rating == 4) {
					$value4 = $review->rating * 4;
				} else {
					$value4 = 0;
				}
				if ($review->rating == 5) {
					$value5 = $review->rating * 5;
				} else {
					$value5 = 0;
				}

				$top += $value1 + $value2 + $value3 + $value4 + $value5;
				$bottom += $review->rating;
			}
			if (!empty(round($top / $bottom))) {
				$count_rating = round($top / $bottom);
			} else {
				$count_rating = 0;
			}
		} else {
			$count_rating = 0;
		}
		$getreviewdata['view']  = Product::getreviewItems($shop->product_id);

		$data = array('setting' => $setting, 'shop' => $shop, 'attributer' => $attributer, 'typer' => $typer, 'seller' => $seller, 'product_tag' => $product_tag, 'another' => $another, 'getreview' => $getreview, 'count_rating' => $count_rating, 'getreviewdata' => $getreviewdata);
		return view('product')->with($data);
	}


	public function view_category_shop($type, $slug)
	{
		if ($type == 'category') {
			$cat_id = Category::singleCat($slug);
			$category_id = 'cat-' . $cat_id->cat_id;
		} else {
			$cat_id = Category::singleSubcat($slug);
			$category_id = 'subcat-' . $cat_id->subcat_id;
		}
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		$shop['product'] = Product::with('ProductImages')->where('product_status', '=', 1)->where('product_drop_status', '=', 'no')->whereRaw('FIND_IN_SET(?,product_category)', [$category_id])->orderBy('product_id', 'desc')->get();
		$attributer['display'] = Attribute::with('AttributeValue')->where('attribute_status', '=', '1')->where('attribute_drop_status', '=', 'no')->where('attribute_search', '=', 1)->orderBy('attribute_order', 'asc')->get();
		$data = array('setting' => $setting, 'shop' => $shop, 'attributer' => $attributer);
		return view('shop')->with($data);
	}


	public function view_tag_shop($tag)
	{
		$tags = str_replace('-', ' ', $tag);
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		$shop['product'] = Product::with('ProductImages')->where('product_status', '=', 1)->where('product_drop_status', '=', 'no')->where('product_tags', 'LIKE', "%$tags%")->orderBy('product_id', 'desc')->get();
		$attributer['display'] = Attribute::with('AttributeValue')->where('attribute_status', '=', '1')->where('attribute_drop_status', '=', 'no')->where('attribute_search', '=', 1)->orderBy('attribute_order', 'asc')->get();
		$data = array('setting' => $setting, 'shop' => $shop, 'attributer' => $attributer);
		return view('shop')->with($data);
	}


	public function view_shop()
	{
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		
        $catId = \Request::query('cat_id');        
        $subCatId = \Request::query('subcat_id');
        $subCatIds = array_filter(explode(',', \Request::query('subcategory_id')));
        $businessTypes = array_filter(explode(',', \Request::query('business_type')));
        $productPrice = \Request::query('product_price');
        $city = \Request::query('city');
        $keyword = \Request::query('search');
        
        $query = SubCategory::query();
		$query1 = Product::query();
		$shop['catId'] = '';
		$shop['isUser'] = 1;
		$shop['product'] = array();
		$productIds = array();
		$isFilter = 0;
		
		$pageSEO = array();
		
		if(!empty($subCatIds)){
		    $tempCatIds = array();
		    
		    foreach($subCatIds as $subCatId1){
		        $subCatId1 = SubCategory::where('subcategory_slug', Helpers::splitString($subCatId1))->pluck('subcat_id')->first();     
		        array_push($tempCatIds, $subCatId1);
		    }
		    
		    $subCatIds = $tempCatIds;
		}
		
		if(strlen($catId) > 0){
		    $catId = Helpers::splitString($catId);
		    
		    $category5 = Category::where('category_slug', $catId)->first();
		    $catId = $category5->cat_id;
		    
		    $query = $query->where('cat_id', $category5->cat_id);
		    $shop['catId'] = Helpers::joinString($category5->category_slug);
		    
		    $pageSEO['title'] = $category5->category_name.''.(!empty($category5->seo_title) ? ' -'.$category5->seo_title : '');
		    $pageSEO['keywords'] = $category5->seo_keywords;
		    $pageSEO['description'] = $category5->seo_meta_description;
		}
		
		if(strlen($subCatId) > 0){
		    $subCatId = Helpers::splitString($subCatId);
		    $subCategory = SubCategory::where('subcategory_slug', $subCatId)->first();
		    
		    $subCatId = $subCategory->subcat_id;
		    $query = $query->where('cat_id', $subCategory->cat_id);
		    array_push($subCatIds, $subCatId);
		    
		    $shop['catId'] = Helpers::joinString($subCategory->Category->category_slug);
		    
		    $pageSEO['title'] = $subCategory->subcategory_name.''.(!empty($subCategory->seo_title) ? ' -'.$subCategory->seo_title : '');
		    $pageSEO['keywords'] = $subCategory->seo_keywords;
		    $pageSEO['description'] = $subCategory->seo_meta_description;
		}
		
		if(!empty($subCatIds)){
		    $isFilter = 1;
		     
		    $pIds = $this->getProductsByCategoryIds($subCatIds);
		    if(!empty($pIds)){
		        $productIds['catProductIds'] = $pIds;   
		    }
		}
		
		if(!empty($businessTypes)){
		    $isFilter = 1;
		}
		
		if(strlen($productPrice) > 0 && $productPrice > 0){
		    $isFilter = 1;
		    $pIds = Product::where('product_price', '<=', $productPrice)->where('product_drop_status', '=', 'no')->get()->pluck('product_id')->toArray();
		    
		    if(!empty($pIds)){
		        $productIds['priceProductIds'] = $pIds;   
		    }
		}
		
		if(strlen($keyword) > 0 || !empty($businessTypes)){
		    $isFilter = 1;
		    $isCity = 0;
		    $isBusinessType = 0;
		    
		    $query3 = Product::query();
		    $userIds = array();
		    
		    if(strlen($keyword) > 0){
		        $query3 = $query3->where(function($q) use ($keyword){
                            $q->where('product_name', 'like', '%'.$keyword.'%')->where('product_drop_status', '=', 'no');
                        });
                        
                if(strlen($city) > 0 && $city != 'All'){
                    $cityArr = explode('-', $city);
                    $city = $cityArr[1]; 
                    
                    $query11 = User::query();
                    
                    if($cityArr[0] == 'State'){
                        $query11 = $query11->whereHas('state',function($q) use ($city){
                        	$q->where('state_name', 'like', '%'.$city.'%');
                        });
                    }else{
                        $query11 = $query11->whereHas('city',function($q) use ($city){
                        	$q->where('city_name', 'like', '%'.$city.'%');
                        });
                    }
                    
                    $userIds = $query11->where('user_type', 'vendor')->where('drop_status', '=', 'no')->get()->pluck('id')->toArray();
                    
                    $isCity = 1;
                }else{
                    $userIds = User::where(function($q) use ($keyword){
                            $q->where('name', 'like', '%'.$keyword.'%')->where('user_type', 'vendor')->where('drop_status', '=', 'no');
                        })->orWhere(function($q) use ($keyword){
                            $q->where('company_name', 'like', '%'.$keyword.'%')->where('user_type', 'vendor')->where('drop_status', '=', 'no');
                        })->get()->pluck('id')->toArray();
                        
                     if(!empty($userIds)){
                        $shop['isUser'] = 1;
                    }
                }   
		    }
		    
		    if(!empty($businessTypes)){
		        $userIds = User::whereNotNull('primary_type')->whereIn('primary_type', $businessTypes)->where('user_type', 'vendor')->where('drop_status', '=', 'no')->get()->pluck('id')->toArray();
		        
		        $isBusinessType = 1;
		    }
		    
		    if($isCity == 1 || $isBusinessType == 1){
		        $query3 = $query3->where(function($q) use ($userIds){
                            $q->whereIn('user_id', $userIds)->where('product_drop_status', '=', 'no');
                        });
		    }else{
		        if(!empty($userIds)){
		            $query3 = $query3->orWhere(function($q) use ($userIds){
                            $q->whereIn('user_id', $userIds)->where('product_drop_status', '=', 'no');
                        });
		        }
		    }
		    
		    $checkProducts = Product::where('product_name', 'like', '%'.$keyword.'%')->where('product_drop_status', '=', 'no')->get();
		    
		    if(count($checkProducts) > 0){
                $shop['isUser'] = 1;
		    }
		    
		    $pIds = $query3->get()->pluck('product_id')->toArray();
		    if(!empty($pIds)){
		        $productIds['keywordProductIds'] = $pIds;   
		    }
		}
		
		if(strlen(\Request::query('product')) > 0){
		    $isFilter = 1;
		    $product1 = \Request::query('product');
		    
		    $pIds = Product::where('product_slug', $product1)->where('product_drop_status', '=', 'no')->get()->pluck('product_id')->toArray();
		   
		    if(!empty($pIds)){
		        $productIds['slugProductIds'] = $pIds;   
		    }
		}
		
		if($isFilter == 1){
		    $finalProductIds = array_filter($productIds);
        
            $productIds = array();
            if(!empty($finalProductIds)){
                $productIds = $this->getArrayIntersectTmp(array_values($finalProductIds));
            }
        
            $query1 = $query1->whereIn('product_id', $productIds);
		}else{
		    if(strlen($catId) > 0){
    		     $subCatIds = SubCategory::where('cat_id', $catId)->get()->pluck('subcat_id')->toArray();
    		    
    		     $pIds = $this->getProductsByCategoryIds($subCatIds);
    		     
    		     $query1 = $query1->whereIn('product_id', $pIds);
    		}
		}
		
		$shopProducts = array();
		$productUserIds = array();
		
		$shopProductsList = $query1->where('product_status', '=', 1)->where('product_drop_status', '=', 'no')
		                        ->whereHas('user', function ($q) {
                                    $q->where('drop_status', '=', 'no');
                                })->with('ProductImages')->with('variants')->inRandomOrder()->get();
                                
                                
        foreach($shopProductsList as $key => $shopProduct){
            $servicePrice = (isset($shopProduct->user->package_tag) ? $shopProduct->user->package_tag->service_provider->service_price : 0);
            
            
            $shopProducts[$key]['servicePrice'] = str_replace( ',', '', $servicePrice);
            $shopProducts[$key]['product'] = $shopProduct;
        }
        
        array_multisort(array_column($shopProducts, 'servicePrice'), SORT_DESC, $shopProducts);
        
        
        if(isset($shop['isUser']) && $shop['isUser'] == 1){
            foreach($shopProducts as $key => $shopProduct){
                if(!in_array($shopProduct['product']->user_id, $productUserIds)){
                    array_push($productUserIds, $shopProduct['product']->user_id);
                }else{
                   unset($shopProducts[$key]);
                }
            }
        }
        
        $shopProducts = array_values($shopProducts);
    
        // Get current page form url e.x. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
 
        // Create a new Laravel collection from the array data
        $productCollection = collect($shopProducts);
 
        // Define how many products we want to be visible in each page
        $perPage = 20;
 
        // Slice the collection to get the products to display in current page
        $currentPageProducts = $productCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
 
        // Create our paginator and pass it to the view
        $paginatedProducts = new LengthAwarePaginator($currentPageProducts , count($productCollection), $perPage);
 
        // set url path for generted links
        $paginatedProducts->setPath(\Request::url());
                                
		$shop['subcategory'] = $query->where('drop_status','=','no')->get();
		
		$attributer['display'] = Attribute::with('AttributeValue')->where('attribute_status', '=', '1')->where('attribute_drop_status', '=', 'no')->where('attribute_search', '=', 1)->orderBy('attribute_order', 'asc')->get();
		$data = array('setting' => $setting, 'shop' => $shop, 'attributer' => $attributer);
		
		return view('shop', ['shopProducts' => $paginatedProducts, 'pageSEO' => $pageSEO])->with($data);
	}
	
	public function getProductsByCategoryIds($subCatIds)
	{
	     $query2 = Product::query();
		    
		 foreach($subCatIds as $key => $subCatId){
	        if($key == 0){
	            $query2 = $query2->where(function($q) use ($subCatId){
                        $q->where('product_category', 'like', '%subcat-' . $subCatId)->where('product_drop_status', '=', 'no');
                    });
	        }else{
	          $query2 = $query2->orWhere(function($q) use ($subCatId){
                        $q->where('product_category', 'like', '%subcat-' . $subCatId)->where('product_drop_status', '=', 'no');
                    });
	        }
		}
                        
		$pIds = $query2->get()->pluck('product_id')->toArray();
		
		return $pIds;
	}
	
	public function getArrayIntersectTmp($arr)
    {
        return array_intersect($arr[0],  (count($arr) > 1) ? $this->getArrayIntersectTmp(array_slice($arr, 1)) : $arr[0]);
    }

	public function search_shop(Request $request)
	{
		$search_txt = $request->input('search_text');
		if (!empty($request->input('search_text'))) {
			$shop['product'] = Product::with('ProductImages')->where('product_status', '=', 1)->where('product_drop_status', '=', 'no')->where("product_name", "LIKE", "%$search_txt%")->orderBy('product_id', 'desc')->get();
		} else {
			$shop['product'] = Product::with('ProductImages')->where('product_status', '=', 1)->where('product_drop_status', '=', 'no')->orderBy('product_id', 'desc')->get();
		}

		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);

		$attributer['display'] = Attribute::with('AttributeValue')->where('attribute_status', '=', '1')->where('attribute_drop_status', '=', 'no')->where('attribute_search', '=', 1)->orderBy('attribute_order', 'asc')->get();
		$data = array('setting' => $setting, 'shop' => $shop, 'attributer' => $attributer);
		return view('shop')->with($data);
	}

	public function autoComplete(Request $request)
	{
	    $data = array();
	    $keyword = $request->term;
	    $type = $request->type;
	    
	    if(strlen($keyword) > 0){
		    $query = Product::query();
		    
		    $query = $query->where(function($q) use ($keyword){
                            $q->where('product_name', 'like', '%'.$keyword.'%')->where('product_drop_status', '=', 'no');
                        });
                        
            if($type != 'Product'){
                $users = User::where(function($q) use ($keyword){
                            $q->where('name', 'like', '%'.$keyword.'%')->where('user_type', 'vendor')->where('drop_status', '=', 'no');
                        })->orWhere(function($q) use ($keyword){
                            $q->where('company_name', 'like', '%'.$keyword.'%')->where('user_type', 'vendor')->where('drop_status', '=', 'no');
                        })->get();
                        
    	        if(count($users) > 0){
    	            $userIds = $users->pluck('id')->toArray();
    	            
    	            $query = $query->orWhere(function($q) use ($userIds){
                            $q->whereIn('user_id', $userIds)->where('product_drop_status', '=', 'no');
                        });
                        
                    foreach ($users as $user) {
            			$data[] = array('value' => $user->company_name, 'id' => 'SLR-'.$user->id);
            		}
    	        }   
            }
		    
		    $products = $query->get();
		    
		    foreach ($products as $product) {
    			$data[] = array('value' => $product->product_name, 'id' => 'PR-'.$product->product_id);
    		}
    		
    // 		array_multisort(array_column($data, 'value'), SORT_ASC, $data); 
		}
		
// 		$query = $request->get('term', '');

// 		$products = Product::autoSearch($query);

// 		$data = array();
// 		foreach ($products as $product) {
// 			$data[] = array('value' => $product->product_name, 'id' => $product->product_id);
// 		}

		if (!empty($data)){
		    return $data;   
		}
		else{
			return ['value' => 'No Result Found', 'id' => ''];
		}
	}

	public function all_categories()
	{
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		$category['view'] = Category::quickbookData();
		$count_cause = Category::getgroupcauseData();
		$data = array('setting' => $setting, 'category' => $category, 'count_cause' => $count_cause);
		return view('categories')->with($data);
	}


	public function all_gallery()
	{
		$gallery['view'] = Events::viewallGallery();
		$data = array('gallery' => $gallery);
		return view('gallery')->with($data);
	}



	public function donor_paypal_success($ord_token, Request $request)
	{

		$payment_token = $request->input('tx');
		$purchased_token = $ord_token;
		$donor['details'] = Causes::getDonor($purchased_token);
		$user_id = $donor['details']->donor_cause_user_id;
		$checkcount = Causes::checkuserSubscription($user_id);
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		$user_data['view'] = Members::singlebuyerData($user_id);
		if ($checkcount == 0) {
			$commission = ($setting['setting']->site_admin_commission * $donor['details']->donor_amount) / 100;
			$user_amount = $donor['details']->donor_amount - $commission;
			$admin_amount = $commission;
			$user_old_amount = $user_data['view']->earnings + $user_amount;
			$admin_details['view'] = Members::adminData();
			$admin_old_amount = $admin_details['view']->earnings + $admin_amount;
			$user_record = array('earnings' => $user_old_amount);
			Members::updateuserPrice($user_id, $user_record);
			$admin_data = array('earnings' => $admin_old_amount);
			Members::updateuserPrice(1, $admin_data);
		}
		$cause_id = $donor['details']->donor_cause_id;
		$cause['details'] = Causes::singleCausesdetails($cause_id);
		$raised_price = $cause['details']->cause_raised + $donor['details']->donor_amount;
		$pricedata = array('cause_raised' => $raised_price);
		Causes::updatecausePrice($cause_id, $pricedata);

		$checkoutdata = array('donor_payment_token' => $payment_token, 'donor_payment_status' => 'completed');
		Causes::updatedonorData($purchased_token, $checkoutdata);
		$result_data = array('payment_token' => $payment_token);

		$check_email_support = Members::getuserSubscription($user_id);
		if ($check_email_support == 1) {
			$donor_payment_amount = $donor['details']->donor_amount;
			$admin_name = $setting['setting']->sender_name;
			$admin_email = $setting['setting']->sender_email;
			$currency_symbol = $setting['setting']->site_currency_symbol;
			$cause_url = URL::to('/cause/') . $cause['details']->cause_slug;
			$record = array('donor_payment_amount' => $donor_payment_amount, 'currency_symbol' => $currency_symbol, 'cause_url' => $cause_url);
			$to_name = $user_data['view']->name;
			$to_email = $user_data['view']->email;
			Mail::send('donation_mail', $record, function ($message) use ($admin_name, $admin_email, $to_email, $to_name) {
				$message->to($to_email, $to_name)
					->subject('Donation payment received');
				$message->from($admin_email, $admin_name);
			});
		}
		return view('donor-success')->with($result_data);
	}



	public function confirm_donation(Request $request)
	{

		$token = $request->input('token');
		$donor_name = $request->input('donor_name');
		$donor_email = $request->input('donor_email');
		$donor_phone = $request->input('donor_phone');
		$donor_amount = $request->input('donor_amount');
		$donor_note = $request->input('donor_note');
		$cause_title = $request->input('cause_title');
		$cause_slug = $request->input('cause_slug');
		$image_size = $request->input('image_size');
		$purchase_token = rand(111111, 999999);
		$payment_method = $request->input('payment_method');
		$website_url = $request->input('website_url');
		$donor_purchase_date = date('Y-m-d');
		$donor_cause_id = $request->input('donor_cause_id');
		$cause_raised = base64_decode($request->input('cause_raised'));
		$donor_cause_token = $request->input('donor_cause_token');
		$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);
		$user_id = $request->input('cause_user_id');
		$raised_price = $cause_raised + $donor_amount;
		$miniumum_amount = $setting['setting']->site_minimum_donate;


		$request->validate([
			'donor_name' => 'required',
			'donor_email' => 'required',
			'donor_phone' => 'required',
			'donor_amount' => 'required|numeric|min:' . $miniumum_amount,
			'donor_photo' => 'mimes:jpeg,jpg,png|max:' . $image_size,


		]);
		$rules = array();

		$messsages = array();

		$validator = Validator::make(Input::all(), $rules, $messsages);

		if ($validator->fails()) {
			$failedRules = $validator->failed();
			return back()->withErrors($validator);
		} else {




			if ($request->hasFile('donor_photo')) {

				$image = $request->file('donor_photo');
				$img_name = time() . '.' . $image->getClientOriginalExtension();
				$destinationPath = public_path('/storage/donors');
				$imagePath = $destinationPath . "/" .  $img_name;
				$image->move($destinationPath, $img_name);
				$donor_photo = $img_name;
			} else {
				$donor_photo = "";
			}



			$savedata = array('donor_cause_id' => $donor_cause_id, 'donor_cause_user_id' => $user_id, 'donor_cause_token' => $donor_cause_token, 'donor_name' => $donor_name, 'donor_email' => $donor_email, 'donor_phone' => $donor_phone, 'donor_amount' => $donor_amount, 'donor_note' => $donor_note, 'donor_payment_type' => $payment_method, 'donor_purchase_token' => $purchase_token, 'donor_purchase_date' => $donor_purchase_date, 'donor_photo' => $donor_photo, 'donor_payment_status' => 'pending');


			$checkcount = Causes::checkuserSubscription($user_id);
			$user_data['view'] = Members::singlebuyerData($user_id);
			/* settings */
			$site_currency = $setting['setting']->site_currency_code;
			$success_url = $website_url . '/donor-success/' . $purchase_token;
			$cancel_url = $website_url . '/cancel';

			if ($checkcount == 1) {
				$paypal_email = $user_data['view']->user_paypal_email;
				$paypal_mode = $user_data['view']->user_paypal_mode;
				if ($paypal_mode == 1) {
					$paypal_url = "https://www.paypal.com/cgi-bin/webscr";
				} else {
					$paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
				}

				$stripe_mode = $user_data['view']->user_stripe_mode;
				if ($stripe_mode == 0) {
					$stripe_publish_key = $user_data['view']->user_test_publish_key;
					$stripe_secret_key = $user_data['view']->user_test_secret_key;
				} else {
					$stripe_publish_key = $user_data['view']->user_live_publish_key;
					$stripe_secret_key = $user_data['view']->user_live_secret_key;
				}
			} else {

				$paypal_email = $setting['setting']->paypal_email;
				$paypal_mode = $setting['setting']->paypal_mode;
				if ($paypal_mode == 1) {
					$paypal_url = "https://www.paypal.com/cgi-bin/webscr";
				} else {
					$paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
				}

				$stripe_mode = $setting['setting']->stripe_mode;
				if ($stripe_mode == 0) {
					$stripe_publish_key = $setting['setting']->test_publish_key;
					$stripe_secret_key = $setting['setting']->test_secret_key;
				} else {
					$stripe_publish_key = $setting['setting']->live_publish_key;
					$stripe_secret_key = $setting['setting']->live_secret_key;
				}
			}

			/* settings */
			Causes::insertdonorData($savedata);

			if ($payment_method == 'paypal') {

				$paypal = '<form method="post" id="paypal_form" action="' . $paypal_url . '">
						  <input type="hidden" value="_xclick" name="cmd">
						  <input type="hidden" value="' . $paypal_email . '" name="business">
						  <input type="hidden" value="' . $cause_title . '" name="item_name">
						  <input type="hidden" value="' . $purchase_token . '" name="item_number">
						  <input type="hidden" value="' . $donor_amount . '" name="amount">
						  <input type="hidden" value="' . $site_currency . '" name="currency_code">
						  <input type="hidden" value="' . $success_url . '" name="return">
						  <input type="hidden" value="' . $cancel_url . '" name="cancel_return">
								  
						</form>';
				$paypal .= '<script>window.paypal_form.submit();</script>';
				echo $paypal;
			}
			/* stripe code */ else if ($payment_method == 'stripe') {


				$stripe = array(
					"secret_key"      => $stripe_secret_key,
					"publishable_key" => $stripe_publish_key
				);

				\Stripe\Stripe::setApiKey($stripe['secret_key']);


				$customer = \Stripe\Customer::create(array(
					'email' => $donor_email,
					'source'  => $token
				));


				$cause_name = $cause_title;
				$donor_price = $donor_amount * 100;
				$currency = $site_currency;
				$book_id = $purchase_token;


				$charge = \Stripe\Charge::create(array(
					'customer' => $customer->id,
					'amount'   => $donor_price,
					'currency' => $currency,
					'description' => $cause_name,
					'metadata' => array(
						'order_id' => $book_id
					)
				));


				$chargeResponse = $charge->jsonSerialize();


				if ($chargeResponse['paid'] == 1 && $chargeResponse['captured'] == 1) {

					if ($checkcount == 0) {

						$commission = ($setting['setting']->site_admin_commission * $donor_amount) / 100;
						$user_amount = $donor_amount - $commission;
						$admin_amount = $commission;
						$user_old_amount = $user_data['view']->earnings + $user_amount;
						$admin_details['view'] = Members::adminData();
						$admin_old_amount = $admin_details['view']->earnings + $admin_amount;
						$user_record = array('earnings' => $user_old_amount);
						Members::updateuserPrice($user_id, $user_record);
						$admin_data = array('earnings' => $admin_old_amount);
						Members::updateuserPrice(1, $admin_data);
					}
					$pricedata = array('cause_raised' => $raised_price);
					Causes::updatecausePrice($donor_cause_id, $pricedata);

					$payment_token = $chargeResponse['balance_transaction'];
					$purchased_token = $book_id;
					$checkoutdata = array('donor_payment_token' => $payment_token, 'donor_payment_status' => 'completed');
					Causes::updatedonorData($purchased_token, $checkoutdata);
					$data_record = array('payment_token' => $payment_token);


					$check_email_support = Members::getuserSubscription($user_id);
					if ($check_email_support == 1) {
						$donor_payment_amount = $donor_amount;
						$admin_name = $setting['setting']->sender_name;
						$admin_email = $setting['setting']->sender_email;
						$currency_symbol = $setting['setting']->site_currency_symbol;
						$cause_url = URL::to('/cause/') . $cause_slug;
						$record = array('donor_payment_amount' => $donor_payment_amount, 'currency_symbol' => $currency_symbol, 'cause_url' => $cause_url);
						$to_name = $user_data['view']->name;
						$to_email = $user_data['view']->email;
						Mail::send('donation_mail', $record, function ($message) use ($admin_name, $admin_email, $to_email, $to_name) {
							$message->to($to_email, $to_name)
								->subject('Donation payment received');
							$message->from($admin_email, $admin_name);
						});
					}
					return view('success')->with($data_record);
				}
			}
			/* stripe code */
		}
	}


	public function activate_newsletter($token)
	{

		$check = Members::checkNewsletter($token);
		if ($check == 1) {

			$data = array('news_status' => 1);

			Members::updateNewsletter($token, $data);

			return redirect('/newsletter')->with('success', 'Thank You! Your subscription has been confirmed!');
		} else {
			return redirect('/newsletter')->with('error', 'This email address already subscribed');
		}
	}


	public function view_newsletter()
	{

		return view('newsletter');
	}


	public function update_newsletter(Request $request)
	{

		$news_email = $request->input('news_email');
		$news_status = 0;
		$news_token = $this->generateRandomString();

		$request->validate([

			'news_email' => 'required|email',



		]);
		$rules = array(

			'news_email' => ['required',  Rule::unique('newsletter')->where(function ($sql) {
				$sql->where('news_status', '=', 0);
			})],

		);

		$messsages = array();

		$validator = Validator::make(Input::all(), $rules, $messsages);

		if ($validator->fails()) {
			$failedRules = $validator->failed();
			/*return back()->withErrors($validator);*/
			return redirect()->back()->with('news-error', 'This email address already subscribed.');
		} else {


			$data = array('news_email' => $news_email, 'news_token' => $news_token, 'news_status' => $news_status);

			Members::savenewsletterData($data);

			$sid = 1;
			$setting['setting'] = Settings::editGeneral($sid);

			$from_name = $setting['setting']->sender_name;
			$from_email = $setting['setting']->sender_email;
			$activate_url = URL::to('/newsletter') . '/' . $news_token;

			$record = array('activate_url' => $activate_url);
			Mail::send('newsletter_mail', $record, function ($message) use ($from_name, $from_email, $news_email) {
				$message->to($news_email)
					->subject('Newsletter');
				$message->from($from_email, $from_name);
			});


			return redirect()->back()->with('news-success', 'Your email address subscribed. You will receive a confirmation email.');
		}
	}


	public function view_allcauses()
	{
		$causes['view'] = Causes::viewallCauses();
		$slug = '';
		$data = array('causes' => $causes, 'slug' => $slug);
		return view('causes')->with($data);
	}


	public function view_category_causes($slug)
	{
		$causes['view'] = Causes::viewcategoryCauses($slug);
		$data = array('causes' => $causes, 'slug' => $slug);
		return view('causes')->with($data);
	}


	public function single_cause($slug)
	{
		$single['view'] = Causes::singleCause($slug);
		$user_id = $single['view']->cause_user_id;
		$checkcount = Causes::checkuserSubscription($user_id);
		if ($checkcount == 0) {
			$sid = 1;
			$setting['setting'] = Settings::editGeneral($sid);
			$get_payment = explode(',', $setting['setting']->payment_option);
		} else {
			$user['details'] = Members::singlebuyerData($user_id);
			$get_payment = explode(',', $user['details']->user_payment_option);
		}

		$x = $single['view']->cause_raised;
		$y = $single['view']->cause_goal;
		$percent = $x / $y;
		$percent_value = number_format($percent * 100);
		if ($percent_value >= 100) {
			$percent_val = 100;
		} else {
			$percent_val = $percent_value;
		}

		$donor['details'] = Causes::recentDonation($single['view']->cause_id);
		$data = array('single' => $single, 'percent_val' => $percent_val, 'get_payment' => $get_payment, 'donor' => $donor);

		return view('cause')->with($data);
	}


	public function view_became_volunteer()
	{
		return view('became-volunteer');
	}

	public function user_verify($user_token)
	{
		$data = array('verified' => '1');
		$user['user'] = Members::verifyuserData($user_token, $data);

		return redirect('login')->with('success', 'Your e-mail is verified. You can now login.');
	}


	public function single_volunteer($slug)
	{
		$single['view'] = Volunteers::slugVolunteers($slug);
		$data = array('single' => $single);
		return view('volunteer')->with($data);
	}


	public function all_volunteer()
	{

		$display['view'] = Volunteers::allVolunteers();
		$data = array('display' => $display);
		return view('volunteers')->with($data);
	}

	public function all_events()
	{

		$display['view'] = Events::allEvents();
		$category['view'] = Category::eventCategoryData();
		$count_category = Category::getgroupeventData();
		$slug = "";
		$data = array('display' => $display, 'category' => $category, 'count_category' => $count_category, 'slug' => $slug);
		return view('events')->with($data);
	}


	public function single_event($slug)
	{
		$single['view'] = Events::singleEvent($slug);
		$category['view'] = Category::eventCategoryData();
		$count_category = Category::getgroupeventData();
		$recent['view'] = Events::recentEvent($slug);
		$event_start_time = date('F d, Y H:i:s', strtotime($single['view']->event_start_date_time));
		$data = array('single' => $single, 'category' => $category, 'count_category' => $count_category, 'slug' => $slug, 'recent' => $recent, 'event_start_time' => $event_start_time);
		return view('event')->with($data);
	}


	public function view_category_events($cat_id, $slug)
	{

		$display['view'] = Events::categoryEvents($cat_id);
		$category['view'] = Category::eventCategoryData();
		$count_category = Category::getgroupeventData();
		$data = array('display' => $display, 'category' => $category, 'count_category' => $count_category, 'slug' => $slug);
		return view('events')->with($data);
	}



	public function view_subscription()
	{
		$subscription['view'] = Members::viewSubscription();
		$data = array('subscription' => $subscription);
		return view('subscription')->with($data);
	}

	public function view_forgot()
	{
		return view('forgot');
	}

	public function view_contact()
	{
		return view('contact');
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

	public function view_reset($token)
	{
		$data = array('token' => $token);
		return view('reset')->with($data);
	}

	public function volunteer_slug($string)
	{
		$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		return $slug;
	}

	public function submit_volunteer(Request $request)
	{

		$volu_firstname = $request->input('volu_firstname');
		$volu_lastname = $request->input('volu_lastname');
		$volu_name = $volu_firstname . '-' . $volu_lastname;
		$volu_slug = $this->volunteer_slug($volu_name);
		$volu_email = $request->input('volu_email');
		$volu_phone = $request->input('volu_phone');
		$volu_profession = $request->input('volu_profession');
		$volu_facebook_link = $request->input('volu_facebook_link');
		$volu_twitter_link = $request->input('volu_twitter_link');
		$volu_linked_link = $request->input('volu_linked_link');
		$volu_address = $request->input('volu_address');
		$volu_about = $request->input('volu_about');
		$image_size = $request->input('image_size');
		$volu_token = $this->generateRandomString();
		$allsettings = Settings::allSettings();
		$volunteers_approval = $allsettings->volunteers_approval;


		if ($volunteers_approval == 1) {
			$volunteer_status = 1;
			$volunteer_approve_status = "Thanks for your submission. Your details updated successfully.";
		} else {
			$volunteer_status = 0;
			$volunteer_approve_status = "Thanks for your submission. Once admin will activated your details. will publish on our website.";
		}


		$request->validate([
			'volu_email' => 'required|email',
			'volu_firstname' => 'required',
			'volu_lastname' => 'required',
			'volu_phone' => 'required',
			'volu_photo' => 'mimes:jpeg,jpg,png|max:' . $image_size,


		]);
		$rules = array(

			'volu_email' => ['required',  Rule::unique('volunteers')->where(function ($sql) {
				$sql->where('volu_drop_status', '=', 'no');
			})],


		);

		$messsages = array();

		$validator = Validator::make(Input::all(), $rules, $messsages);

		if ($validator->fails()) {
			$failedRules = $validator->failed();
			return back()->withErrors($validator);
		} else {


			if ($request->hasFile('volu_photo')) {
				$image = $request->file('volu_photo');
				$img_name = time() . '.' . $image->getClientOriginalExtension();
				$destinationPath = public_path('/storage/volunteers');
				$imagePath = $destinationPath . "/" .  $img_name;
				$image->move($destinationPath, $img_name);
				$volu_photo = $img_name;
			} else {
				$volu_photo = "";
			}

			$data = array('volu_firstname' => $volu_firstname, 'volu_lastname' => $volu_lastname, 'volu_email' => $volu_email, 'volu_phone' => $volu_phone, 'volu_photo' => $volu_photo, 'volu_address' => $volu_address, 'volu_profession' => $volu_profession, 'volu_facebook_link' => $volu_facebook_link, 'volu_twitter_link' => $volu_twitter_link, 'volu_linked_link' => $volu_linked_link, 'volu_about' => $volu_about, 'volu_token' => $volu_token, 'volu_status' => $volunteer_status, 'volu_slug' => $volu_slug);

			Members::savevolunteerData($data);

			return redirect()->back()->with('success', $volunteer_approve_status);
		}
	}


	public function update_reset(Request $request)
	{

		$user_token = $request->input('user_token');
		$password = bcrypt($request->input('password'));
		$password_confirmation = $request->input('password_confirmation');
		$data = array("user_token" => $user_token);
		$value = Members::verifytokenData($data);
		$user['user'] = Members::gettokenData($user_token);
		if ($value) {

			$request->validate([
				'password' => 'required|confirmed|min:6',

			]);
			$rules = array();

			$messsages = array();

			$validator = Validator::make(Input::all(), $rules, $messsages);

			if ($validator->fails()) {
				$failedRules = $validator->failed();
				return back()->withErrors($validator);
			} else {

				$record = array('password' => $password);
				Members::updatepasswordData($user_token, $record);
				return redirect('login')->with('success', 'Your new password updated successfully. Please login now.');
			}
		} else {

			return redirect()->back()->with('error', 'These credentials do not match our records.');
		}
	}



	public function update_forgot(Request $request)
	{
		$email = $request->input('email');

		$data = array("email" => $email);

		$value = Members::verifycheckData($data);
		$user['user'] = Members::getemailData($email);

		if ($value) {

			$user_token = $user['user']->user_token;
			$name = $user['user']->name;
			$sid = 1;
			$setting['setting'] = Settings::editGeneral($sid);

			$from_name = $setting['setting']->sender_name;
			$from_email = $setting['setting']->sender_email;

			$record = array('user_token' => $user_token);
			Mail::send('forgot_mail', $record, function ($message) use ($from_name, $from_email, $email, $name, $user_token) {
				$message->to($email, $name)
					->subject('Forgot Password');
				$message->from($from_email, $from_name);
			});

			return redirect('forgot')->with('success', 'We have e-mailed your password reset link!');
		} else {

			return redirect()->back()->with('error', 'These credentials do not match our records.');
		}
	}



	/* contact */

	public function addContact(Request $request)
	{
		$contact = new Contacts;
		$contact->user_name = $request->user_name;
		$contact->email = $request->email;
		$contact->mobile = $request->mobile;
		$contact->location = $request->location;
		$contact->requirement = $request->requirement;
		$contact->save();
		
	/*	$sid = 1;
		$setting['setting'] = Settings::editGeneral($sid);

		$admin_name = $setting['setting']->sender_name;
		$admin_email = $setting['setting']->sender_email;

		$record = array('from_name' => $from_name, 'from_email' => $from_email, 'from_phone' => $from_phone, 'from_location' => $from_location, 'message_text' => $message_text, 'contact_date' => date('Y-m-d'));
		Members::saveContact($record);
		
		Mail::send('contact_mail', $record, function ($message) use ($admin_name, $admin_email, $from_email, $from_name) {
				$message->to($admin_email, $admin_name)
					->subject('Contact');
				$message->from($from_email, $from_name);
			});*/

        return redirect('contact')->with('success', 'Success! Inquiry saved.');
	}
	
	public function getStates(Request $request)
    {
        $states = State::where('country_id','=', $request->country_id)->get();
        $cities = City::where('state_id','=', $states[0]->id)->get();

        $data = [
            'states' => $states,
            'cities' => $cities,
        ];

        return $data;
    }

    public function getCities(Request $request)
    {
        $cities = City::where('state_id','=', $request->state_id)->get();

        $data = [
            'cities' => $cities,
        ];

        return $data;
    }
    
    public function searchCity($term = '')
    {
        $results = array();
        
        if(!empty($term)){
            $statesList = State::where('state_name', 'like', '%'.$term.'%')->get();
            
            foreach($statesList as $key => $state){
                $result = array();
                $result['id'] = 'State-'.$state->state_name;
                $result['text'] = $state->state_name;
                
                array_push($results, $result);
            }
             
            $cityList = City::where('city_name', 'like', '%'.$term.'%')->get();  
            
            foreach($cityList as $key => $city){
                $result = array();
                $result['id'] = 'City-'.$city->city_name;
                $result['text'] = $city->city_name;
                
                array_push($results, $result);
            }
        }else{
           $results[] = array('id' => 'All', 'text' => 'All India'); 
        }
        
        $data['results'] = $results;
        
        return $data;
    }
    
    public function addInquiry(Request $request){
        
        if(strlen($request->inquiry_id) == 0) {
            $productInquiry['user_id'] = (strlen($request->user_id) > 0 ? $request->user_id : NULL);
            $productInquiry['product_id'] = (strlen($request->product_id) > 0 ? $request->product_id : NULL);
            $productInquiry['name'] = $request->user_name;
            $productInquiry['email'] = $request->user_email;
            $productInquiry['mobile'] = $request->user_mobile;
            $productInquiry['company_name'] = $request->company_name;   
        }
        
        $productInquiry['product_name'] = (strlen($request->product_name) > 0 ? $request->product_name : NULL);
        $productInquiry['location'] = $request->location;
        $productInquiry['want_to_buy'] = $request->want_to_buy;
        $productInquiry['i_want_to_buy'] = $request->i_want_to_buy;
        $productInquiry['quantity'] = $request->quantity;
        $productInquiry['requirement_type'] = $request->requirement_type;
        $productInquiry['purpose'] = $request->purpose;
        $productInquiry['buying_request_description'] = $request->description;
        
        $productInquiry['buy_sell'] = $request->buy_sell;
        $productInquiry['moq'] = $request->moq;
        
        $productInquiry['requirmeny_frequency'] = $request->requirment_frequency;
        $productInquiry['quality_size_speci'] = $request->quality_size;
        $productInquiry['packaging_size'] = $request->packaging_size;
        $productInquiry['sale_purchase'] = $request->sale_purchase;
        $productInquiry['payment_term'] = $request->payment_term;
        $productInquiry['delivery_place'] = $request->deliveryp_place;
        $productInquiry['payment_term'] = $request->payment_term;
         $productInquiry['delivery_place'] = $request->delivery_place;
        
        if(Input::hasFile('file')){
            $file = $request->file('file');
			$fileName = str_random(30).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
			$uploads = $file->move(public_path() . '/storage/product', $fileName);
	
			$productInquiry['product_image'] = $fileName;
        }else{
            $productInquiry['product_image'] = $request->product_image;
        }
        
        if(strlen($request->inquiry_id) == 0) {
            $productInquiry['created_at'] = Carbon::now();
            $isSaved = ProductInquiry::insert($productInquiry);
            
            if(strlen($request->product_id) > 0){
                $data['product'] = Product::where('product_id', $request->product_id)->with('user')->first()->toArray();
                $data['productInquiry'] = $productInquiry;
                
                $subject = 'Product Inquiry Alert - Business World Trade';
                
                $isSend = Helpers::sendMail($data['product']['user']['email'], 'mail.product-inquiry', $subject, $data);
            }
        }else{
            $productInquiry['updated_at'] = Carbon::now();
            $isUpdated = ProductInquiry::where('inquiry_id', $request->inquiry_id)->update($productInquiry);
        }
        
        return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => (strlen($request->inquiry_id) == 0 ? 'Success! Product inquiry send to seller.' : 'Success! Product inquiry updated.'),
                'is_edit' => (strlen($request->inquiry_id) == 0 ? 0 : 1)
            ]);
    }
    
    public function addPopupInquiry(Request $request)
    {
        $popupInquiry = new PopupInquiry;
        $popupInquiry->user_name = $request->user_name;
        $popupInquiry->email = $request->user_email;
        $popupInquiry->contact_no = $request->contact_no;
        $popupInquiry->user_type = $request->user_type;
        $popupInquiry->requirements = $request->requirements;
        $popupInquiry->save();
        
        return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Success! Your inquiry saved.',
            ]);
    }

    public function exportsave(Request $request)
    {
       $data= Validator::make($request->all(),[
        "name"=>"required",
        "email"=>"required|max:255|email|unique:exports",
        "mobile"=>"required|numeric",
        
        
        ],[
         
         "name.required"=>"Name is needed",
         "email.required"=>"Email is needed",
         "email.email"=>"Email should be valid",
         "email.unique"=>"This email address already registered",
         "mobile.numeric"=>"Mobile no. should be numeric",
         
         

        ])->validate();


       $obj = new export;
       $obj->name = $request->name;
       $obj->email= $request->email;
       $obj->mobile = $request->mobile;
       $obj->company_name = $request->companyname;
       $obj->iec_no = $request->iecno;
       $obj->product_export = $request->productexport;
       $obj->save();
       return redirect()->back()->with('success', 'Your Data is Submited Successfully');
       
    }
    
     public function dealing(Request $request)
    {
        
        $data= Validator::make($request->all(),[
        "first_name"=>"required",
        "requirment"=>"required",
        "email"=>"required|max:255|email",
        "mobile"=>"required|numeric",
        
        
        ],[
         
         "first_name.required"=>"Name is needed",
         "email.required"=>"Email is needed",
         "email.email"=>"Email should be valid",
         
         "mobile.numeric"=>"Mobile no. should be numeric",
         

        ])->validate();


       $obj = new deal;
       $obj->first_name = $request->first_name;
       $obj->last_name = $request->last_name;
       $obj->email= $request->email;
       $obj->mobile = $request->mobile;
       $obj->requirments = $request->requirment;
       
       $obj->save();
       return redirect()->back()->with('success', 'Your Data is Submited Successfully');
       
    }
    
    public function addDistributorshipDetail(Request $request)
    {
        $distributorship = new Distributorships;
        $distributorship->user_name = $request->first_name.' '.$request->last_name;
        $distributorship->email = $request->email;
        $distributorship->mobile = $request->mobile;
        $distributorship->state_id = $request->state;
        $distributorship->city_id = $request->city;
        $distributorship->purpose = $request->purpose;
        $distributorship->categories = $request->categories;
        $distributorship->description = $request->description;
        $distributorship->save();
        
        return redirect()->back()->with('success', 'Success! Distributorship detail saved.');
    }
    
    public function addJobsDetail(Request $request)
    {
        $job = new Jobs;
        $job->user_name = $request->first_name.' '.$request->last_name;
        $job->email = $request->email;
        $job->mobile = $request->mobile;
        $job->state_id = $request->state;
        $job->city_id = $request->city;
        $job->categories = $request->categories;
        $job->description = $request->description;
        
        if(Input::hasFile('file')){
            $file = $request->file('file');
			$fileName = str_random(30).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
			$uploads = $file->move(public_path() . '/storage/resumes', $fileName);
	
			$job->resume = $fileName;
        }
        
        $job->save();
        
        return redirect()->back()->with('success', 'Success! Jobs detail saved.');
    }
    
    public function addEFilingDetail(Request $request)
    {
        $eFiling = new eFilings;
        $eFiling->user_name = $request->first_name.' '.$request->last_name;
        $eFiling->email = $request->email;
        $eFiling->mobile = $request->mobile;
        $eFiling->state_id = $request->state;
        $eFiling->city_id = $request->city;
        $eFiling->registration = $request->registration;
        $eFiling->detail_of_services = (isset($request->detail_services[$request->registration]) ? $request->detail_services[$request->registration] : '') ;
        $eFiling->description = $request->description;
        $eFiling->save();
        
         return redirect()->back()->with('success', 'Success! E-filing detail saved.');
    }
    
    public function addBusinessInquiry(Request $request)
	{
	    $businessInquiry = new BusinessInquiry;
	    $businessInquiry->user_name = $request->first_name.' '.$request->last_name;
	    $businessInquiry->email = $request->email;
	    $businessInquiry->mobile = $request->mobile;
	    $businessInquiry->requirement = $request->requirement;
	    $businessInquiry->type = $request->type;
	    $businessInquiry->save();
	    
	    return redirect()->back()->with('success', 'Success! Contact inquiry saved.');
	    
	}
    
	/* contact */
	
		public function b2bmetter()
	{
		return view('profilesheet.b2b');
	}
	
		public function distributorshipmetter()
	{
		return view('profilesheet.distributorship');
	}
	
	public function PaymentSheet()
	{
	   	$vendorsList = User::whereNotNull('company_name')->where('company_name', '<>', '')->where('user_type', 'vendor')->where('drop_status', '=', 'no')->orderBy('company_name', 'asc')->get();
	   	
	   	$serviceProviders = ServiceProviders::get();
	    
		return view('paymentsheet', compact('vendorsList', 'serviceProviders'));
	}
	
	public function addProfileDetail(Request $request)
	{
         $metterSheet = new MetterSheets;
         $metterSheet->company_name = $request->company_name;
         $metterSheet->contact_name = $request->contact_name;
         $metterSheet->mobile = $request->mobile;
         $metterSheet->email = $request->email;
         $metterSheet->address = $request->address;
         $metterSheet->nature_of_address = $request->nature_of_address;
         $metterSheet->production_unit = $request->production_unit;
         $metterSheet->production_capacity = $request->production_capacity;
         $metterSheet->export_market = $request->export_market;
         $metterSheet->import_market = $request->import_market;
         $metterSheet->major_clients = $request->major_clients;
         $metterSheet->no_of_designers = $request->no_of_designers;
         $metterSheet->no_of_engineers = $request->no_of_engineers;
         $metterSheet->capital_amount = $request->capital_amount;
         $metterSheet->export_percentage = $request->export_percentage;
         $metterSheet->import_percentage = $request->import_percentage;
         $metterSheet->gst_no = $request->gst_no;
         $metterSheet->pan_no = $request->pan_no;
         $metterSheet->warehousing_facility = $request->warehousing_facility;
         $metterSheet->annual_turnover = $request->annual_turnover;
         $metterSheet->import_export_code = $request->import_export_code;
         $metterSheet->year_of_establishment = $request->year_of_establishment;
         $metterSheet->no_of_employees = $request->no_of_employees;
         $metterSheet->keywords = $request->keywords;
         $metterSheet->products_manufacturing = $request->products_manufacturing;
         $metterSheet->products_exporting = $request->products_exporting;
         $metterSheet->products_importing = $request->products_importing;
         $metterSheet->products_supplying = $request->products_supplying;
         $metterSheet->raw_material_used = $request->raw_material_used;
         $metterSheet->applications_of_products = $request->applications_of_products;
         $metterSheet->quality_checking_process = $request->quality_checking_process;
         $metterSheet->product_specialization = $request->product_specialization;
         $metterSheet->customized_products = $request->customized_products;
         $metterSheet->minimum_order_quantity = $request->minimum_order_quantity;
         $metterSheet->maximum_supply_capacity = $request->maximum_supply_capacity;
         $metterSheet->price_range = $request->price_range;
         $metterSheet->sample_policy = $request->sample_policy;
         $metterSheet->payment_terms = $request->payment_terms;
         $metterSheet->target_location = $request->target_location;
         $metterSheet->main_products = $request->main_products;
         $metterSheet->package_name = $request->package_name;
         $metterSheet->package_details = $request->package_details;
         $metterSheet->company_history = $request->company_history;
         $metterSheet->company_branches = $request->company_branches;
         $metterSheet->save();
         
        return redirect()->back()->with('success', 'Success! B2B Profile detail saved.');
	}
	
	public function addDistributorshipProfileDetail(Request $request)
	{
	    $distributorshipSheet = new DistributorshipSheets;
        $distributorshipSheet->company_name = $request->company_name;
        $distributorshipSheet->contact_name = $request->contact_name;
        $distributorshipSheet->designation = $request->designation;
        $distributorshipSheet->email = $request->email;
        $distributorshipSheet->mobile = $request->mobile;
        $distributorshipSheet->mobile2 = $request->mobile2;
        $distributorshipSheet->company_address = $request->company_address;
        $distributorshipSheet->city_id = $request->city_id;
        $distributorshipSheet->state_id = $request->state_id;
        $distributorshipSheet->pincode = $request->pincode;
        $distributorshipSheet->country_id = $request->country_id;
        $distributorshipSheet->website_url = $request->website_url;
        $distributorshipSheet->establishment_year = $request->establishment_year;
        $distributorshipSheet->company_annual_sale = $request->company_annual_sale;
        $distributorshipSheet->brand_name = $request->brand_name;
        $distributorshipSheet->no_of_targeted_distributors = $request->no_of_targeted_distributors;
        $distributorshipSheet->required_space = $request->required_space;
        $distributorshipSheet->investment_amount = $request->investment_amount;
        $distributorshipSheet->company_detail = $request->company_detail;
        $distributorshipSheet->where_appointment = $request->where_appointment;
        $distributorshipSheet->distributors_experience = $request->distributors_experience;
        $distributorshipSheet->benefits_of_distributors = $request->benefits_of_distributors;
        $distributorshipSheet->package_title = $request->package_title;
        $distributorshipSheet->package_duration = $request->package_duration;
        $distributorshipSheet->package_price = $request->package_price;
        $distributorshipSheet->category_subscribed = $request->category_subscribed;
        $distributorshipSheet->payment_mode = implode(',', $request->payment_mode);
        
        if(Input::hasFile('company_logo')){
            $file = $request->file('company_logo');
			$fileName = str_random(30).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
			$uploads = $file->move(public_path() . '/storage/company', $fileName);
	
			$distributorshipSheet->company_logo = $fileName;
        }
        
        $distributorshipSheet->save();
        
        $products = $request->products;
        
        if(!empty($products)){
            foreach($products as $product){
               $distributorshipSheetProduct  = new DistributorshipSheetProducts;
               $distributorshipSheetProduct->distributorship_sheet_id = $distributorshipSheet->id;
               $distributorshipSheetProduct->category_name = $product['category_name'];
               $distributorshipSheetProduct->product_name = $product['product_name'];
               $distributorshipSheetProduct->product_usp = $product['product_usp'];
               
                if(isset($product['product_image'])){
                    $file = $product['product_image'];
        			$fileName = str_random(30).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
        			$uploads = $file->move(public_path() . '/storage/distributorships', $fileName);
        	
        			$distributorshipSheetProduct->product_image = $fileName;
                }
               
               $distributorshipSheetProduct->save();    
            }
        }
        
        
        return redirect()->back()->with('success', 'Success! Distributorship Profile detail saved.');
	}
	
	public function savePaymentSheet(Request $request){
	    
	    $paymentsheet = Paymentsheets::where('user_id', $request->user_id)->first();
	    
	    if(empty($paymentsheet)){
	       $paymentsheet = new Paymentsheets;   
	       $paymentsheet->user_id = $request->user_id;
	    }
	   
        $paymentsheet->manager_name = $request->manager_name;
        $paymentsheet->executive_name = $request->executive_name;
        $paymentsheet->company_name = $request->company_name;
        $paymentsheet->customer_name = $request->customer_name;
        $paymentsheet->mobile = $request->mobile;
        $paymentsheet->email = $request->email;
        $paymentsheet->address = $request->address;
        $paymentsheet->gst_no = $request->gst_no;
        $paymentsheet->contract_amount = $request->contract_amount;
        $paymentsheet->payment_type = $request->payment_type;
        $paymentsheet->package_name = $request->package_name;
        $paymentsheet->package_duration = $request->package_duration;
        $paymentsheet->domain_duration = $request->domain_duration;
        $paymentsheet->detail_services = (!empty($request->detail_services) ? implode(',', $request->detail_services) : NULL);
        $paymentsheet->save();
        
        $payments = $request->payment;
        
        if(!empty($payments)){
            foreach($payments as $payment){
               $paymentsheetPayment  = new PaymentsheetPayments;
               $paymentsheetPayment->paymentsheet_id = $paymentsheet->id;
               $paymentsheetPayment->sale_date = (!empty($payment['sale_date']) ? Carbon::parse($payment['sale_date'])->format('Y-m-d H:i:s') : NULL);
               $paymentsheetPayment->received_amount = (strlen($payment['received_amount']) > 0 ? $payment['received_amount'] : 0);
               $paymentsheetPayment->balance_amount = (strlen($payment['balance_amount']) > 0 ? $payment['balance_amount'] : 0);
               $paymentsheetPayment->mode_of_payment = $payment['mode_of_payment'];
               $paymentsheetPayment->transaction_no = $payment['transaction_no'];
               
                if(isset($payment['attachment'])){
                    $file = $payment['attachment'];
        			$fileName = str_random(10).'-'.time().'.'.strtolower($file->getClientOriginalExtension());
        			$uploads = $file->move(public_path() . '/storage/paymentsheets', $fileName);
        	
        			$paymentsheetPayment->attachment = $fileName;
                }
               
               $paymentsheetPayment->save();    
            }
        }
        
        return redirect()->back()->with('success', 'Success! Paymentsheet detail saved.');
	}
	
   public function fetch_export_data()
	{
	    $export_data = export_data::all();
	    $post = DB::table('export_data')->get('*')->toArray();
    	foreach($post as $row)
    	{
    		$chart[] = array
    		(
    			'label'=>$row->shipper_name,
    			'y'=>$row->vgm_weight,

    		);
    	}
	    
	    return view("latest-package.export-data",compact("export_data","chart"));
	}
	
	 public function export_filter(Request $request)
    {
      $search = $request->get('search');
      $export_data = export_data::where('line_serial_no', 'like', '%'.$search.'%')->orderBy("id","DESC")->get();
        
        $post = DB::table('export_data')->get('*')->toArray();
    	foreach($post as $row)
    	{
    		$chart[] = array
    		(
    			'label'=>$row->shipper_name,
    			'y'=>$row->vgm_weight,

    		);
    	}
        
      return view("latest-package.export-data", compact("export_data","chart"));
    }
    
     public function coupon()
    {
        return view("admin.add-coupon");
    }
    
    public function submit_coupon(Request $request)
	{   
	    $coupon = new scratch;
	    $coupon->name = $request->input('client_name'); 
		$coupon->email = $request->input('email'); 
		$coupon->mobile = $request->input('mobile');
		$coupon->coupon = $request->input('code');
		$coupon->off = $request->input('off');
		$coupon->save();
		return Redirect::back()->with('success', 'Your Coupon is Send  Successfully');
	    
	}
    
    
}

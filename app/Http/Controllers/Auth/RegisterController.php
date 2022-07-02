<?php

namespace ZigKart\Http\Controllers\Auth;

use ZigKart\User;
use ZigKart\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;
use ZigKart\Models\Members;
use ZigKart\Models\Settings;
use Mail;
use Cookie;
use ZigKart\Models\Country;
use ZigKart\Models\State;
use ZigKart\Models\City;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
	public function register(Request $request)
    {
         $allsettings = Settings::allSettings();
		 $name = $request->input('name');
		 $username = $request->input('username');
		 $email = $request->input('email');
		 $phone = $request->input('phone');
		 $user_type = $request->input('user_type');
		 $vendor_theme = $request->input('theme');
		 $password = bcrypt($request->input('password'));
		 $company_name = $request->input('company_name');
		 $provider_id = $request->input('provider_id');
		 $provider = $request->input('provider');
		 
		 if(!empty($request->input('earnings'))){
		    $earnings = $request->input('earnings');
         }
		 else{
		   $earnings = 0;
		 }
		 
		 if(!empty(unserialize(Cookie::get('referral')))){
	      $referral_by = unserialize(Cookie::get('referral'));
		  $referral_commission = $allsettings->site_referral_commission;
		  $check_referral = Members::referralCheck($referral_by);
		  if($check_referral != 0){
			  $referred['display'] = Members::referralUser($referral_by);
			  $wallet_amount = $referred['display']->earnings + $referral_commission;
			  $referral_amount = $referred['display']->referral_amount + $referral_commission;
			  $referral_count = $referred['display']->referral_count + 1;
			  
			  $update_data = array('earnings' => $wallet_amount, 'referral_amount' => $referral_amount, 'referral_count' => $referral_count);
			  Members::updateReferral($referral_by,$update_data);
		   } 
         }
		 else{
		  $referral_by = "";
		 }
		 
		 $countryId = $request->input('country');
		 $stateId = (strlen($request->input('state')) > 0 ? $request->input('state') : NULL);
		 $cityId = (strlen($request->input('city')) > 0 ? $request->input('city') : NULL);
		 
		 $state = State::where('id', $stateId)->first();
		 $city = City::where('id', $cityId)->first();
		 
		 $userAddress = (!empty($city) > 0 ? $city->city_name : '').''.(strlen($state) > 0 ? ', '.$state->state_name : '');
		
		 $request->validate([
			'name' => 'required',
			'username' => 'required',
			'email' => 'required|email',
			'phone' => 'required',
			'password' => ['required', 'min:6'],
			'country' => 'required',
			'g-recaptcha-response' => 'captcha',
         ]);
         
         $messsages = array(
             
         );
         
		 $rules = array(
			'username' => ['required', 'regex:/^[\w-]*$/', 'max:255', Rule::unique('users') -> where(function($sql){ $sql->where('drop_status','=','no');})],
			'email' => ['required', 'email', 'max:255', Rule::unique('users') -> where(function($sql){ $sql->where('drop_status','=','no');})],
	     );
		 
		 $validator = Validator::make(Input::all(), $rules,$messsages);
		
		 if ($validator->fails()) {
    		 $failedRules = $validator->failed();
    		 return back()->withErrors($validator);
		 }else{
    		if($allsettings->email_verification == 1){
    		    $verified = 0;
    		}
    		else{
    		    $verified = 1;
    		}
    		
		    $user_token = $this->generateRandomString();
		 
    		$data = array('name' => $name, 'username' => $username, 'email' => $email, 'mobile' => $phone, 'user_type' => $user_type, 'vendor_theme' => $vendor_theme, 'password' => $password, 'company_name' => $company_name, 'provider_id' => $provider_id, 'provider' => $provider, 'earnings' => $earnings, 'verified' => $verified, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'user_token' => $user_token, 'user_country' => $countryId, 'country_id' => $countryId, 'state_id' => $stateId, 'city_id' => $cityId, 'user_address' => $userAddress, 'referral_by' => $referral_by);
    		Members::insertData($data);
    		
    		if($allsettings->email_verification == 1){
    			$sid = 1;
    			$setting['setting'] = Settings::editGeneral($sid);
    			$from_name = $setting['setting']->sender_name;
    			$from_email = $setting['setting']->sender_email;
    			Mail::send('register_mail', $data, function($message) use ($from_name, $from_email, $email, $name, $user_token) {
    				$message->to($email, $name)
    						->subject('Email Confirmation For Registration');
    				$message->from($from_email,$from_name);
    			});
    		    return redirect('login')->with('success','We sent you an activation code. Check your email and click on the link to verify.');	
            }
    		else{
    		 return redirect('login')->with('success','Your account has been created. You can now login.');
    		}
		}
    }
	
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'phone' => ['required', 'string'],
			'username' => ['required', 'regex:/^[\w-]*$/', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
			'user_country' => 'required',
			'g-recaptcha-response' => 'required|captcha',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \ZigKart\User
     */
	public function generateRandomString($length = 25) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    } 
	 
    protected function create(array $data)
    {
	    $allsettings = Settings::allSettings();
		if(!empty(unserialize(Cookie::get('referral'))))
		 {
	      $referral_by = unserialize(Cookie::get('referral'));
		  $referral_commission = $allsettings->site_referral_commission;
		  $check_referral = Members::referralCheck($referral_by);
		  if($check_referral != 0)
		  {
			  $referred['display'] = Members::referralUser($referral_by);
			  $wallet_amount = $referred['display']->earnings + $referral_commission;
			  $referral_amount = $referred['display']->referral_amount + $referral_commission;
			  $referral_count = $referred['display']->referral_count + 1;
			  
			  $update_data = array('earnings' => $wallet_amount, 'referral_amount' => $referral_amount, 'referral_count' => $referral_count);
			  Members::updateReferral($referral_by,$update_data);
		   } 
         }
		 else
		 {
		  $referral_by = "";
		 } 
        $token = $this->generateRandomString();
		return User::create([
            'name' => $data['name'],
			'email' => $data['email'],
			'user_phone' => $data['phone'],
			'username' => $data['username'],
            'password' => Hash::make($data['password']),
			'user_token' => $token,
			'earnings' => 0,
			'user_type' => $data['user_type'],
			'vendor_theme' => $data['vendor_theme'],
			'user_country' => $data['user_country'],
			'referral_by' => $referral_by,
			'g-recaptcha-response' => 'required|captcha',
			    
        ]);
    }
}

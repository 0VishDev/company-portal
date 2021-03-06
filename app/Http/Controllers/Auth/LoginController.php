<?php

namespace ZigKart\Http\Controllers\Auth;

use ZigKart\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use ZigKart\Models\Settings;
use Auth;
use Socialite;
use ZigKart\User;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
	protected $redirectTo = '/';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
	public function authenticated($request , $user)
	{
		if($user->user_type=='admin' || $user->user_type=='sub-admin')
		{
			return redirect('/admin');
		}
		else if($user->user_type=='vendor')
		{
			return redirect('/vendor/dashboard');
		}
		else
		{
			return redirect()->intended();
		}
    } 
	 
	public function redirectToProvider($provider)
	{
	   return Socialite::driver($provider)->scopes(['email'])->redirect();
	}
	 
	public function handleProviderCallback($provider)
	{
	  $user = Socialite::driver($provider)->user();
	  
	  $authUser = User::where('provider_id', $user->id)->where('provider', $provider)->first();
	  
	  if(!empty($authUser)){
		Auth::login($authUser, true);
		
	    if($authUser->user_type == 'admin' || $authUser->user_type == 'sub-admin')
		{
			return redirect('/admin');
		}
		else if($authUser->user_type == 'vendor')
		{
			return redirect('vendor/dashboard');
		}
		else
		{
			if(session()->has("url.intended") && strpos(session("url.intended"), 'wishlist') !== false) {
				return redirect(session("url.intended"));
			}
			return redirect('/');
		}
	  }else{
	      return redirect('/register?name='.$user->name.'&email='.$user->email.'&provider_id='.$user->id.'&provider='.$provider);
	  }
	  
// 	  $token = $this->generateRandomString();
// 	  return User::create([
//             'name' => $user->name,
//             'email' => $user->email,
// 			'username' => $this->user_slug($user->name),
// 			'user_token' => $token,
// 			'earnings' => 0,
// 			'user_type' => 'customer',
// 			'verified' => 1,
// 			'provider' => $provider,
//             'provider_id' => $user->id
//         ]);
// 	  $authUser = $this->CreateUser($user,$provider);
	} 
	
	
	public function generateRandomString($length = 25) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    }
	
	public function user_slug($string){
		   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		   return $slug;
    } 
	
	public function CreateUser($user, $provider)
	{
	  $authUser = User::where('provider_id', $user->id)->first();
	  if($authUser)
	  {
		return $authUser;
	  }
	  
	  $token = $this->generateRandomString();
	  return User::create([
            'name' => $user->name,
            'email' => $user->email,
			'username' => $this->user_slug($user->name),
			'user_token' => $token,
			'earnings' => 0,
			'user_type' => 'customer',
			'verified' => 1,
			'provider' => $provider,
            'provider_id' => $user->id
        ]);
	}
	  
	
	 
	public function login(Request $request)
	{
		$field = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		$email = trim($request->email);
		$password = trim($request->password);
		$redirectUrl = $request->redirectUrl;
	
		if (Auth::attempt(array($field => $email, 'password' =>  $password, 'verified' => 1, 'drop_status' => 'no' )))
		{
		    if(!empty($redirectUrl)){
		        return redirect($redirectUrl);
		    }
			else if(auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'sub-admin')
			{
				return redirect('/admin');
			}
			else if(auth()->user()->user_type == 'vendor')
			{
				return redirect('vendor/dashboard');
			}
			else
			{
				if(session()->has("url.intended") && strpos(session("url.intended"), 'wishlist') !== false) {
					return redirect(session("url.intended"));
				}
				return redirect('/');
			}
		}
	
		return redirect('login')->withErrors([
			'error' => 'These credentials do not match our records.',
		]);
	} 
	 
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

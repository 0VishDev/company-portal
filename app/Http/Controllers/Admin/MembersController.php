<?php

namespace ZigKart\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use ZigKart\Http\Controllers\Controller;
use ZigKart\Models\Members;
use ZigKart\Models\Settings;
use ZigKart\Models\City;
use Illuminate\Support\Facades\Crypt;
use ZigKart\User;

class MembersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

    /* edit profile */

    public function edit_profile()
    {
        $token = 1;
        $edit['userdata'] = Members::editprofileData($token);

        return view('admin.edit-profile', ['edit' => $edit, 'token' => $token]);

    }

    public function update_profile(Request $request)
    {

        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
        $user_type = $request->input('user_type');

        if (!empty($request->input('password'))) {
            $password = bcrypt($request->input('password'));
            $pass = $password;
        } else {
            $pass = $request->input('save_password');
        }

        $token = $request->input('edit_id');

        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'user_photo' => 'mimes:jpeg,jpg,png,gif|max:150',

        ]);
        $rules = array(
            'username' => ['required', 'regex:/^[\w-]*$/', 'max:255', Rule::unique('users')->ignore($token, 'id')->where(function ($sql) {$sql->where('drop_status', '=', 'no');})],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($token, 'id')->where(function ($sql) {$sql->where('drop_status', '=', 'no');})],

        );

        $messsages = array(

        );

        $validator = Validator::make(Input::all(), $rules, $messsages);

        if ($validator->fails()) {
            $failedRules = $validator->failed();
            return back()->withErrors($validator);
        } else {

            if ($request->hasFile('user_photo')) {

                Members::droprofilePhoto($token);

                $image = $request->file('user_photo');
                $img_name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/storage/users');
                $imagePath = $destinationPath . "/" . $img_name;
                $image->move($destinationPath, $img_name);
                $user_image = $img_name;
            } else {
                $user_image = $request->input('save_photo');
            }

            $data = array('name' => $name, 'username' => $username, 'email' => $email, 'user_type' => $user_type, 'password' => $pass, 'user_photo' => $user_image, 'updated_at' => date('Y-m-d H:i:s'));

            Members::updateprofileData($token, $data);
            return redirect()->back()->with('success', 'Update successfully.');

        }

    }

    /* edit profile */

    /* vendor */

    public function vendor()
    {
        $sellers = User::where('user_type','=','vendor')->where('drop_status','=','no')->orderBy('id', 'desc')->get();
        
        return view('admin.vendor', compact('sellers'));
    }

    public function add_vendor()
    {
        $cities = City::get();

        return view('admin.add-vendor', compact('cities'));
    }

    public function edit_vendor($token)
    {
        $cities = City::get();
        
        $edit['userdata'] = Members::editData($token);
        
        return view('admin.edit-vendor', compact('edit', 'token', 'cities'));
    }

    /* vendor */

    /* administrator */

    public function subAdministrator()
    {
        $subAdministrators = User::where('user_type', 'sub-admin')->where('drop_status', '=', 'no')->get();
        
        return view('admin.sub-administrator', compact('subAdministrators'));
    }

    public function addSubAdministrator()
    {

        return view('admin.add-sub-administrator');
    }

    public function saveSubAdministrator(Request $request)
    {

        $sid = 1;
        $setting['setting'] = Settings::editGeneral($sid);
        $site_max_image_size = $setting['setting']->site_max_image_size;
        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
        $user_type = $request->input('user_type');
        $password = bcrypt($request->input('password'));
        if (!empty($request->input('earnings'))) {
            $earnings = $request->input('earnings');
        } else {
            $earnings = 0;
        }
        $page_url = '/admin/sub-administrator';
        if (!empty($request->input('user_permission'))) {

            $user_permission = "";
            foreach ($request->input('user_permission') as $permission) {
                $user_permission .= $permission . ',';
            }
            $user_permissions = rtrim($user_permission, ",");

        } else {
            $user_permissions = "";
        }

        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'min:6',
            'email' => 'required|email',
            'user_photo' => 'mimes:jpeg,jpg,png|max:' . $site_max_image_size,

        ]);
        $rules = array(
            'username' => ['required', 'regex:/^[\w-]*$/', 'max:255', Rule::unique('users')->where(function ($sql) {$sql->where('drop_status', '=', 'no');})],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->where(function ($sql) {$sql->where('drop_status', '=', 'no');})],

        );

        $messsages = array(

        );

        $validator = Validator::make(Input::all(), $rules, $messsages);

        if ($validator->fails()) {
            $failedRules = $validator->failed();
            return back()->withErrors($validator);
        } else {

            if ($request->hasFile('user_photo')) {
                $image = $request->file('user_photo');
                $img_name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/storage/users');
                $imagePath = $destinationPath . "/" . $img_name;
                $image->move($destinationPath, $img_name);
                $user_image = $img_name;
            } else {
                $user_image = "";
            }
            $verified = 1;
            $token = $this->generateRandomString();

            $data = array('name' => $name, 'username' => $username, 'email' => $email, 'user_type' => $user_type, 'password' => $password, 'earnings' => $earnings, 'user_photo' => $user_image, 'verified' => $verified, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'user_token' => $token, 'user_permission' => $user_permissions);

            Members::insertData($data);
            return redirect($page_url)->with('success', 'Insert successfully.');

        }

    }

    public function editSubAdministrator($id)
    {
        $edit['userdata'] = User::find($id);
        
        return view('admin.edit-sub-administrator', compact('edit'));
    }

    public function updateSubAdministrator(Request $request, $id)
    {
        $sid = 1;
        $setting['setting'] = Settings::editGeneral($sid);
        $site_max_image_size = $setting['setting']->site_max_image_size;
        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
        $user_type = $request->input('user_type');
        if (!empty($request->input('password'))) {
            $password = bcrypt($request->input('password'));
            $pass = $password;
        } else {
            $pass = $request->input('save_password');
        }
        if (!empty($request->input('earnings'))) {
            $earnings = $request->input('earnings');
        } else {
            $earnings = 0;
        }
        $page_url = '/admin/sub-administrator';
        if (!empty($request->input('user_permission'))) {

            $user_permission = "";
            foreach ($request->input('user_permission') as $permission) {
                $user_permission .= $permission . ',';
            }
            $user_permissions = rtrim($user_permission, ",");

        } else {
            $user_permissions = "";
        }
        $token = $request->input('user_token');

        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'min:6',
            'email' => 'required|email',
            'user_photo' => 'mimes:jpeg,jpg,png|max:' . $site_max_image_size,

        ]);
        $rules = array(
            'username' => ['required', 'regex:/^[\w-]*$/', 'max:255', Rule::unique('users')->ignore($token, 'user_token')->where(function ($sql) {$sql->where('drop_status', '=', 'no');})],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($token, 'user_token')->where(function ($sql) {$sql->where('drop_status', '=', 'no');})],

        );

        $messsages = array(

        );

        $validator = Validator::make(Input::all(), $rules, $messsages);

        if ($validator->fails()) {
            $failedRules = $validator->failed();
            return back()->withErrors($validator);
        } else {

            if ($request->hasFile('user_photo')) {
                $image = $request->file('user_photo');
                $img_name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/storage/users');
                $imagePath = $destinationPath . "/" . $img_name;
                $image->move($destinationPath, $img_name);
                $user_image = $img_name;
            } else {
                $user_image = $request->input('save_photo');
            }
            $data = array('name' => $name, 'username' => $username, 'email' => $email, 'user_type' => $user_type, 'password' => $pass, 'earnings' => $earnings, 'user_photo' => $user_image, 'updated_at' => date('Y-m-d H:i:s'), 'user_permission' => $user_permissions);
            
            $isUpdated = User::where('id', $id)->update($data);
            
            return redirect($page_url)->with('success', 'Update successfully.');
        }
    }
    
    public function deleteSubAdministrator($id)
    {
        $isDeleted = User::where('id', $id)->update(['drop_status' => 'yes']);

        return redirect()->back()->with('success', 'Delete successfully.');
    }

    /* administrator */

    /* customer */

    public function customer()
    {
        $buyers = User::where('user_type','=','customer')->where('drop_status','=','no')->orderBy('id', 'desc')->get();

        return view('admin.customer', compact('buyers'));
    }

    public function add_customer()
    {

        return view('admin.add-customer');
    }

    public function save_customer(Request $request)
    {

        $sid = 1;
        $setting['setting'] = Settings::editGeneral($sid);
        $site_max_image_size = $setting['setting']->site_max_image_size;
        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
		$user_type = $request->input('user_type');
		$vendor_theme = $request->input('theme');
        $password = bcrypt($request->input('password'));
        $city = $request->input('city');
        
        if (!empty($request->input('earnings'))) {
            $earnings = $request->input('earnings');
        } else {
            $earnings = 0;
        }

        if ($user_type == 'customer') {
            $page_url = '/admin/customer';
        } else {
            $page_url = '/admin/vendor';
        }

        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'min:6',
            'email' => 'required|email',
            'user_photo' => 'mimes:jpeg,jpg,png|max:' . $site_max_image_size,
            'city' => 'required'
        ]);
        $rules = array(
            'username' => ['required', 'regex:/^[\w-]*$/', 'max:255', Rule::unique('users')->where(function ($sql) {$sql->where('drop_status', '=', 'no');})],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->where(function ($sql) {$sql->where('drop_status', '=', 'no');})],

        );

        $messsages = array(

        );

        $validator = Validator::make(Input::all(), $rules, $messsages);

        if ($validator->fails()) {
            $failedRules = $validator->failed();
            return back()->withErrors($validator);
        } else {

            if ($request->hasFile('user_photo')) {
                $image = $request->file('user_photo');
                $img_name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/storage/company-logo');
                $imagePath = $destinationPath . "/" . $img_name;
                $image->move($destinationPath, $img_name);
                $user_image = $img_name;
            } else {
                $user_image = "";
            }
            $verified = 1;
            $token = $this->generateRandomString();

            $data = array('name' => $name, 'username' => $username, 'email' => $email, 'user_type' => $user_type, 'vendor_theme' => $vendor_theme, 'password' => $password, 'city_id' => $city, 'earnings' => $earnings, 'company_logo' => $user_image, 'verified' => $verified, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'user_token' => $token);

            Members::insertData($data);
            return redirect($page_url)->with('success', 'Insert successfully.');

        }

    }

    public function delete_customer($token)
    {

        $data = array('drop_status' => 'yes');

        Members::deleteData($token, $data);

        return redirect()->back()->with('success', 'Delete successfully.');

    }

    public function edit_customer($token)
    {
        $edit['userdata'] = Members::editData($token);
        
        return view('admin.edit-customer', ['edit' => $edit, 'token' => $token]);
    }

    public function update_customer(Request $request)
    {
        $sid = 1;
        $setting['setting'] = Settings::editGeneral($sid);
        $site_max_image_size = $setting['setting']->site_max_image_size;
        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
        $mobile = $request->input('mobile');
		$user_type = $request->input('user_type');
		$city = $request->input('city');
		// $vendor_type = $request->input('vendor_type');

        if (!empty($request->input('password'))) {
            $password = bcrypt($request->input('password'));
            $pass = $password;
        } else {
            $pass = $request->input('save_password');
        }

        if (!empty($request->input('earnings'))) {
            $earnings = $request->input('earnings');
        } else {
            $earnings = 0;
        }

        if ($user_type == 'customer') {
            $page_url = '/admin/customer';
        } else {
            $page_url = '/admin/vendor';
        }

        $token = $request->input('edit_id');

        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'min:6',
            'email' => 'required|email',
            'user_photo' => 'mimes:jpeg,jpg,png,gif|max:' . $site_max_image_size,

        ]);
        $rules = array(
            'username' => ['required', 'regex:/^[\w-]*$/', 'max:255', Rule::unique('users')->ignore($token, 'user_token')->where(function ($sql) {$sql->where('drop_status', '=', 'no');})],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($token, 'user_token')->where(function ($sql) {$sql->where('drop_status', '=', 'no');})],

        );

        $messsages = array(

        );

        $validator = Validator::make(Input::all(), $rules, $messsages);

        if ($validator->fails()) {
            $failedRules = $validator->failed();
            return back()->withErrors($validator);
        } else {

            if ($request->hasFile('user_photo')) {

                Members::droPhoto($token);

                $image = $request->file('user_photo');
                $img_name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/storage/company-logo');
                $imagePath = $destinationPath . "/" . $img_name;
                $image->move($destinationPath, $img_name);
                $user_image = $img_name;
            } else {
                $user_image = $request->input('save_photo');
            }

            // $data = array('name' => $name, 'username' => $username, 'email' => $email, 'user_type' => $user_type, 'vendor_type' => $vendor_type, 'password' => $pass, 'earnings' => $earnings, 'user_photo' => $user_image, 'updated_at' => date('Y-m-d H:i:s'));
            $data = array('name' => $name, 'username' => $username, 'email' => $email, 'mobile' => $mobile, 'vendor_theme' => (!empty($request->theme) ? $request->theme : NULL), 'user_type' => $user_type, 'password' => $pass, 'city_id' => $city, 'earnings' => $earnings, 'company_logo' => $user_image, 'updated_at' => date('Y-m-d H:i:s'));

            $isUpdated = User::where('user_token', $token)->update($data);
            
            // Members::updateData($token, $data);
            return redirect($page_url)->with('success', 'Update successfully.');
        }
    }

    /* customer */
    
    public function addAccountManager(Request $request)
    {
        $user = User::find($request->user_id);
        $user->account_manager_name = $request->account_manager_name;
        $user->account_manager_email = $request->account_manager_email;
        $user->account_manager_mobile = $request->account_manager_mobile;
        $user->company_website = $request->company_website;
        $user->save();
        
        return redirect('admin/vendor')->with('success', 'Success! Account manager detail saved.');
    }
}

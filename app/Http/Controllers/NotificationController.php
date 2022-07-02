<?php

namespace ZigKart\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ZigKart\Models\Notification;
use ZigKart\User;

class NotificationController extends Controller
{
    //
    public function saveRequest(Request $request) {

        $notification  = new Notification;
        $notification->user_id = $request->user_id;
        $notification->vendor_id = $request->vendor_id;
        $notification->product_id = $request->product_id;
        $notification->quantity = $request->quantity;
        $notification->unit = $request->unit;
        $notification->payment_method = $request->payment_method;
        $notification->save();
        
        return response()->json(array(
			'code' => 200,
			'status' => 'success',
			'message' => 'We have received your request. You will be contacted shortly by our representative',
			'data' => $notification
		));
    }

    public function myNotifications() {
        $notifications = Notification::where(["vendor_id" => Auth::user()->id])->get();
        return view("my-notifications", [
            "notifications" => $notifications
        ]);
    }

    public function delete(Request $request, $id) {
        $notification = Notification::where(["id" => $id])->get();

        if($notification->count() > 0) {
            $notification->first()->delete();
            return redirect()->back()->with("success", "Notification deleted successfully!");
        }

        return redirect()->back()->with("error", "Notification cannot be deleted!");
    }
}

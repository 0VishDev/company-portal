<?php

namespace ZigKart\Http\Controllers\Admin;

use Illuminate\Http\Request;
use ZigKart\Http\Controllers\Controller;
use ZigKart\Models\Notification;

class InquiryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inquiries() {
        $inquirires = Notification::get();
        
        return view("admin.queries", compact('$inquirires'));
    }
}

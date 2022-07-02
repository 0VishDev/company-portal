<?php

namespace ZigKart\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use ZigKart\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        
    }

    public function index()
    {
        return view('vendor-dash.index');
    }
}

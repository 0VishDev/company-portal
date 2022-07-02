<?php

namespace ZigKart;

use ZigKart\Models\PackageTags;
use ZigKart\Models\Visitors;
use Mail;
use Carbon\Carbon;

class Helpers 
{
    public static function joinString($str)
    {
        $str = str_replace('&', '$$', $str);
        $str = str_replace('/', '##', $str);
        $str = implode('-', explode(' ', $str));
         
        return $str;
    }
    
    public static function splitString($str)
    {
        // $str = str_replace('$$', '&', $str);
        // $str = str_replace('##', '/', $str);
        // $str = implode(' ', explode('-', $str));
         
        return $str;
    }
    
    public static function getPackage($userId){
        $packageTag = PackageTags::where('user_id', $userId)->first();
        
        $serviceProvider = (!empty($packageTag) ? $packageTag->service_provider : array());
            
        return $serviceProvider;
    }
    
    public static function sendMail($to, $view, $subject, $data = array(), $fromEmail = 'inquiry@businessworldtrade.com', $fromName = 'businessworldtrade.com') {

		Mail::send($view, $data, function ($message) use ($to, $fromEmail, $fromName, $subject, $data) {
			$message->to($to);
			$message->from($fromEmail, $fromName);
			$message->subject($subject);
		});

		if (count(Mail::failures()) > 0) {
			return 0;
		} else {
			return 1;
		}
	}
	
	public static function createRandomString($lengthString){
        // String of all alphanumeric character 
        $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
      
        // Shufle the $str_result and returns substring 
        // of specified length 
        return substr(str_shuffle($str_result), 0, $lengthString); 
    }
    
    public static function addVisitor($userId = 0){
        $ipAddress = \Request::ip();
        
        $query = Visitors::query();
        
        if($userId != 0){
            $query = $query->where('user_id', $userId);
        }
    
        $visitor = $query->where('visit_ip_address', $ipAddress)->first();
        
        if(!empty($visitor)){
            $visitor->visit_count = $visitor->visit_count + 1;
        }else{
            $visitor = new Visitors;
            $visitor->visit_ip_address = $ipAddress;
            $visitor->visit_count = 1;
            $visitor->user_id = $userId;
        }
        
        $visitor->visit_time = Carbon::now();
        $visitor->visit_device = $_SERVER['HTTP_USER_AGENT'];
        $visitor->save();
    
        return $visitor->id;
    }
}

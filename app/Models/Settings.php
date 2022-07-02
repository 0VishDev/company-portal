<?php

namespace ZigKart\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class Settings extends Model
{

    /* settings */

    public static function editGeneral($sid)
    {
        $value = self::where('sid', '1')->first();
        
        return $value;
    }

    public static function updategeneralData($sid, $data)
    {
        DB::table('settings')
            ->where('sid', 1)
            ->update($data);
    }

    public static function dropFavicon($sid)
    {
        $image = DB::table('settings')->where('sid', 1)->first();
        $file = $image->site_favicon;
        $filename = public_path() . '/storage/settings/' . $file;
        File::delete($filename);
    }

    public static function dropLogo($sid)
    {
        $image = DB::table('settings')->where('sid', 1)->first();
        $file = $image->site_logo;
        $filename = public_path() . '/storage/settings/' . $file;
        File::delete($filename);
    }

    public static function dropBanner($sid)
    {
        $image = DB::table('settings')->where('sid', 1)->first();
        $file = $image->site_header_background;
        $filename = public_path() . '/storage/settings/' . $file;
        File::delete($filename);
    }

    public static function dropFoot($sid)
    {
        $image = DB::table('settings')->where('sid', 1)->first();
        $file = $image->site_footer_logo;
        $filename = public_path() . '/storage/settings/' . $file;
        File::delete($filename);
    }

    public static function dropLoader($sid)
    {
        $image = DB::table('settings')->where('sid', 1)->first();
        $file = $image->site_loader_image;
        $filename = public_path() . '/storage/settings/' . $file;
        File::delete($filename);
    }

    public static function dropAboutbanner($sid)
    {
        $image = DB::table('settings')->where('sid', 1)->first();
        $file = $image->site_about_image;
        $filename = public_path() . '/storage/settings/' . $file;
        File::delete($filename);
    }

    public static function dropPaymentbanner($sid)
    {
        $image = DB::table('settings')->where('sid', 1)->first();
        $file = $image->site_footer_payment;
        $filename = public_path() . '/storage/settings/' . $file;
        File::delete($filename);
    }

    public static function dropmorebanner($sid)
    {
        $image = DB::table('settings')->where('sid', 1)->first();
        $file = $image->site_more_category;
        $filename = public_path() . '/storage/settings/' . $file;
        File::delete($filename);
    }

    public static function updatemailData($sid, $data)
    {
        DB::table('settings')
            ->where('sid', $sid)
            ->update($data);
    }

    public static function droponebanner($sid)
    {
        $image = DB::table('settings')->where('sid', 1)->first();
        $file = $image->site_banner_one;
        $filename = public_path() . '/storage/settings/' . $file;
        File::delete($filename);
    }

    public static function droptwobanner($sid)
    {
        $image = DB::table('settings')->where('sid', 1)->first();
        $file = $image->site_banner_two;
        $filename = public_path() . '/storage/settings/' . $file;
        File::delete($filename);
    }

    public static function dropthreebanner($sid)
    {
        $image = DB::table('settings')->where('sid', 1)->first();
        $file = $image->site_banner_three;
        $filename = public_path() . '/storage/settings/' . $file;
        File::delete($filename);
    }

    public static function dropImage($column)
    {
        $image = DB::table('settings')->where('sid', 1)->first();
        $file = $image->$column;
        $filename = public_path() . '/storage/settings/' . $file;
        File::delete($filename);
    }

    /* settings */

    /* all settings */

    public static function allSettings()
    {
        $value = DB::table('settings')
            ->where('sid', 1)
            ->first();
        return $value;
    }

    /* all settings */

    /* country */

    public static function getcountryData()
    {

        $value = DB::table('country')->orderBy('country_name', 'asc')->get();
        return $value;

    }

    public static function savecountryData($data)
    {

        DB::table('country')->insert($data);

    }

    public static function deleteCountrydata($cid)
    {

        DB::table('country')->where('country_id', '=', $cid)->delete();

    }

    public static function editCountry($cid)
    {
        $value = DB::table('country')
            ->where('country_id', $cid)
            ->first();
        return $value;
    }

    public static function updatecountryData($cid, $data)
    {
        DB::table('country')
            ->where('country_id', $cid)
            ->update($data);
    }

    public static function allCountry()
    {
        $value = DB::table('country')
            ->orderBy('country_name', 'asc')
            ->get();
        return $value;
    }






    /* state */

    public static function getstateData()
    {

        $value = DB::table('state')->join('country', 'state.country_id', '=', 'country.country_id')->orderBy('state_name', 'asc')->get();
        return $value;

    }

    public static function savestateData($data)
    {

        DB::table('state')->insert($data);

    }

    public static function deleteStatedata($cid)
    {

        $state = DB::table('state')->where('id', '=', $cid)->first();
        if(!is_null($state->state_image) || $state->state_image == '') {
            $file= $state->state_image;
            $filename = public_path().'/'.$file;
            File::delete($filename); 
        }
        DB::table('state')->where('id', '=', $cid)->delete();
    }

    public static function editState($cid)
    {
        $value = DB::table('state')
            ->where('id', $cid)
            ->first();
        return $value;
    }

    public static function updatestateData($cid, $data)
    {
        DB::table('state')
            ->where('id', $cid)
            ->update($data);
    }

    public static function allState()
    {
        $value = DB::table('state')
            ->join('country', 'state.country_id', '=', 'country.country_id')
            ->orderBy('state_name', 'asc')
            ->get();
        return State::hydrate($value->toArray());
	}
	




    /* city */

    public static function getcityData()
    {

        $value = DB::table('city')
                    ->join('country', 'city.country_id', '=', 'country.country_id')
                    ->join('state', 'city.state_id', '=', 'state.id')
                    ->orderBy('city_name', 'asc')
                    ->select(['city.*', 'country.*', 'state.state_name', 'state.id as state_id'])
                    ->get();
        return $value;

    }

    public static function savecityData($data)
    {

        DB::table('city')->insert($data);

    }

    public static function deleteCitydata($cid)
    {

        DB::table('city')->where('id', '=', $cid)->delete();

    }

    public static function editCity($cid)
    {
        $value = DB::table('city')
            ->where('id', $cid)
            ->first();
        return $value;
    }

    public static function updatecityData($cid, $data)
    {
        DB::table('city')
            ->where('id', $cid)
            ->update($data);
    }

    public static function allCity()
    {
        $value = DB::table('city')
                    ->join('country', 'city.country_id', '=', 'country.country_id')
                    ->join('state', 'city.state_id', '=', 'state.id')
                    ->orderBy('city_name', 'asc')
                    ->get();
        return $value;
    }

}

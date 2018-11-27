<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class AdsController extends Controller
{
    public function index(){
		$data['categories'] = DB::table('cms_categories')->paginate(10);
		return view('ads.index', $data);
	}
	
	public function adDetails($page=null){
		$data['page'] = $page;
		return view('ads.details', $data);
	}
	
	public function changeBanner($banner_id, $image_id){
		
		$count = DB::table('ads')->where('banner_id', $banner_id)->count();
		if($count > 0)
		{
			$count = DB::table('ads')->where('banner_id', $banner_id)->update(
				[
					'previous_image_id'=> DB::raw( 'image_id' ),
					'image_id'=>$image_id,
				]
			);
		}
	}
	
	public function uploadBanner(Request $request){
		
		if($request->photo){
            $file_extension = $request->file('photo')->guessExtension();
            $photo_file_name = "banner_".time().".".$file_extension;
            $request->file('photo')->move('public/images/assets', $photo_file_name);
            
        }
		DB::table('ads')->where('banner_id', $request->banner_id)->update([
			'page' => strtolower($request->banner_page),
			'external_link' => $request->external_link,
			'banner_name' => $request->banner_name,
			'image_id' => $photo_file_name,
		]);
		
		return strtolower($request->banner_page);
	}
	
	public function undoBanner($banner_id, $image_id){
		
		DB::table('ads')->where('banner_id', $banner_id)->update(
				[
					'image_id'=> DB::raw( 'previous_image_id' ),
				]
			);
	}
}

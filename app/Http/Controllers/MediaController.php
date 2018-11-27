<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Image;

class MediaController extends Controller
{
    public function index(){
		$data['images'] = DB::table('images')->orderBy('id', 'desc')->paginate(10);
		return view('media.index', $data);
	}
	
	public function addMedia(){
		$data['images'] = DB::table("images")->orderBy('id', 'desc')->take(5)->get();
		$data['file_types'] = DB::table("file_types")->get();
		return view('media.add', $data);
	}
	
	public function submitMedia(Request $request)
	{	
		if($request->featured_image){
            $file_extension = $request->file('featured_image')->guessExtension();
            $file_name = "featured_images_".time().".".$file_extension;
            $request->file('featured_image')->move('public/images/assets', $file_name);

        }else{
            $file_name = "";
        }
		DB::table('images')->insert(
			[
				'title' => $request->title,
				'file_type' => $request->file_type,
				'external_link' => $request->external_link,
				'file_name' => $file_name,
			]
		);
		
	}
	
	public function viewMedia($id)
	{
		$data['image'] = DB::table('images')->where('id', $id)->get();
		return view('media.details', $data);
	}
	
	
	
	public function editMedia($id)
	{
		$data['image'] = DB::table('images')->where('id', $id)->get();
		$data['file_types'] = DB::table("file_types")->get();
		return view('media.edit', $data);
	}
	
	public function editMediaSubmit(Request $request)
	{
		$media = Image::find($request->id);
		$media->title = $request->title;
		$media->file_type = $request->file_type;
		$media->external_link = $request->external_link;
		if($request->featured_image){
            $file_extension = $request->file('featured_image')->guessExtension();
            $file_name = "featured_images_".time().".".$file_extension;
            $request->file('featured_image')->move('public/images/assets', $file_name);

            $media->file_name = $file_name;
        }
		$media->save();
		
	}
	
	
	
	public function removeMedia($id)
	{
		DB::table('images')->where('id', $id)->delete();
	}
	
}

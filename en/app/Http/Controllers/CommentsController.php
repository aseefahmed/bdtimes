<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class CommentsController extends Controller
{
    public function index()
	{
		$data['comments'] = DB::table('comments')->orderBy('id', 'desc')->paginate(10);
		return view('comments.index', $data);
	}
	
	public function removeComment($id, $flag)
	{
		DB::table('comments')->where('id', $id)->update([
			'flag' => $flag //deleted
		]);
	}

	public function sendReply(Request $request){
		
		if(isset(Auth::user()->id)){
			$user_id = Auth::user()->id;
		}
		else{
			$user_id = 0;

		}
		DB::table('comment_replies')->insert([
			'comment_id' => $request->comment_id,
			'user_id' => $user_id,
			'news_id' => $request->news_id,
			'reply_text' => $request->reply_txt,
		]);
		return $request->news_id;
	}
	
	public function submitComment(Request $request){
		
		if(isset( Auth::user()->id )){
			$user_id = Auth::user()->id;
		}
		else {
			$user_id = 0;
		}
		$date = Date('Y-m-d H:i:s');
		
		$data['date'] = $date;
		$data['details'] = $request->details;
		if(isset(Auth::user()->id))
		{
			if(Auth::user()->image != "")
				$profile_image = "public/images/profiles/".Auth::user()->image;
			else 
				$profile_image = "public/images/no_image.png";
			$name = Auth::user()->first_name." ".Auth::user()->last_name;
		}
		else 
		{
			$profile_image = "public/assets/img/single-news-item-imgs/profile.png";
			$name = "Anonymous User";
		}
		$data['profile_image'] = $profile_image;
		$data['name'] = $name;
		$data['commentator'] = $request->details;
		DB::table('comments')->insert([
			'details' => $request->details,
			'user_id' => $user_id,
			'news_id' => $request->news_id,
			'flag' => 0,	
			'created_at' => $date
		]);
		
		return $request->news_id;
	}
}

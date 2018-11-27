<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Poll;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PollsController extends Controller
{
	
	public function index(){
		$data['polls'] = DB::table('polls')->orderBy('id', 'desc')->paginate(10);
		return view('polls.index', $data);
	}
    public function addPolls()
    {
    	return view('polls.add');
    }
	
	public function submitPolls(Request $request){
		$poll = new Poll();
		$poll->id = time();
		$poll->question = $request->question;
		$poll->language = $request->language;
		$poll->ip_address = $_SERVER['REMOTE_ADDR'];
		$poll->flag = $request->flag;
		
		if($request->featured_image){
			$file_extension = $request->file('featured_image')->guessExtension();
			$file_name = "featured_images_".time().".".$file_extension;
			$request->file('featured_image')->move('public/images/polls/featured', $file_name);

			$poll->featured_image = $file_name;
		}else{
			$file_name = "";
		}
		$poll->save();
	}
	
	public function editPolls($id)
	{
		$data['poll'] = DB::table('polls')->where('polls.id', $id)->select('polls.*')->get();
		return view('polls.edit', $data);
	}
	
	public function editPollSubmit(Request $request)
	{
		$poll = Poll::find($request->id);
		$poll->question = $request->question;
		$poll->language = $request->language;
		$poll->ip_address = $_SERVER['REMOTE_ADDR'];
		$poll->flag = $request->flag;
		
		if($request->featured_image){
			$file_extension = $request->file('featured_image')->guessExtension();
			$file_name = "featured_images_".time().".".$file_extension;
			$request->file('featured_image')->move('public/images/polls/featured', $file_name);

			$poll->featured_image = $file_name;
		}
		$poll->save();
	}
	
	
	
	public function removePoll($id)
	{
		DB::table('polls')->where('id', $id)->delete();
	}
	
	public function giveVote(Request $request){
		
		$count = DB::table('poll_participators')->where('poll_id', $request->poll_id)->where('ip_address', $request->ip_address)->count();
		if($count == 0)
		{
			if($request->myvote =="yes")
			{
				 DB::table('polls')->where('poll_id', $request->poll_id)->increment('yes_vote');
			}
			else if($request->myvote == "no")
			{
				DB::table('polls')->where('id', $request->poll_id)->increment('no_vote');
			}
			else if($request->myvote == "nocomment")
			{
				DB::table('polls')->where('id', $request->poll_id)->increment('no_comments_vote');
			}
			
			DB::table('poll_participators')->insert([
				'poll_id' => $request->poll_id,
				'ip_address' => $request->ip_address,
			]);
		}
		else {
			return -1;
		}
	}
	
	public function showVotesResult(){
		if(!isset($month)){
			$data['selected_date'] = Date('dS M, Y');
			$data['newslist'] = DB::table('news')->orderBy('id', 'desc')->paginate(20);
		}
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->take(3)->get();
		$data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
		$data['poll'] = DB::table('polls')->where('flag', '1')->orderBy('id', 'desc')->take(1)->get();
		$data['top_news'] = DB::table('news')->take(10)->orderBy('total_views', 'desc')->get();
		$data['most_commented'] = DB::table('news')->orderBy('total_comments', 'desc')->take(10)->get();
		$data['polls_list'] = DB::table('polls')->where('flag', 1)->where('created_at', '<', Date('Y-m-d')." 00:00:00")->orderBy('id', 'desc')->paginate(20);
		return view('frontend.polls_result', $data);
	}
}

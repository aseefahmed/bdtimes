<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class DashboardController extends Controller
{
	
    
    public function viewDashboard()
    {
   

		$data= Array();
        if(Auth::user()->role == 4){
			$data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
			$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->take(3)->get();
			$data['news_list'] = DB::table('news')->join('cms_categories', 'cms_categories.id', '=', 'news.category_id')->where('created_by', Auth::user()->id)->orderBy('news.id', 'desc')
			->select('news.title', 'news.id', 'news.created_at', 'cms_categories.category_name', 'news.featured_image', 'news.flag')->paginate(10);
            $categories=DB::table('cms_categories')->where([
                ['status', '=', 1],
                ['link', '<>', ''],
            ])->get();
            session(['cat' => $categories]);
			return view('admin.user_dashboard', $data);
		}
		else{
			$data['total_news'] = DB::table('news')->where('flag', '1')->count();
			$data['total_comments'] = DB::table('comments')->count();
			$data['total_visitors'] = DB::table('news_views')->distinct()->count(['ip_address']);
			$data['total_categories'] = DB::table('cms_categories')->count();
			$data['total_news_posted'] = DB::table('news')->where('flag', 1)->count();
			$data['total_comments_posted'] = DB::table('comments')->where('flag', 2)->count();
			$data['total_ads'] = DB::table('ads')->count();
			$data['polls'] = DB::table('polls')->orderBy('id', 'desc')->where('flag', 1)->take(1)->get();
			$data['popular_categories'] = DB::table('cms_categories')->orderBy('total_views')->take(5)->select('category_name')->get();
			$data['employees'] = DB::table('users')->where('role', 3)->get();
			return view('admin.dashboard', $data);
		}
    }
}

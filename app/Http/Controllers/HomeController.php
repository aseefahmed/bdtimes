<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Session;
class HomeController extends Controller
{
    public function viewHomePage()
    {
        $count = 0;
        //$data['menus'] = DB::table('cms_categories')->get();
        $data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
        $data['poll'] = DB::table('polls')->where('flag', '1')->orderBy('id', 'desc')->take(1)->get();
        $data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->where('language', 'bangla')->orderBy('id', 'desc')->take(3)->get();
        $data['latest_news'] = DB::table('latest_news')->join('news', 'news.id', '=','latest_news.news_id')->where('language', 'bangla')->select('news.id', 'news.category_id', 'featured_image', 'news.title', 'news.details', 'news.short_description')->orderBy('news.id', 'desc')->get();
        $data['apnaar_lekha'] = DB::table('latest_news')->join('news', 'news.id', '=','latest_news.news_id')->where('language', 'bangla')->select('news.id', 'news.category_id', 'featured_image', 'news.title', 'news.details', 'news.short_description')->where('news.category_id', 27)->orderBy('news.id', 'desc')->get();
        $data['aayna'] = DB::table('latest_news')->join('news', 'news.id', '=','latest_news.news_id')->where('language', 'bangla')->select('news.id', 'news.category_id', 'featured_image', 'news.title', 'news.details', 'news.short_description')->where('news.category_id', 19)->orderBy('news.id', 'desc')->get();
        $data['video_reporting'] = DB::table('news')->where('vedio_link', '<>', '')->orderBy('id', 'desc')->take(4)->get();
        $data['sports'] = DB::table('news')->where('category_id', '7')->orderBy('id', 'desc')->take(4)->get();
        $data['kids'] = DB::table('news')->where('parent_cat_id', '145')->orderBy('id', 'desc')->take(4)->get();
        /* $data['images'] = DB::table('images')->get();
        $data['shapes'] = DB::table('images')->where('file_type', '!=', '')->distinct()->get(['file_type']);
         */
        //echo "<pre>";print_r($data['latest_news']);

        //$count = count($data['breaking_news'])+count($data['latest_news'])+count($data['apnaar_lekha'])+count($data['aayna'])+count($data['video_reporting']);
        $count = count($data['breaking_news'])+count($data['latest_news'])+count($data['video_reporting']);
        //dd(count($data['video_reporting']));
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        if($count == 0 )
            return redirect('error');
        return view('frontend.index', $data);
    }
    
    public function setLanguage($language, $page){
        Session::put('language', $language);
		if($page == 'home')
			return redirect('/');
		else
			return redirect('category/'.$page);
    }
}

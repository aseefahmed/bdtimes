<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class ApisController extends Controller
{
    public function initializeData(){
		$data['menus'] = DB::table('cms_categories')->get();
		$data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->take(3)->get();
		$data['latest_news'] = DB::table('latest_news')->join('news', 'news.id', '=','latest_news.news_id')->orderBy('news.created_at', 'desc')->get();
		return $data;
	}
	
	public function getCategoryDetails($category){
		$data['category'] = DB::table('cms_categories')->where('label', $category)->get();
		$data['all_news'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')
								->join('cms_categories', 'cms_categories.id', '=','news_types.category_id')
								//->where('label', $category)
								->get();
		return $data;
	}
	
	public function getNewsDetails($id){
		$data['news_details'] = DB::table('news')->where('id', $id)->get();
		$data['popular_news'] = DB::table('news')->orderBy('created_at')->take(21)->get();
		return $data;
	}
	
	public function getImages(){
		$data['images'] = DB::table('images')->get();
		$data['shapes'] = DB::table('images')->where('file_type', '!=', '')->distinct()->get(['file_type']);
		return $data;
	}
}

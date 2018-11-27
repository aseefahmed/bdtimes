<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\CmsCategory;
use App\Http\Requests;
use Session;
class CategoriesController extends Controller
{
	
    public function index()
    {
		$data['catagories'] = DB::table('cms_categories')->paginate(10);
    	return view('categories.index', $data);
    }
	
	public function removeCat($id)
	{
		DB::table('cms_categories')->where('id', $id)->delete();
	}
	
	public function seachSubCategory($parent_cat){
		$count = DB::table('cms_categories')->where('parent_category_id', $parent_cat)->count();
		$data['parent_category'] = $parent_cat;
		$data['sub_categories'] = DB::table('cms_categories')->where('parent_category_id', $parent_cat)->get();
		if($count > 0)
			return view('ajax_views.sub_categories', $data);
		else 
			return -1;
	}
	public function getNationalPage(){
		$local = checkLanguage();
		$local = "english";
		

		$data['ads'] = DB::table('ads')->where('page', 'national')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->where('news.language', $local)->take(3)->get();
		$data['national_breaking_news'] = DB::table('news')->where('category_id', '1')->where('news.language', $local)->where('is_breaking_news', '1')->orderBy('id', 'desc')->take(3)->get();
		$data['national_vedios'] = DB::table('news')->where('category_id', 1)->where('news.language', $local)->where('vedio_link', '!=', '')->orderBy('id', 'desc')->take(3)->get();
		$data['all_news'] = DB::table('news')->where('news.category_id', 1)
								->where('news.language', $local)
								->where('is_breaking_news', '!=', '1')
								->orderBy('news.id', 'desc')
								->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image')
								->get();
		$count = count($data['national_breaking_news'])+count($data['national_vedios'])+count($data['all_news']);
		
		if($count == 0 )
			return redirect('error');
			
		return view('frontend.national', $data);
	}

    public function getInternationalPage(){
		$local = checkLanguage();
		$local = "english";
		$data['ads'] = DB::table('ads')->where('page', 'international')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->where('news.language', $local)->take(3)->get();
		$data['internation_breaking_news'] = DB::table('news')->whereIn('category_id', [2,24, 25, 26, 28])->where('news.language', $local)->where('is_breaking_news', '1')->orderBy('id', 'desc')->take(3)->get();
		$data['internation_vedios'] = DB::table('news')->whereIn('category_id', [2,24, 25, 26, 28])->where('news.language', $local)->where('vedio_link', '!=', '')->orderBy('id', 'desc')->take(3)->get();
		$data['internation_recent'] = DB::table('news')->whereIn('category_id', [2,24, 25, 26, 28])->where('news.language', $local)->where('is_breaking_news', '')->orderBy('id', 'desc')->take(2)->get();
		$data['internation_middleeast'] = DB::table('news')->where('category_id', '28')->where('news.language', $local)->orderBy('id', 'desc')->take(8)->get();
		$data['internation_northamerica'] = DB::table('news')->where('category_id', '24')->where('news.language', $local)->orderBy('id', 'desc')->take(8)->get();
		$data['internation_europe'] = DB::table('news')->where('category_id', '25')->where('news.language', $local)->orderBy('id', 'desc')->take(3)->get();
		$data['internation_asia'] = DB::table('news')->where('category_id', '26')->where('news.language', $local)->orderBy('id', 'desc')->take(22)->get();
		
		$count = count($data['internation_breaking_news'])+
					count($data['internation_vedios'])+
					count($data['internation_recent'])+
					count($data['internation_middleeast'])+
					count($data['internation_northamerica'])+
					count($data['internation_europe'])+
					count($data['internation_asia']);
		

		/*if(count($data['internation_breaking_news']) < 8 || 
			count($data['internation_vedios']) < 8 || 
			count($data['internation_recent']) < 8 || 
			count($data['internation_middleeast']) < 8 || 
			count($data['internation_northamerica']) < 8 || 
			count($data['internation_europe']) < 8 || 
			count($data['internation_asia']) < 8){
			return redirect('error');	
		}	*/
		if($count == 0 )
			return redirect('error');

		return view('frontend.international', $data);
	}

    public function getProbashPage(){
		$local = checkLanguage();
		$local = "english";
    	
		$data['ads'] = DB::table('ads')->where('page', 'probash')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->take(3)->get();
		$data['probash_breaking_news'] = DB::table('news')->where('category_id', '2')->where('is_breaking_news', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->where('news.language', $local)->get();
		$data['probash_recent'] = DB::table('news')->where('category_id', '2')->where('is_breaking_news', '')->orderBy('id', 'desc')->take(2)->where('news.language', $local)->get();
		$data['probash_vedios'] = DB::table('news')->whereIn('category_id', [2,24, 25, 26, 28])->where('vedio_link', '!=', '')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_jibon_jibika'] = DB::table('news')->where('category_id', '2')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_sromobazar'] = DB::table('news')->where('category_id', '2')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_jonoshokti'] = DB::table('news')->where('category_id', '2')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_remitence'] = DB::table('news')->where('category_id', '2')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_hashikanna'] = DB::table('news')->where('category_id', '2')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_jibon'] = DB::table('news')->where('category_id', '2')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		

		$count = count($data['probash_recent'])+
					count($data['probash_breaking_news'])+
					count($data['probash_vedios'])+
					count($data['probash_jibon_jibika'])+
					count($data['probash_sromobazar'])+
					count($data['probash_jonoshokti'])+
					count($data['probash_remitence'])+
					count($data['probash_hashikanna'])+
					count($data['probash_jibon']);

		

		/*if(count($data['probash_recent']) < 8 || 
			count($data['probash_breaking_news']) < 8 || 
			count($data['probash_vedios']) < 8 || 
			count($data['probash_jibon_jibika']) < 8 || 
			count($data['probash_sromobazar']) < 8 || 
			count($data['probash_jonoshokti']) < 8 || 
			count($data['probash_remitence']) < 8 || 
			count($data['probash_hashikanna']) < 8 || 
			count($data['probash_jibon']) < 8){
			return redirect('error');	
		}	*/
	
			return redirect('error');

		return view('frontend.probash', $data);
	}

    public function getNreegoshthiPage(){
		$local = checkLanguage();		
		$local = "english";
		$data['ads'] = DB::table('ads')->where('page', 'nrigoshthi')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->take(3)->where('news.language', $local)->get();
		$data['probash_breaking_news'] = DB::table('news')->where('category_id', '2')->where('is_breaking_news', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_recent'] = DB::table('news')->where('category_id', '2')->where('is_breaking_news', '')->orderBy('id', 'desc')->take(2)->where('news.language', $local)->get();
		$data['probash_vedios'] = DB::table('news')->whereIn('category_id', [2,24, 25, 26, 28])->where('vedio_link', '!=', '')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_jibon_jibika'] = DB::table('news')->where('category_id', '2')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_sromobazar'] = DB::table('news')->where('category_id', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_jonoshokti'] = DB::table('news')->where('category_id', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_remitence'] = DB::table('news')->where('category_id', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_hashikanna'] = DB::table('news')->where('category_id', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_jibon'] = DB::table('news')->where('category_id', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		


		$count = count($data['probash_recent'])+
					count($data['probash_breaking_news'])+
					count($data['probash_vedios'])+
					count($data['probash_jibon_jibika'])+
					count($data['probash_sromobazar'])+
					count($data['probash_jonoshokti'])+
					count($data['probash_remitence'])+
					count($data['probash_hashikanna'])+
					count($data['probash_jibon']);

		/*if(count($data['probash_recent']) < 8 || 
			count($data['probash_breaking_news']) < 8 || 
			count($data['probash_vedios']) < 8 || 
			count($data['probash_jibon_jibika']) < 8 || 
			count($data['probash_sromobazar']) < 8 || 
			count($data['probash_jonoshokti']) < 8 || 
			count($data['probash_remitence']) < 8 || 
			count($data['probash_hashikanna']) < 8 || 
			count($data['probash_jibon']) < 8){
			return redirect('error');	
		}	*/

			return redirect('error');
		return view('frontend.nreegoshthi', $data);
	}

    public function getHistoryPage(){
		$local = checkLanguage();
		$local = "english";
		$data['ads'] = DB::table('ads')->where('page', 'history')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->take(3)->where('news.language', $local)->get();
		$data['probash_breaking_news'] = DB::table('news')->where('category_id', '2')->where('is_breaking_news', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_recent'] = DB::table('news')->where('category_id', '2')->where('is_breaking_news', '')->orderBy('id', 'desc')->take(2)->where('news.language', $local)->get();
		$data['probash_vedios'] = DB::table('news')->whereIn('category_id', [2,24, 25, 26, 28])->where('vedio_link', '!=', '')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_jibon_jibika'] = DB::table('news')->where('category_id', '2')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_sromobazar'] = DB::table('news')->where('category_id', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_jonoshokti'] = DB::table('news')->where('category_id', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_remitence'] = DB::table('news')->where('category_id', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_hashikanna'] = DB::table('news')->where('category_id', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_jibon'] = DB::table('news')->where('category_id', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		

		$count = count($data['probash_recent'])+
					count($data['probash_breaking_news'])+
					count($data['probash_vedios'])+
					count($data['probash_jibon_jibika'])+
					count($data['probash_sromobazar'])+
					count($data['probash_jonoshokti'])+
					count($data['probash_remitence'])+
					count($data['probash_hashikanna'])+
					count($data['probash_jibon']);

		/*if(count($data['probash_recent']) < 8 || 
			count($data['probash_breaking_news']) < 8 || 
			count($data['probash_vedios']) < 8 || 
			count($data['probash_jibon_jibika']) < 8 || 
			count($data['probash_sromobazar']) < 8 || 
			count($data['probash_jonoshokti']) < 8 || 
			count($data['probash_remitence']) < 8 || 
			count($data['probash_hashikanna']) < 8 || 
			count($data['probash_jibon']) < 8){
			return redirect('error');	
		}*/
		
			return redirect('error');	
		return view('frontend.history', $data);
	}

    public function getUthanBoithokPage(){
		$local = checkLanguage();
		$local = "english";
		$data['ads'] = DB::table('ads')->where('page', 'probash')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->take(3)->where('news.language', $local)->get();
		$data['uthan_news'] = DB::table('news')->where('category_id', '2')->where('is_breaking_news', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['uthan_recent'] = DB::table('news')->where('category_id', '2')->where('is_breaking_news', '')->orderBy('id', 'desc')->take(2)->where('news.language', $local)->get();
		$data['probash_vedios'] = DB::table('news')->whereIn('category_id', [2,24, 25, 26, 28])->where('vedio_link', '!=', '')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_jibon_jibika'] = DB::table('news')->where('category_id', '2')->orderBy('id', 'desc')->take(1)->where('news.language', $local)->get();
		$data['probash_sromobazar'] = DB::table('news')->where('category_id', '1')->orderBy('id', 'desc')->take(1)->where('news.language', $local)->get();
		$data['probash_jonoshokti'] = DB::table('news')->where('category_id', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_remitence'] = DB::table('news')->where('category_id', '1')->orderBy('id', 'desc')->take(1)->where('news.language', $local)->get();
		$data['probash_hashikanna'] = DB::table('news')->where('category_id', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_jibon'] = DB::table('news')->where('category_id', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		


		$count = count($data['uthan_recent'])+
					count($data['probash_vedios'])+
					count($data['probash_jibon_jibika'])+
					count($data['probash_sromobazar'])+
					count($data['probash_jonoshokti'])+
					count($data['probash_remitence'])+
					count($data['probash_hashikanna'])+
					count($data['probash_jibon']);


		/*if(count($data['uthan_recent']) < 8 || 
			count($data['probash_vedios']) < 8 || 
			count($data['probash_jibon_jibika']) < 8 || 
			count($data['probash_sromobazar']) < 8 || 
			count($data['probash_jonoshokti']) < 8 || 
			count($data['probash_remitence']) < 8 || 
			count($data['probash_hashikanna']) < 8 || 
			count($data['probash_jibon']) < 8){
			return redirect('error');	
		}	*/	

			return redirect('error');
		return view('frontend.uthan_boithok', $data);
	}

    public function getIslamicPage(){
		$local = checkLanguage();
		$local = "english";
		$data['ads'] = DB::table('ads')->where('page', 'probash')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->take(3)->where('news.language', $local)->get();
		$data['uthan_news'] = DB::table('news')->where('category_id', '2')->where('is_breaking_news', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['uthan_recent'] = DB::table('news')->where('category_id', '2')->where('is_breaking_news', '')->orderBy('id', 'desc')->take(2)->where('news.language', $local)->get();
		$data['probash_vedios'] = DB::table('news')->whereIn('category_id', [2,24, 25, 26, 28])->where('vedio_link', '!=', '')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_jibon_jibika'] = DB::table('news')->where('category_id', '2')->orderBy('id', 'desc')->take(1)->where('news.language', $local)->get();
		$data['probash_sromobazar'] = DB::table('news')->where('category_id', '1')->orderBy('id', 'desc')->take(1)->where('news.language', $local)->get();
		$data['probash_jonoshokti'] = DB::table('news')->where('category_id', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_remitence'] = DB::table('news')->where('category_id', '1')->orderBy('id', 'desc')->take(1)->where('news.language', $local)->get();
		$data['probash_hashikanna'] = DB::table('news')->where('category_id', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_jibon'] = DB::table('news')->where('category_id', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		
		
			return redirect('error');
		return view('frontend.islamic', $data);
	}

	public function getTravelPage(){
		$local = checkLanguage();
		$local = "english";
		$data['ads'] = DB::table('ads')->where('page', 'travel')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->take(3)->where('news.language', $local)->get();
		$data['travel_news'] = DB::table('news')->where('category_id', '20')->where('is_breaking_news', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['travel_recent'] = DB::table('news')->where('category_id', '20')->where('is_breaking_news', '')->orderBy('id', 'desc')->take(2)->where('news.language', $local)->get();
		$data['travel_vedios'] = DB::table('news')->whereIn('category_id', [20, 78, 79, 80, 82, 83, 84, 85, 86, 87])->where('vedio_link', '!=', '')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['travel_droshonio'] = DB::table('news')->where('category_id', '78')->orderBy('id', 'desc')->take(9)->where('news.language', $local)->get();
		$data['travel_time_bus'] = DB::table('news')->where('category_id', '79')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
		$data['travel_time_train'] = DB::table('news')->where('category_id', '80')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
		$data['travel_time_biman'] = DB::table('news')->where('category_id', '82')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
		$data['travel_time_lunch'] = DB::table('news')->where('category_id', '83')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
		$data['travel_tips'] = DB::table('news')->where('category_id', '84')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
		$data['travel_kothay'] = DB::table('news')->where('category_id', '85')->orderBy('id', 'desc')->take(9)->where('news.language', $local)->get();
		$data['travel_exp'] = DB::table('news')->where('category_id', '86')->orderBy('id', 'desc')->take(6)->where('news.language', $local)->get();
		$data['travel_bibid'] = DB::table('news')->where('category_id', '87')->orderBy('id', 'desc')->take(9)->where('news.language', $local)->get();
		
		$data['all_news'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')
								//->join('cms_categories', 'cms_categories.id', '=','news_types.category_id')
								->where('news_types.category_id', 20)
								->orderBy('news.id', 'desc')
								->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image')
								->where('news.language', $local)->get();
			

		$count = count($data['travel_news'])+
					count($data['travel_recent'])+
					count($data['travel_vedios'])+
					count($data['travel_droshonio'])+
					count($data['travel_time_bus'])+
					count($data['travel_time_train'])+
					count($data['travel_time_biman'])+
					count($data['travel_time_lunch'])+
					count($data['travel_tips'])+
					count($data['travel_kothay'])+
					count($data['travel_exp'])+
					count($data['travel_bibid']);

		

		/*if(count($data['travel_news']) < 8 || 
			count($data['travel_recent']) < 8 || 
			count($data['travel_vedios']) < 8 || 
			count($data['travel_droshonio']) < 8 || 
			count($data['travel_time_bus']) < 8 || 
			count($data['travel_time_train']) < 8 || 
			count($data['travel_time_biman']) < 8 || 
			count($data['travel_tips']) < 8 || 
			count($data['travel_kothay']) < 8 || 
			count($data['travel_exp']) < 8 || 
			count($data['travel_bibid']) < 8 ){
			return redirect('error');	
		}	*/
		if($count == 0 )
			return redirect('error');	

		return view('frontend.travel', $data);
	}

	
    public function getSciencePage(){
		$local = checkLanguage();
		$local = "english";
		$data['ads'] = DB::table('ads')->where('page', 'science')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->take(3)->where('news.language', $local)->get();
		$data['science_news'] = DB::table('news')->where('category_id', '9')->where('is_breaking_news', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['science_recent'] = DB::table('news')->where('category_id', '2')->where('is_breaking_news', '')->orderBy('id', 'desc')->take(2)->where('news.language', $local)->get();
		$data['science_vedios'] = DB::table('news')->whereIn('category_id', [9, 60, 63, 64, 65, 66, 68, 69, 70, 71])->where('vedio_link', '!=', '')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['science_apps'] = DB::table('news')->where('category_id', '60')->orderBy('id', 'desc')->take(13)->where('news.language', $local)->get();
		$data['science'] = DB::table('news')->where('category_id', '63')->orderBy('id', 'desc')->take(10)->where('news.language', $local)->get();
		$data['science_outsourcing'] = DB::table('news')->where('category_id', '64')->orderBy('id', 'desc')->take(10)->where('news.language', $local)->get();
		$data['science_ecommerce'] = DB::table('news')->where('category_id', '65')->orderBy('id', 'desc')->take(10)->where('news.language', $local)->get();
		$data['science_chakri'] = DB::table('news')->where('category_id', '71')->orderBy('id', 'desc')->take(10)->where('news.language', $local)->get();
		$data['science_training'] = DB::table('news')->where('category_id', '66')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
		$data['science_mobile'] = DB::table('news')->where('category_id', '68')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
		$data['science_awareness'] = DB::table('news')->where('category_id', '69')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
			
		$count = count($data['science_news'])+
					count($data['science_recent'])+
					count($data['science_vedios'])+
					count($data['science_apps'])+
					count($data['science'])+
					count($data['science_outsourcing'])+
					count($data['science_ecommerce'])+
					count($data['science_training'])+
					count($data['science_awareness'])+
					count($data['science_mobile']);

		/*if(count($data['science_news']) < 8 || 
			count($data['science_recent']) < 8 || 
			count($data['science_vedios']) < 8 || 
			count($data['science_apps']) < 8 || 
			count($data['science_outsourcing']) < 8 || 
			count($data['science_training']) < 8 || 
			count($data['science_awareness']) < 8 || 
			count($data['science_ecommerce']) < 8 ){
			return redirect('error');	
		}*/
		if($count == 0 )
			return redirect('error');
		

		return view('frontend.science', $data);
	}
	
	public function getHealthPage(){
		$local = checkLanguage();
		$local = "english";
		//$data['menus'] = DB::table('cms_categories')->get();
		
		$data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->take(3)->get();
		$data['latest_news'] = DB::table('latest_news')->join('news', 'news.id', '=','latest_news.news_id')->orderBy('news.created_at', 'desc')->where('news.language', $local)->get();
		//$data['images'] = DB::table('images')->get();
		//$data['shapes'] = DB::table('images')->where('file_type', '!=', '')->distinct()->get(['file_type']);
		
		////$data['category'] = DB::table('cms_categories')->where('label', 'national')->get();
		$data['all_news'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')
								//->join('cms_categories', 'cms_categories.id', '=','news_types.category_id')
								->where('news_types.category_id', 1)
								->orderBy('news.id', 'desc')
								->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image')
								->where('news.language', $local)->get();
		
		$count = count($data['all_news']);

		if($count < 60 )
			return redirect('error');					
		return view('frontend.health', $data);
	}

    public function getEconomicsPage(){
		$local = checkLanguage();
		$local = "english";
		$data['ads'] = DB::table('ads')->where('page', 'economics')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->take(3)->where('news.language', $local)->get();
		$data['economics_news'] = DB::table('news')->where('category_id', '3')->where('is_breaking_news', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['economics_recent'] = DB::table('news')->where('category_id', '3')->where('is_breaking_news', '')->orderBy('id', 'desc')->take(7)->where('news.language', $local)->get();
		$data['economics_vedios'] = DB::table('news')->whereIn('category_id', [3, 30, 31, 35])->where('vedio_link', '!=', '')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['economics_shilpo'] = DB::table('news')->where('category_id', '30')->orderBy('id', 'desc')->take(13)->where('news.language', $local)->get();
		$data['economics_sharebazar'] = DB::table('news')->where('category_id', '31')->orderBy('id', 'desc')->take(5)->where('news.language', $local)->get();
		$data['economics_international'] = DB::table('news')->where('category_id', '35')->orderBy('id', 'desc')->take(13)->where('news.language', $local)->get();
			
		$data['all_news'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')
								//->join('cms_categories', 'cms_categories.id', '=','news_types.category_id')
								->where('news_types.category_id', 3)
								->orderBy('news.id', 'desc')
								->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image', 'news_types.sub_category_id')
								->where('news.language', $local)->get();
		
		$count = count($data['economics_news'])+
					count($data['economics_recent'])+
					count($data['economics_vedios'])+
					count($data['economics_shilpo'])+
					count($data['economics_sharebazar'])+
					count($data['economics_international']);

		/*if(count($data['economics_news']) < 8 || 
			count($data['economics_recent']) < 8 || 
			count($data['economics_vedios']) < 8 || 
			count($data['economics_shilpo']) < 8 || 
			count($data['economics_sharebazar']) < 8 || 
			count($data['economics_international']) < 8 ){
			return redirect('error');	
		}*/
		if($count == 0 )
			return redirect('error');
			

		return view('frontend.economics', $data);
	}

	

    public function getPoliticsPage(){
		$local = checkLanguage();
		$local = "english";
		$data['ads'] = DB::table('ads')->where('page', 'politics')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->take(3)->where('news.language', $local)->get();
		$data['all_news'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')
								->where('news_types.category_id', 6)
								->orderBy('news.id', 'desc')
								->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image')
								->where('news.language', $local)->get();
		
		$count = count($data['all_news']);

		/*if($count < 60)
			return redirect('error');*/

		if($count == 0 )
			return redirect('error');
		return view('frontend.politics', $data);
	}

    public function getCrimePage(){
		$local = checkLanguage();
		$local = "english";
		$data['ads'] = DB::table('ads')->where('page', 'crime')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->take(3)->where('news.language', $local)->get();
		$data['all_news'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')
								->where('news_types.category_id', 11)
								->orderBy('news.id', 'desc')
								->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image')
								->where('news.language', $local)->get();
								

		$count = count($data['all_news']);

		/*if($count < 60)
			return redirect('error');	
				*/
		if($count == 0 )
			return redirect('error');
		return view('frontend.crime', $data);
	}
	
    public function getVediosPage(){
		$local = checkLanguage();
		$local = "english";
		//$data['menus'] = DB::table('cms_categories')->get();
		$data['ads'] = DB::table('ads')->where('page', 'vedio')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->take(3)->where('news.language', $local)->get();
		//$data['latest_news'] = DB::table('latest_news')->join('news', 'news.id', '=','latest_news.news_id')->orderBy('news.created_at', 'desc')->get();
		//$data['images'] = DB::table('images')->get();
		//$data['shapes'] = DB::table('images')->where('file_type', '!=', '')->distinct()->get(['file_type']);
		
		////$data['category'] = DB::table('cms_categories')->where('label', 'national')->get();
		$data['all_news'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')
								//->join('cms_categories', 'cms_categories.id', '=','news_types.category_id')
								->where('news_types.category_id', 3)
								->orderBy('news.id', 'desc')
								->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image', 'news_types.sub_category_id')
								->where('news.language', $local)->get();
		$data['video_reporting'] = DB::table('news')->where('category_id', '136')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();						
		$data['video_tech'] = DB::table('news')->where('category_id', '137')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();						
		$data['video_tips'] = DB::table('news')->where('category_id', '144')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();						
		$data['video_programme'] = DB::table('news')->where('category_id', '139')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();						
		$data['video_boithokkhana'] = DB::table('news')->where('category_id', '140')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();						
		$data['video_itihash'] = DB::table('news')->where('category_id', '141')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();						
		$data['video_nrigoshthi'] = DB::table('news')->where('category_id', '143')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();						
		$data['video_apnar'] = DB::table('news')->where('category_id', '142')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();						
		return view('frontend.video_gallary', $data);
	}

    public function getEntertainmentPage(){
		$local = checkLanguage();
		$local = "english";
		//$data['menus'] = DB::table('cms_categories')->get();
		$data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->take(3)->where('news.language', $local)->get();
		//$data['latest_news'] = DB::table('latest_news')->join('news', 'news.id', '=','latest_news.news_id')->orderBy('news.created_at', 'desc')->get();
		//$data['images'] = DB::table('images')->get();
		//$data['shapes'] = DB::table('images')->where('file_type', '!=', '')->distinct()->get(['file_type']);
		
		//$data['category'] = DB::table('cms_categories')->where('label', 'national')->get();
		$data['all_news'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')
								//->join('cms_categories', 'cms_categories.id', '=','news_types.category_id')
								->where('news_types.category_id', 5)
								->orderBy('news.id', 'desc')
								->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image', 'news_types.sub_category_id')
								->where('news.language', $local)->get();
								

		$count = count($data['all_news']);

		/*if($count < 60)
			return redirect('error');*/
		if($count == 0 )
			return redirect('error');
		return view('frontend.entertainment', $data);
	}

    public function getEducationPage(){
		$local = checkLanguage();
		$local = "english";
		//$data['menus'] = DB::table('cms_categories')->get();
		$data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->take(3)->where('news.language', $local)->get();
		//$data['latest_news'] = DB::table('latest_news')->join('news', 'news.id', '=','latest_news.news_id')->orderBy('news.created_at', 'desc')->get();
		//$data['images'] = DB::table('images')->get();
		//$data['shapes'] = DB::table('images')->where('file_type', '!=', '')->distinct()->get(['file_type']);
		
		//$data['category'] = DB::table('cms_categories')->where('label', 'national')->get();
		$data['all_news'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')
								//->join('cms_categories', 'cms_categories.id', '=','news_types.category_id')
								->where('news_types.category_id', 8)
								->orderBy('news.id', 'desc')
								->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image', 'news_types.sub_category_id')
								->where('news.language', $local)->get();
		
		$count = count($data['all_news']);
/*
		if($count < 60 )
			return redirect('error');*/
		if($count == 0 )
			return redirect('error');

		return view('frontend.education', $data);
	}

   

    public function getLifestylesPage(){
		$local = checkLanguage();
		$local = "english";
		//$data['menus'] = DB::table('cms_categories')->get();
		$data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->take(3)->where('news.language', $local)->get();
		//$data['latest_news'] = DB::table('latest_news')->join('news', 'news.id', '=','latest_news.news_id')->orderBy('news.created_at', 'desc')->get();
		//$data['images'] = DB::table('images')->get();
		//$data['shapes'] = DB::table('images')->where('file_type', '!=', '')->distinct()->get(['file_type']);
		
		//$data['category'] = DB::table('cms_categories')->where('label', 'national')->get();
		$data['all_news'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')
								//->join('cms_categories', 'cms_categories.id', '=','news_types.category_id')
								->where('news_types.category_id', 20)
								->orderBy('news.id', 'desc')
								->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image')
								->where('news.language', $local)->get();
		$count = count($data['all_news']);

		if($count < 60 )
			return redirect('error');						
		return view('frontend.lifestyle', $data);
	}


    public function getLegalPage(){
		$local = checkLanguage();
		$local = "english";
		//$data['menus'] = DB::table('cms_categories')->get();
		$data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->take(3)->where('news.language', $local)->get();
		//$data['latest_news'] = DB::table('latest_news')->join('news', 'news.id', '=','latest_news.news_id')->orderBy('news.created_at', 'desc')->get();
		//$data['images'] = DB::table('images')->get();
		//$data['shapes'] = DB::table('images')->where('file_type', '!=', '')->distinct()->get(['file_type']);
		
		//$data['category'] = DB::table('cms_categories')->where('label', 'national')->get();
		$data['all_news'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')
								//->join('cms_categories', 'cms_categories.id', '=','news_types.category_id')
								->where('news_types.category_id', 20)
								->orderBy('news.id', 'desc')
								->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image')
								->where('news.language', $local)->get();
		$count = count($data['all_news']);

		if($count < 60 )
			return redirect('error');						
		return view('frontend.legal_aid', $data);
	}

    public function addCategories()
    {
		$data['categories'] = DB::table('cms_categories')->get();
    	return view('categories.add', $data);
    }
	
	public function editCat($id)
	{
		
		$data['category'] = DB::table('cms_categories')->where('id', $id)->get();
		
		$data['categories'] = DB::table('cms_categories')->get();
		return view('categories.edit', $data);
	}
	
	public function editCatSubmit(Request $request)
	{
		DB::table('cms_categories')->where('id', $request->cat_id)->update([
			'category_name' => $request->category_name,
			'parent_category_id' => $request->parent_category_id,
			'label' => $request->label
		]);
	
	}
	
	public function submitCategories(Request $request)
	{
		DB::table('cms_categories')->insert([
			'category_name' => $request->category_name,
			'label' => strtolower($request->label),
			'parent_category_id' => $request->parent_category_id
		]);
		
	}
}
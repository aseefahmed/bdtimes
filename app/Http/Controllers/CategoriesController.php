<?php

namespace App\Http\Controllers;

use App\District;
use App\Division;
use App\News;
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

    public function menu()
    {
        $data['menus'] = DB::table('cms_categories')->where('parent_category_id',0)->paginate(10);
        return view('categories.menu', $data);
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
			//return view('ajax_views.sub_categories', $data);
		else 
			return -1;
	}
    public function searchdistrict($parent_div){
        //dd($parent_div);
        $count = DB::table('districts')->where('division_id', $parent_div)->count();
        //dd($count);
        $data['parent_div'] = $parent_div;
        $data['districts'] = DB::table('districts')->where('division_id', $parent_div)->get();
        //dd(count( $data['districts']));

        if($count > 0)
            return view('ajax_views.districts', $data);
        else
            return -1;
    }

    public function searchdistrictforancolik($parent_div){
        //dd($parent_div);
        $count = DB::table('districts')->where('division_id', $parent_div)->count();
        //dd($count);
        $data['parent_div'] = $parent_div;
        $data['districts'] = DB::table('districts')->where('division_id', $parent_div)->get();
        //dd(count( $data['districts']));

        if($count > 0)
            return view('ajax_views.districtsforancolik', $data);
        else
            return -1;
    }

    public function searchupazila($parent_dis){
        //dd($parent_dis);
        $count = DB::table('upazilas')->where('district_id', $parent_dis)->count();
        //dd($count);
        $data['parent_dis'] = $parent_dis;
        $data['upazilas'] = DB::table('upazilas')->where('district_id', $parent_dis)->get();
        //dd(count( $data['upazilas']));

        if($count > 0)
            return view('ajax_views.upazilas', $data);
        else
            return -1;
    }

    public function searchupazilasforancolik($parent_dis){
        //dd($parent_dis);
        $count = DB::table('upazilas')->where('district_id', $parent_dis)->count();
        //dd($count);
        $data['parent_dis'] = $parent_dis;
        $data['upazilas'] = DB::table('upazilas')->where('district_id', $parent_dis)->get();
        //dd(count( $data['upazilas']));

        if($count > 0)
            return view('ajax_views.upazilasforancolik', $data);
        else
            return -1;
    }


    public function getdivision(){
        //$data['divisions']= District::all();
        $data['divisions'] = Division::all();

        if(count($data['divisions']) > 0)
            return view('ajax_views.divisions', $data);
        else
            return -1;
    }


    public function getNationalPage(){
        $local = "bangla";
        $data['ads'] = DB::table('ads')->where('page', 'national')->orderBy('id', 'asc')->get();
        $data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->where('flag',1)->where('news.language', $local)->take(3)->get();
        $data['national_breaking_news'] = DB::table('news')->where('category_id', '1')->where('flag',1)->where('news.language', $local)->where('is_breaking_news', '1')->orderBy('id', 'desc')->take(3)->get();
        $data['national_vedios'] = DB::table('news')->where('category_id', 1)->where('flag',1)->where('news.language', $local)->where('vedio_link', '!=', '')->orderBy('id', 'desc')->take(3)->get();
        $data['all_news'] = DB::table('news')->where('news.category_id', 1)
            ->where('news.language', $local)
            ->where('is_breaking_news', '!=', '1')
            ->where('flag',1)
            ->orderBy('news.id', 'desc')
            ->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image')
            ->get();

        $data['ancolik_news'] = DB::table('news')
            ->join('nationalnewstags', 'news.id', '=', 'nationalnewstags.news_id')
            ->select('news.*', 'nationalnewstags.*')
            ->get();

        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);

        $count = count($data['national_breaking_news'])+count($data['national_vedios'])+count($data['all_news']);

        if($count == 0 )
            return redirect('error');
        return view('frontend.national', $data);
    }

    public function getMoreNationalPage(){
        $local = "bangla";
        $data['ads'] = DB::table('ads')->where('page', 'national')->orderBy('id', 'asc')->get();

        $data['morenews']= DB::table('news')->where('category_id',1)->where('flag',1)->where('news.language', $local)->orderBy('id', 'desc')->paginate(20);
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        $count = count($data['morenews']);

        if($count == 0 )
            return redirect('error');
        return view('frontend.morenews', $data);
    }

    public function getAncolikPage(){
        $local = "bangla";
        //$data['menus'] = DB::table('cms_categories')->get();
        $data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();

        $data['all_news']= DB::table('news')
            ->join('nationalnewstags', 'news.id', '=', 'nationalnewstags.news_id')
            ->select('news.*', 'nationalnewstags.*')
            ->get();

        //dd(count($data['all_news']));
        $data['divisions']= DB::table('divisions')->get();

        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();

        session(['cat' => $categories]);
        $count = count($data['all_news']);
        if($count == 0 )
            return redirect('error');
        return view('frontend.ancolik', $data);
    }




    public function getJobsPage(){
    $local = "bangla";
    $data['ads'] = DB::table('ads')->where('page', 'national')->orderBy('id', 'asc')->get();

    $data['morenews']= DB::table('news')->where('category_id',4)->where('flag',1)->where('news.language', $local)->orderBy('id', 'desc')->paginate(10);
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
    $count = count($data['morenews']);

    if($count == 0 )
        return redirect('error');
    return view('frontend.morenews', $data);
}


    public function getYouthPage(){
        $local = "bangla";
        $data['ads'] = DB::table('ads')->where('page', 'national')->orderBy('id', 'asc')->get();

        $data['youth_news']= DB::table('news')->where('category_id',16)->where('flag',1)->where('news.language', $local)->orderBy('id', 'desc')->get();
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        $count = count($data['youth_news']);

        if($count == 0 )
            return redirect('error');
        return view('frontend.youth', $data);
    }


    public function getBuyAndSellPage(){
        $local = "bangla";
        $data['ads'] = DB::table('ads')->where('page', 'national')->orderBy('id', 'asc')->get();

        $data['buyandsell']= DB::table('news')->where('category_id',18)->where('flag',1)->where('news.language', $local)->orderBy('id', 'desc')->get();
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        $count = count($data['buyandsell']);

        if($count == 0 )
            return redirect('error');
        return view('frontend.buyandsell', $data);
    }



    public function getInternationalPage(){
		$local = "bangla";
		$data['ads'] = DB::table('ads')->where('page', 'international')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->where('flag',1)->where('news.language', $local)->take(3)->get();
		$data['internation_breaking_news'] = DB::table('news')->whereIn('category_id', [2,24, 25, 26, 28])->where('flag',1)->where('news.language', $local)->where('is_breaking_news', '1')->orderBy('id', 'desc')->take(3)->get();
		$data['internation_vedios'] = DB::table('news')->whereIn('category_id', [2,24, 25, 26, 28])->where('news.language', $local)->where('flag',1)->where('vedio_link', '!=', '')->orderBy('id', 'desc')->take(3)->get();
		$data['internation_recent'] = DB::table('news')->whereIn('category_id', [2,24, 25, 26, 28])->where('news.language', $local)->where('flag',1)->where('is_breaking_news', '')->orderBy('id', 'desc')->take(2)->get();
		$data['internation_middleeast'] = DB::table('news')->where('category_id', '28')->where('news.language', $local)->where('flag',1)->orderBy('id', 'desc')->take(8)->get();
		$data['internation_northamerica'] = DB::table('news')->where('category_id', '24')->where('flag',1)->where('news.language', $local)->orderBy('id', 'desc')->take(8)->get();
		$data['internation_europe'] = DB::table('news')->where('category_id', '25')->where('flag',1)->where('news.language', $local)->orderBy('id', 'desc')->take(3)->get();
		$data['internation_asia'] = DB::table('news')->where('category_id', '26')->where('flag',1)->where('news.language', $local)->orderBy('id', 'desc')->take(22)->get();
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
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

    public function getMoreInternationalPage(){
        $local = "bangla";
        $data['ads'] = DB::table('ads')->where('page', 'international')->orderBy('id', 'asc')->get();
        $data['morenews']= DB::table('news')->where('category_id',2)->where('flag',1)->where('news.language', $local)->orderBy('id', 'desc')->paginate(20);
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        $count= count($data['morenews']);

        if($count == 0 )
            return redirect('error');

        return view('frontend.morenews', $data);
    }

    public function getProbashPage(){
		$local = "bangla";
    	
		$data['ads'] = DB::table('ads')->where('page', 'probash')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->where('flag',1)->take(3)->get();
		$data['probash_breaking_news'] = DB::table('news')->where('category_id', '124')->where('flag',1)->where('is_breaking_news', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->where('news.language', $local)->get();
		$data['probash_recent'] = DB::table('news')->where('parent_cat_id', '124')->where('flag',1)->where('is_breaking_news', '')->orderBy('id', 'desc')->take(2)->where('news.language', $local)->get();
		//$data['probash_vedios'] = DB::table('news')->where('parent_cat_id', 124)->where('vedio_link', '<>', '')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
        $data['probash_vedios'] = DB::table('news')->where('parent_cat_id', 124)->where('flag',1)->where('news.language', $local)->where('vedio_link', '!=', '')->orderBy('id', 'desc')->take(3)->get();
        //dd(count($data['probash_vedios']));
		//$data['probash_jibon_jibika'] = DB::table('news')->where('category_id', '128')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_sromobazar'] = DB::table('news')->where('category_id', '125')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_jonoshokti'] = DB::table('news')->where('category_id', '129')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_remitence'] = DB::table('news')->where('category_id', '126')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_hashikanna'] = DB::table('news')->where('category_id', '127')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['probash_jibon'] = DB::table('news')->where('category_id', '128')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();

        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
		$count = count($data['probash_recent'])+
					count($data['probash_breaking_news'])+
					count($data['probash_vedios'])+
					count($data['probash_sromobazar'])+
					count($data['probash_jonoshokti'])+
					count($data['probash_remitence'])+
					count($data['probash_hashikanna'])+
					count($data['probash_jibon']);

		

        //dd($count);
		if($count == 0 )
			return redirect('error');

		return view('frontend.probash', $data);
	}


    public function getMoreProbashPage(){
        $local = "bangla";

        $data['ads'] = DB::table('ads')->where('page', 'probash')->orderBy('id', 'asc')->get();
        $data['morenews'] = DB::table('news')->where('parent_cat_id', '124')->where('flag',1)->orderBy('id', 'desc')->where('news.language', $local)->paginate(10);
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        $count = count($data['morenews']);

        if($count == 0 )
            return redirect('error');

        return view('frontend.morenews', $data);
    }



    public function getWomenPage(){
        $local = "bangla";
        $data['ads'] = DB::table('ads')->where('page', 'national')->orderBy('id', 'asc')->get();
        $data['women_breaking_news'] = DB::table('news')->where('category_id', '17')->where('flag',1)->where('news.language', $local)->take(3)->get();
        //$data['women_breaking_news'] = DB::table('news')->where('category_id', '17')->where('news.language', $local)->where('is_breaking_news', '1')->orderBy('id', 'desc')->take(3)->get();
        $data['video_reporting'] = DB::table('news')->where('category_id', 17)->where('flag',1)->where('news.language', $local)->where('vedio_link', '<>', '')->orderBy('id', 'desc')->take(3)->get();
        $data['all_news'] = DB::table('news')->where('news.category_id', 17)
            ->where('news.language', $local)
            ->where('is_breaking_news', '!=', '1')
            ->where('flag',1)
            ->orderBy('news.id', 'desc')
            ->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image')
            ->get();
        $data['joyita']=DB::table('news')->where('category_id', 52)->where('flag',1)->where('news.language', $local)->orderBy('id', 'desc')->take(3)->get();
        $data['corporate']=DB::table('news')->where('category_id', 53)->where('flag',1)->where('news.language', $local)->orderBy('id', 'desc')->take(3)->get();
        $data['lifestyle']=DB::table('news')->where('category_id', 54)->where('flag',1)->where('news.language', $local)->orderBy('id', 'desc')->take(2)->get();
        $data['beautytips']=DB::table('news')->where('category_id', 55)->where('flag',1)->where('news.language', $local)->orderBy('id', 'desc')->take(3)->get();
        $data['kitchen']=DB::table('news')->where('category_id', 56)->where('flag',1)->where('vedio_link','<>','')->where('news.language', $local)->orderBy('id', 'desc')->take(3)->get();
        $data['untoldstory']=DB::table('news')->where('category_id', 77)->where('flag',1)->where('news.language', $local)->orderBy('id', 'desc')->take(3)->get();
        $data['victimsupport']=DB::table('news')->where('category_id', 58)->where('flag',1)->where('news.language', $local)->orderBy('id', 'desc')->take(3)->get();
        //$count = count($data['national_breaking_news'])+count($data['national_vedios'])+count($data['all_news']);
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        //if($count == 0 )
          //  return redirect('error');
        return view('frontend.women', $data);
    }


    public function getMoreWomenPage(){
        $local = "bangla";

        $data['ads'] = DB::table('ads')->where('page', 'national')->orderBy('id', 'asc')->get();
        $data['morenews'] = DB::table('news')->where('category_id', '17')->where('flag',1)->orderBy('id', 'desc')->where('news.language', $local)->paginate(10);
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        $count = count($data['morenews']);
        //dd($count);
        if($count == 0 )
            return redirect('error');

        return view('frontend.morenews', $data);
    }

    public function getRashiPage(){
        $local = "bangla";
        $data['ads'] = DB::table('ads')->where('page', 'national')->orderBy('id', 'asc')->get();
        $data['rashi_news'] = DB::table('news')->where('category_id', '10')->where('flag',1)->where('news.language', $local)->orderBy('id', 'desc')->get();
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        $count = count($data['rashi_news']);

        if($count < 0 )
            return redirect('error');
        return view('frontend.rashi', $data);
    }

    public function getCartoonPage(){
        $local = "bangla";
        $data['ads'] = DB::table('ads')->where('page', 'national')->orderBy('id', 'asc')->get();
        $data['cartoon_news'] = DB::table('news')->where('category_id', '21')->where('flag',1)->where('news.language', $local)->orderBy('id', 'desc')->get();
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        $count = count($data['cartoon_news']);

        if($count < 0 )
            return redirect('error');
        return view('frontend.cartoon', $data);
    }

    public function getCulturePage(){
        $local = "bangla";
        $data['ads'] = DB::table('ads')->where('page', 'national')->orderBy('id', 'asc')->get();
        $data['culture_news'] = DB::table('news')->where('category_id', '13')->where('flag',1)->where('news.language', $local)->orderBy('id', 'desc')->take(3)->get();
        $data['all_news'] = DB::table('news')->where('news.parent_cat_id', 13)
            ->where('news.language', $local)
            ->where('is_breaking_news', '!=', '1')
            ->where('flag',1)
            ->orderBy('news.id', 'desc')
            ->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image')
            ->get();
        $data['video_reporting'] = DB::table('news')->where('category_id', 13)->where('flag',1)->where('news.language', $local)->where('vedio_link', '<>', '')->orderBy('id', 'desc')->take(3)->get();

        $data['golpo']=DB::table('news')->where('category_id', 149)->where('flag',1)->where('news.language', $local)->orderBy('id', 'desc')->take(3)->get();
        $data['childculture']=DB::table('news')->where('category_id', 150)->where('flag',1)->where('news.language', $local)->orderBy('id', 'desc')->take(3)->get();
        $data['translation']=DB::table('news')->where('category_id', 151)->where('flag',1)->where('news.language', $local)->orderBy('id', 'desc')->take(3)->get();
        $data['poem']=DB::table('news')->where('category_id', 152)->where('flag',1)->where('news.language', $local)->orderBy('id', 'desc')->take(3)->get();
        $data['interview']=DB::table('news')->where('category_id', 153)->where('flag',1)->where('news.language', $local)->orderBy('id', 'desc')->take(3)->get();
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        $count = count($data['culture_news'])+count($data['golpo'])+count($data['childculture']);

        if($count < 0 )
            return redirect('error');
        return view('frontend.culture', $data);
    }

    public function getMoreCulturePage(){
        $local = "bangla";

        $data['ads'] = DB::table('ads')->where('page', 'national')->where('flag',1)->orderBy('id', 'asc')->get();
        $data['morenews'] = DB::table('news')->where('parent_cat_id', '13')->orderBy('id', 'desc')->where('news.language', $local)->paginate(10);
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        $count = count($data['morenews']);
        //dd($count);
        if($count == 0 )
            return redirect('error');

        return view('frontend.morenews', $data);
    }

    public function getNreegoshthiPage(){
        $local = "bangla";
        $data['ads'] = DB::table('ads')->where('page', 'history')->orderBy('id', 'asc')->get();
        $data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->where('flag',1)->take(3)->where('news.language', $local)->get();
        $data['nreegoshthi_breaking_news'] = DB::table('news')->where('parent_cat_id', '118')->where('flag',1)->where('is_breaking_news', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
        $data['nreegoshthi_recent'] = DB::table('news')->where('parent_cat_id', '118')->where('flag',1)->where('is_breaking_news', '')->orderBy('id', 'desc')->take(2)->where('news.language', $local)->get();
        $data['nreegoshthi_vedios'] = DB::table('news')->where('parent_cat_id', '118')->where('flag',1)->where('vedio_link', '!=', '')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
        //dd(count($data['history_vedios']));
        $data['life_living'] = DB::table('news')->where('category_id', '119')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
        $data['problem'] = DB::table('news')->where('category_id', '120')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
        $data['possibility'] = DB::table('news')->where('category_id', '121')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
        $data['food_habit'] = DB::table('news')->where('category_id', '122')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
        $data['ritual_event'] = DB::table('news')->where('category_id', '123')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);

        $count = count($data['nreegoshthi_recent'])+
            count($data['nreegoshthi_breaking_news'])+
            count($data['nreegoshthi_vedios'])+
            count($data['life_living'])+
            count($data['problem'])+
            count($data['possibility'])+
            count($data['food_habit'])+
            count($data['ritual_event']);
            //dd($count);

        //if($count == 0 )
          //  return redirect('error');
		return view('frontend.nreegoshthi', $data);
	}


    public function getMoreNreegoshthiPage(){
        $local = "bangla";
        $data['ads'] = DB::table('ads')->where('page', 'national')->orderBy('id', 'asc')->get();

        $data['morenews']= DB::table('news')->where('parent_cat_id',118)->where('flag',1)->where('news.language', $local)->orderBy('id', 'desc')->paginate(10);
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        $count = count($data['morenews']);

        if($count == 0 )
            return redirect('error');
        return view('frontend.morenews', $data);
    }

    public function getHistoryPage(){
		$local = "bangla";
		$data['ads'] = DB::table('ads')->where('page', 'history')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->where('flag',1)->take(3)->where('news.language', $local)->get();
		$data['history_breaking_news'] = DB::table('news')->where('parent_cat_id', '95')->where('flag',1)->where('is_breaking_news', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['history_recent'] = DB::table('news')->where('parent_cat_id', '95')->where('flag',1)->where('is_breaking_news', '')->orderBy('id', 'desc')->take(2)->where('news.language', $local)->get();
		$data['history_vedios'] = DB::table('news')->where('parent_cat_id', '95')->where('flag',1)->where('vedio_link', '!=', '')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		//dd(count($data['history_vedios']));
		$data['historical_place'] = DB::table('news')->where('category_id', '96')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['sthapona'] = DB::table('news')->where('category_id', '97')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['silpokormo'] = DB::table('news')->where('category_id', '98')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['lost_tradition'] = DB::table('news')->where('category_id', '99')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['rural_culture'] = DB::table('news')->where('category_id', '101')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['rural_sports'] = DB::table('news')->where('category_id', '100')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();

        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
		$count = count($data['history_recent'])+
					count($data['history_breaking_news'])+
					count($data['history_vedios'])+
					count($data['historical_place'])+
					count($data['sthapona'])+
					count($data['silpokormo'])+
					count($data['lost_tradition'])+
					count($data['rural_culture'])+
					count($data['rural_sports']);


		if($count == 0 )
			return redirect('error');	
		return view('frontend.history', $data);
	}


    public function getMoreHistoryPage(){
        $local = "bangla";
        $data['ads'] = DB::table('ads')->where('page', 'history')->orderBy('id', 'asc')->get();
        $data['morenews'] = DB::table('news')->where('parent_cat_id', '95')->where('flag',1)->orderBy('id', 'desc')->where('news.language', $local)->paginate(10);

        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        $count = count($data['morenews']);
        if($count == 0 )
            return redirect('error');
        return view('frontend.morenews', $data);
    }

    public function getUthanBoithokPage(){
		$local = "bangla";
		$data['ads'] = DB::table('ads')->where('page', 'probash')->orderBy('id', 'asc')->get();
        $data['uthan_breaking_news'] = DB::table('news')->where('parent_cat_id', '88')->where('flag',1)->where('is_breaking_news', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
        $data['uthan_news'] = DB::table('news')->where('category_id', '88')->where('flag',1)->where('is_breaking_news', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['uthan_recent'] = DB::table('news')->where('parent_cat_id', '88')->where('flag',1)->where('is_breaking_news', '')->orderBy('id', 'desc')->take(2)->where('news.language', $local)->get();
		$data['uthan_vedios'] = DB::table('news')->where('parent_cat_id', '88')->where('flag',1)->where('vedio_link', '!=', '')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['early_marriage'] = DB::table('news')->where('category_id', '89')->where('flag',1)->orderBy('id', 'desc')->take(1)->where('news.language', $local)->get();
		$data['women_education'] = DB::table('news')->where('category_id', '90')->where('flag',1)->orderBy('id', 'desc')->take(1)->where('news.language', $local)->get();
		$data['health_service'] = DB::table('news')->where('category_id', '91')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['e_info_service'] = DB::table('news')->where('category_id', '92')->where('flag',1)->orderBy('id', 'desc')->take(1)->where('news.language', $local)->get();
		$data['ngos_development'] = DB::table('news')->where('category_id', '93')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['budget_implementation'] = DB::table('news')->where('category_id', '94')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);


		$count = count($data['uthan_recent'])+
					count($data['uthan_vedios'])+
					count($data['early_marriage'])+
					count($data['women_education'])+
					count($data['health_service'])+
					count($data['e_info_service'])+
					count($data['ngos_development'])+
					count($data['budget_implementation']);



		if($count == 0 )
			return redirect('error');
		return view('frontend.uthan_boithok', $data);
	}

    public function getMoreUthanBoithokPage(){
        $local = "bangla";
        $data['ads'] = DB::table('ads')->where('page', 'history')->orderBy('id', 'asc')->get();
        $data['morenews'] = DB::table('news')->where('parent_cat_id', '88')->where('flag',1)->orderBy('id', 'desc')->where('news.language', $local)->paginate(10);
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        $count = count($data['morenews']);
        if($count == 0 )
            return redirect('error');
        return view('frontend.morenews', $data);
    }

    public function getIslamicPage(){
		$local = "bangla";
		$data['ads'] = DB::table('ads')->where('page', 'national')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->where('flag',1)->take(3)->where('news.language', $local)->get();
		$data['islamic_ques_news'] = DB::table('news')->where('category_id', '110')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['islamic_imp_story_news'] = DB::table('news')->where('category_id', '111')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['sahabi_story_news'] = DB::table('news')->where('category_id', '112')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		//dd(count($data['sahabi_story_news']));
        $data['islamic_imp_installation_news'] = DB::table('news')->where('category_id', '113')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['masla_masayel_news'] = DB::table('news')->where('category_id', '114')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
        //dd('test');
        $data['tafsir'] = DB::table('news')->where('category_id', '115')->orderBy('id', 'desc')->where('flag',1)->take(3)->where('news.language', $local)->get();
		$data['hadis_news'] = DB::table('news')->where('category_id', '116')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['allquran_news'] = DB::table('news')->where('category_id', '117')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
        $data['all_news']=DB::table('news')->where('parent_cat_id', '109')->where('flag',1)->orderBy('id', 'desc')->where('news.language', $local)->get();
        $data['video_reporting'] = DB::table('news')->where('parent_cat_id', 109)->where('flag',1)->where('news.language', $local)->where('vedio_link', '<>', '')->orderBy('id', 'desc')->take(3)->get();
        //dd(count($data['all_news']));
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
		return view('frontend.islamic', $data);
	}

	public function getTravelPage(){
		$local = "bangla";
		$data['ads'] = DB::table('ads')->where('page', 'travel')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->where('flag',1)->take(3)->where('news.language', $local)->get();
		$data['travel_news'] = DB::table('news')->where('category_id', '20')->where('flag',1)->where('is_breaking_news', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['travel_recent'] = DB::table('news')->where('category_id', '20')->where('flag',1)->where('is_breaking_news', '')->orderBy('id', 'desc')->take(2)->where('news.language', $local)->get();
		$data['travel_vedios'] = DB::table('news')->whereIn('category_id', [20, 78, 79, 80, 82, 83, 84, 85, 86, 87])->where('flag',1)->where('vedio_link', '!=', '')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['travel_droshonio'] = DB::table('news')->where('category_id', '78')->orderBy('id', 'desc')->where('flag',1)->take(9)->where('news.language', $local)->get();
		$data['travel_time_bus'] = DB::table('news')->where('category_id', '79')->orderBy('id', 'desc')->take(4)->where('flag',1)->where('news.language', $local)->get();
		$data['travel_time_train'] = DB::table('news')->where('category_id', '80')->where('flag',1)->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
		$data['travel_time_biman'] = DB::table('news')->where('category_id', '82')->where('flag',1)->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
		$data['travel_time_lunch'] = DB::table('news')->where('category_id', '83')->where('flag',1)->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
		$data['travel_tips'] = DB::table('news')->where('category_id', '84')->where('flag',1)->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
		$data['travel_kothay'] = DB::table('news')->where('category_id', '85')->where('flag',1)->orderBy('id', 'desc')->take(9)->where('news.language', $local)->get();
		$data['travel_exp'] = DB::table('news')->where('category_id', '86')->where('flag',1)->orderBy('id', 'desc')->take(6)->where('news.language', $local)->get();
		$data['travel_bibid'] = DB::table('news')->where('category_id', '87')->where('flag',1)->orderBy('id', 'desc')->take(9)->where('news.language', $local)->get();
		//dd(count($data['travel_bibid']));
		$data['all_news'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')
								//->join('cms_categories', 'cms_categories.id', '=','news_types.category_id')
								->where('news_types.category_id', 20)
                                ->where('flag',1)
								->orderBy('news.id', 'desc')
								->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image')
								->where('news.language', $local)->get();

        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
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

    public function getMoreTravelPage(){
        $local = "bangla";
        $data['ads'] = DB::table('ads')->where('page', 'travel')->orderBy('id', 'asc')->get();

        $data['morenews'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')
            //->join('cms_categories', 'cms_categories.id', '=','news_types.category_id')
            ->where('news_types.category_id', 20)
            ->where('flag',1)
            ->orderBy('news.id', 'desc')
            ->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image')
            ->where('news.language', $local)->paginate(10);
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);

        $count = count($data['morenews']);
        if($count == 0 )
            return redirect('error');

        return view('frontend.morenews', $data);
    }

	
    public function getSciencePage(){
		$local = "bangla";
		$data['ads'] = DB::table('ads')->where('page', 'science')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->where('flag',1)->take(3)->where('news.language', $local)->get();
		$data['science_news'] = DB::table('news')->where('category_id', '9')->where('flag',1)->where('is_breaking_news', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['science_recent'] = DB::table('news')->where('category_id', '2')->where('flag',1)->where('is_breaking_news', '')->orderBy('id', 'desc')->take(2)->where('news.language', $local)->get();
		$data['science_vedios'] = DB::table('news')->whereIn('category_id', [9, 60, 63, 64, 65, 66, 68, 69, 70, 71])->where('flag',1)->where('vedio_link', '!=', '')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['science_apps'] = DB::table('news')->where('category_id', '60')->where('flag',1)->orderBy('id', 'desc')->take(13)->where('news.language', $local)->get();
		$data['science'] = DB::table('news')->where('category_id', '63')->where('flag',1)->orderBy('id', 'desc')->take(10)->where('news.language', $local)->get();
		$data['science_outsourcing'] = DB::table('news')->where('category_id', '64')->where('flag',1)->orderBy('id', 'desc')->take(10)->where('news.language', $local)->get();
		$data['science_ecommerce'] = DB::table('news')->where('category_id', '65')->where('flag',1)->orderBy('id', 'desc')->take(10)->where('news.language', $local)->get();
		$data['science_chakri'] = DB::table('news')->where('category_id', '71')->where('flag',1)->orderBy('id', 'desc')->take(10)->where('news.language', $local)->get();
		$data['science_training'] = DB::table('news')->where('category_id', '66')->where('flag',1)->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
		$data['science_mobile'] = DB::table('news')->where('category_id', '68')->where('flag',1)->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
		$data['science_awareness'] = DB::table('news')->where('category_id', '69')->where('flag',1)->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
        //dd(count($data['science_awareness']));
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
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
    public function getMoreSciencePage(){
        $local = "bangla";
        $data['ads'] = DB::table('ads')->where('page', 'science')->orderBy('id', 'asc')->get();
        $data['morenews'] = DB::table('news')->where('category_id', '9')->where('flag',1)->orderBy('id', 'desc')->take(3)->where('news.language', $local)->paginate(10);
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        if(count($data['morenews']) == 0 )
            return redirect('error');


        return view('frontend.morenews', $data);
    }
	
	public function getHealthPage(){

        $local = "bangla";
        //$data['menus'] = DB::table('cms_categories')->get();
        $data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
        //$data['breaking_news'] = DB::table('news')->where('parent_cat_id', '102')->take(3)->where('news.language', $local)->get();
        //$data['category'] = DB::table('cms_categories')->where('label', 'national')->get();

        $data['video_reporting'] = DB::table('news')->where('parent_cat_id', '102')->where('flag',1)->where('vedio_link','!=', '')->orderBy('id', 'desc')->where('news.language', $local)->get();
        //dd(count($data['video_reporting']));
        $data['all_news'] = DB::table('news')->where('parent_cat_id', '102')->where('flag',1)->where('news.language', $local)->get();
        $data['health_news'] = DB::table('news')->where('category_id', '103')->where('flag',1)->take(3)->where('news.language', $local)->get();
        $data['mind_news'] = DB::table('news')->where('category_id', '104')->where('flag',1)->take(3)->where('news.language', $local)->get();
        $data['miscellaneous_news'] = DB::table('news')->where('category_id', '105')->where('flag',1)->take(3)->where('news.language', $local)->get();
        //dd(count($data['health_news']));
        //$count=  count($data['video_reporting'])+count($data['all_news'])+count($data['health_news'])+count($data['mind_news'])+count($data['miscellaneous_news']);
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        session(['cat' => $categories]);
      /*if($count<1){
          dd('testing none');
            return redirect('error');
      }
      */

		return view('frontend.health', $data);
	}

    public function getMoreHealthPage(){
	    //dd('test');
        $local = "bangla";
        $data['ads'] = DB::table('ads')->where('page', 'health')->orderBy('id', 'asc')->get();
        $data['morenews'] = DB::table('news')->where('category_id', '102')->where('flag',1)->orderBy('id', 'desc')->where('news.language', $local)->paginate(10);
        //dd(count($data['morenews']));
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        if(count($data['morenews']) == 0 )
            return redirect('error');


        return view('frontend.morenews', $data);
    }



    public function getEconomicsPage(){
		$local = "bangla";
		$data['ads'] = DB::table('ads')->where('page', 'economics')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->where('flag',1)->take(3)->where('news.language', $local)->get();
		$data['economics_news'] = DB::table('news')->where('category_id', '3')->where('flag',1)->where('is_breaking_news', '1')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['economics_recent'] = DB::table('news')->where('category_id', '3')->where('flag',1)->where('is_breaking_news', '')->orderBy('id', 'desc')->take(7)->where('news.language', $local)->get();
		$data['economics_vedios'] = DB::table('news')->whereIn('category_id', [3, 30, 31, 35])->where('flag',1)->where('vedio_link', '!=', '')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
		$data['economics_shilpo'] = DB::table('news')->where('category_id', '30')->where('flag',1)->orderBy('id', 'desc')->take(13)->where('news.language', $local)->get();
		$data['economics_sharebazar'] = DB::table('news')->where('category_id', '31')->where('flag',1)->orderBy('id', 'desc')->take(5)->where('news.language', $local)->get();
		$data['economics_international'] = DB::table('news')->where('category_id', '35')->where('flag',1)->orderBy('id', 'desc')->take(13)->where('news.language', $local)->get();
			
		$data['all_news'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')
								//->join('cms_categories', 'cms_categories.id', '=','news_types.category_id')
								->where('news_types.category_id', 3)
                                ->where('flag',1)
								->orderBy('news.id', 'desc')
								->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image', 'news_types.sub_category_id')
								->where('news.language', $local)->get();
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
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

    public function getMoreEconomicsPage(){
        $local = "bangla";
        $data['ads'] = DB::table('ads')->where('page', 'economics')->orderBy('id', 'asc')->get();
        $data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->where('flag',1)->take(3)->where('news.language', $local)->get();
        $data['morenews']  = DB::table('news')->where('category_id','3')->where('news.language', $local)->orderBy('id', 'desc')->paginate(10);
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        if(count($data['morenews']) == 0 )
            return redirect('error');


        return view('frontend.morenews', $data);
    }

	

    public function getPoliticsPage(){
		$local = "bangla";
		$data['ads'] = DB::table('ads')->where('page', 'politics')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->where('flag',1)->take(3)->where('news.language', $local)->get();
		$data['all_news'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')
								->where('news_types.category_id', 6)
                                ->where('flag',1)
								->orderBy('news.id', 'desc')
								->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image')
								->where('news.language', $local)->get();
        $data['video_reporting'] = DB::table('news')->where('category_id', 6)->where('flag',1)->where('news.language', $local)->where('vedio_link', '!=', '')->orderBy('id', 'desc')->take(3)->get();
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        $count = count($data['all_news']);

		/*if($count < 60)
			return redirect('error');*/

		if($count == 0 )
			return redirect('error');
		return view('frontend.politics', $data);
	}

    public function getMorePoliticsPage(){
        $local = "bangla";
        $data['ads'] = DB::table('ads')->where('page', 'politics')->orderBy('id', 'asc')->get();
        $data['morenews'] = DB::table('news')->where('category_id', '6')->where('flag',1)->where('news.language', $local)->orderBy('id', 'desc')->paginate(10);
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        $count = count($data['morenews']);

        if($count == 0 )
            return redirect('error');
        return view('frontend.morenews', $data);
    }

    public function getCrimePage(){
		$local = "bangla";
		$data['ads'] = DB::table('ads')->where('page', 'crime')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->where('flag',1)->take(3)->where('news.language', $local)->get();
		$data['all_news'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')
								->where('news_types.category_id', 11)
                                ->where('flag',1)
								->orderBy('news.id', 'desc')
								->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image')
								->where('news.language', $local)->get();

        $data['video_reporting'] = DB::table('news')->where('category_id', '11')->where('flag',1)->where('vedio_link','!=', '')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        $count = count($data['all_news']);

		/*if($count < 60)
			return redirect('error');	
				*/
		if($count == 0 )
			return redirect('error');
		return view('frontend.crime', $data);
	}

    public function getMoreCrimePage(){
        $local = "bangla";
        $data['ads'] = DB::table('ads')->where('page', 'crime')->orderBy('id', 'asc')->get();
        $data['morenews'] = DB::table('news')->where('category_id', '11')->where('flag',1)->where('news.language', $local)->orderBy('id', 'asc')->paginate(10);
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        $count = count($data['morenews']);

        if($count == 0 )
            return redirect('error');
        return view('frontend.morenews', $data);
    }


    public function getVediosPage(){
		$local = "bangla";
		//$data['menus'] = DB::table('cms_categories')->get();
		$data['ads'] = DB::table('ads')->where('page', 'vedio')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->where('flag',1)->take(3)->where('news.language', $local)->get();
		//$data['latest_news'] = DB::table('latest_news')->join('news', 'news.id', '=','latest_news.news_id')->orderBy('news.created_at', 'desc')->get();
        $data['latest_news']=DB::table('news')->where('flag',1)->orderBy('id', 'desc')->get();
		//$data['images'] = DB::table('images')->get();
		//$data['shapes'] = DB::table('images')->where('file_type', '!=', '')->distinct()->get(['file_type']);
		
		////$data['category'] = DB::table('cms_categories')->where('label', 'national')->get();
		$data['all_news'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')
								//->join('cms_categories', 'cms_categories.id', '=','news_types.category_id')
								->where('news_types.category_id', 3)
                                ->where('flag',1)
								->orderBy('news.id', 'desc')
								->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image', 'news_types.sub_category_id')
								->where('news.language', $local)->get();
		$data['video_reporting'] = DB::table('news')->where('category_id', '136')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();

		$data['video_tech'] = DB::table('news')->where('category_id', '137')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();

		$data['video_tips'] = DB::table('news')->where('category_id', '144')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
		//dd(count($data['video_tips']));
		$data['video_programme'] = DB::table('news')->where('category_id', '139')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
		$data['video_boithokkhana'] = DB::table('news')->where('category_id', '140')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
		$data['video_itihash'] = DB::table('news')->where('category_id', '141')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
		$data['video_nrigoshthi'] = DB::table('news')->where('category_id', '143')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
		$data['video_apnar'] = DB::table('news')->where('category_id', '142')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
		$data['video'] = DB::table('news')->where('category_id', '138')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
		//dd(count($data['video']));
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
		return view('frontend.video_gallary', $data);
	}

    public function getphotosPage(){
        $local = "bangla";
        //$data['menus'] = DB::table('cms_categories')->get();
        $data['ads'] = DB::table('ads')->where('page', 'vedio')->orderBy('id', 'asc')->get();
        $data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->where('flag',1)->take(15)->where('news.language', $local)->get();
        //$data['latest_news'] = DB::table('latest_news')->join('news', 'news.id', '=','latest_news.news_id')->orderBy('news.created_at', 'desc')->get();
        $data['latest_news']=DB::table('news')->where('flag',1)->orderBy('id', 'desc')->get();
        //$data['images'] = DB::table('images')->get();
        //$data['shapes'] = DB::table('images')->where('file_type', '!=', '')->distinct()->get(['file_type']);

        ////$data['category'] = DB::table('cms_categories')->where('label', 'national')->get();
        $data['all_news'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')
            //->join('cms_categories', 'cms_categories.id', '=','news_types.category_id')
            ->where('news_types.category_id', 3)
            ->where('flag',1)
            ->orderBy('news.id', 'desc')
            ->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image', 'news_types.sub_category_id')
            ->where('news.language', $local)->get();
        $data['video_reporting'] = DB::table('news')->where('category_id', '136')->where('flag',1)->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
        $data['photo_tech'] = DB::table('news')->where('category_id', '137')->where('flag',1)->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
        //dd(count($data['photo_tech']));
        $data['photo_tips'] = DB::table('news')->where('category_id', '144')->where('flag',1)->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
        $data['video_programme'] = DB::table('news')->where('category_id', '139')->where('flag',1)->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
        $data['video_boithokkhana'] = DB::table('news')->where('category_id', '140')->where('flag',1)->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
        $data['video_itihash'] = DB::table('news')->where('category_id', '141')->where('flag',1)->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
        $data['video_nrigoshthi'] = DB::table('news')->where('category_id', '143')->where('flag',1)->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
        $data['video_apnar'] = DB::table('news')->where('category_id', '142')->where('flag',1)->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
        $data['national'] = DB::table('news')->where('category_id', '1')->where('flag',1)->orderBy('id', 'desc')->take(15)->where('news.language', $local)->get();
        $data['international'] = DB::table('news')->where('category_id', '2')->where('flag',1)->orderBy('id', 'desc')->take(15)->where('news.language', $local)->get();
        $data['job'] = DB::table('news')->where('category_id', '4')->where('flag',1)->orderBy('id', 'desc')->take(10)->where('news.language', $local)->get();
        $data['sports'] = DB::table('news')->where('category_id', '7')->where('flag',1)->orderBy('id', 'desc')->take(15)->where('news.language', $local)->get();
        $data['photo'] = DB::table('news')->where('category_id', '15')->where('flag',1)->orderBy('id', 'desc')->take(10)->where('news.language', $local)->get();
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
         return view('frontend.photo_gallery', $data);
    }


    public function getEntertainmentPage(){
		$local = "bangla";
		//$data['menus'] = DB::table('cms_categories')->get();
		$data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->where('flag',1)->take(3)->where('news.language', $local)->get();
		//$data['latest_news'] = DB::table('latest_news')->join('news', 'news.id', '=','latest_news.news_id')->orderBy('news.created_at', 'desc')->get();
		//$data['images'] = DB::table('images')->get();
		//$data['shapes'] = DB::table('images')->where('file_type', '!=', '')->distinct()->get(['file_type']);
		
		//$data['category'] = DB::table('cms_categories')->where('label', 'national')->get();
		$data['all_news'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')
								//->join('cms_categories', 'cms_categories.id', '=','news_types.category_id')
								->where('news_types.category_id', 5)
                                ->where('flag',1)
								->orderBy('news.id', 'desc')
								->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image', 'news_types.sub_category_id')
								->where('news.language', $local)->get();
        $data['video_reporting'] = DB::table('news')->where('category_id', '5')->where('flag',1)->where('vedio_link','<>','')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
		$count = count($data['all_news']);

		/*if($count < 60)
			return redirect('error');*/
		if($count == 0 )
			return redirect('error');
		return view('frontend.entertainment', $data);
	}

    public function getMoreEntertainmentPage(){
        $local = "bangla";
        //$data['menus'] = DB::table('cms_categories')->get();
        $data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
        $data['morenews']= DB::table('news')->where('category_id', '5')->where('flag',1)->orderBy('id', 'desc')->paginate(10);
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        if(count($data['morenews']) == 0 )
            return redirect('error');
        return view('frontend.morenews', $data);
    }

    public function getEducationPage(){
		$local = "bangla";
		//$data['menus'] = DB::table('cms_categories')->get();
		$data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();

		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->where('flag',1)->take(3)->where('news.language', $local)->get();

		//$data['video_news'] = DB::table('news')->join('news', 'news.id', '=','latest_news.news_id')->orderBy('news.created_at', 'desc')->get();

		//$data['images'] = DB::table('images')->get();
		//$data['shapes'] = DB::table('images')->where('file_type', '!=', '')->distinct()->get(['file_type']);
		
		//$data['category'] = DB::table('cms_categories')->where('label', 'national')->get();
		$data['all_news'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')
								//->join('cms_categories', 'cms_categories.id', '=','news_types.category_id')
								->where('news_types.category_id', 8)
                                ->where('flag',1)
								->orderBy('news.id', 'desc')
								->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image', 'news_types.sub_category_id')
								->where('news.language', $local)->get();

        $data['video_news'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')
            //->join('cms_categories', 'cms_categories.id', '=','news_types.category_id')
            ->where('news_types.category_id', 8)
            ->where('flag',1)
            ->where('news.vedio_link','<>', '')
            ->orderBy('news.id', 'desc')
            ->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.vedio_link', 'news.featured_image', 'news_types.sub_category_id')
            ->where('news.language', $local)->get();

        $data['national_university'] = DB::table('news')->where('category_id',46)->where('flag',1)->take(3)->where('news.language', $local)->orderBy('id','desc')->get();
        $data['govt_university'] = DB::table('news')->where('category_id',47)->where('flag',1)->take(3)->where('news.language', $local)->orderBy('id','desc')->get();
        $data['private_university'] = DB::table('news')->where('category_id',48)->where('flag',1)->take(3)->where('news.language', $local)->orderBy('id','desc')->get();
        $data['ucchomaddhomik'] = DB::table('news')->where('category_id',49)->where('flag',1)->take(3)->where('news.language', $local)->orderBy('id','desc')->get();
        $data['nimnomaddhomik'] = DB::table('news')->where('category_id',50)->where('flag',1)->take(3)->where('news.language', $local)->orderBy('id','desc')->get();
        $data['maddhomik'] = DB::table('news')->where('category_id',51)->where('flag',1)->take(3)->where('news.language', $local)->orderBy('id','desc')->get();
        $data['college'] = DB::table('news')->where('category_id',76)->where('flag',1)->take(3)->where('news.language', $local)->orderBy('id','desc')->get();

        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
		$count = count($data['all_news']);
/*
		if($count < 60 )
			return redirect('error');*/
		if($count == 0 )
			return redirect('error');
        //dd('test');

		return view('frontend.education', $data);
	}

    public function getMoreEducationPage(){
        $local = "bangla";
        //$data['menus'] = DB::table('cms_categories')->get();
        $data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();

        $data['morenews'] = DB::table('news')->where('category_id', '8')->where('flag',1)->where('news.language', $local)->orderBy('id', 'desc')->paginate(10);
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        $count = count($data['morenews']);
        if($count == 0 )
            return redirect('error');
        return view('frontend.morenews', $data);
    }



    public function getSportsPage(){
        $local = "bangla";
        //$data['menus'] = DB::table('cms_categories')->get();
        $data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
        $data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->where('flag',1)->take(3)->where('news.language', $local)->get();
        //$data['latest_news'] = DB::table('latest_news')->join('news', 'news.id', '=','latest_news.news_id')->orderBy('news.created_at', 'desc')->get();
        //$data['images'] = DB::table('images')->get();
        //$data['shapes'] = DB::table('images')->where('file_type', '!=', '')->distinct()->get(['file_type']);

        //$data['category'] = DB::table('cms_categories')->where('label', 'national')->get();
        $data['video_reporting'] = DB::table('news')->where('parent_cat_id', '7')->where('flag',1)->where('vedio_link','!=', '')->orderBy('id', 'desc')->take(4)->where('news.language', $local)->get();
        $data['all_news'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')
            //->join('cms_categories', 'cms_categories.id', '=','news_types.category_id')
            ->where('news_types.category_id', 7)
            ->where('flag',1)
            ->orderBy('news.id', 'desc')
            ->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image', 'news_types.sub_category_id')
            ->where('news.language', $local)->get();

        $data['cric_news'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')
            //->join('cms_categories', 'cms_categories.id', '=','news_types.category_id')
            ->where('flag',1)
            ->where('news.category_id',36)
            ->orderBy('news.id', 'desc')
            ->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image', 'news_types.sub_category_id')
            ->where('news.language', $local)->get();

        $data['football_news'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')
            //->join('cms_categories', 'cms_categories.id', '=','news_types.category_id')
            ->where('news.category_id',72)
            ->where('flag',1)
            ->orderBy('news.id', 'desc')
            ->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image', 'news_types.sub_category_id')
            ->where('news.language', $local)->get();

        $data['other_news'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')
            //->join('cms_categories', 'cms_categories.id', '=','news_types.category_id')
            ->where('news.category_id',38)
            ->where('flag',1)
            ->orderBy('news.id', 'desc')
            ->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image', 'news_types.sub_category_id')
            ->where('news.language', $local)->get();
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        $count = count($data['all_news']);
        /*
                if($count < 60 )
                    return redirect('error');*/
        if($count == 0 )
            return redirect('error');

        return view('frontend.sports', $data);
    }

    public function getMoreSportsPage(){
        $local = "bangla";
        //$data['menus'] = DB::table('cms_categories')->get();
        $data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
        $data['morenews']= DB::table('news')->where('category_id',7)->where('flag',1)->orderBy('id', 'asc')->paginate(10);
        //$data['morenews']= DB::table('news')->where('parent_cat_id',7)->orderBy('id', 'asc')->paginate(10);
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        $count = count($data['morenews']);

        if($count == 0 )
            return redirect('error');

        return view('frontend.morenews', $data);
    }

    public function getViralPage(){
        $local = "bangla";
        //$data['menus'] = DB::table('cms_categories')->get();
        $data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
        $data['viral']= DB::table('news')->where('category_id',14)->where('flag',1)->orderBy('id', 'desc')->paginate(10);
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        $count = count($data['viral']);

        if($count == 0 )
            return redirect('error');

        return view('frontend.viral', $data);
    }
   

    public function getLifestylesPage(){
		$local = "bangla";
		//$data['menus'] = DB::table('cms_categories')->get();
		$data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('parent_cat_id', '12')->where('flag',1)->take(3)->where('news.language', $local)->get();

		//$data['category'] = DB::table('cms_categories')->where('label', 'national')->get();
		$data['all_news'] = DB::table('news')->leftJoin('news_types', 'news_types.news_id', '=', 'news.id')
								//->join('cms_categories', 'cms_categories.id', '=','news_types.category_id')
								->where('news_types.category_id', 12)
                                ->where('flag',1)
								->orderBy('news.id', 'desc')
								->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image')
								->where('news.language', $local)->get();
        $data['video_reporting'] = DB::table('news')->where('parent_cat_id', '12')->where('flag',1)->where('vedio_link','!=', '')->orderBy('id', 'desc')->where('news.language', $local)->get();
        $data['lifestyles_news'] = DB::table('news')->where('parent_cat_id', '12')->where('flag',1)->where('news.language', $local)->get();
        $data['fashion_news'] = DB::table('news')->where('category_id', '154')->where('flag',1)->take(3)->where('news.language', $local)->get();
        $data['roopchorcha_news'] = DB::table('news')->where('category_id', '155')->where('flag',1)->take(3)->where('news.language', $local)->get();
        $data['furnishing_news'] = DB::table('news')->where('category_id', '156')->where('flag',1)->take(3)->where('news.language', $local)->get();
        $data['miscellaneous_news'] = DB::table('news')->where('category_id', '157')->where('flag',1)->take(3)->where('news.language', $local)->get();
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
		$count = count($data['all_news']);

		//if($count < 60 )
			//return redirect('error');
		return view('frontend.lifestyle', $data);
	}

    public function getMoreLifestylesPage(){
        $local = "bangla";
        $data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();

        $data['morenews'] = DB::table('news')
            ->where('parent_cat_id', 12)
            ->where('flag',1)
            ->orderBy('news.id', 'desc')
            ->where('news.language', $local)->paginate(10);
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        $count = count($data['morenews']);
        //dd($count);
        if($count <=0 )
            return redirect('error');
        return view('frontend.morenews', $data);
    }


    public function getkidsPage(){
        //return view('frontend.kids');
        $local = "bangla";
        //$data['menus'] = DB::table('cms_categories')->get();
        $data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
        $data['video_reporting'] = DB::table('news')->where('parent_cat_id', '145')->where('flag',1)->where('vedio_link','!=', '')->orderBy('id', 'desc')->take(3)->where('news.language', $local)->get();
        //$data['category'] = DB::table('cms_categories')->where('label', 'national')->get();
        $data['all_news'] = DB::table('news')
            //->join('cms_categories', 'cms_categories.id', '=','news_types.category_id')
            ->where('news.parent_cat_id', 145)
            ->where('flag',1)
            ->orderBy('news.id', 'desc')
            ->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image')
            ->where('news.language', $local)->get();
        $count = count($data['all_news']);

        //dd($count);

        //$data['latest_news'] = DB::table('news')->where('category_id',145)->orderBy('news.created_at', 'desc')->get();

        $data['colors_news'] = DB::table('news')
            //->join('cms_categories', 'cms_categories.id', '=','news_types.category_id')
            ->where('news.category_id',146)
            ->where('flag',1)
            ->orderBy('news.id', 'desc')
            //->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image')
            ->where('news.language', $local)->get();

        //dd(count($data['colors_news']));

        $data['start_news'] = DB::table('news')
            //->join('cms_categories', 'cms_categories.id', '=','news_types.category_id')
            ->where('news.category_id',147)
            ->where('flag',1)
            ->orderBy('news.id', 'desc')
            //->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image')
            ->where('news.language', $local)->get();
        //dd(count($data['start_news']));

        $data['interesting_news'] = DB::table('news')
            //->join('cms_categories', 'cms_categories.id', '=','news_types.category_id')
            ->where('news.category_id',148)
            ->where('flag',1)
            ->orderBy('news.id', 'desc')
            //->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image')
            ->where('news.language', $local)->get();
        //dd(count($data['interesting_news']));
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        $count = count($data['all_news']);

        //if($count < 60 )
          //  return redirect('error');
        return view('frontend.kids', $data);
    }

    public function getMorekidsPage(){
        $local = "bangla";
        $data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
       $data['morenews'] = DB::table('news')
            ->where('news.parent_cat_id', 145)
           ->where('flag',1)
            ->orderBy('news.id', 'desc')
            ->select('news.id', 'news.title', 'news.details', 'news.short_description', 'news.featured_image')
            ->where('news.language', $local)->paginate(10);
        $count = count($data['morenews']);

        //dd($count);

        //$data['latest_news'] = DB::table('news')->where('category_id',145)->orderBy('news.created_at', 'desc')->get();
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);

        $count = count($data['morenews']);

        if($count <=0 )
          return redirect('error');
        return view('frontend.morenews', $data);
    }


    public function getLegalPage(){
		$local = "bangla";
		//$data['menus'] = DB::table('cms_categories')->get();
		$data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();
		$data['breaking_news'] = DB::table('news')->where('is_breaking_news', '1')->where('flag',1)->take(3)->where('news.language', $local)->get();
		//$data['latest_news'] = DB::table('latest_news')->join('news', 'news.id', '=','latest_news.news_id')->orderBy('news.created_at', 'desc')->get();
		//$data['images'] = DB::table('images')->get();
		//$data['shapes'] = DB::table('images')->where('file_type', '!=', '')->distinct()->get(['file_type']);
		
		//$data['category'] = DB::table('cms_categories')->where('label', 'national')->get();
		$data['all_news'] = DB::table('news')
								->where('parent_cat_id', 106)
								->orderBy('id', 'desc')
								->where('news.language', $local)->get();
		$count = count($data['all_news']);
		$data['legal']=DB::table('news')->where('category_id',107)->where('flag',1)->orderBy('id', 'desc')->where('news.language', $local)->get();
		$data['ques']=DB::table('news')->where('category_id',108)->where('flag',1)->orderBy('id', 'desc')->where('news.language', $local)->get();
        $data['video_reporting'] = DB::table('news')->where('parent_cat_id', 106)->where('flag',1)->where('news.language', $local)->where('vedio_link', '<>', '')->orderBy('id', 'desc')->take(3)->get();
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        //dd(count($data['categories']));
        session(['cat' => $categories]);
        if($count < 1 )
			return redirect('error');						
		return view('frontend.legal_aid', $data);
	}


    public function getMoreLegalPage(){
        $local = "bangla";
        $data['ads'] = DB::table('ads')->where('page', 'home')->orderBy('id', 'asc')->get();

        //$data['category'] = DB::table('cms_categories')->where('label', 'national')->get();
        $data['morenews'] = DB::table('news')
            ->where('parent_cat_id', 106)
            ->where('flag',1)
            ->orderBy('news.id', 'desc')
            ->where('news.language', $local)->paginate(10);
        $categories=DB::table('cms_categories')->where([
            ['status', '=', 1],
            ['link', '<>', ''],
        ])->get();
        session(['cat' => $categories]);
        $count = count($data['morenews']);

        if($count <=0 )
            return redirect('error');
        return view('frontend.morenews', $data);
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

    public function editStatus($id)
    {

        $data['category'] = DB::table('cms_categories')->where('id', $id)->get();

        $data['categories'] = DB::table('cms_categories')->get();
        return view('categories.editstatus', $data);
    }
	
	public function editCatSubmit(Request $request)
	{
		DB::table('cms_categories')->where('id', $request->cat_id)->update([
			'category_name' => $request->category_name,
			'parent_category_id' => $request->parent_category_id,
			'label' => $request->label
		]);
	
	}

    public function editStatusSubmit(Request $request)
    {
        DB::table('cms_categories')->where('id', $request->cat_id)->update([
            'status' => $request->status
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
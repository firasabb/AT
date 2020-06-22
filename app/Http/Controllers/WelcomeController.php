<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\Category;
use App\Tag;
use Validator;

class WelcomeController extends Controller
{

    public function __construct(){

    }

    public function index(){

        $stockPhotos = Category::where('name', 'LIKE' ,'stock photos')->first();
        $assets = $stockPhotos->approvedAssets()->orderBy('id', 'desc')->take(20)->get();
        $categories = Category::all();
        return view('screens.main', ['assets' => $assets, 'categories' => $categories]);

    }

    public function search(Request $request){


        $validator = Validator::make($request->all(), [
            'search' => 'string|nullable|max:50',
            'category' => 'string|nullable|max:50'
        ]);

        if($validator->fails()){
            return redirect()->route('main.searchResults');
        }

        $search_query = $request->search;
        $category = $request->category;

        $whereArr = array();

        if(!empty($search_query) && strtolower($search_query) != 'all'){

            $whereArr[] = ['title', 'LIKE', '%' . $search_query . '%'];
            $whereArr[] = ['status', 2];

        }

        if(!empty($category) && strtolower($category) != 'all'){

            $category = Category::where('name', $category)->firstOrFail();
            if(!empty($whereArr)){
                $assets = $category->approvedAssets()->where($whereArr);
            } else {
                $assets = $category->approvedAssets();
            }

        } else {

            if(!empty($whereArr)){
                $assets = Asset::where($whereArr);
            } else {
                $assets = new Asset();
                $assets = $assets->approvedAssets();
            }

        }

        return $this->searchResults($assets, $category->id ?? 0);

    }

    /**
     * 
     * Show results from a chosen category
     * @param Request $request
     * 
     */
    public function searchCategories(Request $request){

        $category = $request->category;

        if(!empty($category) && strtolower($category) != 'all'){

            $category = Category::where('url', $category)->firstOrFail();
            $assets = $category->approvedAssets();

        } else {

            $assets = new Asset();
            $assets = $assets->approvedAssets();

        }

        return $this->searchResults($assets, $category->id ?? 0);

    }


    /**
     * 
     * Show results from a chosen tag
     * @param Request $request
     * 
     */
    public function searchTags(Request $request){

        $tag = $request->tag;

        if(!empty($tag) && strtolower($tag) != 'all'){

            $tag = Tag::where('url', $tag)->firstOrFail();
            $assets = $tag->approvedAssets();

        } else {
            $assets = new Asset();
            $assets = $assets->approvedAssets();
        }

        return $this->searchResults($assets);

    }



    public function searchResults($assets = [], $reqCategory = 0){

        if(!empty($assets)){
            $assets = $assets->with('category')->orderBy('id', 'desc')->paginate(10);
        }
        $categories = Category::all();
        $reqCategory = Category::find($reqCategory);
        return view('screens.searchResults', ['assets' => $assets, 'categories' => $categories, 'reqCategory' => $reqCategory->name ?? '']);

    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logo_Offer;
use App\Wishlist;
use App\Category;
use App\Banner;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $logo = Logo_Offer::where('logo_offer', '1')->first();
        $offer = Logo_Offer::where('logo_offer', '0')->first();
		$wishlist = Wishlist::count();
        $nav_category = Category::all();
        $banner = DB::table('banners')
                ->join('products', 'products.id', 'banners.product_id')
                ->select('products.name as product_name', 'banners.*')
                ->latest()
                ->get();
        $bannersecond = DB::table('banners')
                ->join('products', 'products.id', 'banners.product_id')
                ->select('products.name as product_name', 'banners.*')
                ->latest()->skip(1)->take(2)
                ->get();
        $feature_item = DB::table('products')->latest()->get();
        $category_fish = Category::all();
        $id = Auth::id();
        $currentuser = User::find($id);

        return view('frontEnd.index', compact('logo', 'offer', 'wishlist', 'nav_category', 'banner', 'bannersecond', 
        'feature_item', 'category_fish', 'currentuser'));
    }
}

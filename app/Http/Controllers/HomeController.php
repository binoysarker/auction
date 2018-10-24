<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Auction_Item;

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
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $auction_items = Auction_Item::paginate(10);
       return view('front-end.home',compact('auction_items'));
     }
     /**
      * about page
      */
      public function about()
      {
        return view('front-end.about');
      }
     /**
      * contact page
      */
      public function contact()
      {
        return view('front-end.contact');
      }
     /**
      * news page
      */
      public function news()
      {
        $all_news = News::paginate(3);
        return view('front-end.news',compact('all_news'));
      }
     /**
      * show
      */
      public function show($id)
      {
        $item = Auction_Item::findOrFail($id);
        return view('front-end.showDetail',compact('item'));
      }
}

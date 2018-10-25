<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Auction_Item;
use App\BilboardMessage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $bilboardMessage = BilboardMessage::orderBy('id','desc')->first();
       $auction_items = Auction_Item::paginate(8);
       $auction_items_featured = Auction_Item::where('is_featured',1)->get();
       return view('front-end.home',compact('auction_items','bilboardMessage','auction_items_featured'));
     }
     public function searchItem(Request $request)
     {
       // return $request;
       $auction_items = Auction_Item::where('short_desciption','like',"%".$request->short_desciption."%")->get();
       return $auction_items;
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
        $totalBids = count($item->bidInfo);
        return view('front-end.showDetail',compact('item','totalBids'));
      }
}

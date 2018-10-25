<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BidInfo;
use App\Auction_Item;

class BidInfoController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }
  public function store(Request $request)
  {
    // return $request->all();
    $validatedData = $request->validate([
        'bid_price' => 'required|numeric',
        'auction_item_id' => 'required|numeric',
    ]);
    if ($validatedData) {
      // check if the bid_price is greather then the current_bid price
      $item = Auction_Item::findOrFail($request->auction_item_id);
      if ($item->current_bid < $request->bid_price) {
        if ($request->bid_price < 100 && $request->bid_price - $item->current_bid >= 2) {
          $item->current_bid = $request->bid_price;
          $item->save();
        }elseif ($request->bid_price - $item->current_bid >= 10) {
          $item->current_bid = $request->bid_price;
          $item->save();
        }
        else {
          return redirect()->back()->with('status','Your Bid Price should be greated then this');
        }


        // then store the data in the bidInfo table
        $bidInfo = new BidInfo();
        $bidInfo->user_id = auth()->user()->id;
        $bidInfo->auction_item_id = $request->auction_item_id;
        $bidInfo->bided = 1;
        $bidInfo->bid_price = $request->bid_price;
        $bidInfo->save();
        return redirect()->back()->with('success','You have successfuly bided for this item');
      }else {
        return redirect()->back()->with('status','Your Bid Price should be greater then the Current Bid Price');
      }
    }
  }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Auction_Item;

class BidInfo extends Model
{
  protected $fillable=[
    'bided',
    'bid_price'
  ];
  protected $hidden=['user_id','auction_item_id'];

    public function user()
    {
      return $this->belongsTo(User::class,'user_id','id');
    }
    public function auction_item()
    {
      return $this->belongsTo(Auction_Item::class,'auction_item_id','id');
    }
}

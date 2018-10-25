<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\BidInfo;

class Auction_Item extends Model {

    protected $table = "auction_items";

    protected $fillable = [
      'short_desciption',
      'long_description',
      'image_file',
      'start_date',
      'end_date',
      'end_date_time',
      'price',
      'is_featured',
      'current_bid',
    ];


    public static $rules = [
        // Validation rules
    ];

    // Relationships
    public function user()
    {
      return $this->belongsTo(User::class,'user_id','id');
    }
    public function bidInfo()
    {
      return $this->hasMany(BidInfo::class,'auction_item_id');
    }

}

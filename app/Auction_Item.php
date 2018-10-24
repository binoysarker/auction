<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Auction_Item extends Model {

    protected $table = "auction_items";

    protected $fillable = [];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships

}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model {

    protected $table = "news";

    protected $fillable = [];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships

}

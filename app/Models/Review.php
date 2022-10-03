<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable =[
        'user_id',
        'prod_id',
        'user_review',

    ];
    function user(){
        return $this->belongsTo(User::class);
    }
    // function rating(){
    //     return $this->belongsTo(Rating::class,'user_id','user_id');

    // }

}

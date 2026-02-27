<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{
    protected $fillable = [
        'id',
        'title',
        'discription', 
        'location',
        'price',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

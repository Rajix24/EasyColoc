<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    protected $fillable = [
        'title',
        'price',
        'category_id',
        'colocation_id'
    ];
}

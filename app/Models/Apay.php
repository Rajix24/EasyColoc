<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apay extends Model
{
    protected $fillable = [
        'title',
        'price',
        'colocation_id',
        'user_id',
        'depense_id',
        'status'
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function colocation() {
        return $this->belongsTo(Colocation::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'file_name'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
};

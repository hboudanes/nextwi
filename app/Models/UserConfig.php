<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserConfig extends Model
{
    protected $fillable = ['max_businesses', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

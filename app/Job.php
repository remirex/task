<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title', 'email', 'description', 'usr_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'usr_id', 'id');
    }
}

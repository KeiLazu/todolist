<?php

namespace App;

use App\Auth;
use Illuminate\Database\Eloquent\Model;

class todolist extends Model
{
    protected $fillable = [
        'title', 'container', 'status', 'user_id',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

}

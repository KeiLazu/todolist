<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
        'nama', 'alamat', 'nomor_telepon', 'user_id',
    ];

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}

<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'description',
    ];

    public function Users()
    {
        return $this->belongsToMany(User::class);
    }
}

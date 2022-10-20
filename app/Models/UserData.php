<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    
    protected $table = "userdata";
    protected $fillable = [
        'cookie_id',
        'name',
        'sname',
        'email',
        'date_at',
        'select',
    ];
}

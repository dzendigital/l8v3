<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Models\UserData;

class Cookie extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = "cookies";
    protected $fillable = [
        "value",
    ];

    public function userdata()
    {
        return $this->hasMany(UserData::class);
    }
}

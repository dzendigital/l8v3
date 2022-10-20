<?php 
namespace App\Repositories;

use Illuminate\Http\Request;
use App\Interfaces\CookieInterface;
use App\Models\Cookie as CookieModel;


class CookieRepository implements CookieInterface 
{
    public function whereCookie($cookie_value)
    {
        return CookieModel::where("value", $cookie_value)->first();
    }
    public function newUser($cookie_value)
    {
        CookieModel::create([
            'value' => $cookie_value,
        ]);
        return;
    }
}
?>
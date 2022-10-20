<?php 
namespace App\Repositories;

use Illuminate\Http\Request;
use App\Interfaces\UserDataInterface;
use App\Models\UserData as UserDataModel;


class UserDataRepository implements UserDataInterface 
{
    public function storeData($model)
    {
        return UserDataModel::create($model);
    }
}
?>
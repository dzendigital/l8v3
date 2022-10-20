<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Cookie as CookieModel;
use App\Models\UserData as UserDataModel;
use App\Repositories\UserDataRepository;

class UserDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $response = response()->json([
            "userdata" => CookieModel::where("value", $request->cookie("c_id"))->with(["userdata"])->first()->userdata,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->only(["name", "sname", "email", "date_at", "select"]);
        $validated['cookie_id'] = CookieModel::where("value", $request->cookie("c_id"))->first()->id;
        if ( in_array("", $validated) ) 
        {
            $response = response()->json([
                'is_store' => null,
                'message' => "Неверно заполнено одно из полей",
            ], 200);
        }else {
            $is_stored = UserDataRepository::storeData($validated);

            $response = response()->json([
                'is_store' => $is_stored->id,
                'message' => "Данные сохранены",
            ], 200);
        }

        return $response;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd(__METHOD__, 123);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd(__METHOD__, 123);
    }
}

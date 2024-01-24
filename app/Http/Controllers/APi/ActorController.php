<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\actor;

class ActorController extends Controller
{
public function index()
{
$Actor = Actor::All();
return response()->json($Actor);
}

public function index_id($actor_id)
{
    $Actor = Actor::find($actor_id);
    return response()->json($Actor);

}

public function create(Request $request)
{
    $request->validate([
        'first_name'=> 'required|unique:actor',
        'last_name'=> 'required',
    ]);
    $Actor = new Actor();
    $Actor->first_name = $request->first_name;
    $Actor->last_name = $request->last_name;
    $Actor->save();
    return response()->json([
        "Model"=>$Actor,
        "estatus"=> 1,
        "mensaje"=>"Registrado",

    ],);
}
public function update(Request $request,$actor_id)
{
    $request->validate([
        'first_name'=> 'required|unique:actor',
        'last_name'=> 'required'
    ]);
    $Actor = Actor::find($actor_id);
    $Actor->first_name = $request->first_name;
    $Actor->last_name = $request->last_name;
    $Actor->update();
    return response()->json([
        "estatus"=> 1,
        "mensaje"=>"Actualizado",

    ],);
}
public function delete($actor_id)
{
    $Actor =Actor::find($actor_id)->delete();
    return response()->json([
        "Model"=>$Actor,
        "estatus"=> 1,
        "mensaje"=>"Eliminado",

    ],);

}
}
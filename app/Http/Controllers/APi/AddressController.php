<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
public function index()
{
$Adress = Address::All();
return response()->json($Adress);
}

public function index_id($address_id)
{
    $Address = Address::find($address_id);
    return response()->json($Address);

}

public function create(Request $request)
{
    $request->validate([
        'address'=> 'required|unique:actor',
        'address2'=> 'required',
        'district'=> 'required',
        'city_id'=> 'required',
        'postal_code'=> 'required',
        'phone'=> 'required',
    ]);
    $Address = new Address();
    $Address->address = $request->address;
    $Address->address2 = $request->address2;
    $Address->district = $request->district;
    $Address->city_id = $request->city_id;
    $Address->postal_code= $request->postal_code;
    $Address->phone= $request->phone;
    $Address->save();
    return response()->json([
        "Model"=>$Address,
        "estatus"=> 1,
        "mensaje"=>"Registrado",

    ],);
}
public function update(Request $request,$address_id)
{
    $request->validate([
        'address'=> 'required|unique:actor',
        'address2'=> 'required',
        'district'=> 'required',
        'city_id'=> 'required',
        'postal_code'=> 'required',
        'phone'=> 'required',
    ]);
    $Address = Address::find($address_id);
    $Address->address = $request->address;
    $Address->address2 = $request->address2;
    $Address->district = $request->district;
    $Address->city_id = $request->city_id;
    $Address->postal_code= $request->postal_code;
    $Address->phone= $request->phone;
    $Address->update();
    return response()->json([
        "estatus"=> 1,
        "mensaje"=>"Actualizado",

    ],);
}
public function delete($address_id)
{
    $Address =Address::find($address_id)->delete();
    return response()->json([
        "Model"=>$Address,
        "estatus"=> 1,
        "mensaje"=>"Eliminado",

    ],);

}
}
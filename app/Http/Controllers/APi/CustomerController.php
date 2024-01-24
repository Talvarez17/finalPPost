<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CategoryController extends Controller
{
public function getAllCustomer()
{
    $Customer = Customer::All();
    return response()->json($Customer);
}

public function getCustomerXId($id)
{
    $Customer = Customer::find($id);
    return response()->json($Customer);
}

public function createCustomer(Request $request)
{
    $request->validate([
        'name'       => 'required',
        'store_id'   => 'required',
        'first_name' => 'required',
        'last_name'  => 'required',
        'email'      => 'required',
        'address_id' => 'required',
        'active'     => 'required',
    ]);

    $Customer = new Customer();
    $Customer->name = $request->name;
    $Customer->save();

    return response()->json([
        "model" => $Customer,
        "estatus" => 1,
        "mensaje" => "Registrado"
    ]);
}
public function updateCategory(Request $request, $id)
{
    $request->validate([
        'name'       => 'required',
        'store_id'   => 'required',
        'first_name' => 'required',
        'last_name'  => 'required',
        'email'      => 'required',
        'address_id' => 'required',
        'active'     => 'required',
    ]);

    $Customer = Customer::find($id);
    $Customer->name       = $request->name;
    $Customer->store_id   = $request->store_id;
    $Customer->first_name = $request->first_name;
    $Customer->last_name  = $request->last_name;
    $Customer->email      = $request->email;
    $Customer->address_id = $request->address_id;
    $Customer->active     = $request->active;
    $Customer->update();

    return response()->json([
        "model" => $Customer,
        "estatus" => 1,
        "mensaje" => "Actualizado"
    ]);
}
public function deleteCustomer($id)
{
    $Customer = Customer::find($id)->delete();

    return response()->json([
        "model" => $Customer,
        "estatus" => 1,
        "mensaje" => "Eliminado"
    ]);
}
}

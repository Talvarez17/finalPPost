<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    public function getAllInventory()
    {
        $Inventory = Inventory::All();
        return response()->json($Inventory);
    }

    public function getXidInventory($film_id)
    {
        $Inventory = Inventory::find($film_id);
        return response()->json($Inventory);
    }

    public function createInventory(Request $request)
    {
        $request->validate([
            'film_id' => 'required',
            'store_id' => 'required',
        ]);
        $Inventory = new Inventory();
        $Inventory->film_id = $request->film_id;
        $Inventory->store_id = $request->store_id;
        $Inventory->save();
        return response()->json([
            "estatus" => 1,
            "mensaje" => "Registrado"
        ]);
    }
    public function updateInventory(Request $request, $film_id)
    {
        $request->validate([
            'film_id' => 'required',
            'store_id' => 'required',
        ]);
        $Inventory = Inventory::find($film_id);
        $Inventory->film_id = $request->film_id;
        $Inventory->store_id = $request->store_id;
        $Inventory->update();
        return response()->json([
            "Model"=>$Inventory,
            "estatus" => 1,
            "mensaje" => "Registrado"
        ]);
    }
    public function deleteInventory($film_id)
    {
        $Inventory = Inventory::find($film_id)->delete();
        return response()->json([
            
            "estatus" => 1,
            "mensaje" => "Eliminado"
        ]);
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rental;

class RentalController extends Controller
{
    public function getAllRental(){

        $Rental = Rental::All();
        return response()->json($Rental);
    }

    public function getRentalXId($id){
        $Rental = Rental::find($id);
        return response()->json($Rental);
    }

    public function createRental(Request $request)
    {
        $request->validate([
            'rental_date' => 'required',
            'inventory_id' => 'required',
            'customer_id' => 'required',
            'return_date' => 'required',
            'staff_id' => 'required',
        ]);

        $Rental = new Rental();
        $Rental->rental_date = $request->rental_date;
        $Rental->inventory_id = $request->inventory_id;
        $Rental->customer_id = $request->customer_id;
        $Rental->return_date = $request->return_dated;
        $Rental->staff_id = $request->staff_id;
        $Rental->save();

        return response()->json([
            "estatus" => 1,
            "mensaje" => "Registrado"
        ]);
    }

    public function updateRental(Request $request, $id){
        $request->validate([
            'rental_date' => 'required',
            'inventory_id' => 'required',
            'customer_id' => 'required',
            'return_date' => 'required',
            'staff_id' => 'required',
        ]);

        $Rental = Rental::find($id);
        $Rental->rental_date = $request->rental_date;
        $Rental->inventory_id = $request->inventory_id;
        $Rental->customer_id = $request->customer_id;
        $Rental->return_date = $request->return_dated;
        $Rental->staff_id = $request->staff_id;
        $Rental->update();

        return response()->json([
            "Model"=>$Rental,
            "estatus" => 1,
            "mensaje" => "Actualizado"
        ]);
    }

    public function deleteRental($id){
        
        $Rental = Rental::find($id)->delete();
        return response()->json([
            
            "estatus" => 1,
            "mensaje" => "Eliminado"
        ]);
    }
}

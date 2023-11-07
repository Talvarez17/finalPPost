<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function getAllPayment(){

        $Payment = Payment::All();
        return response()->json($Payment);
    }

    public function getXIdPayment($id){
        $Payment = Payment::find($id);
        return response()->json($Payment);
    }

    public function createPayment(Request $request)
    {
        $request->validate([
            'customer_date' => 'required',
            'staff_id' => 'required',
            'rental_id' => 'required',
            'amount' => 'required',
            'payment_date' => 'required',
        ]);

        $Payment = new Payment();
        $Payment->customer_date = $request->customer_date;
        $Payment->staff_id = $request->staff_id;
        $Payment->rental_id = $request->rental_id;
        $Payment->amount = $request->amountd;
        $Payment->payment_date = $request->payment_date;
        $Payment->save();

        return response()->json([
            "estatus" => 1,
            "mensaje" => "Registrado"
        ]);
    }

    public function updatePayment(Request $request, $id){
        $request->validate([
            'customer_date' => 'required',
            'staff_id' => 'required',
            'rental_id' => 'required',
            'amount' => 'required',
            'payment_date' => 'required',
        ]);

        $Payment = Payment::find($id);
        $Payment->customer_date = $request->customer_date;
        $Payment->staff_id = $request->staff_id;
        $Payment->rental_id = $request->rental_id;
        $Payment->amount = $request->amountd;
        $Payment->payment_date = $request->payment_date;
        $Payment->update();

        return response()->json([
            "Model"=>$Payment,
            "estatus" => 1,
            "mensaje" => "Actualizado"
        ]);
    }

    public function deletePayment($id){
        
        $Payment = Payment::find($id)->delete();
        return response()->json([
            
            "estatus" => 1,
            "mensaje" => "Eliminado"
        ]);
    }
}

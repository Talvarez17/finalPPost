<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function getAllCountry()
    {
        $Country = Country::All();
        return response()->json($Country);
    }

    public function getCountryXId($country_id)
    {
        $Country = Country::find($country_id);
        return response()->json($Country);
    }

    public function createCountry(Request $request)
    {
        $request->validate([
            'country_id' => 'required',
            'country'    => 'required',
        ]);

        $Country = new Country();
        $Country->country_id = $request->country_id;
        $Country->country = $request->country;
        $Country->save();

        return response()->json([
            "estatus" => 1,
            "mensaje" => "Registrado"
        ]);
    }

    public function updateCountry(Request $request, $country_id)
    {
        $request->validate([
            'country_id' => 'required',
            'country'    => 'required',
        ]);
        $Country = Country::find($country_id);
        $Country->country_id = $request->country_id;
        $Country->country    = $request->country;
        $Country->update();
        return response()->json([
            "Model"=>$Country,
            "estatus" => 1,
            "mensaje" => "Actualizado"
        ]);
    }

    public function deleteCountry($id_country)
{
    $Country = Country::find($id_country)->delete();
    return response()->json([
        "model" => $Country,
        "estatus" => 1,
        "mensaje" => "Eliminado"
    ]);
}
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = Store::all();
        return response()->json($stores);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'manager_staff_id' => 'required',
            'address_id' => 'required'
        ]);
        $store = new Store();
        $store->store_id = date('s') + random_int(0, 1);
        $store->manager_staff_id = $request->manager_staff_id;
        $store->address_id = $request->address_id;
        return response()->json($store->save());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(Store::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'manager_staff_id' => 'required',
            'address_id' => 'required'
        ]);
        $store = Store::find($id);
        $store->manager_staff_id = $request->manager_staff_id;
        $store->address_id = $request->address_id;
        return response()->json($store->update());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $store = Store::find($id);
        return response()->json($store->destroy($id));
    }
}

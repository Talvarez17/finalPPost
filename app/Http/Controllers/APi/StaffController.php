<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Staff::all([
            'staff_id',
            'first_name',
            'last_name',
            'address_id',
            'email',
            'store_id',
            'username',
            'password'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required', 
            'last_name' => 'required', 
            'address_id' => 'required', 
            'picture' => 'required', 
            'email' => 'required|email', 
            'store_id' => 'required',
            'username' => 'required', 
            'password' => 'required'
        ]);
        $staff = new Staff();
        $staff->staff_id = date('s') + random_int(0, 1);
        $staff->first_name = $request->first_name;
        $staff->last_name = $request->last_name;
        $staff->address_id = $request->address_id;
        $staff->picture = $request->picture;
        $staff->email = $request->email;
        $staff->store_id = $request->store_id;
        $staff->username = $request->username;
        $staff->password = Hash::make($request->password);
        return response()->json($staff->save());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $staff = Staff::find($id);
        if (isset($staff->picture)) {
            $staff->picture = null;
        }
        return response()->json($staff);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required', 
            'last_name' => 'required', 
            'address_id' => 'required', 
            'picture' => 'required', 
            'email' => 'required|email', 
            'store_id' => 'required',
            'username' => 'required', 
            'password' => 'required'
        ]);
        $staff = Staff::find($id);
        $staff->first_name = $request->first_name;
        $staff->last_name = $request->last_name;
        $staff->address_id = $request->address_id;
        $staff->picture = $request->picture;
        $staff->email = $request->email;
        $staff->store_id = $request->store_id;
        $staff->username = $request->username;
        $staff->password = Hash::make($request->password);
        return response()->json($staff->update());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staff = Staff::find($id);
        return response()->json($staff->delete($id));
    }
}

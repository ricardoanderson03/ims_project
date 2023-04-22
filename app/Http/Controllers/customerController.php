<?php

namespace App\Http\Controllers;
use App\Models\customer;
use Illuminate\Http\Request;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*
        untuk menampilkan data
        */
        $customer=customer::paginate(10);
        return response()->json([
            'data'=>$customer
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
        menyimpan name dari requeset name, dst
        */
        $customer=customer::create([
            'name'=>$request->name,
            'id_number'=>$request->id_number,
            'dob'=>$request->dob,
            'email'=>$request->email
        ]);

        // memngirim balik data ke costumer
        return response()->json([
            'data'=>$customer
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(customer $customer)
    {
        return response()->json([
            'data'=>$customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, customer $customer)
    {
        /*
        update customer name dari request name dst.
        */
        $customer->name=$request->name;
        $customer->email=$request->email;
        $customer->dob=$request->dob;
        $customer->id_number=$request->id_number;
        $customer->save();
        return response()->json([
            'data'=>$customer
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(customer $customer)
    {
        $customer->delete();
        return response()->json([
            'message'=>'customer delete'
        ],204);
    }
}

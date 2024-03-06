<?php

namespace App\Http\Controllers\API;

use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Requestproduct;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request )
    {
          
        $per_page =$request->get('per_page',25);
        $product=product::paginate($per_page);
        return response()->json($product);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator =validator::make($request->all(),[
            'name'=>'required|string',
            'qty'=>'required|numeric',
            'price'=>'required|decimal:2',
            'description'=>'required|nullable'
        ]);

        $product =product::create([
            'name'=>$request->name,
            'qty'=>$request->qty,
            'price'=>$request->price,
            'description'=>$request->description,
            ]);
            return response()->json($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product=product::findOrFail($id);
        return response()->json( $product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product=product::findOrFail($id);
        $product->update($request->all());
        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product=product::findOrFail($id);
        $product->delete();
        return response()->json([
            'status'=>200,
            'message'=>'product deleted successfully',
        
        ],200);
    }
    }


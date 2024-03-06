<?php

namespace App\Http\Controllers;


use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Requestproduct;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    public function index(){
        $products = product::all();
        return view ('products.index',compact('products'));
        }

    public function create(){

         return view ('products.create');
    
    }
    public function store (request $request){
        $validator =validator::make($request->all(),[
            'name'=>'required|string',
            'qty'=>'required|numeric',
            'price'=>'required|decimal:2',
            'description'=>'required|nullable'
        ]);

        $newproduct =product::create([
            'name'=>$request->name,
            'qty'=>$request->qty,
            'price'=>$request->price,
            'description'=>$request->description,
            ]);

        return redirect(route('products.index'));
    
    }
    public function edit(product $product){
        return view ('products.edit',['product'=>$product]);
      
    }
    public function update(product $product ,request $request){
        $validator =validator::make($request->all(),[
            'name'=>'required|string',
            'qty'=>'required|string',
            'price'=>'required|string',
            'description'=>'required|nullable'
        ]);
       if ($validator) {
        return back()->withErrors($validator)->withInput();
        }else{
        return redirect(route('products.index'))->with('success','product Updated succesffully');
    }
}
public function destroy (product $product){
    
    $product->delete();
     return redirect(route('products.index'))->with('success','product Delete succesffully');

}
}

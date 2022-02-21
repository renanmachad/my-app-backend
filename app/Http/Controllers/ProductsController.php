<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;

/*
*   Controller para retornar produtos;
*   Método try/catch aplicado para melhor debug e não quebrar servidor;
*/


class ProductsController extends Controller
{
    public function show($id){
        
        try{
            $products = Products::where('id', $id)->first();
            $user= $products->user()->first();
            return response()->json(['products'=>$products, 'user'=>$user],200);
        }catch(\Exception $e){
            return response()->json(['error'=>$e],400);
        }

    }
    public function register(Request $request)
    {    
        try{
            $product_register = new Products();
            $product_register->fill($request->all());
            $product_register->save();
            return response()->json($product_register,201);
        }catch(\Exception $e){
            return response()->json(['error'=>$e],400);
        }
    }
}
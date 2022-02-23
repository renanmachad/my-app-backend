<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;

class UserController extends Controller
{
    /*
    *   Função para mostrar usuário e produto relacionado;
    *   Método try/catch aplicado para melhor debug e não quebrar servidor;
    */
    public function showAll(User $user){
        try{
            return response()->json($user->all());
        }catch(\Exception $e){
            return response()->json($e,400);
        }
    }

    public function show($id)
    {
        
        try{
            //Busca dados no banco;
            $user = User::where('id', $id)->first();
            $products = $user->products()->get();

            //retorno em JSON por ser uma API
            return response()->json(['user'=> $user,'produtos'=> $products],200);
        }catch(\Exception $e){
            //retorno de erros em JSON também;
            return response()->json($e,400);
        }
    
    }

    public function register(Request $request)
    {
        try{
            $user_register = new User();
            $user_register->fill($request->all());
            $user_register->save();
            return response()->json($user_register,201);
        }catch(\Exception $e){
            return response()->json(['error'=>$e],400);
        }
    }

    public function update(Request $request,$id)
    {
        try{
            $user = User::find($id);
            
            if(!$user){
                return response()->json([
                    'error'=>'Usuário não encontrado'
                ], 404);
            }

            $user->fill($request->all());
            $user->save();

            return response()->json(['response'=>'Usuário atualizado com sucesso'],200);

        }catch(\Exception $e)
        {
            return response()->json($e,400);
        }

    }

    public function delete($id){
        try{
            
            $user = User::find($id);
            
            if(!$user){
                return response()->json([
                    'error'=>'Usuário não encontrado'
                ],404);
            }

            $user->delete();

            return response()->json([
                'response'=>'Deletado com sucesso'
            ],200);

        }catch(\Exception $e){
            return response()->json($e,400);
        }
    }
}

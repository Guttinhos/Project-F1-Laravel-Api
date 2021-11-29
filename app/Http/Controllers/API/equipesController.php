<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\equipes;
use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;

class equipesController extends Controller
{

    public function index()
    {
        $equipe = equipes::all();
        return response()->json([
            'equipes' => $equipe
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            $equipe = new equipes;
            $equipe->nome = $request->input('nome');
            $equipe->motor = $request->input('motor');
            $equipe->chassi = $request->input('chassi');
            $equipe->fundador = $request->input('fundador');
            $equipe->sede = $request->input('sede');
            $equipe->save();

            return response()->json([
                'message' => 'Equipe cadastrada com Sucesso',
            ],201);

        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Equipe já cadastrada',
            ], 400);
        }
    }

    public function edit($id)
    {
        $equipe = equipes::find($id);
        
        if($equipe) {
            $res =  response()->json([
                'equipe' => $equipe,
            ], 200);
        } else {
            $res =  response()->json([
                'message' => 'Equipe não encontrada',
            ], 404);
        }

        return $res;
    }

    public function update(Request $request, $equipe)
    {
        $equipe = equipes::where('id', $request->id)->update($request->all());

        if($equipe) {
            $res =  response()->json([
                'message' => 'Equipe Editada com Sucesso'
            ], 200);
        } else {
            $res =  response()->json([
                'message' => 'Equipe não encontrada'
            ], 404);
        }

        return $res;
    }

    public function destroy($id)
    {
        $equipe = equipes::find($id);

        if ($equipe) {
            $equipe->delete();
            return response()->json([
                'message' => 'Equipe Deletada com Sucesso'
            ], 200);
        } else {
            return response()->json([
                'message' => 'ERROR'
            ], 404);
        }
    }
}

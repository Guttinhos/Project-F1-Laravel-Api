<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\equipes;
use Illuminate\Http\Request;


class equipesController extends Controller
{

    public function index()
    {
        $equipe = equipes::all();
        return response()->json([
            'status' => 200,
            'equipes' => $equipe
        ]);
    }

    public function store(Request $request)
    {
        $equipe = new equipes;
        $equipe->nome = $request->input('nome');
        $equipe->motor = $request->input('motor');
        $equipe->chassi = $request->input('chassi');
        $equipe->save();

        return response()->json([
            'status' => 200,
            'message' => 'Equipe cadastrada com Sucesso'
        ]);
    }

    public function edit($id)
    {
        $equipe = equipes::find($id);
        return response()->json([
            'status' => 204,
            'equipe' => $equipe,
        ]);
    }

    public function update(Request $request, $equipe)
    {
        $equipe = equipes::where('id', $request->id)->update($request->all());


        return response()->json([
            'status' => 200,
            'message' => 'Equipe Editada com Sucesso'
        ]);
    }

    public function destroy($id)
    {
        $equipe = equipes::find($id);

        if ($equipe) {
            $equipe->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Equipe Deletada com Sucesso'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'ERROR'
            ]);
        }
    }
}

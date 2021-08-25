<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GeneroLiterario;

class GeneroLiterarioApiController extends Controller
{
    public function __construct(GeneroLiterario $gliterario, Request $request) //Metodo construtor da controller
    {
        $this->gliterario = $gliterario;
        $this->request = $request;
    }
    
    public function index() //Realiza a recuperação dos dados no formato Json
    {
        $dados = $this->gliterario->all();
        return response()->json($dados);
    }
    
    public function store(Request $request, GeneroLiterario $gliterario) //Realiza a requisição do metodo http
    {
        $this->validate($request, $gliterario->rules());

        $conjuntoDados = $request->all();
        $dados = $this->gliterario->create($conjuntoDados);
        return response()->json($dados, 201);
    }

    public function show($id) //Realiza uma pesquisa dentre os dados 
    {
        if(!$dados = $this->gliterario->find($id)){
            return response()->json(['error'=>'O gênero literário em questão não foi encontrada'], 404);
        } else {
            return response()->json($dados);
        }
    }

    public function update(Request $request, $id) //Realiza a edição de dados pré-existentes
    {
        if(!$dados = $this->gliterario->find($id)){
            return response()->json(['error'=>'O gênero literário em questão não foi encontrada'], 404);
        }
        
        $this->validate($request, $this->gliterario->rules());
        $conjuntoDados = $request->all();
        $dados->update($conjuntoDados);
        return response()->json($dados);
    }

    public function destroy($id) //Realiza a remoção de dados já incluídos
    {
        $dados=$this->gliterario->find($id);
            if(!$dados){
                return response()->json(['error'=>'O gênero literário em questão não foi encontrada'], 404);
            }else{
                $dados->delete();
                return response()->json(['success'=>'O Dado '.$id.' foi excluído com sucesso.']);
            }
    }
}
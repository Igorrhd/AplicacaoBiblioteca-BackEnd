<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Editora;

class EditoraApiController extends Controller
{
    public function __construct(Editora $editora, Request $request) //Metodo construtor da controller
    {
        $this->editora = $editora;
        $this->request = $request;
    }
    
    public function index() //Realiza a recuperação dos dados no formato Json
    {
        $dados = $this->editora->all();
        return response()->json($dados);
    }
    
    public function store(Request $request, Editora $editora) //Realiza a requisição do metodo http
    {
        $this->validate($request, $editora->rules());

        $conjuntoDados = $request->all();
        $dados = $this->editora->create($conjuntoDados);
        return response()->json($dados, 201);
    }

    public function show($id) //Realiza uma pesquisa dentre os dados 
    {
        if(!$dados = $this->editora->find($id)){
            return response()->json(['error'=>'A editora em questão não foi encontrada'], 404);
        } else {
            return response()->json($dados);
        }
    }

    public function update(Request $request, $id) //Realiza a edição de dados já pré-existentes
    {
        if(!$dados = $this->editora->find($id)){
            return response()->json(['error'=>'A editora em questão não foi encontrada'], 404);
        }
        
        $this->validate($request, $this->editora->rules());
        $conjuntoDados = $request->all();
        $dados->update($conjuntoDados);
        return response()->json($dados);
    }

    public function destroy($id) //Realiza a remoção de dados já incluídos
    {
        $dados=$this->editora->find($id);
            if(!$dados){
                return response()->json(['error'=>'A editora em questão não foi encontrada'], 404);
            }else{
                $dados->delete();
                return response()->json(['success'=>'O Dado '.$id.' foi excluído com sucesso.']);
            }
    }
}

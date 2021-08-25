<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Autor;

class AutorApiController extends Controller
{
    public function __construct(Autor $autor, Request $request) //Metodo construtor da controller
    {
        $this->autor = $autor;
        $this->request = $request;
    }
    
    public function index() //Realiza a recuperação dos dados no formato Json
    {
        $dados = $this->autor->all();
        return response()->json($dados);
    }
    
    public function store(Request $request, Autor $autor) //Realiza a requisição do metodo http
    {
        $this->validate($request, $autor->rules());

        $conjuntoDados = $request->all();
        $dados = $this->autor->create($conjuntoDados);
        return response()->json($dados, 201);
    }

    public function show($id) //Realiza uma pesquisa dentre os dados 
    {
        if(!$dados = $this->autor->find($id)){
            return response()->json(['error'=>'O autor em questão não foi encontrado'], 404);
        } else {
            return response()->json($dados);
        }
    }

    public function update(Request $request, $id) //Realiza a edição de dados já pré-existentes
    {
        if(!$dados = $this->autor->find($id)){
            return response()->json(['error'=>'O autor em questão não foi encontrado'], 404);
        }
        
        $this->validate($request, $this->autor->rules());
        $conjuntoDados = $request->all();
        $dados->update($conjuntoDados);
        return response()->json($dados);
    }

    public function destroy($id) //Realiza a remoção de dados já incluídos
    {
        $dados=$this->autor->find($id);
            if(!$dados){
                return response()->json(['error'=>'O autor em questão não foi encontrado'], 404);
            }else{
                $dados->delete();
                return response()->json(['success'=>'O Dado '.$id.' foi excluído com sucesso.']);
            }
    }
    
}

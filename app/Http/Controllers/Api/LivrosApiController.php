<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Livro;

class LivrosApiController extends Controller
{
    public function __construct(Livro $livro, Request $request) //Metodo construtor da controller
    {
        $this->livro = $livro;
        $this->request = $request;
    }
    
    public function index() //Realiza a recuperação dos dados no formato Json
    {
        $dados = $this->livro->all();
        return response()->json($dados);
    }
    
    public function store(Request $request, Livro $livro) //Realiza a requisição do metodo http
    {
        $this->validate($request, $livro->rules());

        $conjuntoDados = $request->all();
        $dados = $this->livro->create($conjuntoDados);
        return response()->json($dados, 201);
    }

    public function show($id) //Realiza uma pesquisa dentre os dados 
    {
        if(!$dados = $this->livro->find($id)){
            return response()->json(['error'=>'O livro em questão não foi encontrado'], 404);
        } else {
            return response()->json($dados);
        }
    }

    public function update(Request $request, $id) //Realiza a edição de dados já pré-existentes
    {
        if(!$dados = $this->livro->find($id)){
            return response()->json(['error'=>'O livro em questão não foi encontrado'], 404);
        }
        
        $this->validate($request, $this->livro->rules());
        $conjuntoDados = $request->all();
        $dados->update($conjuntoDados);
        return response()->json($dados);
    }

    public function destroy($id) //Realiza a remoção de dados já incluídos
    {
        $dados=$this->livro->find($id);
            if(!$dados){
                return response()->json(['error'=>'O livro em questão não foi encontrado'], 404);
            }else{
                $dados->delete();
                return response()->json(['success'=>'O Dado '.$id.' foi excluído com sucesso.']);
            }
    }
}

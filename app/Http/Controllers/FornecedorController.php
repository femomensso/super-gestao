<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        $fornecedores = [ 0 => ['nome' => 'Fornecedor 1', 'status' => 'N', 'CNPJ' => '00.000.000']];
        
        
        return view('app.fornecedor.index', compact('fornecedores'));

        //condicao ? se verdade : se falso; --Operador ternário
        //isset($fornecedores[0]['nome']) ? $fornecedores[0]['nome'] : 'Não informado';
    }

    public function listar(Request $request) {

        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
        ->where('site', 'like', '%'.$request->input('site').'%')
        ->where('uf', 'like', '%'.$request->input('uf').'%')
        ->where('email', 'like', '%'.$request->input('email').'%')
        ->sImplePaginate(10);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request) {

        $msg = '';
        
        if($request->input('_token') != '' && $request->input('id') == '') {
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'Esse campo deve ser preenchido.',
                'email' => 'O email não foi preenchido corretamente.',
                'nome.min' => 'Esse campo deve possuir no mínimo 03 caracteres.',
                'uf.min' => 'Esse campo deve possuir no mínimo 02 caracteres.',
                'uf.max' => 'Esse campo deve possuir no máximo 02 caracteres.'
            ];

            $request->validate($regras, $feedback);
            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Cadastro realizado com sucesso!';
        }

        if($request->input('_token') != '' && $request->input('id') != '') {

            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update) {
                $msg = 'Atualização realizada com sucesso!';
            } else {
                $msg = 'Erro ao atualizar o registro!';
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = '') {
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir($id) {
        Fornecedor::find($id)->delete();
        return redirect()->route('app.fornecedor');
    }

}

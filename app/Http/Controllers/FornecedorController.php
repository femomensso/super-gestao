<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        $fornecedores = [ 0 => ['nome' => 'Fornecedor 1', 'status' => 'N', 'CNPJ' => '00.000.000']];
        
        
        return view('app.fornecedor', compact('fornecedores'));

        //condicao ? se verdade : se falso; --Operador ternário
        //isset($fornecedores[0]['nome']) ? $fornecedores[0]['nome'] : 'Não informado';
    }

}

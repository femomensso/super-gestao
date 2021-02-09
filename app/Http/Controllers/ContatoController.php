<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function principal() {
        return view('site.contato');
    }

    public function salvar(Request $request) {
        $request->validate(['nome' => 'min:3|max:40', 'telefone' => 'required', 'email' => 'email', 'motivo_contato' => 'required', 'mensagem' => 'required|max:200'],
        ['nome.min' => 'O nome deve possuir no mínimo 03 caracteres.', 'nome.max' => 'O nome deve possuir no máximo 40 caracteres.',
        'required' => 'Esse campo deve ser preenchido.', 'email' => 'O email informado não é válido']
    );
        
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}

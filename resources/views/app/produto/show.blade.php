@extends('app.layouts.basico')
@section('titulo', 'Produtos')

@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Produto - Vizualizar</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href=" {{ route('produto.index') }}">Voltar</a></li>
        </ul>
    </div>
    <div class="informacao-pagina" style="width:30%; margin-left:auto; margin-right:auto;">
    {{ $msg ?? '' }}
        <table border="1" style="text-aling:left">
            <tr>
                <td>ID</td>
                <td>{{$produto->id}}</td>
            </tr>
            <tr>
                <td>Nome</td>
                <td>{{$produto->nome}}</td>
            </tr>
            <tr>
                <td>Descriçao</td>
                <td>{{$produto->descricao}}</td>
            </tr>
            <tr>
                <td>Peso</td>
                <td>{{$produto->peso}}</td>
            </tr>
            <tr>
                <td>Unidade</td>
                <td>{{$produto->unidade_id}}</td>
            </tr>
        </table>
    </div>
</div>

@endsection
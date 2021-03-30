@extends('app.layouts.basico')
@section('titulo', 'Produtos')

@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Produto Detalhe - Editar</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href=" {{ route('produto.index') }}">Voltar</a></li>
        </ul>
    </div>
    <div class="informacao-pagina" style="width:30%; margin-left:auto; margin-right:auto;">
    {{ $msg ?? '' }}
        <h4>Produto</h4>
        <div>Nome: {{ $produto_detalhe->produto->nome }}</div><br>
        <div>Descriçao: {{ $produto_detalhe->produto->descricao }}</div><br>
        <form method="post" action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}">
            @csrf
            @method('PUT')
            {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}
            <input type="text" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}" name="produto_id" placeholder="ID do Produto" class="borda-preta">
            {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}
            <input type="number" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}" name="comprimento" placeholder="Comprimento" class="borda-preta">
            {{ $errors->has('largura') ? $errors->first('largura') : '' }}
            <input type="number" value="{{ $produto_detalhe->largura ?? old('largura') }}" name="largura" placeholder="Largura" class="borda-preta">
            {{ $errors->has('altura') ? $errors->first('altura') : '' }}
            <input type="number" value="{{ $produto_detalhe->altura ?? old('altura') }}" name="altura" placeholder="Altura" class="borda-preta">
            {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
            <select name="unidade_id">
            <option>Selecione a Unidade de Medida</option>
            @foreach ($unidades as $unidade )
                <option value="{{$unidade->id}}" {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>{{$unidade->descricao}}</option>
            @endforeach
            </select>
            <button type="submit" class="borda-preta">Editar</button>
        </form>
    </div>
</div>

@endsection
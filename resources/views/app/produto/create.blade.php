@extends('app.layouts.basico')
@section('titulo', 'Produtos')

@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Produto - Adicionar</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href=" {{ route('produto.index') }}">Voltar</a></li>
        </ul>
    </div>
    <div class="informacao-pagina" style="width:30%; margin-left:auto; margin-right:auto;">
    {{ $msg ?? '' }}
        <form method="post" action="{{ route('produto.store') }}">
            @csrf
            {{ $errors->has('nome') ? $errors->first('nome') : '' }}
            <input type="text" value="{{ old('nome') }}" name="nome" placeholder="Nome" class="borda-preta">
            {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
            <input type="text" value="{{ old('descricao') }}" name="descricao" placeholder="Descrição" class="borda-preta">
            {{ $errors->has('peso') ? $errors->first('peso') : '' }}
            <input type="number" value="{{ old('peso') }}" name="peso" placeholder="Peso" class="borda-preta">
            {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
            <select name="unidade_id">
            <option>Selecione a Unidade de Medida</option>
            @foreach ($unidades as $unidade )
                <option value="{{$unidade->id}}">{{$unidade->descricao}}</option>
            @endforeach
            </select>
            <button type="submit" class="borda-preta">Cadastrar</button>
        </form>
    </div>
</div>

@endsection
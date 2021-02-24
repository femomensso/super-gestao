@extends('app.layouts.basico')
@section('titulo', 'Produtos')

@section('conteudo')

<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Produto Detalhes- Adicionar</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href=" {{ route('produto.index') }}">Voltar</a></li>
        </ul>
    </div>
    <div class="informacao-pagina" style="width:30%; margin-left:auto; margin-right:auto;">
    {{ $msg ?? '' }}
        <form method="post" action="{{ route('produto-detalhe.store') }}">
            @csrf
            {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}
            <input type="text" value="{{ old('produto_id') }}" name="produto_id" placeholder="ID do Produto" class="borda-preta">
            {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}
            <input type="number" value="{{ old('comprimento') }}" name="comprimento" placeholder="Comprimento" class="borda-preta">
            {{ $errors->has('largura') ? $errors->first('largura') : '' }}
            <input type="number" value="{{ old('largura') }}" name="largura" placeholder="Largura" class="borda-preta">
            {{ $errors->has('altura') ? $errors->first('altura') : '' }}
            <input type="number" value="{{ old('altura') }}" name="altura" placeholder="Altura" class="borda-preta">
            {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
            <select name="unidade_id">
            <option>Selecione a Unidade de Medida</option>
            @foreach ($unidades as $unidade )
                <option value="{{$unidade->id}}" {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>{{$unidade->descricao}}</option>
            @endforeach
            </select>
            <button type="submit" class="borda-preta">Cadastrar</button>
        </form>
    </div>
</div>

@endsection
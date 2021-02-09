@extends('site.layouts.basico')
@section('titulo', 'Contato')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style='width:40%; margin:auto;'>
                <form action={{route('site.login')}} method='post'>
                @csrf
                {{$errors->has('usuario') ? $errors->first('usuario') : ''}}
                <input name='usuario' type='email' value="{{old('usuario')}}" placeholder='Usuario' class='borda-preta'>
                {{$errors->has('senha') ? $errors->first('senha') : ''}}
                <input name='senha' type='password' value="{{old('senha')}}" placeholder='Senha' class='borda-preta'>
                <button type='submit' class='borda-preta'>Acessar</button>
                </form>
                {{isset($erro) ? $erro : ''}}
            </div>
        </div>  
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/facebook.png') }}">
            <img src="{{ asset('img/linkedin.png') }}">
            <img src="{{ asset('img/youtube.png"') }}>
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="img/mapa.png">
        </div>
    </div>
@endsection
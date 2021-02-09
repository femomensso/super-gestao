<form method="post" action="{{ route('site.contato') }}">
    @csrf
    <input type="text" value="{{ old('nome') }}" name="nome" placeholder="Nome" class="{{ $classe }}">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
    <br>
    <input type="text" value="{{ old('telefone') }}" name="telefone" placeholder="Telefone" class="{{ $classe }}">
    {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
    <br>
    <input type="text" value="{{ old('email') }}" name="email" placeholder="E-mail" class="{{ $classe }}">
    {{ $errors->has('email') ? $errors->first('email') : '' }}
    <br>
    <select name="motivo_contato" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        <option value="1" {{ old('motivo_contato') == 1 ? 'selected' : ''}}>Dúvida</option>
        <option value="2" {{ old('motivo_contato') == 2 ? 'selected' : ''}}>Elogio</option>
        <option value="3" {{ old('motivo_contato') == 3 ? 'selected' : ''}}>Reclamação</option>
    </select>
    {{ $errors->has('motivo_contato') ? $errors->first('motivo_contato') : '' }}
    <br>
    <textarea name="mensagem" class="{{ $classe }}">{{ (old('mensagem') != '') ? (old('mensagem')) : ('Preencha aqui a sua mensagem')}}</textarea>
    {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

@if ($errors->any())
    <div style="position:absolute; top:0px; left:0px; width:100%; background-color:red;">
    @foreach ($errors->all() as $error)
        {{$error}}
        <br>
    @endforeach
    </div>
@endif
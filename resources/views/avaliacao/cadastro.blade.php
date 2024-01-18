@extends('avaliacao.master.layout')
@section('content')
    <div class="container">
        <h4 class="mb-3">Cadastrar Usuário</h4>
        <form class="needs-validation" novalidate method="POST" action="{{ route('user.store') }}">
            @csrf
            <div class="mb-3">
                <label for="nomeCompleto">Nome Completo</label>
                <div class="input-group">
                    <input type="text" class="form-control @error('nomeCompleto') is-invalid @enderror" id="nomeCompleto" name="nomeCompleto" placeholder="" value="{{ old('nomeCompleto') }}" required minlength="3" maxlength="50">
                    @error('nomeCompleto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" required>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="A senha deve ter entre 6 e 20 digitos" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="confirmarSenha">Confirmação de Senha</label>
                    <input type="password" class="form-control @error('confirmarSenha') is-invalid @enderror" id="confirmarSenha" name="confirmarSenha" placeholder="Por favor, repita a senha" required>
                    @error('confirmarSenha')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <br>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Cadastrar</button>
        </form>
    </div>
@endsection


@extends('avaliacao.master.layout')
@section('content')
    <div class="container">
        <h4 class="mb-3">Usuários</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">E-Mail</th>
                <th scope="col">Data Cadastro</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($usuarios as $u)
                <tr>
                    <td>{{$u->id}}</td> 
                    <td>{{$u->name}}</td> 
                    <td>{{$u->email}}</td> 
                    @php
                        $dataFormatada = \Carbon\Carbon::parse($u->created_at)->format('d/m/Y');
                    @endphp
                    <td>{{$dataFormatada}}</td> 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
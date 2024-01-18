<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //tela de listagem de usuários
    public function index()
    {
        $usuarios = User::all();
        return view('avaliacao.user', ['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    //tela de cadastro de usuários
    public function create()
    {
        return view('avaliacao.cadastro');
    }

    /**
     * Store a newly created resource in storage.
     */
    //metodo para salvar informações vindas da tela de cadastro
    public function store(Request $request)
    {
        //Direciona os parametros para serem validados
        $this->validaCampos($request);

        $user = new User;
        $user->name = $request->input('nomeCompleto');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        
        $user->save();

        
        //faço essa validação para poder receber os parametros do teste unitario 
        // caso haja necessidade posso criar um metodo separado para a API Rest e remover esse primiro IF
        //o teste que está vindo da pasta test/Fature/UserTest.php (php artisan test tests/Feature/UserTest.php)
         
        
        if ($request->expectsJson()) {
            if ($user->wasRecentlyCreated) {
                return response()->json([
                    'success' => true,
                    'redirect' => route('avaliacao.cadastro'),
                    'message' => 'Usuário cadastrado com sucesso!'
                ]);
            } else {
                return response()->json(['success' => false, 'message' => 'Erro ao cadastrar o usuário.']);
            }
        }

        //fim validacao 

        if ($user->wasRecentlyCreated) {
            return redirect()->route('avaliacao.cadastro')->with('success', 'Usuário cadastrado com sucesso!');
        } else {
            return response()->json(['success' => false, 'message' => 'Erro ao cadastrar o usuário.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    //metodo chamado para validar as informações do usuário
    //o mesmo tambem pode ser usado para edição caso haja necessidade

    public function validaCampos(Request $request)
    {
        $request->validate([
            'nomeCompleto' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20',
            'confirmarSenha' => 'required|same:password',
        ]);
    }

}
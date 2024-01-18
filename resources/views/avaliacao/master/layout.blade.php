<!DOCTYPE html>
<html lang="en">
    <header>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Usuários</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="http://127.0.0.1:8000/style.css" class="">
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="https://www.firstdecision.com.br">First Decision</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{(Route::current()->getName() === 'avaliacao.user' ? 'active' : '')}}"> <a class="nav-link" href="{{route('avaliacao.user')}}">Usuários </a> </li>
                <li class="nav-item {{(Route::current()->getName() === 'avaliacao.cadastro' ? 'active' : '')}}"> <a class="nav-link" href="{{route('avaliacao.cadastro')}}">Cadastro</a> </li>
            </ul>
        </div>
      </nav>
    </header>
    <body class="bg-light">
    <main role="main">
        <div class="container">
            <div class="py-5 text-center">
            </div>
            @yield('content')
            <footer class="my-5 pt-5 text-muted text-center text-small">
                <p class="mb-1">&copy; 2002-{{date('Y')}} First Decision</p>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">Privacidade</a></li>
                    <li class="list-inline-item"><a href="#">Termos</a></li>
                    <li class="list-inline-item"><a href="#">Suporte</a></li>
                </ul>
            </footer>
        </div>
    </main>   

         
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> 
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>

            <script>
                alert("{{ session('success') }}");
            </script>
        @endif
    </body>
</html>
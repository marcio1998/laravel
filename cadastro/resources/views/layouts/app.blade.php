<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Projeto Cadastro de Usuarios</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    {{-- importando o bootstrap --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}" /> 
    <style>
        body{
            padding: 20px;
        }

        navbar{
          margin-bottom: 20px;   
        }
    </style>
</head>
<body>
    <div class="container">
        @component('component', ["current" => $current])
        @endcomponent
        <main role="main">
            @hasSection ('body')
                @yield('body')                
            @endif
        </main>
    </div>
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    </body>
</html>
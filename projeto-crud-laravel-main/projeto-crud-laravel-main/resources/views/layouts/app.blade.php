<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Sistema de Cadastro')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #000; /* Fundo preto */
            color: #fff; /* Texto branco */
            font-size: 1.1rem; /* Aumenta o tamanho da fonte para melhorar a legibilidade */
        }

        .card {
            background-color: #333; /* Cor de fundo escuro para o card */
            border: 1px solid #555; /* Borda para destacar o card */
        }

        .table {
            background-color: #333; /* Fundo da tabela */
            color: #fff; /* Texto branco nas tabelas */
            font-size: 1.1rem; /* Aumenta o tamanho do texto na tabela */
        }

        .table th, .table td {
            padding: 1rem; /* Aumenta o espaçamento nas células da tabela */
        }

        .btn {
            font-size: 1rem; /* Aumenta o tamanho dos botões */
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #444; /* Faixas alternadas para melhorar contraste */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        @yield('content')
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

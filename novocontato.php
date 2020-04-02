<?php
session_start();
if(!isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']!=true)
    header("Location: login.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>OsMeusContatos - Gestão de Contatos na Web</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        body {
            padding-top: 5rem;
        }
        .starter-template {
            padding: 3rem 1.5rem;
            text-align: center;
        }

    </style>

    <script>
        function validateAndSubmit() {
           if(document.getElementById("nome").value == "") {
               alert('O nome não pode estar vazio!');
           } else if (document.getElementById("morada").value == "") {
               alert('A morada não pode estar vazia!');
           } else if (document.getElementById("telefone").value == "") {
               alert('O telefone não pode estar vazio!');
           } else if (document.getElementById("email").value == "") {
               alert('O email não pode estar vazio!');
           } else {
               document.getElementById("novocontato").submit();
           }
        }
    </script>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">OsMeusContatos - Gestor de Contatos</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="novocontato.php">Novo Contato</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contatos.php">Lista de Contatos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<main role="main" class="container">

    <h1>Criar Novo Contato</h1>
    <p>Introduza os dados para acrescentar um novo contato.</p>

    <form id="novocontato" action="addcontato.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" id="nome" name="nome">
        </div>
        <div class="form-group">
            <label>Morada</label>
            <input type="text" class="form-control" id="morada" name="morada">
        </div>
        <div class="form-group">
            <label>Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input type="file" class="form-control-file" id="foto" name="foto">
        </div>
        <button type="button" class="btn btn-primary" onclick="validateAndSubmit()">Introduzir</button>
        <br>
        <?php
        if(isset($_REQUEST['status']) && $_REQUEST['status']!=""){
            if ($_REQUEST['status']=="false") {
        ?>
                <div class="alert alert-danger" role="alert">
                    Ocorreu algum erro na introdução do registo!
                </div>
        <?php
            }
            if ($_REQUEST['status']=="true") {
        ?>
                <div class="alert alert-success" role="alert">
                    Contato introduzido!
                </div>
        <?php
            }
        }
        ?>
    </form>
</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script></body>
</html>


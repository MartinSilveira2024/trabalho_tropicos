<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD JS</title>
</head>

<body class="#f5f5f5 grey lighten-4">

    <?php
    require_once "headerNav.php";
    ?>

    <h1 class="center-align">Trabalho de tópicos emergentes</h1>
    <main class="container">

        <div class="card-panel">

            <p><strong>Tipos de documentos:</strong></p>
            <ul>
                <li>Documentos Administrativos, Documentos Legais, Documentos Pessoais, Documentos Financeiros, Documentos Técnicos e Científicos e variados.</li>
            </ul>
    </main>

    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
 
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems, {
                edge: 'left'
            });

            var sidenav = document.querySelector('.sidenav');
            sidenav.style.width = '250px'; 
        });
    </script>

</body>

</html>
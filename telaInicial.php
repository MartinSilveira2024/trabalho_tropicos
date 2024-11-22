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

    <style>
        .topo {
            margin-top: 50px;
        }

        .colorBlack {
            color: black;
        }
    </style>
</head>

<body class="#f5f5f5 grey lighten-4">

    <?php
    require_once "headerNav.php";
    ?>

    <main class="container topo">
        <div class="card-panel">

            <form onsubmit="return salvardocs(event);">
<h2>Crud de documentos</h2>

                <div class="row">

                    <div class="input-field col s12">
                        <input placeholder="ID" id="id_ficcao" name="id_documento" type="text" disabled>
                        <label for="id_ficcao">ID :</label>
                    </div>

                    <div class="input-field col s12">
                        <input id="tema" type="text" placeholder="Digite o nome do documento" class="validate" name="nome_doc" pattern="^(?!.*').+$" required>
                        <label for="tema">Nome :</label>
                        <span class="helper-text" data-error="Você deve preencher corretamente com o nome do documento e não deve contar aspas simples!"> </span>
                    </div>

                    <div class="input-field col s12">
                        <input id="autor" type="text" placeholder="Digite o tipo de documento" class="validate" name="tipo_doc" pattern="^(?!.*').+$" required>
                        <label for="autor">Tipo :</label>
                        <span class="helper-text" data-error="Você deve preencher corretamente com o tipo de documento e não deve contar aspas simples!"> </span>
                    </div>


                    <div class="input-field col s12">
                        <input type="text" name="data_emissao" class="materialize-textarea">
                        <label for="input">Data :</label>
                    </div>


                    <button class="btn waves-effect waves-light #00c853 accent-4 lighten-3 " type="submit">Salvar documento
                        <i class="material-icons right">send</i>
                    </button><br>
            </form>
            <br>

           
            <table class="highlight">

             
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Data</th>
                        <th colspan="2">Opções</th>
                    </tr>
                </thead>

                <tbody id="docs">

                </tbody>
            </table>
        </div>
        <a href="relatorio.php" class="gray lighten-3 waves-effect waves-light btn"><i class="material-icons right">add</i>Gerar relatorio</a>
    </main>

    <script src="script.js"></script>

  
    <script type="text/javascript" src="js/materialize.min.js"></script>

    <script>
        $('#textarea1').val('New Text');
        M.textareaAutoResize($('#textarea1'));

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
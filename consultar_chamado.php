<?php
  require_once "controle_paginas_restritas.php"
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      body{
        padding-bottom: 60px;
      }
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="logoff.php" class="nav-link">Sair</a>
        </li>
      </ul>
    </nav>
    
    <?php
      $arquivo = "base_chamados.json";
      if(file_exists($arquivo)){
         $json = file_get_contents($arquivo); //pega o conteúdo do json
         $conteudo_json = json_decode($json,true); //transforma a string json em um objeto php
      }
    ?>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              <?php
                if(empty($conteudo_json)){
                  echo "<p>Não existe chamados em aberto!</p>";
                }else{
                  foreach($conteudo_json as $chamado){?>
                    <div class="card mb-3 bg-light">
                      <div class="card-body">
                        <h5 class="card-title"><?=$chamado['titulo']?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?=$chamado['categoria']?></h6>
                        <p class="card-text"><?=$chamado['descricao']?></p>
                      </div>
                    </div>
                <?php
                  }
                }
                ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
      include_once "footer.php";
    ?>
  </body>
</html>
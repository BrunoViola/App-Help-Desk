<?php
  require_once "controle_paginas_restritas.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>App Help Desk</title>
</head>
<body>
   <?php
      $arquivo = "base_chamados.json";

      // ===== Create no JSON =====
      if(file_exists($arquivo)){
         $json = file_get_contents($arquivo); //pega o conteúdo do json
         $conteudo_json = json_decode($json,true); //transforma a string json em um objeto php
      } 

      $conteudo_json[] = $_POST; //adiciona o conteúdo recebido no formulário na última posição
      $encode_conteudo = json_encode($conteudo_json); //codifica em string json
      file_put_contents($arquivo, $encode_conteudo); //json recebe o array atualizado
      echo "Dados salvos com sucesso!";
      // ===========================
   ?>
</body>
</html>
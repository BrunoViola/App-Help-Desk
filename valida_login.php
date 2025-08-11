<?php
   session_start();
   //verifica se a autenticacao foi realizada
   $usuario_autenticado = false;
   $usuario_id = null;
   $usuario_perfil = null;

   $perfis = array('Administativo'=>1, 'Usuário'=>2);

   $usuarios_app = array(
      array('id'=>1,'email'=>'adm@teste.br', 'senha'=>'1234', 'perfil'=>1),
      array('id'=>2,'email'=>'user@teste.br', 'senha'=>'4321', 'perfil'=>1),
      array('id'=>3,'email'=> 'maria@teste.br', 'senha'=>'1', 'perfil'=>2),
      array('id'=>4,'email'=> 'jose@teste.br', 'senha'=>'1234', 'perfil'=>2),
   );
   foreach($usuarios_app as $user) {
      if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
         $usuario_autenticado = true;
         $usuario_id = $user['id'];
         $usuario_perfil = $user['perfil'];

         print_r($user);
      }
   }

   if($usuario_autenticado){
      echo 'Usuário autenticado';
      $_SESSION['autenticado'] = 'SIM';
      $_SESSION['id'] = $usuario_id;
      $_SESSION['perfil'] = $usuario_perfil;
      header('Location: home.php');
   }else{
      $_SESSION['autenticado'] = 'NAO';
      header('Location: index.php?login=erro');
   }
?>
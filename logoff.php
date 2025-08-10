<?php
   require_once "controle_paginas_restritas.php";
   unset($_SESSION['autenticado']);
   echo '<pre>';
   print_r($_SESSION);
   echo '</pre>';
   header('Location: index.php')
?>
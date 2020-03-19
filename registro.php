<?php
session_start();
include("tratamentoErros.php");

?>
<html>
<body>
<head>  
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="css/StyleRegistro.css" media="screen" />
</head>
<br>
<div class="container">
<form action="registra.php" method="POST">
<div class="group">      
      <input name="nome" type="text" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Nome</label>
</div>
<div class="group">      
      <input name="usuario" type="text" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Usuario</label>
</div>
<div class="group">      
      <input name="senha" type="password" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Senha</label>
</div>
<div class="group">      
      <input name="rsenha" type="password" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Repetir Senha</label>
</div>
<input type="submit">
</form>
</div>
</body>
</html>
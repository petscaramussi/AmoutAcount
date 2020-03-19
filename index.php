<?php
session_start();
include("tratamentoErros.php");
if(isset($_SESSION['usuario'])){
    header('location: painel.php');
    exit();
}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/loginStyle.css" media="screen" />
    <!-- Remember to include jQuery :) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
</head>
<body>
    <div class="logo">
    <img src="css/logo2.png" >
    </div>
    <div class="name">
    <h1><b>Amount</b> Control</h1>
    </div>
    <form class="box" action="login.php" method="POST" autocomplete="off">
        <h3>LOGIN</h3>
        <input name="usuario" type="text" placeholder="Usuario">
        <input name="senha" type="password" placeholder="******">
        <input type="submit" value="Login"> 
    </form>
    


<!-- Link to open the modal -->
<div class="botao">
<p><a href="registro.php" rel="modal:open" id="manual-ajax">Registrar</a></p>
</div>
</body>
</html>
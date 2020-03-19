<?php
include('conexao.php');
$orderId = $_GET['id'];
$sql_code = mysqli_query($conexao,"DELETE FROM estoque  WHERE orderId ='$orderId'");
header("location: painel.php?status=del")
?>
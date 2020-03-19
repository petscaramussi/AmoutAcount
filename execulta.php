<?php
session_start();
include('conexao.php');

$destino = 'imgs/' . $_FILES['arquivo']['name'];
 
$arquivo_tmp = $_FILES['arquivo']['tmp_name'];

$imgNome = $_FILES['arquivo']['name'];
 
move_uploaded_file( $arquivo_tmp, $destino  );

$id = $_SESSION['ID'];

$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$qtde = mysqli_real_escape_string($conexao, $_POST['qtde']);
$cat = mysqli_real_escape_string($conexao, $_POST['cat']);
$preco = mysqli_real_escape_string($conexao, $_POST['preco']);
$caminhoIMG = mysqli_real_escape_string($conexao, $imgNome);

$sql = "INSERT INTO estoque(idUsuario,foto,nome,qtde,categoria,preco) VALUES('$id','$imgNome','$nome','$qtde','$cat','$preco')";

if($conexao->query($sql) === true){
    header("location:painel.php?status=ok");
}
$conexao->close();
?>
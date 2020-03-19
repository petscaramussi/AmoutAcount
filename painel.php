<?php
session_start();
include('verifica_login.php');
include('conexao.php');
?>
<body>
    <head>
        <link rel="stylesheet" type="text/css" href="css/painelStyle.css" >
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>
    <?php
    $id = $_SESSION['ID'];
    ?>
    <!--mensagem-->
    <?php if(@$_GET['status'] == 'ok'):echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    Inserido com sucesso!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>
</div>"; endif; ?>

<?php if(@$_GET['status'] == 'del'):echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    Removido com sucesso!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>
</div>"; endif; ?>
    <h2>Ola, <?php echo $_SESSION['nome']; ?> </h2>
    <h2><a href="logout.php">Sair</a></h2>
    
    <!--Modal Button -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Inserir
    </button>
    
    
    <!-- PHP code -->
    <?php
    $query = "select * from estoque where idUsuario = {$id};";
    $result = mysqli_query($conexao,$query);
    ?>
    
    <!-- tabela -->
<table class="table table-striped table-dark" style="width: 40%;">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">foto</th>
      <th scope="col">nome</th>
      <th scope="col">qtde</th>
      <th scope="col">categoria</th>
      <th scope="col">preço</th>
      <th scope="col">remover</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php while($consulta = mysqli_fetch_array($result)){ ?>
      <td><?php echo $consulta['orderId']; ?></td>
      <td><img class="icon" src="imgs/<?php echo $consulta['foto'];?>" > </td>
      <td><?php echo $consulta['nome'];?></td>
      <td><?php echo $consulta['qtde']; ?></td>
      <td><?php echo $consulta['categoria']; ?></td>
      <td><?php echo $consulta['preco']; ?></td>
      <td><a href="delete.php?id=<?php echo $consulta['orderId']; ?>"><img class="delete" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAABRklEQVRIie2UzU7CQBSFv5m2CXFPQ9/ARV25kkiIoDH+JIYnRWOC0YhRiexY2QVvQAOP0HbGDRhCS3vZ6IaTdDM/57vtPbew139LbS7Mbk8/gQPlmetGfzyXmMS9pm8T5x5lkuDxq72+pwuYNeDYJnoY95q+zFwPwZ5gVW1zPw/IuEHxDYQ20R+Ly1awzXx21arbVL8CITB1jHuXK3fbRVw7xHIETN1EderPo1nZGce4Z/7gPRYBqiBS81LANkiqSaXmlQBYbyIhEC2XQyBSnulWJa0SUPAmSCpfqSCmMqksExVXCYh7TR/Hvi2rj5bPYerZF8mclAIKcn5BpjrSOYEdYrr+zSVzUgqQ5FwKyf/sdhgiCSTfA20Hq4Yqz7TLohg8jRbKNef8Np6HnF3uliIFJpIhAmj0x3PlmS4wAZtVnd/r7/UDhdLWuvH5sNAAAAAASUVORK5CYII="></a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" enctype="multipart/form-data" action="execulta.php">
        <input name="nome" type="text" class="form-control" placeholder="Produto" required="on"><br>
        <input name="qtde" type="text" class="form-control" placeholder="Quantidade" required="on"><br>
        <input name="cat" type="text" class="form-control" placeholder="Categoria" required="on"><br>
        <input name="preco" type="text" class="form-control" placeholder="preço" pattern="^\d{1,}[,.]?\d{0,2}?" required="on"><br>
        <div class="input-group mb-3">
            <div class="custom-file">
            <input name="arquivo" type="file" class="custom-file-input"  id="inputGroupFile02">
            <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
        <button type="submit" class="btn btn-primary">OK</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- fim do modal -->



<!-- modal script -->
<script>  $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
<!-- fim do script -->


</body>


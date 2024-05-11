<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="admin.css">
  <link rel="stylesheet" href="form.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Editar Produto</title>
</head>
<body>
<main>
  <section class="container-admin-banner">
    <img src="img/carrinho.png" class="logo-admin" alt="logo-serenatto">
    <h1>Editar Produto</h1>
    <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
  </section>
  <section class="container-form">


  <?php
  $id = $_GET['id'];
  $quantidade = "";
  $nome = "";
  $nota = "";
  $status = "";

  include "conexao.php";
  $sql = "select * from tb_compras where id = $id";
  $resultado = mysqli_query($conexao, $sql);
  while($produto = mysqli_fetch_assoc($resultado)){
      $nome = $produto['nome'];
      $quantidade = $produto['quantidade'];
      $nota = $produto['nota'];
  }
  ?>

    <form method="post" enctype="multipart/form-data" action="editar-salvar.php?id=<?php echo $id ?>">

      <label for="nome">Nome</label>
      <input type="text" id="nome" value="<?php echo $nome ?>" name="nome" placeholder="Digite o nome do produto" required>

      <div class="container-radio">
        <div>
            <label for="quantidade">Quantidade</label>
            <input type="number" id="quantidade" name="quantidade" value="<?php echo $quantidade; ?>" min= 0 max= 100>
            </select>


        </div>
    </div>

      <label for="nota">Nota</label>
      <input type="text" id="nota" name="nota" value="<?php echo $nota ?>" placeholder="Digite uma nota">

    
      <input type="submit" name="editar" class="botao-cadastrar"  value="Editar produto"/>
      
    </form>

  </section>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
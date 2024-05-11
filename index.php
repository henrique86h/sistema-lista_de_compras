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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Lista de Compras</title>
</head>
<body>
<main>
  <section class="container-admin-banner">
    <img src="img/carrinho.png" class="logo-admin" alt="logo-serenatto">
    <h1>Lista De Compras</h1>
    <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
  </section>

  <section class="container-table">
    <table>
      <thead>
        <tr>
            <th>Status</th>
            <th>Quantidade</th>
            <th>Produto</th>
            <th>Nota</th>
            <th colspan="3">Ação</th>
        </tr>
      </thead>
      <tbody>

      <?php
      
      include "conexao.php";
      $sql = "select * from tb_compras order by status asc, id desc";
      $resultado = mysqli_query($conexao, $sql);

      while ($produto = mysqli_fetch_assoc($resultado)):
      ?>
        
        <tr>
        <td>
                <?php
                if($produto['status'] == 0){
                ?>
                    <a href='editar-status.php?id=<?php echo $produto['id'] ?>' class="btn">✅Confirmar Compra✅</a>
                <?php    
                }
                ?>
                 <?php 
                if($produto['status'] == 1){
                    echo "Compra Efetuada";
                }
                ?>
            </td>
            
            <td><?php echo $produto['quantidade'] ?></td>
            <td><?php echo $produto['nome'] ?></td>
            <td><?php echo $produto['nota'] ?></td>
            <td><a class="botao-editar" href="editar.php?id=<?php echo $produto['id'] ?>">Editar</a></td>
            <td>
            <form>
                <a href="excluir.php?id=<?php echo $produto['id'] ?>">
                <input type="button" class="botao-excluir" value="Excluir"></a>
            </form>
            </td>
            <td>
            <a class="botao-editar" href="visualizar.php?id=<?php echo $produto['id'];?>">Ver</a>
            </td>
        </tr>

        <?php
        endwhile;
        ?>
        
      </tbody>
    </table>
  <a class="botao-cadastrar" href="cadastrar.php">Cadastrar produto</a>

  </section>
</main>
</body>
</html>
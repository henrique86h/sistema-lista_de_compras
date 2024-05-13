<?php
include "conexao.php";

$id = $_GET["id"];
$nome = "nome";
$quantidade = "quantidade";
$nota = "nota";
$status = "status";
$sql = "select * from tb_compras where id = $id";
$resultado = mysqli_query($conexao, $sql);
while($produto = mysqli_fetch_assoc($resultado)):
    $quantidade = $produto['quantidade'];
    $nome = $produto['nome'];
    $nota = $produto['nota'];
    $status = $produto['status'];
endwhile;
?>
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
  <title>Visualização</title>
</head>
<body>
<main>
  <section class="container-admin-banner">
    <img src="img/carrinho.png" class="logo-admin" alt="logo-serenatto">
    <h1>Visualização</h1>
    <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
  </section>
  <section class="container-cafe-manha">
           
    <div class="container-cafe-manha-produtos">
        <div class="container-produto">
            <div class="container-foto">
                <img src="img/<?php echo $produtos['imagem'] ?>">
            </div>
            <p><?php echo $nome?></p>
            <p><?php echo $quantidade?></p>
            <p><?php echo $nota?></p>
            <p><?php
                if($status == 0){
                    echo "Aguardando Confirmação"
                ?>
                    
                <?php    
                }
                ?>
                 <?php 
                if($status == 1){
                    echo "Compra Efetuada";
                }
                ?>
            </p>
        </div>
    </div>
        </section>
<?php
mysqli_close($conexao);
?>
</main>
</body>
</html>
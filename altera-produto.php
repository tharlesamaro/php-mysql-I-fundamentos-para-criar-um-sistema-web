<?php

include("cabecalho.php");
include("conecta.php");
include("produto-banco.php");

$id = $_POST["id"];
$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria_id = $_POST["categoria_id"];

if (array_key_exists('usado', $_POST)) {
  $usado = "true";
} else {
  $usado = "false";
}


if (altera_produto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado)) { ?>
  <p class="text-success">Produto <?= $nome ?>, R$ <?= $preco ?> alterado com sucesso!</p>
<?php } else {
  $msg_error = mysqli_error($conexao);
  ?>
  <p class="text-danger">O Produto <?= $nome ?> não foi alterado.<br>Erro: <?= $msg_error ?></p>
<?php }

include("rodape.php");

?>
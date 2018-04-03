<?php

include("cabecalho.php");
include("conecta.php");
include("produto-banco.php");

$id = $_POST['id'];
remove_produto($conexao, $id);
header("Location: produto-lista.php?removido=true");
die();


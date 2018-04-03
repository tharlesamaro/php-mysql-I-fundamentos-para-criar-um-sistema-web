<?php

function lista_categorias($conexao) {
  $categorias = [];
  $query = "SELECT * FROM categorias";
  $resultado = mysqli_query($conexao, $query);
  while($categoria = mysqli_fetch_assoc($resultado)) {
    array_push($categorias, $categoria);
  }
  return $categorias;
}
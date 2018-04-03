<?php
include("cabecalho.php");
include("conecta.php");
include("categoria-banco.php");
include("produto-banco.php");

$id = $_GET['id'];
$produto = busca_produto($conexao, $id);
$categorias = lista_categorias($conexao);
$usado = $produto['usado'] ? "checked='checked'" : "";
?>

  <h1>Alterando Produto</h1>
  <form action="altera-produto.php" method="post">
    <input type="hidden" name="id" value="<?= $produto['id'] ?>">
    <table class="table">
      <tr>
        <td>Nome:</td>
        <td><input class="form-control" type="text" id="nome" name="nome" value="<?= $produto['nome'] ?>"></td>
      </tr>
      <tr>
        <td>Preço:</td>
        <td><input class="form-control" type="number" id="preco" name="preco" value="<?= $produto['preco'] ?>"></td>
      </tr>
      <tr>
        <td>Descrição:</td>
        <td><textarea name="descricao" class="form-control"><?= $produto['descricao'] ?></textarea></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="checkbox" name="usado" <?= $usado ?> value="true"> Usado</td>
      </tr>
      <tr>
        <td>Categoria:</td>
        <td>
          <select name="categoria_id" class="form-control">
            <?php foreach ($categorias as $categoria):
              $categoriaCorreta = $produto['categoria_id'] == $categoria[id];
              $selecao = $categoriaCorreta ? "selected='selected'" : "";
              ?>
              <option value="<?= $categoria['id'] ?> " <?= $selecao ?>>
                <?= $categoria['nome'] ?><br>
              </option>
            <?php endforeach; ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>
          <button class="btn btn-primary" type="submit">Alterar</button>
        </td>
      </tr>
    </table>
  </form>

<?php include("rodape.php") ?>
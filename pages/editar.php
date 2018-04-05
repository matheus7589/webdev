<?php require_once '../config.php'; 
      require_once('../controller/produtos.php'); 
      edit();
?>

<?php include(HEADER_TEMPLATE); ?>
<br>
<h2>Editar Produto</h2>

<form action="editar.php?id=<?php echo $produto['id']; ?>" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-6">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name="produto['nome']" value="<?php echo $produto['nome']; ?>">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Quantidade</label>
      <input type="number" class="form-control" min="0" name="produto['quantidade']" value="<?php echo $produto['quantidade']; ?>">
    </div>
      
    <div class="form-group col-md-6">
      <label for="campo3">Descriç&atilde;o</label>
      <input type="text" class="form-control" name="produto['descricao']" value="<?php echo $produto['descricao']; ?>">
    </div>
      
      <div class="form-group col-md-4">
      <label for="campo4">source imagem</label>
      <input type="text" class="form-control" name="produto['imageref']" value="<?php echo $produto['imageref']; ?>">
    </div>

    <div id="actions" class="row" style="margin-top: 30px; ">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Salvar</button>
          <a href="CRUD.php" class="btn btn-default">Cancelar</a>
        </div>
    </div>
  
</form>

<?php include(FOOTER_TEMPLATE); ?>
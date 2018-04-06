<?php
include '.././conexao.php';
require_once '../config.php';
require_once('../controller/users.php');

add();

?>

<?php include(HEADER_TEMPLATE); ?>
<br>
<h2>Novo Usuário</h2>

<form action="addUsers.php" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-6">
      <label for="name">Usuário</label>
      <input type="text" class="form-control" name="user['usuario']">
    </div>

    <div class="form-group col-md-3">
      <label for="campo2">Senha</label>
      <input type="text" class="form-control" min="3" name="user['senha']">
    </div>
      
      <div class="form-group col-md-2">
      <label for="campo3">Admin</label>
      <input type="checkbox" class="form-control" name="user['is_admin']">
      <!-- <input type="" class="form-control" name="produto['descricao']"> -->
    </div>
      
      
    <div id="actions" class="row" style="margin-top: 30px">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Salvar</button>
          <a href="../list.php" class="btn btn-default">Cancelar</a>
    </div>
    </div>
  
</form>

<?php include(FOOTER_TEMPLATE); ?>

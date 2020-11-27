<?php
 include 'header.php';

 include_once 'db/database.php';
 include_once 'class/vaga.php';
 include_once 'class/cadastro.php';

 $database = new Database();
 $db = $database->getConnection();
 
 $idVaga = $_GET['vaga'];
 
 $vaga = new Vaga($db);
 $infoVaga = $vaga->consultarVaga($idVaga);

?>

<?php 
  if ($_SERVER['REQUEST_METHOD'] == "GET") {
?>

<div class="container">
    <div class="row">
        <div class="col">
            <form method="POST" action="cadastro.php">
               <div class="form-group">
                    <h1>Canditadar à vaga: <?php echo $infoVaga['titulo']; ?></h1>
                </div>
                <input type="hidden" name="idVaga" value="<?php echo $infoVaga['id'];?>">
                <div class="form-group">
                    <label for="nome">Nome Completo</label>
                    <input type="text" class="form-control" id="nome" name="nome">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" id="telefone" name="telefone">
                </div>
                <div class="form-group">
                    <label for="curriculo">Curriculo</label>
                    <textarea name="curriculo" id="curriculo" rows="10" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">CADASTRAR</button>
            </form>
        </div>
    </div>
</div>

<?php

  } else {
      // efetua o cadastro
      $cadastro = new Cadastro($db);
      $cadastro->idVaga = $_POST["idVaga"];
      $cadastro->nome = $_POST['nome'];
      $cadastro->email = $_POST['email'];
      $cadastro->telefone = $_POST['telefone'];
      $cadastro->curriculo = $_POST['curriculo'];

      if ($cadastro->cadastroCurriculo()) {
?>

<div class="alert alert-success" role="alert">
  Seu cadastro foi efetuado com sucesso!
</div>

<?php

      } else {
?>

<div class="alert alert-danger" role="alert">
  Ocorreu um erro! Por favor, verifique o cadastro e tente novamente.
</div>

<?php

      }

  }

?>

<?php

include 'footer.php';

?>
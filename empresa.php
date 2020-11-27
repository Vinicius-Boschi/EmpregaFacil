<?php
 include 'header.php';

 include_once 'db/database.php';
 include_once 'class/empresa.php';
 include_once 'class/vaga.php';

 $database = new Database();
 $db = $database->getConnection();
 
 $idEmpresa = $_GET['id'];

 $empresa = new Empresa($db);
 $infoEmpresa = $empresa->consultaEmpresa($idEmpresa);

 $vaga = new Vaga($db);
 $listaVagas = $vaga->listarVagas($idEmpresa);

?>

<div class="container">

    <div class="row">
        <div class="col-md-3 col-sm-12">
            <img src="assets/img/empresas/<?php echo $infoEmpresa['id']; ?>.png" class="img-thumbnail img-fluid">
        </div>
        <div class="col-md-9 col-sm-12">
            <h1><?php echo $infoEmpresa['nome']; ?></h1>
            <?php echo $infoEmpresa['descricao']; ?>
        </div>
    </div>

    <div class="row vagas">
        <div class="col text-center">
            <h2>VAGAS DISPONÍVEIS</h2>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="accordion" id="accordionExample">
                
                <?php
                  foreach($listaVagas as $item) {
                ?>

                    <div class="card">
                        <div class="card-header" id="heading<?php echo $item['id']; ?>">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?php echo $item['id']; ?>" aria-expanded="true" aria-controls="collapse<?php echo $item['id']; ?>">
                            <?php echo $item['titulo']; ?>
                            </button>
                        </h2>
                        </div>

                        <div id="collapse<?php echo $item['id']; ?>" class="collapse" aria-labelledby="heading<?php echo $item['id']; ?>" data-parent="#accordionExample">
                        <div class="card-body">
                            <strong>Salário:</strong> <?php echo $item['salario']; ?><br>
                            <strong>Jornada/Horário:</strong> <?php echo $item['jornada']; ?> <br>
                            <strong>Regime de contratação:</strong> <?php echo $item['regime']; ?><br><br>
                            <?php echo $item['descricao']; ?><br><br>

                            <a href="cadastro.php?vaga=<?php echo $item['id']; ?>" class="btn btn-primary">CANDIDATAR</a>
                        </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>

    

</div>



<?php
 include 'footer.php'
?>
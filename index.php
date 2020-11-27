<?php 
  include 'header.php';

  include_once 'db/database.php';
  include_once 'class/empresa.php'; 
  $database = new Database();
  $db = $database->getConnection();
 
  $empresa = new Empresa($db);

  $listaEmpresas = $empresa->listarEmpresas();

?>
<div class="container">

    <div class="jumbotron home">
        <h1 class="display-4">Somos a Emprega Fácil.</h1>
        <p class="lead">Aqui está seu novo emprego!</p>
    </div>

    <section class="testimonials text-center" >
        <div class="container">
            <h2 class="mb-5">O que as pessoas estão dizendo...</h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="mx-auto testimonial-item mb-5 mb-lg-0"><img class="rounded-circle img-fluid mb-3" src="assets/img/testemunhos/testimonials-1.jpg">
                        <h5>Ágata O.</h5>
                        <p class="font-weight-light mb-0">"Esse site é muito bom,ajuda mesmo!"</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mx-auto testimonial-item mb-5 mb-lg-0"><img class="rounded-circle img-fluid mb-3" src="assets/img/testemunhos/testimonials-2.jpg">
                        <h5>Dário M.</h5>
                        <p class="font-weight-light mb-0">"Esse site me ajudou a arrumar um emprego."</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mx-auto testimonial-item mb-5 mb-lg-0"><img class="rounded-circle img-fluid mb-3" src="assets/img/testemunhos/testimonials-3.jpg">
                        <h5>Janaína M.</h5>
                        <p class="font-weight-light mb-0">"As empresas acham seu curriculo mesmo!"</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="row empresas">
        <div class="col">
            <h2 class="text-center">EMPRESAS em destaque</h2>
           <div class="slider">
                <div class="slide-track">
                    <?php 
                      foreach($listaEmpresas as $item){
                    ?>
                    
                        <div class="slide">
                           <img src="assets/img/empresas/<?php echo $item['id']?>.png" height="100" width="200" alt="" />
                        </div>
                    
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    
</div>     

<?php
  include 'footer.php';
?>
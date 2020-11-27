<?php
    function active($currect_page){
        $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
        $url = end($url_array); 
        if($currect_page == $url){
            echo 'active'; //class name in css 
        } 
    }

    include_once 'db/database.php';
    include_once 'class/empresa.php';

    $database = new Database();
    $db = $database->getConnection();
    
    $empresa = new Empresa($db);
    
    $listaEmpresas = $empresa->listarEmpresas();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light margin-menu">
  <a class="navbar-brand" href="index.php">Emprega Fácil</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item  <?php active('index.php'); active(''); ?>">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item <?php active('quemsomos.php'); ?>">
        <a class="nav-link" href="quemsomos.php">Quem Somos</a>
      </li>
      <li class="nav-item dropdown <?php active('empresas.php'); ?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Empresas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         <?php
            foreach($listaEmpresas as $item){
              echo '<a class="dropdown-item" href="empresa.php?id='.$item['id'].'">'. $item['nome'] . '</a>';
            }
         ?>
        </div>
      </li>
      <li class="nav-item <?php active('contato.php'); ?>">
        <a class="nav-link" href="contato.php">Contato</a>
      </li>
      <li class="nav-item <?php active('ajuda.php'); ?>">
        <a class="nav-link" href="ajuda.php">Ajuda</a>
      </li>
    </ul>
  </div>
</nav>
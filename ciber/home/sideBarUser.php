<nav id="sidebar">
    <div class="sidebar-header">
       <?php if($_SESSION['rol'] == 2) $dir="ciberUserInfo.php";?>

       <a href="<?php echo $dir;?>" class="logo text-center">
           <span class="logo-lg">
               
           </span>

           <!-- We should use a small logo for this image tag -->
       </a>
    </div>
    <ul class="list-unstyled components">
        
        <li id="linkInf">
            <a href="<?php echo $dir;?>">Información</a>
        </li>
        <li class="dropdown show">
      <a class="dropdown-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false" id="linkItem">
        Artículo
      </a>
      <div class="collapse " id="home-collapse">
        <ul class="list-unstyled">
          <li id="linkNew"><a href="nuevo.php" >Nueva</a></li>
          <li id="linkState"><a href="avance.php" >Avance</a></li>
           <li id="linkSubmit"><a href="entregar.php" >Entrega</a></li>
          <li id="linkSearh"><a href="buscar.php" >Busqueda</a></li>
        </ul>
      </div>
    </li>
        
    </ul>

    
</nav>
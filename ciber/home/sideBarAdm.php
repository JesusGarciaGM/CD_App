<nav id="sidebar">
    <div class="sidebar-header">
        <?php if($_SESSION['rol'] == 1) $dir="ciberAdminInfo.php";?>

       <a href="<?php echo $dir;?>" class="logo text-center">
           <span class="logo-lg">
               
           </span>

           <!-- We should use a small logo for this image tag -->
       </a>
    </div>

    <ul class="list-unstyled components">
        
        <li id="linkInf" >
            <a href="<?php echo $dir;?>">Información</a>
        </li>
        <li id="linkUser">
            <a href="ciberAdminUser.php">Usuarios</a>
        </li>
       <li class="dropdown show">
          <a class="dropdown-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false" id="linkItem">
            Artículo
          </a>
          <div class="collapse " id="home-collapse">
            <ul class="list-unstyled">
              <li id="linkNew"><a href="ciberNuevo.php" >Nueva</a></li>
              <li id="linkState"><a href="ciberAvance.php" >Avance</a></li>
              <li id="linkSubmit"><a href="ciberEntregar.php" >Entrega</a></li>
              <li id="linkSearh"><a href="ciberBuscar.php" >Busqueda</a></li>
            </ul>
          </div>
        </li>
    </ul>

    
</nav>






<nav id="sidebar">

    <div class="sidebar-header">

        <?php if($_SESSION['rol'] == 1) $dir="adminInfo.php";?>



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

            <a href="adminUser.php">Usuarios</a>

        </li>

       <li id="linkCust">
            <a href="clientes.php">Clientes</a>
        </li>
       
         <li class="dropdown show">

          <a class="dropdown-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false" id="linkPayment">

            Pagos

          </a>

          <div class="collapse " id="home-collapse">

            <ul class="list-unstyled">

              <li id="linkPayR"><a href="payment.php" >Registro de pagos</a></li>

              <li id="linkPayH"><a href="record.php" >Historial</a></li>

            </ul>

          </div>

        </li>

    </ul>



    

</nav>




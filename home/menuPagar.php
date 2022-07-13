





<nav id="sidebar">

    <div class="sidebar-header">

        <?php if($_SESSION['rol'] == 3) $dir="userPagar.php";?>



       <a href="<?php echo $dir;?>" class="logo text-center">

           <span class="logo-lg">

               

           </span>



           <!-- We should use a small logo for this image tag -->

       </a>

    </div>



    <ul class="list-unstyled components">
       
         <li class="dropdown show">

          <a class="dropdown-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false" id="linkPayment">

            Pagos

          </a>

          <div class="collapse " id="home-collapse">

            <ul class="list-unstyled">

              <li id="linkPayR"><a href="userPagar.php" >Registro de pagos</a></li>

              <li id="linkPayH"><a href="recordUser.php" >Historial</a></li>

            </ul>

          </div>

        </li>

    </ul>



    

</nav>




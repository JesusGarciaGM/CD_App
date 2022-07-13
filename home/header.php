<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="container-fluid">



        <button type="button" id="sidebarCollapse" class="btn btn-info">

            <i class="fa fa-th-list" aria-hidden="true"></i>
            
            <span>Menu</span>

        </button>

        <div  id="navbarAU">

            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                <span class="account-user-avatar">

                    <img src="../img/adminSM.png" alt="user-image" class="rounded-circle">

                </span>

                

                    <span class="account-user-name"><?php echo $_SESSION['name']?>

                            

                    </span>

                    <span class="account-position">

                       <?php 

                           if($_SESSION['rol'] == 1) echo 'Admin';

                           if($_SESSION['rol'] == 2) echo 'User';

                           if($_SESSION['rol'] == 3) echo 'User';


                       ?>

                    </span>

               

            </button>

              <ul class="dropdown-menu dropdown-menu-end">

                <li><a class="dropdown-item" href="userEdit.php">Mi cuenta</a></li>

                <li><a class="dropdown-item" href="../backend/cerrarSe.php">Salir</a></li>

              </ul>

        </div>

    </div>

</nav>

<!-- end Topbar -->



<nav id="sidebar">
    <div class="sidebar-header">
        <?php if($_SESSION['rol'] == 2) $dir="userInfo.php";?>

       <a href="<?php echo $dir;?>" class="logo text-center">
           <span class="logo-lg">
               
           </span>

           <!-- We should use a small logo for this image tag -->
       </a>
    </div>

    <ul class="list-unstyled components">
        
        <li id="linkInfU" >
            <a href="<?php echo $dir;?>">Información</a>
        </li>
        
       <li id="linkCustU">
            <a href="clientesU.php">Clientes</a>
        </li>
    </ul>

    
</nav>

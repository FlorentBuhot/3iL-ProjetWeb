<?php
    require_once("php/template/inc_head.php");
?>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="/home">
            <img src="/img/ballon.png" alt="Logo" width="50" height="50"
                 class="d-inline-block align-text-top">
        </a>

        <!-- Nom de site-->
        <span class="navbar-brand fs-2 text-white">Staty-foot</span>

        <!-- Icone utilisateur -->
        <li class="d-flex nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="navbar-brand fs-9 text-white">
                <?php
                echo $_SESSION['login'];
                ?>
            </span>
            <img src="/img/personne.png" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
            <ul class="dropdown-menu" style="left: 92% !important">
                <li><button class="dropdown-item" onclick="location.href='/pageModifProfil'">Mes informations</button></li>
                <li><button class="dropdown-item" onclick="location.href='/deconnexion'">Déconnexion</button></li>
            </ul>
        </li>
    </div>
</nav>
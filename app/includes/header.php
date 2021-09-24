<header>
        <a href="<?php echo BASE_URL . ''?>" class="logo">
<<<<<<< HEAD
            <h1 class="logo-text"><span>Hidden</span>Truth</h1>
=======
            <h1 class="logo-text"><span>Jean</span>Forteroche</h1>
>>>>>>> 19b4b8041c4b42677a811bda6ffadb30e37fe68f
        </a>
        <i class="fa fa-bars menu-toggle"></i>
        <ul class="nav">
            <li><a href="<?php echo BASE_URL . '' ?>">Accueil</a></li>
<<<<<<< HEAD
            <li><a href="<?php echo BASE_URL . '/index.php?give' ?>">Faire un don</a></li>
=======
>>>>>>> 19b4b8041c4b42677a811bda6ffadb30e37fe68f

            <?php if (isset($_SESSION['id'])) : ?>
            <li>
                <a href="#">
                    <i class="fa fa-user"></i>
                    <?php echo $_SESSION['username'];?>
                    <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
                </a>
                <ul>
                    <?php if($_SESSION['admin']): ?>
                        <li><a href="<?php echo BASE_URL . '/views/admin/dashboard.php?dashboard' ?>" class="dashboard">Tableau de Bord</a></li>
                    <?php endif; ?>

                    <li><a href="<?php echo BASE_URL . '/views/public/logout.php' ?>" class="logout">Se déconnecter</a></li>
                </ul>
            </li>
            <?php else: ?>
                <li><a href="<?php echo BASE_URL . '/views/public/register.php?register' ?>">Créer un compte</a></li>
                <li><a href="<?php echo BASE_URL . '/views/public/login.php?login' ?>">Se connecter</a></li>
            <?php endif; ?>
        </ul>
</header>
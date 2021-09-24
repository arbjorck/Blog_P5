<?php
include("../../path.php");
include(ROOT_PATH . "../../index.php");


?>

<!DOCTYPE html>
<html lang="en">
    <head>
<<<<<<< HEAD:views/admin/users/edit.php
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <!-- Font awesome -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

        <!-- Custom Styling -->
        <link rel="stylesheet" href="../../../assets/css/style.css">
        <link rel="stylesheet" href="../../../assets/css/style_media.css">

        <!-- Admin Styling -->
        <link rel="stylesheet" href="../../../assets/css/admin.css"> 
        <link rel="stylesheet" href="../../../assets/css/admin_media.css">

        <title>Admin - Éditer Utilisateur</title>
=======
        <?php include(ROOT_PATH . "../../app/includes/adminHead.php"); ?>
        
        <title>Admin - Modifier Utilisateur</title>
>>>>>>> 19b4b8041c4b42677a811bda6ffadb30e37fe68f:views/admin/users/edit.php
    </head>


    <body>
    <!-- Header -->
<<<<<<< HEAD:views/admin/users/edit.php
    <?php include(ROOT_PATH. "../../app/includes/adminheader.php");?>
=======
    <?php include(ROOT_PATH. "../../app/includes/adminHeader.php");?>
>>>>>>> 19b4b8041c4b42677a811bda6ffadb30e37fe68f:views/admin/users/edit.php

        <!-- Admin Page Wrapper -->
        <div class="admin-wrapper"> 

            <!-- Left Sidebar -->
<<<<<<< HEAD:views/admin/users/edit.php
            <?php include(ROOT_PATH. "../../app/includes/adminsidebar.php");?>
=======
            <?php include(ROOT_PATH. "../../app/includes/adminSidebar.php");?>
>>>>>>> 19b4b8041c4b42677a811bda6ffadb30e37fe68f:views/admin/users/edit.php

            <!-- Admin Content -->
            <div class="admin-content">
                <div class="button-group">
                    <a href="create.php?create=user" class="btn btn-big">Ajouter Utilisateur</a>
                    <a href="index.php?admin=users" class="btn btn-big">Gérer Utilisateurs</a>
                </div>

                <div class="content">
                    <h2 class="page-title">Éditer Utilisateur</h2>

                    <?php include(ROOT_PATH . "../../app/helpers/formErrors.php"); ?>
                    
                    <form action="edit.php?edit_id=<?php echo $id ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $id ?>">    
                        <div>
                            <label>Utilisateur</label>
                            <input type="text" name="username" value="<?php echo $username; ?>" class="text-input">
                        </div>
                        <div>
                            <label>Email</label>
                            <input type="email" name="email" value="<?php echo $email; ?>" class="text-input">
                        </div>
                        <div>
                            <label>Mot de Pass</label>
                            <input type="password" name="password" value="<?php echo $password; ?>" class="text-input">
                        </div>
                        <div>
                            <label>Confirmer le mot de pass</label>
                            <input type="password" name="passwordConf" value="<?php echo $passwordConf; ?>" class="text-input">
                        </div>
                        <div>
                            <?php if (isset($admin) && $admin == 1): ?>
                                <label>
                                    <input type="checkbox" name="admin" checked>
                                    Admin
                                </label>
                            <?php else: ?>
                                <label>
                                    <input type="checkbox" name="admin">
                                    Admin
                                </label>
                            <?php endif; ?>
                        </div>
                        <div>
                            <button type="submit" name="update-user" class="btn btn-big">Actualiser Utilisateur</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- // Admin Content -->

        </div>
        <!-- // Admin Page Wrapper -->

        

        <!-- JQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- Ckeditor -->
        <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>

        <!-- Custom Script -->
        <script src="../../../assets/js/scripts.js"></script>

    </body>
</html> 
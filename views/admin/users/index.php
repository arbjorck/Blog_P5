<?php
include("../../path.php");
include(ROOT_PATH . "../../index.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
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

        <title>Admin - Gérer Utilisateurs</title>
    </head>


    <body>
    <!-- Header -->
    <?php include(ROOT_PATH. "../../app/includes/adminheader.php");?>

        <!-- Admin Page Wrapper -->
        <div class="admin-wrapper"> 

            <!-- Left Sidebar -->
            <?php include(ROOT_PATH. "../../app/includes/adminsidebar.php");?>

            <!-- Admin Content -->
            <div class="admin-content">
                <div class="button-group">
                    <a href="create.php?create=user" class="btn btn-big">Ajouter Utilisateur</a>
                    <a href="index.php?admin=users" class="btn btn-big">Gérer Utilisateurs</a>
                </div>

                <div class="content">
                    <h2 class="page-title">Gérer Utilisateurs</h2>

                    <?php include(ROOT_PATH . "../../app/includes/messages.php"); ?>

                    <table>
                        <thead>
                            <th>SN</th>
                            <th>Nom d'utilisateur</th>
                            <th>Email</th>
                            <th>Admin</th>
                            <th colspan="2">Action</th>
                        </thead>
                        <tbody>
                            <?php foreach ($adminUsers as $key => $admin_user): ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $admin_user['username']; ?></td>
                                    <td><?php echo $admin_user['email']; ?></td>
                                    <td><?php echo $admin_user['admin']; ?></td>
                                    <td><a href="edit.php?edit_user_id=<?php echo $admin_user['id']; ?>" class="edit">Éditer</a></td>
                                    <td><a href="index.php?delete_id_user=<?php echo $admin_user['id']; ?>" class="delete">Effacer</a></td>                            
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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
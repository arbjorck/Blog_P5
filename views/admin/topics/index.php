<?php
include("../../path.php");
include(ROOT_PATH . "../../index.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
<<<<<<< HEAD:views/admin/topics/index.php
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

=======
        <?php include(ROOT_PATH . "../../app/includes/adminHead.php"); ?>
        
>>>>>>> 19b4b8041c4b42677a811bda6ffadb30e37fe68f:views/admin/topics/index.php
        <title>Admin - Gérer Thèmes</title>
    </head>


    <body>
    <!-- Header -->
<<<<<<< HEAD:views/admin/topics/index.php
    <?php include(ROOT_PATH. "../../app/includes/adminheader.php");?>
=======
    <?php include(ROOT_PATH. "../../app/includes/adminHeader.php");?>
>>>>>>> 19b4b8041c4b42677a811bda6ffadb30e37fe68f:views/admin/topics/index.php

        <!-- Admin Page Wrapper -->
        <div class="admin-wrapper"> 

            <!-- Left Sidebar -->
<<<<<<< HEAD:views/admin/topics/index.php
            <?php include(ROOT_PATH. "../../app/includes/adminsidebar.php");?>
=======
            <?php include(ROOT_PATH. "../../app/includes/adminSidebar.php");?>
>>>>>>> 19b4b8041c4b42677a811bda6ffadb30e37fe68f:views/admin/topics/index.php

            <!-- Admin Content -->
            <div class="admin-content">
                <div class="button-group">
                    <a href="create.php?create=topic" class="btn btn-big">Ajouter Thème</a>
                    <a href="index.php?admin=topics" class="btn btn-big">Gérer Thèmes</a>
                </div>

                <div class="content">

                    <h2 class="page-title">Gérer Thèmes</h2>
                    
                    <?php include(ROOT_PATH . "../../app/includes/messages.php"); ?>
                    <table>
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Nom</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($topics as $key => $topic): ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $topic['name']; ?></td>
                                    <td><a href="edit.php?edit_topic_id=<?php echo $topic['id']; ?>" class="edit">Éditer</a></td>
                                    <td><a href="index.php?del_topic_id=<?php echo $topic['id']; ?>" class="delete">Effacer</a></td>                            
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
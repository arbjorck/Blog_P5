<?php
include("../../path.php");
include(ROOT_PATH . "../../index.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
<<<<<<< HEAD:views/admin/posts/create.php
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
        
>>>>>>> 19b4b8041c4b42677a811bda6ffadb30e37fe68f:views/admin/posts/create.php
        <title>Admin - Ajouter Post</title>
    </head>


    <body>
    <!-- Header -->
<<<<<<< HEAD:views/admin/posts/create.php
    <?php include(ROOT_PATH. "../../app/includes/adminheader.php");?>
=======
    <?php include(ROOT_PATH. "../../app/includes/adminHeader.php");?>
>>>>>>> 19b4b8041c4b42677a811bda6ffadb30e37fe68f:views/admin/posts/create.php

        <!-- Admin Page Wrapper -->
        <div class="admin-wrapper"> 

            <!-- Left Sidebar -->
<<<<<<< HEAD:views/admin/posts/create.php
            <?php include(ROOT_PATH. "../../app/includes/adminsidebar.php");?>
=======
            <?php include(ROOT_PATH. "../../app/includes/adminSidebar.php");?>
>>>>>>> 19b4b8041c4b42677a811bda6ffadb30e37fe68f:views/admin/posts/create.php

            <!-- Admin Content -->
            <div class="admin-content">
                <div class="button-group">
                    <a href="create.php?create=post" class="btn btn-big">Ajouter Post</a>
                    <a href="index.php?admin=posts" class="btn btn-big">Gérer Posts</a>
                </div>

                <div class="content">
                    <h2 class="page-title">Ajouter Post</h2>

                    <?php include(ROOT_PATH . '../../app/helpers/formErrors.php'); ?>

                    <form action="create.php?create=post" method="post" enctype="multipart/form-data">
                        <div>
                            <label>Titre</label>
                            <input type="text" name="title" value="<?php echo $title ?>" class="text-input">
                        </div> 
                        <div>
                            <label>Thème</label>
                            <select name="topic_id" class="text-input">
                                <option value=""></option>
                                <?php foreach ($topics as $key => $topic): ?>
                                    <?php if (!empty($topic_id) && $topic_id == $topic['id']): ?>
                                        <option selected value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
                                    <?php else: ?> 
                                        <option value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
                                    <?php endif; ?> 
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <label>Image</label>
                            <input type="file" name="image" class="text-input">
                        </div>
                        <div>
                            <label>Body</label>
                            <textarea name="body" id="body"><?php echo $body ?></textarea>
                        </div>
                        <div>
                            <?php if (empty($published)): ?>
                                <label>
                                    <input type="checkbox" name="published">
                                    Publier
                                </label>
                            <?php else: ?>
                                    <label>
                                    <input type="checkbox" name="published" checked>
                                    Publier
                                </label>
                            <?php endif; ?> 
                        </div>
                        <div>
                            <button type="submit" name="add-post" class="btn btn-big">Ajouter Post</button>
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
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
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/style_media.css">

        <!-- Admin Styling -->
        <link rel="stylesheet" href="assets/css/admin.css"> 
        <link rel="stylesheet" href="assets/css/admin_media.css">

        <title>Admin - Gérer Commentaires</title>
    </head>


    <body>
    <!-- Header -->
    <?php include(ROOT_PATH. "../../app/includes/adminHeader.php");?>

        <!-- Admin Page Wrapper -->
        <div class="admin-wrapper"> 

            <!-- Left Sidebar -->
            <?php include(ROOT_PATH. "../../app/includes/adminSidebar.php");?>

            <!-- Admin Content -->
            <div class="admin-content">

                <div class="content">
                    <h2 class="page-title">Gérer Commentaires</h2>

                    <?php include(ROOT_PATH . "../../app/includes/messages.php"); ?>
                    <table>
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Post</th>
                                <th>Commentaire</th>
                                <th>Auteur</th>
                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($getCommentsForAdmin as $key => $comment): ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $comment['title'] ?></td>
                                    <td><?php echo $comment['comment'] ?></td>
                                    <td><?php echo $comment['username'] ?></td>
                                    <td><a href="index.php?delete_id_comment=<?php echo $comment['id']; ?>" class="delete">Effacer</a></td>
                                    <?php if ($comment['published']): ?>
                                        <td><a href="index.php?comment_published=0&comment_published_id=<?php echo $comment['id'] ?>" class="unpublish">Dépublier</a></td>
                                    <?php else:?>
                                        <td><a href="index.php?comment_published=1&comment_published_id=<?php echo $comment['id'] ?>" class="publish">Publier</a></td>
                                    <?php endif; ?>
                                    <?php if ($comment['reported']): ?>
                                        <td><a href="index.php?reported=0&reported_id=<?php echo $comment['id'] ?>" class="reported">Ignorer</a></td>
                                    <?php else:?>
                                        <td><a href="index.php?reported=1&reported_id=<?php echo $comment['id'] ?>" class="report">Signaler</a></td>
                                    <?php endif; ?>
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
        <script src="assets/js/scripts.js"></script>

    </body>
</html> 
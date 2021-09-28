<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include(ROOT_PATH . "../../app/includes/adminHead.php"); ?>

        <title>Admin - Gérer Posts</title>
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
                <div class="button-group">
                    <a href="index.php?create=post" class="btn btn-big">Ajouter Post</a>
                    <a href="index.php?admin=posts" class="btn btn-big">Gérer Posts</a>
                </div>

                <div class="content">
                    <h2 class="page-title">Gérer Posts</h2>

                    <?php include(ROOT_PATH . "../../app/includes/messages.php"); ?>
                    <table>
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Thème</th>
                                <th>Titre</th>
                                <th>Auteur</th>
                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($posts as $key => $post): ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $post['name'] ?></td>
                                    <td><?php echo $post['title'] ?></td>
                                    <td><?php echo $post['username']; ?></td>
                                    <td><a href="index.php?edit_post_id=<?php echo $post['id']; ?>" class="edit">Éditer</a></td>
                                    <td><a href="index.php?delete_id_post=<?php echo $post['id']; ?>" class="delete">Effacer</a></td>
                                    <?php if ($post['published']): ?>
                                        <td><a href="index.php?post_published=0&post_published_id=<?php echo $post['id'] ?>" class="unpublish">dépublier</a></td>
                                    <?php else:?>
                                        <td><a href="index.php?post_published=1&post_published_id=<?php echo $post['id'] ?>" class="publish">publier</a></td>
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
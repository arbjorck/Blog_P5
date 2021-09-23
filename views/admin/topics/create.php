<?php
include("../../path.php");
include(ROOT_PATH . "../../index.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include(ROOT_PATH . "../../app/includes/adminHead.php"); ?>
        
        <title>Admin - Ajouter Thème</title>
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
                    <a href="create.php?create=topic" class="btn btn-big">Ajouter Thème</a>
                    <a href="index.php?admin=topics" class="btn btn-big">Gérer Thèmes</a>
                </div>

                <div class="content">
                    <h2 class="page-title">Ajouter Thème</h2>
                    <?php include(ROOT_PATH . "../../app/helpers/formErrors.php"); ?>
                    <form action="create.php" method="post">
                        <div>
                            <label>Nom</label>
                            <input type="text" name="name" value="<?php echo $name; ?>" class="text-input">
                        </div>
                        <div>
                            <label>Description</label>
                            <textarea name="description" id="body"><?php echo $description; ?></textarea>
                        </div>
                        <div>
                            <button type="submit" name="add-topic" class="btn btn-big">Ajouter Thème</button>
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
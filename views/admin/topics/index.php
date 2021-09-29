<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include(ROOT_PATH . "../../app/includes/adminHead.php"); ?>
        
        <title>Admin - Gérer Thèmes</title>
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
                    <a href="index.php?create=topic" class="btn btn-big">Ajouter Thème</a>
                    <a href="index.php?admin=topics" class="btn btn-big">Gérer Thèmes</a>
                </div>

                <div class="content">

                    <h2 class="page-title">Gérer Thèmes</h2>
                    
                    <?php include(ROOT_PATH . "../../app/includes/messages.php"); ?>
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    <input type="text" class="search-input" placeholder="SN">
                                </th>
                                <th>
                                    <input type="text" class="search-input" placeholder="Thème">
                                </th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($topics as $key => $topic): ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $topic['name']; ?></td>
                                    <td><a href="index.php?edit_topic_id=<?php echo $topic['id']; ?>" class="edit">Éditer</a></td>
                                    <td><a href="index.php?del-topic-id=<?php echo $topic['id']; ?>" class="delete">Effacer</a></td>                            
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
        <script src="assets/js/scripts_search.js"></script>

    </body>
</html> 
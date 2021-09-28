<!DOCTYPE html>
<html lang="en">
<head>

    <?php include(ROOT_PATH . "../../app/includes/head.php"); ?>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!-- Custom Styling -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style_media.css">

    <title><?php echo $post['title']; ?> | JeanForteroche</title>
</head>

<body>
    <!-- Header included here -->
    <?php include(ROOT_PATH . "../../app/includes/header.php"); ?>
    <?php include(ROOT_PATH . "../../app/includes/messages.php"); ?>
    <?php include(ROOT_PATH . "../../app/helpers/formErrors.php"); ?>
 
    <!-- Page Wrapper -->
    <div class="page-wrapper"> 

        <!-- Content -->
        <div>
            <div class="content clearfix">
                
                <!-- Main Content -->
                <div class="main-content">
                    
                    <?php foreach ($publishedPosts as $post): ?>
                        <div class="post clearfix">
                            <img src="<?php echo BASE_URL .'/assets/images/' . $post['image']; ?>" alt="" class="post-image">
                            <div class="post-preview">
                                <h3><a href="index.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h3>
                                <i class="far fa-user"><?php echo $post['username']; ?></i>
                                &nbsp;
                                <i class="far fa-calendar"><?php echo date('F j, Y', strtotime($post['created_at'])); ?></i>
                                <p class="preview-text">
                                    <?php echo html_entity_decode(substr($post['body'], 0, 150) . '...'); ?>
                                </p>
                                <a href="index.php?id=<?php echo $post['id']; ?>" class="btn read-more">Lire</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Sidebar -->
                <div class="sidebar single">

                    <div class="section popular">
                        <h3 class="section-title">Populaire</h3>

                        <?php foreach ($trendPosts as $trendPost): ?>
                            <div class="post clearfix">
                                <img src="<?php echo BASE_URL . '/assets/images/' .  $trendPost['image']; ?>" alt="">
                                <a href="" class="title">
                                    <h4><a href="index.php?id=<?php echo $trendPost['id']; ?>"><?php echo $trendPost['title']; ?></a></h4>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="section topics">
                        <h3 class="section-title">Chapitres</h3>
                        <ul>
                        <?php foreach ($topics as $key => $topic): ?>
                                <li><a href="<?php echo BASE_URL . '/index.php?topic_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- // Sidebar -->

        </div>
        <!-- // Content -->

    </div>
    <!-- // Page Wrapper -->

    <!-- Footer included here -->
    <?php include(ROOT_PATH . "../../app/includes/footer.php"); ?>

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   
    <!-- Custom Script -->
    <script src="assets/js/scripts.js"></script>
</body>

</html>
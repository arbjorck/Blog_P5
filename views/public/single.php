<?php
include("../path.php");
require(ROOT_PATH . "../../index.php");
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(ROOT_PATH . "../../app/includes/head.php"); ?>
    <meta name="description" content="Blog">
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

                <!-- Main Content Wrapper -->
                <div class="main-content-wrapper">
                    <div class="main-content single">
                        <h2 class="post-title"><?php echo $post['title']; ?></h2>
                        
                        <div class="post-content">
                            <?php echo html_entity_decode($post['body']); ?>
                        </div>

                    </div>
                </div>
                <!-- // Main Content Wrapper -->

                <!-- Sidebar -->
                <div class="sidebar single">

                    <div class="section popular">
                        <h3 class="section-title">Populaire</h3>

                        <?php foreach ($getPublishedPosts as $p): ?>
                            <div class="post clearfix">
                                <img src="<?php echo BASE_URL . '/assets/images/' .  $p['image']; ?>" alt="">
                                <a href="" class="title">
                                    <h4><a href="single.php?id=<?php echo $p['id']; ?>"><?php echo $p['title']; ?></a></h4>
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

            <!-- Comments Section -->
            <div class="content clearfix">
                <div class="comments-section">
                    <h3 class="comments-title">Commentaires</h3>

                    <form action="single.php?id=<?php echo $post['id']; ?>" method="post">
                        <div>
                            <label>Ajouter un commentaire</label>
                            <textarea type="textarea" name="comment" value="<?php echo $comment; ?>" class="text-input"></textarea>
                        </div>
                        <div>
                            <button type="submit" name="add-comment" class="btn btn-big comment-btn">Publier</button>
                        </div>
                    </form>

                    <?php foreach ($reportedComments as $comment): ?>
                        <div class="comment clearfix">
                            <div class="comment-preview reported">
                                <i class="far fa-user"> <?php echo $comment['username']; ?></i> 
                                &nbsp;
                                <i class="far fa-calendar"> <?php echo date('F j, Y', strtotime($comment['created_at'])); ?></i>
                                <span class="btn-reported">Signalé</span>
                                <p class="preview-text">
                                    <?php echo html_entity_decode($comment['comment']); ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <?php foreach ($publishedComments as $comment): ?>
                        <div class="comment clearfix">
                            <div class="comment-preview">
                                <i class="far fa-user"> <?php echo $comment['username']; ?></i> 
                                &nbsp;
                                <i class="far fa-calendar"> <?php echo date('F j, Y', strtotime($comment['created_at'])); ?></i>
                                <a href="single.php?id=<?php echo $post['id'] ?>&report=1&comment_id=<?php echo $comment['id'] ?>" class="btn-report">Signaler</a>
                                <p class="preview-text">
                                    <?php echo html_entity_decode($comment['comment']); ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- // Comments Section -->

        </div>
        <!-- // Content -->

    </div>
    <!-- // Page Wrapper -->

    <!-- Footer included here -->
    <?php include(ROOT_PATH . "../../app/includes/footer.php"); ?>

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   
    <!-- Custom Script -->
    <script src="/../../assets/js/scripts.js"></script>
</body>

</html>
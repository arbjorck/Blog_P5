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
    <link rel="stylesheet" href="assets/css/styleEarth.css">

    <title>Blog</title>
</head>   


<body>
    <!-- Header included here -->
    <?php include(ROOT_PATH . "../../app/includes/header.php"); ?>
    <?php include(ROOT_PATH . "../../app/includes/messages.php"); ?>

        <!-- Earth CSS  -->
    <div class="planet planetEarth">
        <!-- <h2>Earth</h2> -->
        <div class="container">
            <div class="loader"><span></span></div>
            <div class="earth"></div>
        </div>
    </div>
    <!-- // Earth CSS  -->
 
    <!-- Page Wrapper -->
    <div class="page-wrapper"> 

        <!-- Post Slider -->
        <div class="post-slider">
            <h2 class="slider-title">Tendances</h2>
            <i class="fas fa-chevron-left prev"></i>
            <i class="fas fa-chevron-right next"></i>

            <div class="post-wrapper">
                <?php foreach ($getPublishedPosts as $post): ?>
                    <div class="post">
                        <img src="<?php echo BASE_URL .'/assets/images/' . $post['image']; ?>" alt="" class="slider-image">
                        <div class="post-info">
                            <h4><a href="views/public/single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h4>
                            <i class="far fa-user"><?php echo $post['username']; ?></i>
                            &nbsp;
                            <i class="far fa-calendar"><?php echo date('F j, Y', strtotime($post['created_at'])); ?></i>
                        </div>
                </div>  
                <?php endforeach; ?>
            </div>
        </div>
        <!-- // Post Slider -->

        <!-- Content -->
        <div class="content clearfix">

            <!-- Main Content -->
            <div class="main-content">
                <h2 class="recent-post-title"><?php echo $postsTitle ?></h2>
                
                <?php if(isset($_GET['topic_id'])){
                    $post = $getPostsByTopicId;
                } elseif(isset($_POST['search-term'])){
                    $post = $searchPosts;
                } else {
                    $post = $getPublishedPosts;
                } foreach ($post as $post): ?>
                    <div class="post clearfix">
                        <img src="<?php echo BASE_URL .'/assets/images/' . $post['image']; ?>" alt="" class="post-image">
                        <div class="post-preview">
                            <h3><a href="views/public/single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h3>
                            <i class="far fa-user"><?php echo $post['username']; ?></i>
                            &nbsp;
                            <i class="far fa-calendar"><?php echo date('F j, Y', strtotime($post['created_at'])); ?></i>
                            <p class="preview-text">
                                <?php echo html_entity_decode(substr($post['body'], 0, 150) . '...'); ?>
                            </p>
                            <a href="views/public/single.php?id=<?php echo $post['id']; ?>" class="btn read-more">Lire</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- // Sidebar -->

            <div class="sidebar">
            
                <div class="section search">
                    <h3 class="section-title">Rechercher</h3>
                    <form action="index.php" method="post">
                        <input type="text" name="search-term" class="text-input" placeholder="Rechercher...">
                    </form>
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
        <!-- // Content -->


    </div>
    <!-- // Page Wrapper -->

    <!-- Footer included here -->
    <?php include(ROOT_PATH . "../../app/includes/footer.php"); ?>

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   
    <!-- Slick Carousel -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!-- Custom Script -->
    <script src="assets/js/scripts.js"></script>

</body>
</html>
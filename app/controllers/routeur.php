<?php
session_start();
require_once(ROOT_PATH . "/app/controllers/topics.php");
require_once(ROOT_PATH . "/app/controllers/posts.php");
require_once(ROOT_PATH . "/app/controllers/comments.php");
require_once(ROOT_PATH . "/app/controllers/users.php");
require_once(ROOT_PATH . "/app/helpers/middleware.php");
require_once(ROOT_PATH . "/app/helpers/validateTopic.php");
require_once(ROOT_PATH . "/app/helpers/validateComments.php");
require_once(ROOT_PATH . "/app/helpers/validateUser.php");

try {

  $errors = array();
  $id = '';
  $name = '';
  $description = '';
  
  $posts = array();
  $postsTitle = 'Récents';
  $title = '';
  $body = '';

  //Users Variables
  $username ='';
  $admin = '';
  $email ='';
  $password ='';
  $passwordConf ='';

  // ------------------------------ ADMIN ------------------------------------

  // POSTS ADMIN

  if ($_GET['admin'] = 'posts') {
    $postsController = new PostsController();
    $posts = $postsController->getPostsForAdmin('posts');
  }

  if (isset($_GET['edit_post_id'])) {
    $postsController = new PostsController();
    $post = $postsController->selectOnePost('posts', ['id' => $_GET['edit_post_id']]);
    $id = $post['id'];
    $topic_id = $post['topic_id'];
    $title = $post['title'];
    $body = $post['body'];
    $published = $post['published'];

    $topicsController = new TopicsController();
    $topics = $topicsController->getTopics('topics'); 
  }

  if (isset($_POST['update-post'])) {
    $middleware = new Middleware();
    $adminOnly = $middleware->adminOnly();

    $validatePosts = new ValidatePost($_POST);
    $errors = $validatePosts->validatePost($_POST);

    if (count($errors) == 0) {
        $id = $_POST['id'];
        unset($_POST['update-post'], $_POST['id']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['published'] = isset($_POST['published']) ? 1 : 0;
        $_POST['body'] = htmlentities($_POST['body']); //pour sécuriser code
    

        $postsController = new PostsController();
        $postUpdate = $postsController->updatePost('posts', $id, $_POST);
    }else {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $topic_id = $_POST['topic_id'];
        $published = isset($_POST['published']) ? 1 : 0;
    }

    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . ' ' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/images/" . $image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if ($result) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors, "Le téléchargement de l'image a échoué");
        }

    } else {
        array_push($errors, "L'image du post est requise");
    }
  }

  if (isset($_GET['post_published']) && isset($_GET['post_published_id'])) {
    $middleware = new Middleware();
    $adminOnly = $middleware->adminOnly();

    $published = $_GET['post_published'];
    $published_id = $_GET['post_published_id'];
    $postsController = new PostsController();
    $updatePost = $postsController->updatePost('posts', $published_id, ['published' => $published]);
  }

  if(isset($_POST['add-post'])) {
    $middleware = new Middleware();
    $adminOnly = $middleware->adminOnly();

    $validatePosts = new ValidatePost($_POST);
    $errors = $validatePosts->validatePost($_POST);

    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . ' ' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/images/" . $image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if ($result) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors, "Le téléchargement de l'image a échoué.");
        }

    } else {
        array_push($errors, "L'image du post est requise.");
    }

    if (count($errors) == 0) {
        unset($_POST['add-post']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['published'] = isset($_POST['published']) ? 1 : 0;
        $_POST['body'] = htmlentities($_POST['body']); //pour sécuriser code
    
        $postsController = new PostsController();
        $post_id = $postsController->createPost('posts', $_POST);
        var_dump($post_id);
    }else {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $topic_id = $_POST['topic_id'];
        $published = isset($_POST['published']) ? 1 : 0;
    }
  }

  if (isset($_GET['delete_id_post'])) {
    $middleware = new Middleware();
    $adminOnly = $middleware->adminOnly();

    $postsController = new PostsController();
    $deletePost = $postsController->deletePost('posts', $_GET['delete_id_post']);
  }   


  // COMMENTS ADMIN

  if ($_GET['admin'] = 'comments') {
    $commentsController = new CommentsController();
    $getCommentsForAdmin = $commentsController->getCommentsForAdmin();
  }

  if (isset($_GET['comment_published']) && isset($_GET['comment_published_id'])) {
    $middleware = new Middleware();
    $adminOnly = $middleware->adminOnly();

    $published = $_GET['comment_published'];
    $published_id = $_GET['comment_published_id'];
    $commentsController = new CommentsController();
    $updateComment = $commentsController->updateComment('comments', $published_id, ['published' => $published]);

    $_SESSION ['message'] = "Le statut de publication a été modifié.";
    $_SESSION['type'] = "success";
    header("location: " . BASE_URL . "/admin/comments/index.php");
    exit();
  }

  if (isset($_GET['reported']) && isset($_GET['reported_id'])) {
    $middleware = new Middleware();
    $adminOnly = $middleware->adminOnly();

    $reported = $_GET['reported'];
    $reported_id = $_GET['reported_id'];
    $commentsController = new CommentsController();
    $updateComment = $commentsController->updateComment('comments', $reported_id, ['reported' => $reported]);

    $_SESSION ['message'] = "Le statut de publication a été modifié.";
    $_SESSION['type'] = "success";
    header("location: " . BASE_URL . "/admin/comments/index.php");
    exit();
  }


  // TOPICS ADMIN

  if (isset($_GET['edit_topic_id'])) {
    $topicsController = new TopicsController();
    $topic = $topicsController->selectOneTopic('topics', ['id' => $_GET['edit_topic_id']]);
    $id = $topic['id'];
    $name = $topic['name'];
    $description = $topic['description'];
  }

  if (isset($_POST['update-topic'])) {
    $middleware = new Middleware();
    $adminOnly = $middleware->adminOnly();
  
    $validateTopic = new ValidateTopic($_POST);
    $errors = $validateTopic->validateTopic($_POST);
  
    if (count($errors) === 0) {
      $id = $_POST['id'];
      unset($_POST['update-topic'], $_POST['id']);
  
      $topicsController = new TopicsController();
      $topicUpdate = $topicsController->updateTopic('topics', $id, $_POST);
    } else {
      $id = $_POST['id'];
      $name = $_POST['name'];
      $description = $_POST['description'];
    }
  }

  if (isset($_GET['del_topic_id'])) {
    $middleware = new Middleware();
    $adminOnly = $middleware->adminOnly();
  
    $id = $_GET['del_topic_id'];
    $topicsController = new TopicsController();
    $deleteTopic = $topicsController->deleteTopic('topics', $id);
  }

  if (isset($_POST['add-topic'])) {
    // Création d'un objet
    $middleware = new Middleware();
    // Appel d'une fonction de cet objet
    $adminOnly = $middleware->adminOnly();
  
    $validateTopic = new ValidateTopic($_POST);
    $errors = $validateTopic->validateTopic($_POST);
  
    if (count($errors) === 0) {
      unset($_POST['add-topic']);
      $topicsController = new TopicsController();
      $topic_id = $topicsController->createTopic('topics', $_POST);
    } else {
      $name = $_POST['name'];
      $description = $_POST['description'];
    }
  } 

  // USERS ADMIN

  if ($_GET['admin'] = 'users') {
    $usersController = new UsersController();
    $adminUsers = $usersController->selectAllUsers('users');
  }

  if (isset($_GET['delete_id_user'])) {
    $middleware = new Middleware();
    $adminOnly = $middleware->adminOnly();

    $usersController = new UsersController();
    $deleteUser = $usersController->deleteUser('users', $_GET['delete_id_user']);
  }

  if (isset($_POST['update-user'])) {
    $middleware = new Middleware();
    $adminOnly = $middleware->adminOnly();

    $validateUser = new ValidateUser($_POST);
    $errors = $validateUser->validateEditUser($_POST);
    
    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['passwordConf'], $_POST['update-user'], $_POST['id']);    
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;

        $usersController = new UsersController();
        $user_id = $usersController->updateUser('users', $id, $_POST);
    } else { // keep the well filled inputs in the form
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
  }

  if (isset($_GET['edit_user_id'])) {
    $usersController = new UsersController();
    $user = $usersController->selectOneUser('users', ['id' => $_GET['edit_user_id']]);
    $id = $user['id'];
    $username = $user['username'];
    $email = $user['email'];
    $password = $user['password'];
    $passwordConf = $user['password'];
    $admin = $user['admin'] == 1 ? 1 : 0;
  }



  // -------------------------- GUESTS / USERS ------------------------------


  // USERS

  if (isset($_POST['login-btn'])) {
    $validateUser = new ValidateUser($_POST);
    $errors = $validateUser->validateLogin($_POST);

    if (count($errors) === 0) {        
        $usersController = new UsersController();
        $user = $usersController->selectOneUser('users', ['username' => $_POST['username']]);

        if ($user && password_verify($_POST['password'], $user['password'])) {
          $usersController = new UsersController();
          $loggedUser = $usersController->loggedUser($user);
        }else {
            array_push($errors, "Vos identifiants sont incorrects.");
        }
    }
      $username = $_POST['username'];
      $password = $_POST['password'];
  }

  if (isset($_POST['register-btn'])) {
    $validateUser = new ValidateUser($_POST);
    $errors = $validateUser->validateUser($_POST);
    
    if (count($errors) === 0) {
        unset($_POST['register-btn'], $_POST['passwordConf']);    
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        if (isset($_POST['admin'])) {
            $_POST['admin'] = 1;
            $usersController = new UsersController();
            $user_id = $usersController->createUser('users', $_POST);
            exit();
        } else {
            $_POST['admin'] = 0;
            $usersController = new UsersController();
            $user_id = $usersController->createUser('users', $_POST);
            $usersController = new UsersController();
            $user = $usersController->selectOneUser('users', ['id' => $user_id]);
            $usersController = new UsersController();
            $loggedUser = $usersController->loggedUser($user);

        }
    } else { // keep the well filled inputs in the form
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
  }


  // COMMENTS

  if (isset($_GET['delete_id_comment'])) {
    $delete_id = $_GET['delete_id_comment'];

    $middleware = new Middleware();
    $adminOnly = $middleware->adminOnly();

    $commentsController = new CommentsController();
    $comment = $commentsController->deleteComment('comments', $delete_id);
  }

  if (isset($_GET['id']) && isset($_GET['report']) && isset($_GET['comment_id'])) {
    $middleware = new Middleware();
    $adminOnly = $middleware->usersOnly();

    $report = $_GET['report'];
    $comment_id = $_GET['comment_id'];

    $commentsController = new CommentsController();
    $update = $commentsController->updateComment('comments', $comment_id, ['reported' => $report]);
    $_SESSION ['message'] = "Le commentaire a été signalé. Nous allons le traiter. Merci pour votre collaboration.";
    $_SESSION['type'] = "success";
    header("location: " . BASE_URL . "/single.php?id=" . $_GET['id']);
    exit();
  }

  if(isset($_POST['add-comment'])) {
    $middleware = new Middleware();
    $adminOnly = $middleware->usersOnly();

    $validateComment = new ValidateComment($_POST['comment']);
    $errors = $validateComment->validateComment($_POST['comment']);

    if (count($errors) == 0) {
        unset($_POST['add-comment']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['post_id'] = $_GET['id'];
        $_POST['comment'] = htmlentities($_POST['comment']); //pour sécuriser code
        $_POST['published'] = isset($_POST['published']) ? 0 : 1;
        $_POST['reported'] = isset($_POST['reported']) ? 1 : 0;

        $commentsController = new CommentsController();
        $createComment = $commentsController->createComment('comments', $_POST);
    }else {
        $post_id = $_POST['post_id'];
        $comment = $_POST['comment'];
    }
  }


  // POSTS
  
  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $postsController = new PostsController();
    $post = $postsController->selectOnePost('posts', ['id' => $id]);

    $topicsController = new TopicsController();
    $topics = $topicsController->getTopics('topics');

    $postsController = new PostsController();
    $PublishedPosts = $postsController->getPublishedPosts();

    $commentsController = new CommentsController();
    $reportedComments = $commentsController->getReportedComments($id);

    $commentsController = new CommentsController();
    $publishedComments = $commentsController->getPublishedComments($id);
  }


  // TOPICS
  
  // Attention GET a été changé !
  if (isset($_GET['id-topic'])) {
    $id = $_GET['id-topic'];
    $topicsController = new TopicsController();
    $topic = $topicsController->selectOneTopic('topics', ['id' => $id]);
  
    $id = $topic['id'];
    $name = $topic['name'];
    $description = $topic['description'];
  }
  
  if (isset($_GET['topic_id'])) {
    $postsController = new PostsController();
    $getPostsByTopicId = $postsController->getPostsByTopicId($_GET['topic_id']);
    var_dump($getPostsByTopicId);
    $postsTitle = "Vous avez recherché ''" . $_GET['name'] . "''";
  } elseif (isset($_POST['search-term'])) {
    $postsTitle = "Vous avez recherché ''" . $_POST['search-term'] . "''";
    $postsController = new PostsController();
    $searchPosts = $postsController->searchPosts($_POST['search-term']);
  } else {
    $postsController = new PostsController();
    $getPublishedPosts = $postsController->getPublishedPosts();
  
    $topicsController = new TopicsController();
    $topics = $topicsController->getTopics('topics');  
  }
} catch (Exception $e) {
  $errors = $e->getMessage();
  echo($errors);
}








  /// ??????????????????????

  if (isset($_POST['create-admin'])) {
    $validateUser = new ValidateUser($_POST);
    $errors = $validateUser->validateUser($_POST);
    
    if (count($errors) === 0) {
        unset($_POST['passwordConf'], $_POST['create-admin']);    
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        if (isset($_POST['admin'])) {
            $_POST['admin'] = 1;
            $usersController = new UsersController();
            $user_id = $usersController->createUser('users', $_POST);
        } else {
            $_POST['admin'] = 0;
            $usersController = new UsersController();
            $userCreate = $usersController->createAdmin('users', $_POST);
            $usersController = new UsersController();
            $user = $usersController->selectOneUser('users', ['id' => $user_id]);
            // loginUser($user);
            header('location: ' . BASE_URL . '/admin/users/index.php');
        }
    } else { // keep the well filled inputs in the form
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
  }


  // if (isset($_GET['comment_id'])) {
  //   $comment_id = $_GET['comment_id'];

  //   $commentsController = new CommentsController();
  //   $comment = $commentsController->selectOneComment($table, $comment_id);

  //   $id = "";
  //   $user_id = ""; 
  //   $post_id = "";
  //   $comment = ""; 

  //   $id = $comment['id'];
  //   $user_id = $comment['user_id'];
  //   $post_id = $comment['post_id'];
  //   $comment = $comment['comment'];
  // }
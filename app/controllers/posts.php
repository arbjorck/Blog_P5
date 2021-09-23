<?php
require_once(ROOT_PATH . "../../app/database/db.php");
require_once(ROOT_PATH . "../../app/helpers/middleware.php");
require_once(ROOT_PATH . "../../app/helpers/validatePost.php");

class PostsController
{
    private $dbModel;

    function __construct()
    {
      $this->dbModel = new DbModel();
    }

    public function selectOnePost($table, $conditions)
    {
      // Création d'un objet
      $post = $this->dbModel->selectOne($table, $conditions);
      // Appel d'une fonction de cet objet
      return $post;
    }

    public function getTopics($table)
    {
      $topics = $this->dbModel->selectAll($table);
      return $topics;
    }

    public function getPostsForAdmin($table)
    {
      $getPostsForAdmin = $this->dbModel->getPostsForAdmin($table);
      return $getPostsForAdmin;
    }

    public function getPostsByTopicId($topicId)
    {
        $getPostsByTopicId = $this->dbModel->getPostsByTopicId($topicId);
        return $getPostsByTopicId;
    }

    public function searchPosts($term)
    {
        $searchPosts = $this->dbModel->searchPosts($term);
        return $searchPosts;
    }

    public function getPublishedPosts()
    {
        $getPublishedPosts = $this->dbModel->getPublishedPosts();
        return $getPublishedPosts;
    }

    public function updatePost($table, $id, $data)
    {
        $updatePost = $this->dbModel->update($table, $id, $data);

        $_SESSION ['message'] = "Le post a été actualisé avec succès.";
        $_SESSION['type'] = "success";
        header("location: " . BASE_URL . "/views/admin/posts/index.php?admin=posts");
        exit();
    }

    public function createPost($table, $data)
    {
        $createPost = $this->dbModel->create($table, $data);

        $_SESSION ['message'] = "Le post a été créé avec succès.";
        $_SESSION['type'] = "success";
        header("location: " . BASE_URL . "/views/admin/posts/index.php?admin=posts");
    }

    public function deletePost($table, $id)
    {
      $deletePost = $this->dbModel->delete($table, $id);

      $_SESSION ['message'] = "Le post a été effacé avec succès.";
      $_SESSION['type'] = "success";
      header("location: " . BASE_URL . "/views/admin/posts/index.php?admin=posts");
      exit();
    }
}
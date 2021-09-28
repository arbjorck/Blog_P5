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
    $post = $this->dbModel->selectOne($table, $conditions);
    return $post;
  }

  public function countViews($table, $id)
  {
    $addView = $this->dbModel->countViews($table, $id);
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

  public function publishedPosts()
  {
    $publishedPosts = $this->dbModel->publishedPosts();
    return $publishedPosts;
  }

  public function trendPosts()
  {
    $trendPosts = $this->dbModel->trendPosts();
    return $trendPosts;
  }
  
  public function recentPosts()
  {
    $recentPosts = $this->dbModel->recentPosts();
    return $recentPosts;
  }

  public function searchPosts($term)
  {
    $searchPosts = $this->dbModel->searchPosts($term);
    return $searchPosts;
  }

  public function updatePost($table, $id, $data)
  {
    $updatePost = $this->dbModel->update($table, $id, $data);

    $_SESSION['message'] = "Le post a été actualisé avec succès.";
    $_SESSION['type'] = "success";
  }

  public function createPost($table, $data)
  {
    $createPost = $this->dbModel->create($table, $data);
  }

  public function deletePost($table, $id)
  {
    $deletePost = $this->dbModel->delete($table, $id);

    $_SESSION['message'] = "Le post a été effacé avec succès.";
    $_SESSION['type'] = "success";
  }
}

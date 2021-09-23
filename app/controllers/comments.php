<?php
require_once(ROOT_PATH . "../../app/database/db.php");
require_once(ROOT_PATH . "../../app/helpers/middleware.php");
require_once(ROOT_PATH . "../../app/helpers/validateComments.php");

class CommentsController
{
    private $dbModel;

    function __construct()
    {
      $this->dbModel = new DbModel();
    }

    public function selectAllComments($table)
    {
        $comments = $this->dbModel->selectAll($table);
        return $comments;
    }

    public function selectOneComment($comment_id)
    {
        $comment = $this->dbModel->selectOne($comment_id);
        return $comment;
    }

    public function deleteComment($table, $id){
        $deleteComment = $this->dbModel->delete($table, $id);

        $_SESSION ['message'] = "Le commentaire a été effacé avec succès.";
        $_SESSION['type'] = "success";
        header("location: " . BASE_URL . "/views/admin/comments/index.php?admin=comments");
        exit();
    }

    public function updateComment($table, $id, $data){
        $updateComment = $this->dbModel->update($table, $id, $data);
        return $updateComment;
    }

    public function createComment($table, $data){
        $createComment = $this->dbModel->create($table, $data);

        $_SESSION ['message'] = "Le commentaire a été créé avec succès";
        $_SESSION['type'] = "success";
        header("location: " . BASE_URL . "/views/public/single.php?id=" . $_POST['post_id']);
    }

    public function getReportedComments($postId)
    {
        $reportedcomments = $this->dbModel->getReportedComments($postId);
        return $reportedcomments;
    }

    public function getPublishedComments($postId)
    {
        $publishedComments = $this->dbModel->getPublishedComments($postId);
        return $publishedComments;
    }

    public function getCommentsForAdmin()
    {
        $getCommentsForAdmin = $this->dbModel->getCommentsForAdmin();
        return $getCommentsForAdmin;
    }
}
<?php
require(ROOT_PATH . "../../app/database/db.php");
require(ROOT_PATH . "../../app/helpers/middleware.php");
require(ROOT_PATH . "../../app/helpers/validateTopic.php");

class TopicsController
{
  private $dbModel;

  function __construct()
  {
    $this->dbModel = new DbModel();
  }

  public function getTopics($table)
  {
    // Création d'un objet
    $topics = $this->dbModel->selectAll($table);
    // Appel d'une fonction de cet objet
    return $topics;
  }

  public function createTopic($table, $data)
  {
    $createTopic = $this->dbModel->create($table, $data);

    $_SESSION['message'] = 'Le thème a été créé avec succès.';
    $_SESSION['type'] = 'success';
  }

  public function selectOneTopic($table, $data)
  {
    $selectOne = $this->dbModel->selectOne($table, $data);
    return $selectOne;
  }

  public function deleteTopic($table, $data)
  {
    $deleteTopic = $this->dbModel->delete($table, $data);

    $_SESSION['message'] = 'Thème suprimé avec succès';
    $_SESSION['type'] = 'success';
  }

  public function updateTopic($table, $id, $data)
  {
    $selectOne = $this->dbModel->update($table, $id, $data);

    $_SESSION['message'] = 'Thème actualisé avec succès';
    $_SESSION['type'] = 'success';
  }
}
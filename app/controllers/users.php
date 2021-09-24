<?php
require_once(ROOT_PATH . "../../app/database/db.php");
require_once(ROOT_PATH . "../../app/helpers/middleware.php");
require_once(ROOT_PATH . "../../app/helpers/validateUser.php");

class UsersController
{
    private $dbModel;

    function __construct()
    {
      $this->dbModel = new DbModel();
    }

    public function selectAllUsers($table)
    {
        $adminUsers = $this->dbModel->selectAll($table);
        return $adminUsers;
    }

    public function selectOneUser($table, $data)
    {
        $user = $this->dbModel->selectOne($table, $data);
        return $user;
    }

    public function loggedUser($user)
    {
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['admin'] = $user['admin'];
        $_SESSION['message'] = 'Vous êtes connecté';
        $_SESSION['type'] = 'success';


        if ($_SESSION['admin']) {
            header('location: ' . BASE_URL . '/views/admin/dashboard.php?dashboard');
        }else {
            header('location: ' . BASE_URL . '');
        }
        exit();
    }

    public function createAdmin($table, $data)
    {
        $createUser = $this->dbModel->create($table, $data);

        if ($data['admin'] === 0)
        {
            $_SESSION['message'] = "L'utilisateur a été créé.";
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . '/views/admin/users/index.php?admin=users');
            exit();
        } else {
            $_SESSION['message'] = "L'utilisateur admin a été créé.";
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . '/views/admin/users/index.php?admin=users');
            exit();
        }
    }

    public function createUser($table, $data)
    {
        $createUser = $this->dbModel->create($table, $data);
        return $createUser;
    }

    public function updateUser($table, $id, $data)
    {
        $updateUser = $this->dbModel->update($table, $id, $data);

        $_SESSION['message'] = "L'utilisateur a été actualisé.";
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/views/admin/users/index.php?admin=users');
        exit();
    }

    public function deleteUser($table, $id)
    {
        $deleteUser = $this->dbModel->delete($table, $id);

        $_SESSION['message'] = 'L\'utilisateur a été effacé.';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/views/admin/users/index.php?admin=users');
        exit();
    }
}


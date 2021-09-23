<?php
require_once(ROOT_PATH . "../../app/database/db.php");

class ValidateUser
{
    private $selectOne;

    public function validateUser($user) 
    {
        $errors =  array();

        if (empty($user['username'])) {
            array_push($errors, 'Un nom d\'utilisateur est requis.');
        }

        if (empty($user['email'])) {
            array_push($errors, 'Une adresse mail est requise.');
        }

        if (empty($user['password'])) {
            array_push($errors, 'Un mot de passe est requis.');
        }

        if ($user['passwordConf'] !== $user['password']) {
            array_push($errors, 'Les mots de passe ne correspondent pas.');
        }

        $this->selectOne = new DbModel();
        $existingUser = $this->selectOne->selectOne('users', ['email' =>$user['email']]);
        //$existingUser = selectOne('users', ['email' =>$user['email']]);
        if (!empty($existingUser)) {
            if (isset($user['register-btn']) && $existingUser['id'] != $user['id'] ) {
            array_push($errors, 'Cette adresse mail existe déjà.');
            }

            if (isset($user['create-admin'])) {
                array_push($errors, 'Cette adresse mail existe déjà.');
            }
        }
        return $errors;
    }

    public function validateEditUser($user) 
    {

        $errors =  array();

        if (empty($user['username'])) {
            array_push($errors, 'Un nom d\'utilisateur est requis.');
        }

        if (empty($user['email'])) {
            array_push($errors, 'Une adresse mail est requise.');
        }
        
        if ($user['passwordConf'] !== $user['password']) {
            array_push($errors, 'Les mots de passe ne correspondent pas.');
        }

        $this->selectOne = new DbModel();
        $existingUser = $this->selectOne->selectOne('users', ['email' =>$user['email']]);
        //$existingUser = selectOne('users', ['email' =>$user['email']]);
        if ($existingUser) {
            if (isset($user['update-user']) && $existingUser['id'] != $user['id'] ) {
            array_push($errors, 'Cette adresse mail existe déjà.');
            }

            if (isset($user['create-admin'])) {
                array_push($errors, 'Cette adresse mail existe déjà.');
            }
        }

        return $errors;
    }


    public function validateLogin($user) 
    {
        $errors = array();

        if (empty($user['username'])) {
            array_push($errors, 'Un nom d\'utilisateur est requis.');
        }

        if (empty($user['password'])) {
            array_push($errors, 'Un mot de passe est requis.');
        }
        return $errors;
    }
}

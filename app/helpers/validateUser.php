<?php
require_once(ROOT_PATH . "../../app/database/db.php");

class ValidateUser
{
    private $selectOne;

    public function validateUser($user) 
    {
        $errors =  array();
        $this->selectOne = new DbModel();

        if (empty($user['username'])) {
            array_push($errors, 'Un nom d\'utilisateur est requis.');
        }

        $existingUsername = $this->selectOne->selectOne('users', ['username' =>$user['username']]);
        if ($existingUsername) {
            if (isset($user['register-btn']) && $existingUsername['id'] != $user['id']) {
            array_push($errors, 'Ce nom d\'utilisateur existe déjà.');
            }

            if (isset($user['create-user'])) {
                array_push($errors, 'Ce nom d\'utilisateur existe déjà.');
            }
        }

        if (empty($user['email'])) {
            array_push($errors, 'Une adresse email est requise.');
        }

        $existingEmail = $this->selectOne->selectOne('users', ['email' =>$user['email']]);
        if (!empty($existingEmail)) {
            if (isset($user['register-btn']) && $existingEmail['id'] != $user['id'] ) {
            array_push($errors, 'Cette adresse mail existe déjà.');
            }

            if (isset($user['create-user'])) {
                array_push($errors, 'Cette adresse email existe déjà.');
            }
        }

        if (empty($user['password'])) {
            array_push($errors, 'Un mot de passe est requis.');
        } else {
            $regex = '/^(?=.*[A-z])(?=.*[0-9])\S{8,12}$/';

            if (!preg_match($regex, $user['password']))
            {
                array_push($errors, 'Le mot de passe doit contenir au moins 8 caractères dont une lettre et un chiffre.');
            }
        }

        if ($user['passwordConf'] !== $user['password']) {
            array_push($errors, 'Les mots de passe ne correspondent pas.');
        }
        return $errors;
    }

    public function validateEditUser($user) 
    {
        $errors =  array();
        $this->selectOne = new DbModel();

        if (empty($user['username'])) {
            array_push($errors, 'Un nom d\'utilisateur est requis.');
        }

        $existingUsername = $this->selectOne->selectOne('users', ['username' =>$user['username']]);
        if ($existingUsername) {
            if (isset($user['update-user']) && $existingUsername['id'] != $user['id']) {
            array_push($errors, 'Ce nom d\'utilisateur existe déjà.');
            }
        }

        if (empty($user['email'])) {
            array_push($errors, 'Une adresse mail est requise.');
        }

        $existingEmail = $this->selectOne->selectOne('users', ['email' =>$user['email']]);
        if ($existingEmail) {
            if (isset($user['update-user']) && $existingEmail['id'] != $user['id']) {
            array_push($errors, 'Cette adresse mail existe déjà.');
            }
        }

        if ($user['passwordConf'] !== $user['password']) {
            array_push($errors, 'Les mots de passe ne correspondent pas.');
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

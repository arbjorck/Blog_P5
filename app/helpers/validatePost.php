<?php
require_once(ROOT_PATH . "../../app/database/db.php");

class ValidatePost
{
    private $selectOne;

    public function validatePost($post) 
    {
        $errors =  array();

        if (empty($post['title'])) {
            array_push($errors, 'Un titre est requis.');
        }

        if (empty($post['body'])) {
            array_push($errors, 'Une contenu est requis.');
        }

        if (empty($post['topic_id'])) {
            array_push($errors, 'Veuillez sélectionner un thème.');
        }

        $this->selectOne = new DbModel();
        $existingPost = $this->selectOne->selectOne('posts', ['title' =>$post['title']]);
        if ($existingPost) {
            // if (isset($post['update-post']) && $existingPost['id'] != $post['id'] ) {
            // array_push($errors, 'Un post avec ce titre existe déjà.');
            // }

            if (isset($post['add-post'])) {
                array_push($errors, 'Un post avec ce titre existe déjà.');
            }
        }
        return $errors;
    }

    function validateLogin($post) 
    {
        $errors = array();

        if (empty($post['username'])) {
            array_push($errors, 'Un nom d\'utilisateur est requis.');
        }

        if (empty($post['password'])) {
            array_push($errors, 'Un mot de passe est requis.');
        }

        return $errors;
    }
}
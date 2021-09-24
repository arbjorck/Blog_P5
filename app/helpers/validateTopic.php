<?php
require_once(ROOT_PATH . "../../app/database/db.php");

class ValidateTopic
{
    private $selectOne;

    public function validateTopic($topic) 
    {
        $errors =  array();

        if (empty($topic['name'])) {
            array_push($errors, 'Un nom est requis.');
        }
        $this->selectOne = new DbModel();
        $existingTopic = $this->selectOne->selectOne('topics', ['name' =>$topic['name']]);

        if ($existingTopic) {
            if (isset($topic['update-topic']) && $existingTopic['id'] != $topic['id'] ) {
            array_push($errors, 'Ce nom existe déjà.');
            }

            if (isset($topic['add-topic'])) {
                array_push($errors, 'Ce nom existe déjà.');
            }
        }
        return $errors;
    }
}




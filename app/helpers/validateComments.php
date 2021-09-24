<?php

class ValidateComment
{
    public function validateComment($comment) 
    {
        $errors =  array();

        if (empty($comment)) {
            array_push($errors, 'Un commentaire est requis.');
        }
        return $errors;
    }
}
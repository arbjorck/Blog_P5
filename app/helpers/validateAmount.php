<?php

class ValidateAmount
{
    public function validateAmount($amount) 
    {
        $errors =  array();

        if (empty($amount)) {
            array_push($errors, 'Aucun montant n\'a été sélectionné.');
        }
        return $errors;
    }
}
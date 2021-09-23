<?php

class Middleware
{
    public function usersOnly() 
    {
        if (empty($_SESSION ['id'])) {
            $_SESSION['message'] = 'Une authentification est requise.';
            $_SESSION['type'] = 'error';
            header("location: " . BASE_URL . "/views/public/single.php?id=" . $_GET['id']);
            exit(0);
        }
    }

    public function adminOnly($redirect = '') 
    {
        if (empty($_SESSION ['id']) || empty($_SESSION ['admin'])) {
            $_SESSION['message'] = 'Vous n\'êtes pas autorisé.';
            $_SESSION['type'] = 'error';
            header('location: ' . BASE_URL . $redirect);
            exit(0);
        }
    }

    public function guestsOnly($redirect = '') 
    {
        if (isset($_SESSION ['id'])) {
            header('location: ' . BASE_URL . $redirect);
            exit(0);
        }
    }
}

<?php
include("../path.php");

$errors = array();
$username ='';
$admin = '';
$email ='';
$password ='';
$passwordConf ='';

if(isset($_POST['login-btn']))
{
    require(ROOT_PATH . "../../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!-- Custom Styling -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/style_media.css">

    <title>Blog</title>
</head>


<body>
    <!-- Header included here -->
    <?php include(ROOT_PATH . "../../app/includes/header.php"); ?>

    <div class="auth-content">
        <form action="login.php" method="post">
            <h3 class="form-title">Connexion</h3>

            <?php include(ROOT_PATH . "../../app/helpers/formErrors.php"); ?>

            <div>
                <label>Utilisateur</label>
                <input type="text" name="username" value="<?php echo $username; ?>" class="text-input">
            </div>
            <div>
                <label>Mot de Pass</label>
                <input type="password" name="password" value="<?php echo $password; ?>" class="text-input">
            </div>
            <div>
                <button type="submit" name="login-btn" class="btn btn-big login">Connexion</button>
            </div>
            <p>ou <a href="<?php echo BASE_URL . '../../views/public/register.php' ?>">S'inscrire</a></p>
        </form>
    </div>
 


    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Custom Script -->
    <script src="/../../assets/js/scripts.js"></script>

</body>
</html>

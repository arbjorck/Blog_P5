<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(ROOT_PATH . "../../app/includes/head.php"); ?>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!-- Custom Styling -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style_media.css">

    <title>Blog</title>
</head>

<body>
    <!-- Header included here -->
    <?php include(ROOT_PATH . "../../app/includes/header.php"); ?>

    <div class="auth-content">
        <form action="index.php?register" method="post">
            <h3 class="form-title">Créer un compte</h3>

            <?php include(ROOT_PATH . "../../app/helpers/formErrors.php"); ?>

            <div>
                <label>Utilisateur</label>
                <input type="text" name="username" value="<?php echo $username; ?>" class="text-input">
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $email; ?>" class="text-input">
            </div>
            <div>
                <label>Mot de Pass</label>
                <input type="password" name="password" value="<?php echo $password; ?>" class="text-input">
            </div>
            <div>
                <label>Confirmer le mot de pass</label>
                <input type="password" name="passwordConf" value="<?php echo $passwordConf; ?>" class="text-input">
            </div>
            <div>
                <button type="submit" name="register-btn" class="btn btn-big submit">Confirmer</button>
            </div>
            <p>ou <a href="<?php echo BASE_URL . '/index.php?login' ?>">Se connecter</a></p>
        </form>
    </div>
 
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Custom Script -->
    <script src="assets/js/scripts.js"></script>

</body>
</html>
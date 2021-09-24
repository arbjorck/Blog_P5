<?php
include("../path.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(ROOT_PATH . "app/includes/head.php"); ?>

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

    <!-- js.stripe creates the action -->
    <div class="auth-content">
        <form method="post">
            <h3 class="form-title">Paiment</h3>

            <?php include(ROOT_PATH . "../../app/helpers/formErrors.php"); ?>

            <!-- Contains payment errors message : process of payment interrupted, not enough money in bank, etc. -->
            <div id="errors"></div>

            <div>
                <label for="">Titulaire du compte</label>
                <input type="text" id="cardholder-name" class="text-input" placeholder="Nom">
            </div>

            <!-- Contains the card informations form -->
            <div>
                <label for="">Informations Carte bancaire</label>
                <div id="card-elements"></div>
            </div>
            <!-- Contains card errors message -->
            <div id="card-errors" role="alert" class="hidden"></div>
            <div>
                <button id="card-button" type="button" name="card-btn" class="btn btn-big login" data-secret="<?= $intent['client_secret'] ?>">Procéder au paiement</button>
            </div>
        </form>
    </div>

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Custom Script -->
    <script src="https://js.stripe.com/v3"></script>
    <script src="assets/js/scripts_stripe.js"></script>

</body>
</html>

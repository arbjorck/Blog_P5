<?php
include("../path.php");

//$errors = array();

// if(isset($_POST['payment-btn']))
// {
//     require(ROOT_PATH . "../../index.php");
// }

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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style_media.css">

    <title>Blog</title>
</head>


<body>
    <!-- Header included here -->
    <?php include(ROOT_PATH . "../../app/includes/header.php"); ?>

    <div class="auth-content">
        
        <form action="index.php" method="POST">
            <h2 class="form-title">Pour faire un don</h2>
            <?php include(ROOT_PATH . "../../app/helpers/formErrors.php"); ?>
            <div class="field">
                <label>Je veux donner :</label>

                <ul class="donation-amount">
                    <div>
                        <li>
                            <label for="amount1">
                                <input type="radio" name="amount1" value="10">
                                10 €
                            </label>
                        </li>

                        <li>
                            <label for="amount1">
                                <input type="radio"name="amount1" value="20">
                                20 €
                            </label>
                        </li>

                        <li>
                            <label for="amount1">
                                <input type="radio" name="amount1" value="30">
                                30 €
                            </label>
                        </li>
                    </div>

                    <div>
                        <li>
                            <label for="amount1">
                                <input type="radio"name="amount1" value="40">
                                40 €
                            </label>
                        </li>

                        <li>
                            <label for="amount1">
                                <input type="radio" name="amount1" value="50">
                                50 €
                            </label>
                        </li>

                        <li>
                            <label for="amount1">
                                <input type="radio" name="amount1" value="60">
                                60 €
                            </label>
                        </li>
                    </div>

                    <div>
                        <li>
                            <label for="amount1">
                                <input type="radio" name="amount1" value="80">
                                80 €
                            </label>
                        </li>

                        <li >
                            <label for="amount1">
                                <input type="radio" name="amount1" value="100">
                                100 €
                            </label>
                        </li>

                        <li>
                            <label for="amount1">
                                <input type="radio" name="amount1" value="150">
                                150 €
                            </label>
                        </li>
                    </div>

                    <div>
                        <li>
                            <label for="amount1">
                                <input type="radio" name="amount1" value="200">
                                200 €
                            </label>
                        </li>

                        <li>
                            <label for="amount1">
                                <input type="radio" name="amount1" value="500">
                                500 €
                            </label>
                        </li>

                        <li>
                            <label for="amount1">
                                <input type="radio" name="amount1" value="1000">
                                1000 €
                            </label>
                        </li>
                    </div>
                </ul>  
            </div>
               
            <div>
                <br/>
                Un autre montant :<br>
                <input type="number" min="0.00" max="10000.00" name="amount2" class="text-input"/>
                <br/>
            </div>
            <div>
                <button type="submit" name="amount-btn" class="btn btn-big submit">Faire un don</button>
            </div>
        </form>

    </div>
 


    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Custom Script -->
    <script src="assets/js/scripts.js"></script>

</body>
</html>

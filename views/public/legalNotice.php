<?php
include("../path.php");
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

    <title><?php echo $post['title']; ?> | JeanForteroche</title>
</head>

<body>
    <!-- Header included here -->
    <?php include(ROOT_PATH . "../../app/includes/header.php"); ?>

 
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Content -->
        <div class="legal_notice">
            <div class="content clearfix">
            </br>
            <h1>MENTIONS LÉGALES</h1>
            </br>
            <p>IDENTITÉ
            </br>
            Nom du site web : < Nom du site >
            Adresse : < http://nomdusite.domaine >
            Propriétaire : < propriétaire >
            Responsable de publication : < nom du contact >
            </br>
            Conception et réalisation : < concepteur >
            Animation : < animateur >
            Hébergement : < hébergeur >
            </br>
            </br>
            PERSONNE MORALE (RETIRER CE BLOC AU BESOIN)
            </br>
            < ‘Raison sociale’ – ‘Forme juridique’ au capital de XXX XXX euros – RCS XXXXXX – ‘Adresse complète’ >
            < ‘Téléphone’ – ‘Email’ >
            </br>
            </br>
            CONDITIONS D’UTILISATION
            </br>
            L’utilisation du présent site implique l’acceptation pleine et entière des conditions générales d’utilisation décrites ci-après. Ces conditions d’utilisation sont susceptibles d’être modifiées ou complétées à tout moment.
            </br>
            </br>

            INFORMATIONS
            </br>
            Les informations et documents du site sont présentés à titre indicatif, n’ont pas de caractère exhaustif, et ne peuvent engager la responsabilité du propriétaire du site.

            Le propriétaire du site ne peut être tenu responsable des dommages directs et indirects consécutifs à l’accès au site.
            </br>
            </br>

            INTERACTIVITÉ
            </br>
            Les utilisateurs du site peuvent y déposer du contenu, apparaissant sur le site dans des espaces dédiés (notamment via les commentaires). Le contenu déposé reste sous la responsabilité de leurs auteurs, qui en assument pleinement l’entière responsabilité juridique.

            Le propriétaire du site se réserve néanmoins le droit de retirer sans préavis et sans justification tout contenu déposé par les utilisateurs qui ne satisferait pas à la charte déontologique du site ou à la législation en vigueur.
            </br>
            </br>

            PROPRIÉTÉ INTELLECTUELLE
            </br>
            Sauf mention contraire, tous les éléments accessibles sur le site (textes, images, graphismes, logo, icônes, sons, logiciels, etc.) restent la propriété exclusive de leurs auteurs, en ce qui concerne les droits de propriété intellectuelle ou les droits d’usage. 1

            Toute reproduction, représentation, modification, publication, adaptation de tout ou partie des éléments du site, quel que soit le moyen ou le procédé utilisé, est interdite, sauf autorisation écrite préalable de l’auteur.23

            Toute exploitation non autorisée du site ou de l’un quelconque des éléments qu’il contient est considérée comme constitutive d’une contrefaçon et poursuivie. 4

            Les marques et logos reproduits sur le site sont déposés par les sociétés qui en sont propriétaires.
            </br>
            </br>

            LIENS
            </br>
            Liens sortants
            Le propriétaire du site décline toute responsabilité et n’est pas engagé par le référencement via des liens hypertextes, de ressources tierces présentes sur le réseau Internet, tant en ce qui concerne leur contenu que leur pertinence.

            Liens entrants
            Le propriétaire du site autorise les liens hypertextes vers l’une des pages de ce site, à condition que ceux-ci ouvrent une nouvelle fenêtre et soient présentés de manière non équivoque afin d’éviter :

            tout risque de confusion entre le site citant et le propriétaire du site
            ainsi que toute présentation tendancieuse, ou contraire aux lois en vigueur.
            Le propriétaire du site se réserve le droit de demander la suppression d’un lien s’il estime que le site source ne respecte pas les règles ainsi définies.
            </br>
            </br>


            CONFIDENTIALITÉ
            </br>
            Tout utilisateur dispose d’un droit d’accès, de rectification et d’opposition aux données personnelles le concernant, en effectuant sa demande écrite et signée, accompagnée d’une preuve d’identité. 5678

            Le site ne recueille pas d’informations personnelles, et n’est pas assujetti à déclaration à la CNIL. 9</p>
        
            </div>
         </div>
        <!-- // Content -->

    </div>


    <!-- Footer included here -->
    <?php include(ROOT_PATH . "../../app/includes/footer.php"); ?>

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>
<?php
$connexion = mysqli_connect("localhost","root","root","entreprise");

if (!$connexion) {
    echo "Vous n'êtes pas connecté a la base de donnée";
}
?>
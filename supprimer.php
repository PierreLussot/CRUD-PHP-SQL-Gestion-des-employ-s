<?php
include_once('connexion.php');
$id = $_GET['id'];
$requete = mysqli_query($connexion, "DELETE FROM Employe WHERE id = $id");
header("Location: index.php");

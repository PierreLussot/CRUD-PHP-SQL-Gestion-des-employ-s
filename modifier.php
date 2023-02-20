<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Modifier</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <?php
  //on recupere l'i dans le lien
  $id = $_GET['id'];
  //connexion a la BDD
  include_once('connexion.php');
  //requete pour afficher les infos d'un employe
  $requete = mysqli_query(
    $connexion,
    "SELECT * FROM Employe WHERE id = $id"
  );
  $row = mysqli_fetch_assoc($requete);




  //verifier que le boutton ajouter a bien été cliqué 
  if (isset($_POST['button'])) {
    //extraction des information envoyé dans des variables par la methode POST 
    extract($_POST);
    //Verifier si tous les champs ont été remplis
    if (isset($nom) && isset($prenom) && $age) {
      //requete de modification
      $modification = mysqli_query($connexion, "UPDATE employe SET nom= '$nom',prenom='$prenom',age='$age' WHERE id = $id");
      if ($requete) { //si la requete a été effectuée avec succès, on fait une redirection
        header('location: index.php');
      } else { //si non
        $messages = "Employer non modifié";
      }
    } else { //si non
      $messages = "Veuillez remplir tout les champs";
    }
  }
  ?>
  <div class="form">
    <a href="index.php" class="back_btn">
      <img src="images/back.png" alt="" />Retour</a>
    <h2>Modifier l'employé : <?= $row['nom'] ?></h2>
    <p class="erreur_message"><?php
                              if (isset($messages)) {
                                echo $messages;
                              }
                              ?></p>
    <form action="" method="POST">
      <label for="">Nom</label>
      <input type="text" name="nom" value="<?= $row['nom'] ?>" />
      <label for="">Prénom</label>
      <input type="text" name="prenom" value="<?= $row['prenom'] ?>" />
      <label for="">âge</label>
      <input type="number" name="age" value="<?= $row['age'] ?>" />
      <input type="submit" value="Modifier" name="button" />
    </form>
  </div>
</body>

</html>
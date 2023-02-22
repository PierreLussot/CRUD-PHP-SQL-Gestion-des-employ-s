<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ajouter</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <?php
  //verifier que le boutton ajouter a bien été cliqué 
  if (isset($_POST['button'])) {
    //extraction des information envoyé dans des variables par la methode POST 
    extract($_POST);
    //Verifier si tous les champs ont été remplis
    if ($nom && $prenom && $age) {
      //connexion a la BDD
      include_once('connexion.php');
      //requete d'ajout
      $requete = mysqli_query($connexion,"INSERT INTO Employe(nom,prenom,age) VALUES('$nom','$prenom','$age')");
      if ($requete) { //si la requete a été effectuée avec succès, on fait une redirection
        header('location: index.php');
      } else { //si non
        $messages = "Employer non ajouter";
      }
    } else { //si non
      $messages = "Veuillez remplir tout les champs";
    }
  }
  ?>
  <div class="form">
    <a href="index.php" class="back_btn">
      <img src="images/back.png" alt="" />Retour</a>
    <h2>Ajouter un employé</h2>

    <p class="erreur_message"> <?php
                                if (isset($messages)) {
                                  echo $messages;
                                }

                                ?></p>
    <form action="" method="POST">
      <label for="">Nom</label>
      <input type="text" name="nom" />
      <label for="">Prénom</label>
      <input type="text" name="prenom" />
      <label for="">âge</label>
      <input type="number" name="age" />
      <input type="submit" value="Ajouter" name="button" />
    </form>
  </div>
</body>

</html>
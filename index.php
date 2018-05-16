<?php
$dsn = 'mysql:host=localhost;dbname=formulaire_php;port=3306;charset=utf8';
$pdo = new PDO($dsn, 'xtorz','mathy');
$nomerreur = "";
$prenomerreur = "";
$sujeterreur = "";
$messageerreur = "";
//$radioerreur = "";
//$lieuerreur = "";

//Si "POST" n'est pas vide, je récupère les valeurs des champs du formulaire

if(!empty($_POST)) {
     $nom = $_POST["nom"];
     $prenom = $_POST["prenom"];
     $sujet = $_POST["sujet"];
     $message = $_POST["message"];
     $radio = (isset($_POST['radio'])) ? $_POST['radio'] : '' ; 
     $lieu = $_POST["lieu"];
     $check = $_POST["check"];
     $isValid = true;

     //Si les champs du formulaire sont vide, affiche un message d'erreur    

     if (empty($nom)) {
          //        $nomerreur = '<p class="clr"> [ Champ invalide ]</p><br>';
          $nomerreur = 'Indiquez votre nom';
          $isValid = false;
     }
     if (empty($prenom)) {
          //        $prenomerreur = '<p class="clr"> [ Champ invalide ]</p><br>';
          $prenomerreur = 'Indiquez votre prénom';
          $isValid = false;
     }
     if (empty($sujet)) {
          //        $subjecterreur = '<p class="clr"> [ Champ invalide ]</p><br>';
          $sujeterreur = 'Indiquez le sujet';
          $isValid = false;
     }
     if (empty($message)) {
          //        $messageerreur = '<p class="clr"> [ Champ invalide ]</p><br>';
          $messageerreur = 'Indiquez votre message';
          $isValid = false;
     }


     //Si les champs sont remplis, j'envoi le mail
     if($isValid == true) {
          $nom = $_POST["nom"];
          $prenom = $_POST["prenom"];
          $sujet = $_POST["sujet"];
          $message = $_POST["message"];
          $radio = (isset($_POST['radio'])) ? $_POST['radio'] : '' ; 
          $lieu = $_POST["lieu"];
          $check = $_POST["check"];
          $insert = "INSERT INTO formulaire_php (NOM, PRENOM, SUJET, MESSAGE, GENRE, LIEU, CHECKBOX) VALUES ('$nom','$prenom','$sujet','$message','$radio','$lieu','$check')";

          $pdo->exec($insert); 



          //          $mailContent = "";
          //          $mailContent .= "Vous avez reçu un message de votre formualaire : <br><br>";
          //          $mailContent .= "Nom :".$nom."<br>";
          //          $mailContent .= "Prénom :".$prenom."<br>";
          //          $mailContent .= "Sujet :".$sujet."<br>";
          //          $mailContent .= "Message :".$message."<br>";
          //
          //          $headers = "Content-Type: text/html; charset=UTF-8\r\n";
          //
          //          mail("arnaud.w@codeur.online","Nouveau message formulaire",$mailContent, $headers);
          echo "<script>alert(\"Votre message est envoyé =) \")</script>"; 
     }
}




?>

<!DOCTYPE html>
<html lang="fr">

     <head>
          <meta charset="utf-8">
          <title>form_php</title>
          <link rel="stylesheet" href="formulaire.css">
     </head>

     <body>
          <header>

               <h1> FORMULAIRE DE CONTACT ( PHP )</h1>
          </header>

          <form method="post" name="formulaire" action="index.php">
               <div class="all">
                    <div class="nom">
                         <label for="nom"> Nom : </label>
                         <div> <input name="nom" id="nom" type="text" placeholder="<?php if(isset($nomerreur)) echo $nomerreur; ?>"></div>

                         <!--                    <?php echo $nomerreur; ?>-->

                    </div>
                    <div class="prenom">
                         <label for="prenom"> Prénom : </label>
                         <div> <input name="prenom" id="prenom" type="text" placeholder="<?php if(isset($prenomerreur)) echo $prenomerreur; ?>"></div>
                         <!--                    <?php echo $prenomerreur; ?>-->
                    </div>
                    <div class="sujet">
                         <label for="sujet"> Sujet : </label>
                         <div> <input name="sujet" id="sujet" type="text" placeholder="<?php if(isset($sujeterreur)) echo $sujeterreur; ?>"></div>

                         <!--                    <?php echo $sujeterreur; ?>-->

                    </div>
                    <div class="message">
                         <label class="message" for="message">Message : </label><br>
                         <textarea class="txt" id="message" name="message" placeholder="<?php if(isset($messageerreur)) echo $messageerreur; ?>"></textarea><br>

                         <!--                        <?php echo $messageerreur; ?>-->

                    </div>

                    <div>

                         Vous êtes :
                         <input class="radio" type="radio" name="radio" value="Femme">
                         <label for="radio">Une Femme</label>

                         <input class="radio" type="radio" name="radio" value="Homme">
                         <label for="radio">Un Homme</label>


                    </div>
                    
                    <div class="checkbox">
                         <p>Souhaitez-vous être contactez par ?</p>
                         <input type="checkbox" name="check[]" value="mail">
                         <label>E-mail</label>
                         <input type="checkbox" name="check[]" value="sms">
                         <label>SMS-Appel</label>
                         <input type="checkbox" name="check[]" value="non">
                         <label>Ne pas être contactez</label>
                    </div>

                    <div class="select">
                         D'ou êtes vous :
                         <select name="lieu">
                              <option value="NULL">...</option>
                              <option value="Sud">Sud</option>
                              <option value="Est">Est</option>
                              <option value="Nord">Nord</option> 
                              <option value="Ouest">Ouest</option>
                              <option value="Centre">Centre</option>
                         </select>

                    </div>
                    <div class="bouton">
                         <div> <input class="btn" value="Envoyé" name="envoi" id="envoi" type="submit"></div>
                    </div>

               </div>
          </form>



     </body>

</html>
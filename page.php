<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css\Style_inscription.css">
</head>
<div class='ensemble'>
<body>
    <div class='inscription'>
    <form action="inscription.php" method="get">
            <div class='creer'>
                <p>Creer un compte</p>
            </div>
            <div class='form'>
            <p>NOM D'UTILISATEUR</p>
            <p><input type="text" name="nom"></p>
            <p>E-MAIL</p>
            <p><input type="email" name="mail"></p>
            <p>MOT DE PASSE</p>
            <p><input type="text" name="pass"></p>
            <p>DATE DE NAISSANCE</p>
            <p><input type="date" name="date"></p>
            </div>
            <div class='box'>
                <div class='b1'><input type="checkbox"></div>
                <div class='b2'>(Faculatatif) Je veux bien recevoir des e-mails a propos des mise a jour de discord, des astuces ou des ofres speciales. Tu peux desinscrire a tout moment</div>
            </div>

            <div class='submit'>
            <p><input type="submit" value="confirmer"></p>
            </div>
            <a href="index.php">Tu as deja un compte ?</a>
    </form>
    </div>
</body>
</div>
</html>


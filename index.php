<?php
declare(strict_types=1);
require 'config.php';
require 'class/Autoloader.php';
Autoloader::register();
session_start();

// USER VERIFICATION
if (isset($_GET['submit_login'])){
    $login = $_GET['login'];
    if (UserManager::doesUserExists($login) == true) {
        // si l(utilisateur existe:
        // On stock les infos dans la session
        // afficher le button de deconnexion
        // cacher le button de connexion

    } else {
        echo "Cet utilisateur n'existe pas.";
    }

}

$list = new ConversationManager();
$convList = $list->getList();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="login"> <!-- faire echo de la classe visible/hidden -->
            <form action="" method="get">
                <input type="text" name="login" value="" placeholder="Mon login">
                <input type="submit" name="submit_login" value="Connexion">
            </form>
            <a href="register.php">s'inscrire</a>
        </div>
        <div class="logout">
            <a class="" href="logout.php">Deconnexion</a> <!-- faire echo de la classe visible/hidden -->
        </div>
    </header>
    <div class="wrap">
    <!-- Traitement php -->
    <?php if (!is_null($convList)) : ?>
        <table>
            <thead>
            <tr>
                <th>ID de la conversation</th>
                <th>Date de la conversation</th>
                <th>Heure de la conversation</th>
                <th>Nombre de messages</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php for ($i=0; $i<count($convList); $i++): ?>
                <tr class="<?= ($convList[$i]->getStatus()==1) ? 'closed' : 'opened' ?>">
                    <td><?= $convList[$i]->getId() ?></td>
                    <td><?= $convList[$i]->getDate() ?></td>
                    <td><?= $convList[$i]->getHeure() ?></td>
                    <td><?= $convList[$i]->getNbMessage() ?></td>
                    <td><a href="messagePage.php?c_id=<?= $convList[$i]->getId()?>&m_count=<?= $convList[$i]->getNbMessage() ?>&page=1">Voir la conversation</a></td>
                </tr>
            <?php endfor; ?>
            </tbody>
        </table>
    <?php endif; ?>

    </div>
</body>
</html>

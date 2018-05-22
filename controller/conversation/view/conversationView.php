<?php
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 22/05/2018
 * Time: 12:13
 */
?>

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
            <?php foreach ($conversations as $conversation){ ?>
                <tr class="<?= ($conversation->getStatus()==1) ? 'closed' : 'opened' ?>">
                    <td><?= $conversation->getId() ?></td>
                    <td><?= $conversation->getDate() ?></td>
                    <td><?= $conversation->getHeure() ?></td>
                    <td><?= $conversation->getNbMessage() ?></td>
                    <td><a href="?c_id=<?= $conversation->getId()?>&m_count=<?= $conversation->getNbMessage() ?>&page=1">Voir la conversation</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

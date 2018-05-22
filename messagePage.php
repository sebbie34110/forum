<?php
declare(strict_types=1);
require 'config.php';
require 'class/Autoloader.php';
Autoloader::register();

$messageList = '';

if (!empty($_GET)){

    if (isset($_GET['c_id']) && isset($_GET['page'])) {

        $conversationId = (int)$_GET['c_id'];
        $messageCount = (int)$_GET['m_count'];
        $page = (int)$_GET['page'];

        $messagePage = new MessageManager();

        $nbrPages = $messagePage->nbrPages($conversationId);


        if ($messageCount == 0) {
            header('Location: index.php');
            exit();
        }

        if ($page<=1){
            $page=1;
        }

        if ($page >= $nbrPages) {
            $page = $nbrPages;
        }

        if (isset($_GET['tri'])){

            $tri = $_GET['tri'];

            switch ($tri) {
                case 'id':
                    $tri = 'm_id ASC';
                    break;
                case 'auteur':
                    $tri = 'u_nom ASC';
                    break;
                default :
                    $tri = 'm_date DESC';
            }
        } else {
            $tri = 'm_date DESC';
        }

        //Affichage des messages
        $list = new MessageManager();
        $messageList = $list->pagination((int)$conversationId, (int)$page, $tri);

        // Vérifie si la conversation passée dasn le GET existe.
        $list->conversationExist($conversationId);

    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/messageStyle.css">
    <title>Document</title>
</head>
<body>
<div class="wrap">
    <div class="links">
        <a href="index.php">Retour aux conversations</a>
        <div class="tri">
            <p>Trier par: </p>
            <a href="messagePage.php?c_id=<?=$conversationId?>&m_count=<?=$messageCount?>&page=<?=$page?>&tri=date">Date</a>
            <a href="messagePage.php?c_id=<?=$conversationId?>&m_count=<?=$messageCount?>&page=<?=$page?>&tri=id">Id</a>
            <a href="messagePage.php?c_id=<?=$conversationId?>&m_count=<?=$messageCount?>&page=<?=$page?>&tri=auteur">Auteur</a>
        </div>
        <div class="pageNav">
            <a href="messagePage.php?c_id=<?=$conversationId?>&m_count=<?=$messageCount?>&page=<?=$page-1?>"><?= ($page == 1) ? '' : '&lt;Page précedente'?></a>
            <a href=""><?=$page.'/'.$nbrPages?></a>
            <a href="messagePage.php?c_id=<?=$conversationId?>&m_count=<?=$messageCount?>&page=<?=$page+1?>"><?= ($page == $nbrPages) ? 'Fin' : 'Page suivante&gt;'?></a>
        </div>
    </div>

    <!-- Traitement php -->
    <?php if (!is_null($messageList)) : ?>
        <table>
            <thead>
            <tr>
                <th>Date du message</th>
                <th>Heure du message</th>
                <th>Nom Prénom</th>
                <th>Message</th>
            </tr>
            </thead>
            <tbody>
            <?php for ($i=0; $i<count($messageList); $i++): ?>
                <tr>
                    <td><?= $messageList[$i]->getDate() ?></td>
                    <td><?= $messageList[$i]->getHeure() ?></td>
                    <td><?= $messageList[$i]->getNom() ?></td>
                    <td><?= $messageList[$i]->getMessage() ?></td>
                </tr>
            <?php endfor; ?>
            </tbody>
        </table>
    <?php endif; ?>



</div>
</body>
</html>

<?php
declare(strict_types=1);

class MessageManager
{


    public function __construct()
    {
        // Laisser constructeur vide sinon il appelle le constructeur parent (qui est privé)
    }


    public function conversationExist(int $id) : void {
        // fetch column de toutes les conversations.
        $pdo = DBManager::getInstance();

        $data = $pdo->makeSelect('SELECT c_id FROM conversation');

        if (!array_key_exists($id, $data)){
            header('Location: 404.php');
            exit();
        }
    }

    public function nbrPages(int $id) : int {

        $pdo = DBManager::getInstance();

        // On compte le nombre de messages dans la discussion
        $nbMessages = $pdo->makeSelect('SELECT count(m_id) AS totalMsg FROM message WHERE m_conversation_fk= :id', [':id' => $id]);

        $nbrPages = ceil(($nbMessages[0]['totalMsg'] / 20));
        return (int)$nbrPages;
    }


    /**
     * Fonction qui retourne un tableau avec la liste des conversations, les dates, heures et nombre de messages
     * @return array
     *
     */
    public function pagination(int $id, int $currentPage, string $tri) : array {

        $totalPages = $this->nbrPages($id);

        if ($currentPage>$totalPages) {
            $currentPage = $totalPages;
        }

        // premier message de la page à afficher
        $msgOffset = ($currentPage - 1) * 20;

        $pdo = DBManager::getInstance();

        $sql = 'SELECT `m_id` AS id, DATE_FORMAT(`m_date`, "%d %M %Y") AS `date`, DATE_FORMAT(`m_date`, "%H %i %s") AS `heure`, concat(`u_prenom`," ", `u_nom`) AS `nom`, `m_contenu` AS `message` 
                FROM `message` 
                LEFT JOIN `user` ON `m_auteur_fk` = `u_id` 
                WHERE `m_conversation_fk` = :id 
                ORDER BY '.$tri.'  
                LIMIT 20 OFFSET :msgOffset;
                ';

        $data = $pdo->makeSelect($sql, ['id' => $id, 'msgOffset' => [$msgOffset, PDO::PARAM_INT]]);

        $messageList = [];
        foreach ($data as $messages ){
            $messageList[] = new Message($messages);
        }

        return $messageList;

    }





}
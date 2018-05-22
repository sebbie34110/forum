<?php
declare(strict_types=1);

class ConversationManager extends DBManager
{
    public function __construct()
    {
        // Laisser constructeur vide sinon il appelle le constructeur parent (qui est privé)
    }

    /**
     * Fonction qui retourne un tableau avec la liste des conversations, les dates, heures et nombre de messages
     * @return array
     */
    public function getList() : array {
        $pdo = DBManager::getInstance(); // Appel de getInstance() qui va créer un new coreModel

        // Appel de makeSelect() qui va appeler makeStatement() (qui va faire le ->query et/ou le ->prepare et le ->execute
        // Ensuite makeSelect récupère le statement et fait le ->fetchAll
        $data = $pdo->makeSelect('
                        SELECT c_id AS `id`, DATE_FORMAT(c_date, "%d %M %Y") AS `date`, DATE_FORMAT(c_date, "%H %i %s") AS `heure`, c_termine AS `status`, count(m_id) as nbMessage 
                        FROM conversation 
                        LEFT JOIN message ON c_id = m_conversation_FK 
                        GROUP BY c_id 
                        ORDER BY c_id ASC
        ');

        $listConversation = [];
        foreach ($data as $conversation ){
            $listConversation[] = new Conversation($conversation);
        }

        return $listConversation;
    }

}
<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 22/05/2018
 * Time: 12:06
 */
namespace forum\model;

use forum\model\entities\Conversation;

class conversationModel
{
    public function getConversationsList() : array
    {
        $sql = '
                        SELECT `c_id` AS `id`, 
                        DATE_FORMAT(`c_date`, "%d %M %Y") AS `date`, 
                        DATE_FORMAT(`c_date`, "%H %i %s") AS `heure`, 
                        `c_termine` AS `status`, count(m_id) as nbMessage 
                        FROM `conversation` 
                        LEFT JOIN `message` ON `c_id` = `m_conversation_fk` 
                        GROUP BY `c_id` 
                        ORDER BY `c_id` ASC';

        $data = coreModel::getInstance()->makeSelect($sql);

        $listConversation = [];
        foreach ($data as $conversation ){
            $listConversation[] = new Conversation($conversation);
        }
        return $listConversation;
    }
}
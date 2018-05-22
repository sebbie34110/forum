<?php declare(strict_types=1);

namespace forum\controller\conversation;
use forum\controller\coreController;
use forum\model\conversationModel;

/**
 * Created by PhpStorm.
 * User: webuser1801
 * Date: 22/05/2018
 * Time: 13:40
 */

class ConversationController extends coreController
{

    public function __construct()
    {
        $this->className = 'conversation';
    }


    public function convAction()
    {
        $convModel = new conversationModel();

        $conversationList = $convModel->getConversationsList();

        $this->showView($this->className, ['conversations' => $conversationList]);
    }



}
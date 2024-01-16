<?php

namespace BicicletasMilan\Helpdesk\Controller\Ticket;

class Index extends \BicicletasMilan\Helpdesk\Controller\Ticket
{
    public function execute()
    {
        $resultPage = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_PAGE);
        return $resultPage;
    }
}
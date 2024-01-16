<?php
namespace BicicletasMilan\Helpdesk\Controller\Adminhtml\Ticket;

class Grid extends \BicicletasMilan\Helpdesk\Controller\Adminhtml\Ticket
{
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}
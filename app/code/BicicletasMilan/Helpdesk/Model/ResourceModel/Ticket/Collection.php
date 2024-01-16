<?php

namespace BicicletasMilan\Helpdesk\Model\ResourceModel\Ticket;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
    * Constructor
    * Configures collection
    *
    * @return void
    */
    protected function _construct()
    {
        $this->_init('BicicletasMilan\Helpdesk\Model\Ticket', 'BicicletasMilan\Helpdesk\Model\ResourceModel\Ticket');
    }
}
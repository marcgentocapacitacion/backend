<?php

namespace BicicletasMilan\BackendDev\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Demo extends AbstractDb
{
     /**
     * Initialize resource model
     * @return void
     */
    protected function _construct()
    {
        $this->_init('bicicletasmilan_bacekenddev', 'entity_id');
    }
}
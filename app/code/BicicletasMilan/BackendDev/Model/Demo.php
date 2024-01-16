<?php 

namespace BicicletasMilan\BackendDev\Model;

use Magento\Framework\Model\AbstractModel;

class Demo extends AbstractModel
{
    /**
     * Initialize resource model
     * @return void
     */
    protected function _construct()
    {
        $this->_init('BicicletasMilan\BackendDev\Model\ResourceModel\Demo');
    }
}
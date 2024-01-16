<?php

namespace BicicletasMilan\Office\Model\ResourceModel\Employee;

class Collection extends \Magento\Eav\Model\Entity\Collection\AbstractCollection    
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('BicicletasMilan\Office\Model\Employee', 'BicicletasMilan\Office\Model\ResourceModel\Employee');
    }
}
<?php

namespace BicicletasMilan\Office\Model\ResourceModel\Department;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            'BicicletasMilan\Office\Model\Department',
            'BicicletasMilan\Office\Model\ResourceModel\Department'
        );
    }
}

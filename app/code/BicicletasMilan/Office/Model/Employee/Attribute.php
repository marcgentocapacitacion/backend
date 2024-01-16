<?php

namespace BicicletasMilan\Office\Model\Employee;

class Attribute extends \Magento\Eav\Model\Entity\Attribute
{
    protected function _construct()
    {
        $this->_init('BicicletasMilan\Office\Model\ResourceModel\Employee\Attribute');
    }
}
 
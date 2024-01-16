<?php

namespace BicicletasMilan\Office\Model;

class Employee extends \Magento\Framework\Model\AbstractModel
{
    const ENTITY = 'bicicletasmilan_office_employee';

    /**
     * Initialize employee model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('BicicletasMilan\Office\Model\ResourceModel\Employee');
    }
}



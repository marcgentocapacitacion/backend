<?php

namespace BicicletasMilan\Office\Setup;

use Magento\Eav\Setup\EavSetup;

class EmployeeSetup extends EavSetup
{
    public function getDefaultEntities()
    {
        $employeeEntity = \BicicletasMilan\Office\Model\Employee::ENTITY;
        $entities = [
            $employeeEntity => [
                'entity_model' => 'BicicletasMilan\Office\Model\ResourceModel\Employee',
                'table' => $employeeEntity . '_entity',
                'attributes' => [
                    'department_id' => [
                        'type' => 'static',
                    ],
                    'email' => [
                        'type' => 'static',
                    ],

                    'first_name' => [
                        'type' => 'static',
                    ],
                    'last_name' => [
                        'type' => 'static',
                    ],
                ],
            ],
        ];
        return $entities;
    }
}
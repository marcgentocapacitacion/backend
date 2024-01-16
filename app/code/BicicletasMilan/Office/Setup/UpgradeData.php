<?php

namespace BicicletasMilan\Office\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface
{
    protected $departmentFactory;
    protected $employeeFactory;

    public function __construct(
        \BicicletasMilan\Office\Model\DepartmentFactory $departmentFactory,
        \BicicletasMilan\Office\Model\EmployeeFactory $employeeFactory
    )
    {
        $this->departmentFactory = $departmentFactory;
        $this->employeeFactory = $employeeFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
                
        $salesDepartment = $this->departmentFactory->create();
        $salesDepartment->setName('Operations');
        $salesDepartment->save();

        $employee = $this->employeeFactory->create();
        $employee->setDepartmentId($salesDepartment->getId());
        $employee->setEmail('marli021089@gmail.com');
        $employee->setFirtName('Marcos');
        $employee->setLastName('huerta');
        $employee->save();

        /*
        $financeDepartment = $this->departmentFactory->create();
        $financeDepartment->setName('Finance');
        $financeDepartment->save();
        */

        $setup->endSetup();

    }
}
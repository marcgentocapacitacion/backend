<?php 

namespace BicicletasMilan\BackendDev\Model\Config\Source;

class DemoList implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * 
     * @return array
     */
    public function toOptionArray()
    {
        return [['value'=>1,'label' => __('Option 1')], ['value'=>2,'label' => __('Option 2')]];
    }
}
<?php

namespace BicicletasMilan\BackendSlider\Model\ResourceModel\Slide;

/**
* BicicletasMilan BackendSlider collection
*/
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
    * Define resource model and model
    *
    * @return void
    */
    protected function _construct()
    {
        /* _init($model, $resourceModel) */
        $this->_init('BicicletasMilan\BackendSlider\Model\Slide', 'BicicletasMilan\BackendSlider\Model\ResourceModel\Slide');
    }
}
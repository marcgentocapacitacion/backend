<?php

namespace BicicletasMilan\BackendDev\Controller\Adminhtml\Demolist;

use Magento\Backend\App\Action;


class Edit extends Action
{
    protected $_coreRegistry;
    protected $resultForwardFactory;
    protected $resultPageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
        $this->resultForwardFactory = $resultForwardFactory;
        $this->resultPageFactory = $resultPageFactory;
    }

    
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('BicicletasMilan_BackendDev::demolist');
    }

    public function execute()
    {
        return $this->resultForwardFactory->create()->forward('new');
    }
} 
<?php

namespace BicicletasMilan\BackendDev\Controller\Adminhtml\Demolist;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;    
use Magento\Backend\App\Action as BackendAction;

class Index extends BackendAction
{
    /*
    * @var PageFactory
    */
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFGactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ){                        
        $this->resultPageFactory = $resultPageFactory;        
        parent::__construct($context);        
    }
    /**
     * Index action
     * 
     * @retunr \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {        
        /* @var \Magento\Backend\Model\View\Result\Page $resultPage */
        //$resultPage = $this->resultPageFactory->create();                
        //$resultPage->setActiveMenu('BicicletasMilan_BackendDev::demolist');
        /*
        $resultPage->addBreadcrumb(__('CMS'), __('CMS'));
        $resultPage->addBreadcrumb(__('Demo List'), __('Demo List'));
        $resultPage->getConfig()->getTitle()->prepend(__('Demo List'));
        */
        //return $resultPage;
        $resultPage = $this->resultPageFactory->create();
            $resultPage->getConfig()->getTitle()->prepend(__("Demo List"));
            return $resultPage;

    }


     /**
     * Check the permission to execute
     * 
     * @return bool
     */

     /*
    protected function _isAllowed()
    {
       return $this->_authorization->isAllowed('BicicletasMilan_BackendDev::demolist');
    }
    */
}
<?php
namespace BicicletasMilan\Hacking\Controller\Index;

class Submit extends \Magento\Framework\App\Action\Action
{ 
    protected $resultPageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ){
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
    
    public function execute()
    {                     

    $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
    $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
    $connextion = $resource->getConnection();

    $email = $this->getRequest()->getParam('email');
    //$bind = ['email' => $email];

    $sql = "select * from quote where customer_email = '" . $email . "'";
    $result = $connextion->fetchAll($sql);

    //$select = $connextion->select()->from('quote', ['*'])->where('customer_email = :email');
    //$result = $connextion->fetchAll($select, $bind);

    echo "[".$sql."]";
echo "<pre>";
var_dump($_REQUEST);
echo "</pre>";

echo "<pre>";
var_dump($result);
echo "</pre>";
exit;
        $resultPage = $this->resultPageFactory->create();        
        return $resultPage;        
    }
}
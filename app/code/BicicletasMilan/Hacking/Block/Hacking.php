<?php 
namespace BicicletasMilan\Hacking\Block;

use Magento\Backend\Block\Template\Context;
use Magento\Framework\Data\Form\FormKey;

class Hacking extends \Magento\Framework\View\Element\Template
{
    protected $formKey;

    public function __construct(
        Context $context, 
        FormKey $formKey, 
        array $data = [])
    {
        $this->formKey = $formKey;
        parent::__construct($context, $data);
    }

    public function getFormAction()
    {
        return $this->getUrl('hacking/index/submit', ['_secure' => true]);
    }     

    public function getFormAction2()
    {
        return $this->getUrl('hacking/index/index', ['_secure' => true]);
    }     

    public function getFormKey()
    {
        return $this->formKey->getFormKey();
    }


}
?>
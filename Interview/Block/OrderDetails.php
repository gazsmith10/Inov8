<?php
namespace Inov8\Interview\Block;

use Magento\Framework\View\Element\Template;
use Inov8\Interview\Model\OrderDetails  as OrderDetailsCollectionFactory;
use Magento\Framework\Data\Collection;
use Magento\Framework\View\Element\Template\Context;

class OrderDetails extends Template
{
    protected $orderDetailsCollectionFactory;

    public function __construct(
        Context $context,
        OrderDetailsCollectionFactory $orderDetailsCollectionFactory,
        array $data = []
    ) {
		  parent::__construct($context, $data);
		  
        $this->orderDetailsCollectionFactory = $orderDetailsCollectionFactory;
      
    }

    public function getOrderDetailsCollection()
    {
		
		$page = ($this->getRequest()->getParam('p')) ? $this->getRequest()->getParam('p') : 1;
        $pageSize = ($this->getRequest()->getParam('limit')) ? $this->getRequest()->getParam('limit') : 5;
		
		$collection = $this->orderDetailsCollectionFactory->getCollection();
        $collection->setPageSize($pageSize);
        $collection->setCurPage($page);
        return $collection;
		
     //   return $this->orderDetailsCollectionFactory->create();
    }
	
	
	 protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->pageConfig->getTitle()->set(__('Custom Pagination'));
        if ($this->getOrderDetailsCollection()) {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'custom.history.pager'
            )->setAvailableLimit([5 => 5, 10 => 10, 15 => 15, 20 => 20])
                ->setShowPerPage(true)->setCollection(
                    $this->getOrderDetailsCollection()
                );
            $this->setChild('pager', $pager);
            $this->getOrderDetailsCollection()->load();
        }
        return $this;
    }
	public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
}

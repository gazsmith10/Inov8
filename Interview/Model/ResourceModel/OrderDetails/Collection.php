<?php
namespace Inov8\Interview\Model\ResourceModel\OrderDetails;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
	protected $_idFieldName = 'id';
	
    protected function _construct()
    {
        $this->_init('Inov8\Interview\Model\OrderDetails', 'Inov8\Interview\Model\ResourceModel\OrderDetails');
    }
}
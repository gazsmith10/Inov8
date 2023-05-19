<?php
namespace Inov8\Interview\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class OrderDetails extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('inov8_order_details', 'id');
    }
}

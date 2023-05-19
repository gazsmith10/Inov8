<?php
namespace Inov8\Interview\Model;

use Magento\Framework\Model\AbstractModel;

class OrderDetails extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Inov8\Interview\Model\ResourceModel\OrderDetails::class);
    }
}

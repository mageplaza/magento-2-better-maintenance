<?php
namespace Mageplaza\BetterMaintenance\Block;

use Magento\Framework\View\Element\Template;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;
class Maintenance extends \Magento\Framework\View\Element\Template
{
    protected $_helperData;

    public function __construct
    (
        HelperData $helperData,
        Template\Context $context,
        array $data = []
    ) {
        $this->_helperData = $helperData;
        parent::__construct($context, $data);
    }
}
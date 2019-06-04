<?php
namespace Mageplaza\BetterMaintenance\Block\Adminhtml;

use Magento\Framework\Stdlib\DateTime\DateTime;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Magento\Framework\View\Element\Template;
use Mageplaza\BetterMaintenance\Block\Clock as FEClock;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;
use Mageplaza\BetterMaintenance\Block\Adminhtml\Maintenance\Preview as PreviewBlock;

class Clock extends FEClock
{
    protected $_previewBlock;

    public function __construct(
        PreviewBlock $previewBlock,
        HelperData $helperData,
        TimezoneInterface $localeDate,
        DateTime $date,
        Template\Context $context,
        array $data = []
    ) {
        $this->_previewBlock = $previewBlock;
        parent::__construct($helperData, $localeDate, $date, $context, $data);
    }

    public function getFormData()
    {
        return $this->_previewBlock->getFormData();
    }
}
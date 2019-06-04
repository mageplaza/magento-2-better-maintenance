<?php
/**
 * Mageplaza
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Mageplaza.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mageplaza.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category  Mageplaza
 * @package   Mageplaza_BetterMaintenance
 * @copyright Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license   https://www.mageplaza.com/LICENSE.txt
 */
namespace Mageplaza\BetterMaintenance\Block\Adminhtml;

use Magento\Framework\Stdlib\DateTime\DateTime;
use Magento\Framework\View\Element\Template;
use Mageplaza\BetterMaintenance\Block\Clock as FEClock;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;
use Mageplaza\BetterMaintenance\Block\Adminhtml\Maintenance\Preview as PreviewBlock;

/**
 * Class Clock
 * @package Mageplaza\BetterMaintenance\Block\Adminhtml
 */
class Clock extends FEClock
{
    /**
     * @var PreviewBlock
     */
    protected $_previewBlock;

    /**
     * Clock constructor.
     *
     * @param PreviewBlock $previewBlock
     * @param HelperData $helperData
     * @param DateTime $date
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(
        PreviewBlock $previewBlock,
        HelperData $helperData,
        DateTime $date,
        Template\Context $context,
        array $data = []
    ) {
        $this->_previewBlock = $previewBlock;
        parent::__construct($helperData, $date, $context, $data);
    }

    /**
     * @return array
     */
    public function getFormData()
    {
        return $this->_previewBlock->getFormData();
    }
}

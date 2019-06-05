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
namespace Mageplaza\BetterMaintenance\Block\Adminhtml\Comingsoon;

use Mageplaza\BetterMaintenance\Block\Adminhtml\Maintenance\Preview as MPreview;

/**
 * Class Preview
 * @package Mageplaza\BetterMaintenance\Block\Adminhtml\Comingsoon
 */
class Preview extends MPreview
{
    const PAGE_TITLE       = 'Coming Soon';
    const PAGE_DESCRIPTION = 'Our new site is coming soon. Stay tuned!';

    /**
     * @var string
     */
    protected $_template = 'Mageplaza_BetterMaintenance::comingsoon/preview.phtml';

    /**
     * @return mixed|string
     */
    public function getPageTitle()
    {
        return $this->getFormData()['[comingsoon_title]'] === '1'
            ? self::PAGE_TITLE
            : $this->getFormData()['[comingsoon_title]'];
    }

    /**
     * @return string
     */
    public function getPageDes()
    {
        return $this->getFormData()['[comingsoon_description]'] !== '1'
            ? $this->getFormData()['[comingsoon_description]']
            : self::PAGE_DESCRIPTION;
    }
}

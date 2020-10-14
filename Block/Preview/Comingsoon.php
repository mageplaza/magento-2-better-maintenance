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

namespace Mageplaza\BetterMaintenance\Block\Preview;

use Mageplaza\BetterMaintenance\Block\Preview\Maintenance as MPreview;

/**
 * Class Comingsoon
 *
 * @package Mageplaza\BetterMaintenance\Block\Preview
 */
class Comingsoon extends MPreview
{
    /**
     * @var string
     */
    protected $_template = 'Mageplaza_BetterMaintenance::preview/comingsoon.phtml';

    /**
     * @return mixed|string
     */
    public function getPageTitle()
    {
        return $this->getFormData()['[comingsoon_title]'] === '1'
            ? __('Coming Soon')
            : $this->getFormData()['[comingsoon_title]'];
    }

    /**
     * @return string
     */
    public function getPageDes()
    {
        return $this->getFormData()['[comingsoon_description]'] !== '1'
            ? $this->getFormData()['[comingsoon_description]']
            : __('Our new site is coming soon. Stay tuned!');
    }
}

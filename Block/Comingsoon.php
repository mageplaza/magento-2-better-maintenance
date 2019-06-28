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
namespace Mageplaza\BetterMaintenance\Block;

use Mageplaza\BetterMaintenance\Model\Config\Source\System\RedirectTo;

/**
 * Class Comingsoon
 *
 * @package Mageplaza\BetterMaintenance\Block
 */
class Comingsoon extends Maintenance
{
    /**
     * @return Maintenance
     */
    public function _prepareLayout()
    {
        $redirectTo = $this->_helperData->getConfigGeneral('redirect_to');
        if ($redirectTo === RedirectTo::COMING_SOON_PAGE) {
            if ($this->_helperData->versionCompare('2.2.0')) {
                $this->pageConfig->setMetaTitle($this->getComingSoonSetting('comingsoon_metatitle'));
            }
            $this->pageConfig->setDescription($this->getComingSoonSetting('comingsoon_metadescription'));
            $this->pageConfig->setKeywords($this->getComingSoonSetting('comingsoon_metakeywords'));
        }

        return parent::_prepareLayout();
    }

    /**
     * @param $code
     *
     * @return mixed
     */
    public function getComingSoonSetting($code)
    {
        return $this->_helperData->getComingSoonSetting($code);
    }
}

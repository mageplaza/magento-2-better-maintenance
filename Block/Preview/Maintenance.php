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

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Template\Context;
use Mageplaza\BetterMaintenance\Block\Maintenance as BlockMaintenance;
use Magento\Framework\View\Element\Template;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;
use Mageplaza\BetterMaintenance\Helper\Image as HelperImage;
use Magento\Cms\Block\Block;
use Mageplaza\BetterMaintenance\Block\Clock;
use Magento\Newsletter\Block\Subscribe;
use Magento\Customer\Block\Form\Register;

/**
 * Class Maintenance
 *
 * @package Mageplaza\BetterMaintenance\Block\Preview
 */
class Maintenance extends Template
{
    const PAGE_TITLE               = 'Under Maintenance';
    const PAGE_DESCRIPTION         = 'We\'re currently down for maintenance. Be right back!';
    const PROGRESS_VALUE           = '50';
    const PAGE_LAYOUT              = 'single';
    const SUBSCRIBE_TYPE           = 'email_form';
    const SUBSCRIBE_LABEL          = 'Subscribe';
    const DEFAULT_LABEL_COLOR      = '#000000';
    const DEFAULT_MAINTENANCE_LOGO = 'Mageplaza_BetterMaintenance::media/maintenance_logo.png';
    const DEFAULT_MAINTENANCE_BG   = 'Mageplaza_BetterMaintenance::media/maintenance_bg.jpg';
    const DEFAULT_COMING_SOON_LOGO = 'Mageplaza_BetterMaintenance::media/coming_soon_logo.png';
    const DEFAULT_COMING_SOON_BG   = 'Mageplaza_BetterMaintenance::media/coming_soon_bg.jpg';

    /**
     * @var HelperData
     */
    protected $_helperData;

    /**
     * @var Maintenance
     */
    protected $_maintenanceBlock;

    /**
     * @var HelperImage
     */
    protected $_helperImage;

    /**
     * @var array
     */
    public $cleanValue = [
        '[groups]',
        'groups',
        '[clock_setting]',
        '[display_setting]',
        '[fields]',
        '[value]',
        '[subscribe_setting]',
        '[social_contact]',
        '[maintenance_setting]',
        '[comingsoon_setting]',
        '[general]',
        '[inherit]'
    ];

    /**
     * Preview constructor.
     *
     * @param HelperData $helperData
     * @param BlockMaintenance $maintenanceBlock
     * @param HelperImage $helperImage
     * @param Context $context
     */
    public function __construct(
        HelperData $helperData,
        BlockMaintenance $maintenanceBlock,
        HelperImage $helperImage,
        Context $context
    ) {
        $this->_helperData       = $helperData;
        $this->_maintenanceBlock = $maintenanceBlock;
        $this->_helperImage      = $helperImage;
        parent::__construct($context);
    }

    /**
     * @return array
     */
    public function getFormData()
    {
        $newData = [];
        $data    = $this->_request->getParam('formData');
        $data    = urldecode($data);
        $data    = explode('&', $data);

        foreach ($data as $value) {
            $val              = explode('=', $value);
            $val[0]           = $this->filterKey($val[0]);
            $newData[$val[0]] = urldecode($val[1]);
        }

        return $newData;
    }

    /**
     * @param $code
     *
     * @return mixed|string
     */
    public function getLabelColor($code)
    {
        $color = $this->getFormData()[$code];

        return $color === '1' ? self::DEFAULT_LABEL_COLOR : $color;
    }

    /**
     * @return mixed|string
     */
    public function getSubscribeDes()
    {
        $label = $this->getFormData()['[subscribe_label]'];

        return $label === '1' ? '' : $label;
    }

    /**
     * @return mixed|string
     */
    public function getSubscribeDesColor()
    {
        $color = $this->getFormData()['[subscribe_label_color]'];

        return $color === '1' ? '#000000' : $color;
    }

    /**
     * @return mixed|string
     */
    public function getProgressLabelColor()
    {
        $color = $this->getFormData()['[maintenance_progress_label_color]'];

        return $color === '1' ? '#FFFFFF' : $color;
    }

    /**
     * @return mixed|string
     */
    public function getProgressBarColor()
    {
        $color = $this->getFormData()['[maintenance_progress_bar_color]'];

        return $color === '1' ? '#000000' : $color;
    }

    /**
     * @return mixed|string
     */
    public function getSocialLabel()
    {
        $label = $this->getFormData()['[social_label]'];

        return $label === '1' ? '' : $label;
    }

    /**
     * @return mixed|string
     */
    public function getPageTitle()
    {
        return $this->getFormData()['[maintenance_title]'] === '1'
            ? self::PAGE_TITLE
            : $this->getFormData()['[maintenance_title]'];
    }

    /**
     * @param $code
     *
     * @return mixed|string
     */
    public function getPageLayout($code)
    {
        return $this->getFormData()[$code] !== '1'
            ? $this->getFormData()[$code]
            : self::PAGE_LAYOUT;
    }

    /**
     * @return string
     */
    public function getPageDes()
    {
        return $this->getFormData()['[maintenance_description]'] !== '1'
            ? $this->getFormData()['[maintenance_description]']
            : self::PAGE_DESCRIPTION;
    }

    /**
     * @return string
     */
    public function getProgressValue()
    {
        return $this->getFormData()['[maintenance_progress_value]'] !== '1'
            ? $this->getFormData()['[maintenance_progress_value]']
            : self::PROGRESS_VALUE;
    }

    /**
     * @return mixed|string
     */
    public function getSubscribeType()
    {
        return $this->getFormData()['[subscribe_type]'] !== '1'
            ? $this->getFormData()['[subscribe_type]']
            : self::SUBSCRIBE_TYPE;
    }

    /**
     * @return mixed|string
     */
    public function getSubscribeLabel()
    {
        return $this->getFormData()['[button_label]'] === '1'
            ? self::SUBSCRIBE_LABEL
            : $this->getFormData()['[button_label]'];
    }

    /**
     * @return mixed|string
     */
    public function getSubscribeBtnColor()
    {
        $color = $this->getFormData()['[button_label_color]'];

        return $color === '1' ? '#FFFFFF' : $color;
    }

    /**
     * @return mixed|string
     */
    public function getSubscribeBtnBgColor()
    {
        $color = $this->getFormData()['[button_background_color]'];

        return $color === '1' ? '#000000' : $color;
    }

    /**
     * @param $arr
     *
     * @return mixed
     */
    public function filterKey($arr)
    {
        foreach ($this->cleanValue as $word) {
            $arr = str_replace($word, '', $arr);
        }

        return $arr;
    }

    /**
     * @return string
     */
    public function getLogo()
    {
        $actionName      = $this->_request->getActionName();
        $maintenanceLogo = $this->_helperData->getMaintenanceSetting('maintenance_logo');
        $comingSoonLogo  = $this->_helperData->getComingSoonSetting('comingsoon_logo');

        if ($actionName === 'maintenance') {
            return $maintenanceLogo
                ? $this->getUrlImage($maintenanceLogo, HelperImage::TEMPLATE_MEDIA_TYPE_LOGO)
                : $this->getViewFileUrl(self::DEFAULT_MAINTENANCE_LOGO);
        }

        return $comingSoonLogo
            ? $this->getUrlImage($comingSoonLogo, HelperImage::TEMPLATE_MEDIA_TYPE_LOGO)
            : $this->getViewFileUrl(self::DEFAULT_COMING_SOON_LOGO);
    }

    /**
     * @param $logo
     * @param $type
     *
     * @return string
     */
    public function getUrlImage($logo, $type)
    {
        return $this->_helperImage->getMediaUrl($this->_helperImage->getMediaPath($logo, $type));
    }

    /**
     * @return mixed
     */
    public function getMaintenanceLogo()
    {
        return $this->_helperData->getMaintenanceSetting('maintenance_logo');
    }

    /**
     * @return mixed
     */
    public function getComingSoonLogo()
    {
        return $this->_helperData->getComingSoonSetting('comingsoon_logo');
    }

    /**
     * @return array
     */
    public function getSocialList()
    {
        $list    = [
            '[social_facebook]',
            '[social_twitter]',
            '[social_instagram]',
            '[social_google]',
            '[social_youtube]',
            '[social_pinterest]'
        ];
        $url     = [];
        $imgPath = 'Mageplaza_BetterMaintenance::media/';
        foreach ($list as $value) {
            $filterValue = preg_replace('/[^A-Za-z0-9\_]/', '', $value);
            $url[]       = [
                'link' => $this->getFormData()[$value],
                'img'  => $this->getViewFileUrl($imgPath . $filterValue . '.png')
            ];
        }

        return $url;
    }

    /**
     * @return string|null
     * @throws LocalizedException
     */
    public function getBlockCms()
    {
        $blockId = $this->getFormData()['[footer_block][cms_block]'];
        if ($blockId === '0' || $blockId === '1') {
            return null;
        }
        $block = $this->getLayout()->createBlock(Block::class)
            ->setBlockId($blockId)
            ->toHtml();

        return $block;
    }

    /**
     * @return mixed
     * @throws LocalizedException
     */
    public function getClockBlock()
    {
        $block = $this->getLayout()
            ->createBlock(Clock::class)
            ->setTemplate('Mageplaza_BetterMaintenance::clock/timer.phtml')
            ->toHtml();

        return $block;
    }

    /**
     * @return mixed
     * @throws LocalizedException
     */
    public function getSubscribeBlock()
    {
        $block = $this->getLayout()
            ->createBlock(Subscribe::class)
            ->setData('area', 'frontend')
            ->setTemplate('Magento_Newsletter::subscribe.phtml')
            ->toHtml();

        return $block;
    }

    /**
     * @return mixed
     * @throws LocalizedException
     */
    public function getRegisterBlock()
    {
        $block = $this->getLayout()
            ->createBlock(Register::class)
            ->setData('area', 'frontend')
            ->setTemplate('Magento_Customer::form/register.phtml')
            ->toHtml();

        return $block;
    }

    /**
     * @return string
     */
    public function getImageBg()
    {
        $actionName    = $this->_request->getActionName();
        $maintenanceBg = $this->_helperData->getMaintenanceSetting('maintenance_background_image');
        $comingSoonBg  = $this->_helperData->getComingSoonSetting('comingsoon_background_image');

        if ($actionName === 'maintenance') {
            return $maintenanceBg
                ? $this->getUrlImage($maintenanceBg, HelperImage::TEMPLATE_MEDIA_TYPE_IMAGE)
                : $this->getViewFileUrl(self::DEFAULT_MAINTENANCE_BG);
        }

        return $comingSoonBg
            ? $this->getUrlImage($comingSoonBg, HelperImage::TEMPLATE_MEDIA_TYPE_IMAGE)
            : $this->getViewFileUrl(self::DEFAULT_COMING_SOON_BG);
    }

    /**
     * @param $video
     *
     * @return string|null
     * @throws NoSuchEntityException
     */
    public function getVideoUrl($video)
    {
        return $this->_maintenanceBlock->getVideoUrl($video);
    }

    /**
     * @param $type
     *
     * @return array
     */
    public function getListImages($type)
    {
        $list = [];
        foreach ($this->getFormData() as $key => $value) {
            if (strpos($key, $type) !== false && strpos($key, '[file]') !== false) {
                $list[] = $value;
            }
        }

        return $list;
    }

    /**
     * @param $type
     *
     * @return array
     */
    public function getMultipleImagesUrl($type)
    {
        $images = $this->getListImages($type);
        $urls   = [];
        foreach ($images as $image) {
            $urls[] = $this->_helperImage->getMediaUrl($this->_helperImage->getMediaPath($image));
        }

        return $urls;
    }

    /**
     * Copy from the Magento core.
     *
     * @param string $string
     * @param bool $escapeSingleQuote
     *
     * @return string
     */
    public function escapeHtmlAttr($string, $escapeSingleQuote = true)
    {
        return $this->_escaper->escapeHtmlAttr($string, $escapeSingleQuote);
    }

    /**
     * Copy from the Magento core.
     *
     * @param string $string
     *
     * @return string
     */
    public function escapeJs($string)
    {
        return $this->_escaper->escapeJs($string);
    }
}

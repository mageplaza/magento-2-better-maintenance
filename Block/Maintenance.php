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

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\Template;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;
use Mageplaza\BetterMaintenance\Helper\Image as HelperImage;
use Magento\Cms\Block\Block;

/**
 * Class Maintenance
 *
 * @package Mageplaza\BetterMaintenance\Block
 */
class Maintenance extends Template
{
    const PAGE_TITLE       = 'Under Maintenance';
    const PAGE_DESCRIPTION = 'We\'re currently down for maintenance. Be right back!';
    const PROGRESS_VALUE   = 50;

    /**
     * @var HelperData
     */
    protected $_helperData;

    /**
     * @var HelperImage
     */
    protected $_helperImage;

    /**
     * Maintenance constructor.
     *
     * @param HelperData       $helperData
     * @param HelperImage      $helperImage
     * @param Template\Context $context
     * @param array            $data
     */
    public function __construct(
        HelperData $helperData,
        HelperImage $helperImage,
        Template\Context $context,
        array $data = []
    ) {
        $this->_helperData  = $helperData;
        $this->_helperImage = $helperImage;
        parent::__construct($context, $data);
    }

    /**
     * @param $logo
     *
     * @return string
     */
    public function getLogo($logo)
    {
        $redirectTo = $this->_helperData->getConfigGeneral('redirect_to');

        if ($redirectTo === 'maintenance_page' && !$logo) {
            return $this->getViewFileUrl('Mageplaza_BetterMaintenance::media/maintenance_logo.png');
        }

        if ($redirectTo === 'coming_soon_page' && !$logo) {
            return $this->getViewFileUrl('Mageplaza_BetterMaintenance::media/coming_soon_logo.png');
        }

        return $this->_helperImage->getMediaUrl(
            $this->_helperImage->getMediaPath(
                $logo,
                HelperImage::TEMPLATE_MEDIA_TYPE_LOGO
            )
        );
    }

    /**
     * @param $image
     *
     * @return string|null
     */
    public function getImageUrl($image)
    {
        if (empty($image)) {
            return null;
        }

        return $this->_helperImage->getMediaUrl(
            $this->_helperImage->getMediaPath(
                $image,
                HelperImage::TEMPLATE_MEDIA_TYPE_IMAGE
            )
        );
    }

    /**
     * @param $video
     *
     * @return string|null
     */
    public function getVideoUrl($video)
    {
        if (empty($video)) {
            return null;
        }

        return $this->_helperImage->getMediaUrl(
            $this->_helperImage->getMediaPath(
                $video,
                HelperImage::TEMPLATE_MEDIA_TYPE_VIDEO
            )
        );
    }

    /**
     * @param $images
     *
     * @return array
     */
    public function getListMultipleImages($images)
    {
        $data = HelperData::jsonDecode($images);
        $list = [];

        foreach ($data as $key => $value) {
            $list[] = $value['file'];
        }

        return $list;
    }

    /**
     * @param $images
     *
     * @return array|null
     */
    public function getMultipleImagesUrl($images)
    {
        $urls   = [];
        $images = $this->getListMultipleImages($images);
        if (empty($images)) {
            return null;
        }

        foreach ($images as $image) {
            $urls[] = $this->_helperImage->getMediaUrl($this->_helperImage->getMediaPath($image));
        }

        return $urls;
    }

    /**
     * @return mixed|string
     */
    public function getPageTitle()
    {
        $title = $this->_helperData->getMaintenanceSetting('maintenance_title');

        return empty($title) ? self::PAGE_TITLE : $title;
    }

    /**
     * @return mixed|string
     */
    public function getPageDescription()
    {
        $des = $this->_helperData->getMaintenanceSetting('maintenance_description');

        return empty($des) ? self::PAGE_DESCRIPTION : $des;
    }

    /**
     * @return int|mixed
     */
    public function getProgressValue()
    {
        $value = $this->_helperData->getMaintenanceSetting('maintenance_progress_value');

        return empty($value) ? self::PROGRESS_VALUE : $value;
    }

    /**
     * @return mixed|string
     */
    public function getProgressLabel()
    {
        $label = $this->_helperData->getMaintenanceSetting('maintenance_progress_label');

        return isset($label) ? $label : '';
    }

    /**
     * @return mixed|string
     */
    public function getSocialLabel()
    {
        $label = $this->_helperData->getSocialSetting('social_label');

        return isset($label) ? $label : '';
    }

    /**
     * @return array
     */
    public function getSocialList()
    {
        $list    = [
            'social_facebook',
            'social_twitter',
            'social_instagram',
            'social_google',
            'social_youtube',
            'social_pinterest'
        ];
        $url     = [];
        $imgPath = 'Mageplaza_BetterMaintenance::media/';

        foreach ($list as $value) {
            $url[] = [
                'link' => $this->_helperData->getSocialSetting($value),
                'img'  => $this->getViewFileUrl($imgPath . $value . '.png')
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
        $blockId = $this->_helperData->getFooterSetting('cms_block');
        if ($blockId === '0') {
            return null;
        }
        $block = $this->getLayout()->createBlock(Block::class)
            ->setBlockId($blockId)
            ->toHtml();

        return $block;
    }

    /**
     * @param $code
     *
     * @return mixed
     */
    public function getMaintenanceSetting($code)
    {
        return $this->_helperData->getMaintenanceSetting($code);
    }

    /**
     * @param $code
     *
     * @return mixed
     */
    public function getSubscribeSetting($code)
    {
        return $this->_helperData->getSubscribeSetting($code);
    }

    /**
     * @param $code
     *
     * @return mixed
     */
    public function getSocialSetting($code)
    {
        return $this->_helperData->getSocialSetting($code);
    }

    /**
     * @param $code
     *
     * @return mixed
     */
    public function getClockSetting($code)
    {
        return $this->_helperData->getClockSetting($code);
    }

    /**
     * Copy from the Magento core.
     *
     * @param string $string
     * @param bool   $escapeSingleQuote
     *
     * @return string
     */
    public function escapeHtmlAttr($string, $escapeSingleQuote = true)
    {
        return $this->_escaper->escapeHtmlAttr($string, $escapeSingleQuote);
    }
}

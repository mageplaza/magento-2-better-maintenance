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
namespace Mageplaza\BetterMaintenance\Block\Adminhtml\System\Renderer;

use Exception;
use Magento\Backend\Block\Media\Uploader;
use Magento\Backend\Block\Template\Context;
use Magento\Backend\Block\Widget;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\View\Element\AbstractBlock;
use Mageplaza\BetterMaintenance\Helper\Image as HelperImage;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;

/**
 * Class Images
 * @package Mageplaza\BetterMaintenance\Block\Adminhtml\System\Renderer
 */
class Images extends Widget
{
    /**
     * @var HelperImage
     */
    protected $_imageHelper;

    /**
     * @var HelperData
     */
    protected $_helperData;

    /**
     * Images constructor.
     *
     * @param Context $context
     * @param HelperImage $imageHelper
     * @param HelperData $helperData
     * @param array $data
     */
    public function __construct(
        Context $context,
        HelperImage $imageHelper,
        HelperData $helperData,
        array $data = []
    ) {
        $this->_imageHelper = $imageHelper;
        $this->_helperData  = $helperData;

        parent::__construct($context, $data);
    }

    /**
     * @return Widget
     */
    protected function _prepareLayout()
    {
        $this->addChild('uploader', Uploader::class);

        $this->getUploader()->getConfig()->setUrl(
            $this->_urlBuilder->addSessionParam()->getUrl('mpbettermaintenance/multiimages/upload')
        )->setFileField(
            'image'
        )->setFilters(
            [
                'images' => [
                    'label' => __('Images (.gif, .jpg, .png)'),
                    'files' => ['*.gif', '*.jpg', '*.jpeg', '*.png'],
                ],
            ]
        );

        return parent::_prepareLayout();
    }

    /**
     * @return bool|AbstractBlock
     */
    public function getUploader()
    {
        return $this->getChildBlock('uploader');
    }

    /**
     * @return string
     */
    public function getUploaderHtml()
    {
        return $this->getChildHtml('uploader');
    }

    /**
     * @return string
     */
    public function getJsObjectName()
    {
        return $this->getHtmlId() . 'JsObject';
    }

    /**
     * @return string
     */
    public function getImagesMaintenanceJson()
    {
        if ($this->_helperData->getMaintenanceSetting('maintenance_background') === 'multiple_images') {
            $value = HelperData::jsonDecode($this->getElement()->getData('config_data')['mpbettermaintenance/maintenance_setting/maintenance_background_multi_image']);
            if (is_array($value) && !empty($value)) {
                $mediaDir = $this->_filesystem->getDirectoryRead(DirectoryList::MEDIA);
                $images   = $this->sortImagesByPosition($value);
                foreach ($images as $key => &$image) {
                    $image['url'] = $this->_imageHelper
                            ->getBaseMediaUrl() . '/' . $this->_imageHelper->getMediaPath($image['file']);
                    try {
                        $fileHandler   = $mediaDir->stat($this->_imageHelper->getMediaPath($image['file']));
                        $image['size'] = $fileHandler['size'];
                    } catch (Exception $e) {
                        $this->_logger->warning($e);
                        unset($images[$key]);
                    }
                }

                return HelperData::jsonEncode($images);
            }
        }

        return '[]';
    }

    /**
     * @return string
     */
    public function getImagesComingsoonJson()
    {
        if ($this->_helperData->getComingSoonSetting('comingsoon_background') === 'multiple_images') {
            $value = HelperData::jsonDecode($this->getElement()->getData('config_data')['mpbettermaintenance/comingsoon_setting/comingsoon_background_multi_image']);
            if (is_array($value) && !empty($value)) {
                $mediaDir = $this->_filesystem->getDirectoryRead(DirectoryList::MEDIA);
                $images   = $this->sortImagesByPosition($value);
                foreach ($images as $key => &$image) {
                    $image['url'] = $this->_imageHelper
                            ->getBaseMediaUrl() . '/' . $this->_imageHelper->getMediaPath($image['file']);
                    try {
                        $fileHandler   = $mediaDir->stat($this->_imageHelper->getMediaPath($image['file']));
                        $image['size'] = $fileHandler['size'];
                    } catch (Exception $e) {
                        $this->_logger->warning($e);
                        unset($images[$key]);
                    }
                }

                return HelperData::jsonEncode($images);
            }
        }

        return '[]';
    }

    /**
     * @param $images
     *
     * @return array
     */
    private static function sortImagesByPosition($images)
    {
        if (is_array($images)) {
            usort(
                $images,
                function ($imageA, $imageB) {
                    return ($imageA['position'] < $imageB['position']) ? -1 : 1;
                }
            );
        }

        return $images;
    }
}

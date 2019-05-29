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
 * @package   Mageplaza_BetterProductReviews
 * @copyright Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license   https://www.mageplaza.com/LICENSE.txt
 */

namespace Mageplaza\BetterMaintenance\Block\Adminhtml\System\Renderer;

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
     * @var Image
     */
    protected $_imageHelper;

    protected $_helperData;

    /**
     * Images constructor.
     *
     * @param Context $context
     * @param Image $imageHelper
     * @param array $data
     */
    public function __construct(
        Context $context,
        HelperImage $imageHelper,
        HelperData $helperData,
        array $data = []
    ) {
        $this->_imageHelper = $imageHelper;
        $this->_helperData = $helperData;

        parent::__construct($context, $data);
    }

    /**
     * @return AbstractBlock
     */
    protected function _prepareLayout()
    {
        $this->addChild('uploader', 'Magento\Backend\Block\Media\Uploader');

        $this->getUploader()->getConfig()->setUrl(
            $this->_urlBuilder->addSessionParam()->getUrl('mpbettermaintenance/multiimages/upload')
        )->setFileField(
            'image'
        )->setFilters([
            'images' => [
                'label' => __('Images (.gif, .jpg, .png)'),
                'files' => ['*.gif', '*.jpg', '*.jpeg', '*.png'],
            ],
        ]);

        return parent::_prepareLayout();
    }

    /**
     * Retrieve uploader block
     *
     * @return bool|Uploader
     */
    public function getUploader()
    {
        return $this->getChildBlock('uploader');
    }

    /**
     * Retrieve uploader block html
     *
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
//        $value = $this->getElement()->getImages();
//        \Zend_Debug::dump($this->getElement()->getData('config_data'));die;
        if ($this->_helperData->getMaintenanceSetting('maintenance_background') === 'multiple_images') {
            $value = HelperData::jsonDecode($this->getElement()->getData('config_data')['mpbettermaintenance/maintenance_setting/maintenance_background_multi_image']);
            //        \Zend_Debug::dump(HelperData::jsonDecode($value));die;
            //        $value = HelperData::jsonEncode($value);
            if (is_array($value) && !empty($value)) {
                $mediaDir = $this->_filesystem->getDirectoryRead(DirectoryList::MEDIA);
                $images = $this->sortImagesByPosition($value);
                foreach ($images as $key => &$image) {
                    //            \Zend_Debug::dump($this->_imageHelper->getMediaPath($image['file']));die;
                    $image['url'] = $this->_imageHelper
                            ->getBaseMediaUrl() . '/' . $this->_imageHelper->getMediaPath($image['file']);
                    try {
                        $fileHandler = $mediaDir->stat($this->_imageHelper->getMediaPath($image['file']));
                        $image['size'] = $fileHandler['size'];
                    } catch (\Exception $e) {
                        $this->_logger->warning($e);
                        unset($images[$key]);
                    }
                }
                //            \Zend_Debug::dump($images);die;
                return HelperData::jsonEncode($images);
            }
        }


        return '[]';
    }

    public function getImagesComingsoonJson()
    {
        //        $value = $this->getElement()->getImages();
        //        \Zend_Debug::dump($this->getElement()->getData('config_data'));die;
        if ($this->_helperData->getComingSoonSetting('comingsoon_background') === 'multiple_images') {
            $value = HelperData::jsonDecode($this->getElement()->getData('config_data')['mpbettermaintenance/comingsoon_setting/comingsoon_background_multi_image']);
            //        $value = '';
            //        \Zend_Debug::dump(HelperData::jsonDecode($value));die;
            //        $value = HelperData::jsonEncode($value);
            if (is_array($value) && !empty($value)) {
                $mediaDir = $this->_filesystem->getDirectoryRead(DirectoryList::MEDIA);
                $images = $this->sortImagesByPosition($value);
                foreach ($images as $key => &$image) {
                    //            \Zend_Debug::dump($this->_imageHelper->getMediaPath($image['file']));die;
                    $image['url'] = $this->_imageHelper
                            ->getBaseMediaUrl() . '/' . $this->_imageHelper->getMediaPath($image['file']);
                    try {
                        $fileHandler = $mediaDir->stat($this->_imageHelper->getMediaPath($image['file']));
                        $image['size'] = $fileHandler['size'];
                    } catch (\Exception $e) {
                        $this->_logger->warning($e);
                        unset($images[$key]);
                    }
                }
                //            \Zend_Debug::dump($images);die;
                return HelperData::jsonEncode($images);
            }
        }


        return '[]';
    }

    /**
     * Sort images array by position key
     *
     * @param array $images
     *
     * @return array
     */
    private function sortImagesByPosition($images)
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

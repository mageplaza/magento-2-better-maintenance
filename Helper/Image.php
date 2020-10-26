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

namespace Mageplaza\BetterMaintenance\Helper;

use Exception;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Exception\FileSystemException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Filesystem;
use Magento\Framework\Filesystem\Io\File;
use Magento\Framework\Image\AdapterFactory;
use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Asset\Repository;
use Magento\MediaStorage\Model\File\Uploader;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Store\Model\StoreManagerInterface;
use Mageplaza\BetterMaintenance\Helper\Data as HelperData;
use Mageplaza\Core\Helper\Media;

/**
 * Class Image
 *
 * @package Mageplaza\BetterMaintenance\Helper
 */
class Image extends Media
{
    const TEMPLATE_MEDIA_PATH       = 'mageplaza/bettermaintenance';
    const TEMPLATE_MEDIA_TYPE_IMAGE = 'image';
    const TEMPLATE_MEDIA_TYPE_LOGO  = 'logo';
    const TEMPLATE_MEDIA_TYPE_VIDEO = 'video';

    const DEFAULT_MAINTENANCE_LOGO = 'Mageplaza_BetterMaintenance::media/maintenance_logo.png';
    const DEFAULT_COMING_SOON_LOGO = 'Mageplaza_BetterMaintenance::media/coming_soon_logo.png';
    const DEFAULT_MAINTENANCE_BG   = 'Mageplaza_BetterMaintenance::media/maintenance_bg.jpg';
    const DEFAULT_COMING_SOON_BG   = 'Mageplaza_BetterMaintenance::media/coming_soon_bg.jpg';

    /**
     * @var File
     */
    protected $_file;

    /**
     * Asset service
     *
     * @var Repository
     */
    protected $_assetRepo;

    /**
     * Image constructor.
     *
     * @param Context $context
     * @param ObjectManagerInterface $objectManager
     * @param StoreManagerInterface $storeManager
     * @param Filesystem $filesystem
     * @param UploaderFactory $uploaderFactory
     * @param AdapterFactory $imageFactory
     * @param File $file
     * @param Repository $assetRepo
     *
     * @throws FileSystemException
     */
    public function __construct(
        Context $context,
        ObjectManagerInterface $objectManager,
        StoreManagerInterface $storeManager,
        Filesystem $filesystem,
        UploaderFactory $uploaderFactory,
        AdapterFactory $imageFactory,
        File $file,
        Repository $assetRepo
    ) {
        $this->_file      = $file;
        $this->_assetRepo = $assetRepo;

        parent::__construct($context, $objectManager, $storeManager, $filesystem, $uploaderFactory, $imageFactory);
    }

    /**
     * Retrieve url of a view file
     *
     * @param string $fileId
     * @param array $params
     * @return string
     */
    public function getViewFileUrl($fileId, array $params = [])
    {
        try {
            $params = array_merge(['_secure' => $this->_getRequest()->isSecure()], $params);
            return $this->_assetRepo->getUrlWithParams($fileId, $params);
        } catch (Exception $e) {
            return '';
        }
    }

    /**
     * @param string $logo
     * @param boolean $isMaintenance
     * @param array $params
     *
     * @return string
     * @throws NoSuchEntityException
     */
    public function getLogoUrl($logo, $isMaintenance = true, $params = [])
    {
        $defaultLogo = $isMaintenance ? self::DEFAULT_MAINTENANCE_LOGO : self::DEFAULT_COMING_SOON_LOGO;

        return $this->getImageUrl($logo, self::TEMPLATE_MEDIA_TYPE_LOGO, $defaultLogo, $params);
    }

    /**
     * @param string $background
     * @param boolean $isMaintenance
     * @param array $params
     *
     * @return string
     * @throws NoSuchEntityException
     */
    public function getBackGroundImageUrl($background, $isMaintenance = true, $params = [])
    {
        $default = $isMaintenance ? self::DEFAULT_MAINTENANCE_BG : self::DEFAULT_COMING_SOON_BG;

        return $this->getImageUrl($background, self::TEMPLATE_MEDIA_TYPE_IMAGE, $default, $params);
    }

    /**
     * @param $imageValue
     * @param $type
     * @param $defaultValue
     * @param array $params
     *
     * @return string
     * @throws NoSuchEntityException
     */
    public function getImageUrl($imageValue, $type, $defaultValue, $params = [])
    {
        if (!$imageValue) {
            return $this->getViewFileUrl($defaultValue, $params);
        }

        if (!$type) {
            $type = self::TEMPLATE_MEDIA_TYPE_IMAGE;
        }

        return $this->getMediaUrlByType($imageValue, $type);
    }

    /**
     * @param string $value
     *
     * @return string
     * @throws NoSuchEntityException
     */
    public function getVideoUrl($value)
    {
        return $this->getMediaUrlByType($value, self::TEMPLATE_MEDIA_TYPE_VIDEO);
    }

    /**
     * @param string $type
     * @param string $value
     *
     * @return string
     * @throws NoSuchEntityException
     */
    public function getMediaUrlByType($value, $type)
    {
        if (!$value) {
            return '';
        }

        return $this->getMediaUrl($this->getMediaPath($value, $type));
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
     * @throws NoSuchEntityException
     */
    public function getMultipleImagesUrl($images)
    {
        $urls   = [];
        $images = $this->getListMultipleImages($images);
        if (empty($images)) {
            return null;
        }

        foreach ($images as $image) {
            $urls[] = $this->getMediaUrl($this->getMediaPath($image));
        }

        return $urls;
    }

    /**
     * @param $fileName
     * @param $descriptionPath
     *
     * @return string
     */
    public function getNotDuplicatedFilename($fileName, $descriptionPath)
    {
        $fileMediaName = $descriptionPath . '/'
            . Uploader::getNewFileName($this->mediaDirectory->getAbsolutePath($this->getMediaPath($fileName)));

        if ($fileMediaName !== $fileName) {
            return $this->getNotDuplicatedFilename($fileMediaName, $descriptionPath);
        }

        return $fileMediaName;
    }

    /**
     * @return string
     */
    public function getBaseTmpMediaPath()
    {
        return self::TEMPLATE_MEDIA_PATH . '/tmp';
    }

    /**
     * @param $file
     *
     * @return string
     */
    public function getTmpMediaPath($file)
    {
        return $this->getBaseTmpMediaPath() . '/' . $this->_prepareFile($file);
    }

    /**
     * @param $file
     *
     * @return string
     * @throws NoSuchEntityException
     */
    public function getTmpMediaUrl($file)
    {
        return $this->getBaseTmpMediaUrl() . '/' . $this->_prepareFile($file);
    }

    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getBaseTmpMediaUrl()
    {
        return $this->storeManager->getStore()
                ->getBaseUrl(UrlInterface::URL_TYPE_MEDIA) . $this->getBaseTmpMediaPath();
    }

    /**
     * @param $data
     *
     * @return $this
     * @throws LocalizedException
     */
    public function uploadImages(&$data)
    {
        if (isset($data['images']) && !empty($data['images'])) {
            $data['mp_bpr_images'] = self::jsonEncode($this->processImagesGallery($data['images']));
        }

        return $this;
    }

    /**
     * @return mixed
     * @throws NoSuchEntityException
     */
    public function getBaseStaticUrl()
    {
        return $this->storeManager->getStore()
            ->getBaseUrl(UrlInterface::URL_TYPE_STATIC);
    }

    /**
     * @param $imageEntries
     *
     * @return array
     * @throws LocalizedException
     * @throws FileSystemException
     */
    protected function processImagesGallery($imageEntries)
    {
        foreach ($imageEntries as $key => &$image) {
            if (!isset($image['file']) || !$image['file']) {
                unset($imageEntries[$key]);
                continue;
            }

            $fileName = $image['file'];
            $pos      = strpos($fileName, '.tmp');

            if (isset($image['removed'])) {
                /**
                 * Remove image
                 */
                unset($imageEntries[$key]);

                if ($pos === false) {
                    $filePath = $this->getMediaPath($image['file']);
                    $file     = $this->mediaDirectory->getRelativePath($filePath);
                    if ($this->mediaDirectory->isFile($file)) {
                        $this->mediaDirectory->delete($filePath);
                    }
                }
            } elseif ($pos !== false) {
                /**
                 * Move image from tmp folder
                 */
                $fileName = substr($fileName, 0, $pos);
                $filePath = $this->getTmpMediaPath($fileName);
                $file     = $this->mediaDirectory->getRelativePath($filePath);
                if (!$this->mediaDirectory->isFile($file)) {
                    unset($imageEntries[$key]);
                    continue;
                }

                $pathInfo = $this->_file->getPathInfo($file);
                if (!isset($pathInfo['extension'])
                    || !in_array(strtolower($pathInfo['extension']), ['jpg', 'jpeg', 'gif', 'png'], true)
                ) {
                    unset($imageEntries[$key]);
                    continue;
                }

                $fileName       = Uploader::getCorrectFileName($pathInfo['basename']);
                $dispretionPath = Uploader::getDispretionPath($fileName);
                $fileName       = $dispretionPath . '/' . $fileName;

                $fileName        = $this->getNotDuplicatedFilename($fileName, $dispretionPath);
                $destinationFile = $this->getMediaPath($fileName);

                try {
                    $this->mediaDirectory->renameFile($file, $destinationFile);
                    $image['file'] = str_replace('\\', '/', $fileName);
                } catch (Exception $e) {
                    throw new LocalizedException(__('We couldn\'t move this file: %1.', $e->getMessage()));
                }
            }

            if (isset($image['removed'])) {
                unset($image['removed']);
            }
        }

        return array_values($imageEntries);
    }
}

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
use Magento\Framework\Exception\FileSystemException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\UrlInterface;
use Magento\MediaStorage\Model\File\Uploader;
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

                $pathInfo = pathinfo($file);
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

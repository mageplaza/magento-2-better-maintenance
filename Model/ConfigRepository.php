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

namespace Mageplaza\BetterMaintenance\Model;

use Magento\Framework\Exception\LocalizedException;
use Mageplaza\BetterMaintenance\Api\ConfigRepositoryInterface;
use Mageplaza\BetterMaintenance\Helper\Data;
use Mageplaza\BetterMaintenance\Helper\Image;
use Mageplaza\BetterMaintenance\Model\Api\Config\General;
use Mageplaza\BetterMaintenance\Model\Api\Config\MaintenanceSetting;
use Mageplaza\BetterMaintenance\Model\Api\Config\DisplaySetting;
use Mageplaza\BetterMaintenance\Model\Api\Config\ComingSoonSetting;
use Mageplaza\BetterMaintenance\Model\Api\Config\DisplaySetting\SocialContact;
use Mageplaza\BetterMaintenance\Model\Api\Config\DisplaySetting\ClockSetting;
use Mageplaza\BetterMaintenance\Model\Api\Config\DisplaySetting\SubscribeSetting;
use Mageplaza\BetterMaintenance\Model\Api\Config\DisplaySetting\FooterSetting;

/**
 * Class ConfigRepository
 * @package Mageplaza\BetterMaintenance\Model
 */
class ConfigRepository implements ConfigRepositoryInterface
{
    /**
     * @var Data
     */
    protected $helperData;

    /**
     * @var Image
     */
    protected $helperImage;

    /**
     * @var Config
     */
    protected $config;

    /**
     * ConfigRepository constructor.
     *
     * @param Data $helperData
     * @param Config $config
     * @param Image $helperImage
     */
    public function __construct(
        Data $helperData,
        Config $config,
        Image $helperImage
    ) {
        $this->helperData  = $helperData;
        $this->config      = $config;
        $this->helperImage = $helperImage;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfigs($storeId = null)
    {
        if ($storeId === null) {
            $storeId = $this->helperData->getCurrentStoreId();
        }

        if (!$this->helperData->isEnabled($storeId)) {
            throw new LocalizedException(__('Better Maintenance is disabled.'));
        }

        $configModule               = $this->helperData->getBetterMaintenanceConfigs($storeId);
        $clockSettingObject         = new ClockSetting($configModule['display_setting']['clock_setting']);
        $subscribeSettingObject     = new SubscribeSetting($configModule['display_setting']['subscribe_setting']);
        $footerSettingBlockObject   = new FooterSetting($configModule['display_setting']['footer_block']);
        $socialContactSettingObject = new SocialContact($configModule['display_setting']['social_contact']);
        $this->setSocialIconUrl($socialContactSettingObject);
        if (!$clockSettingObject->getClockBackgroundColor()) {
            $clockSettingObject->setClockBackgroundColor('#FFFFFF');
        }

        if (!$clockSettingObject->getClockInnerColor()) {
            $clockSettingObject->setClockInnerColor('#FFFFFF');
        }

        $displaySetting = [
            'clock_setting'     => $clockSettingObject,
            'subscribe_setting' => $subscribeSettingObject,
            'footer_block'      => $footerSettingBlockObject,
            'social_contact'    => $socialContactSettingObject
        ];

        $generalObject     = new General($configModule['general']);
        $pageLinks = [];
        if ($generalObject->getWhitelistPage()) {
            $pageLinks = explode(PHP_EOL, $generalObject->getWhitelistPage());
        }
        $generalObject->setWhitelistPage($pageLinks);

        $displayObject     = new DisplaySetting($displaySetting);
        $maintenanceObject = new MaintenanceSetting($configModule['maintenance_setting']);
        $logoUrl = $this->helperImage->getLogoUrl(
            $maintenanceObject->getMaintenanceLogo(),
            true,
            ['area' => 'frontend']
        );
        $videoUrl = $this->helperImage->getVideoUrl($maintenanceObject->getMaintenanceBackgroundVideo());
        $backgroundImageUrl = $this->helperImage->getBackGroundImageUrl(
            $maintenanceObject->getMaintenanceBackgroundImage()
        );
        $multiImage = [];
        if ($maintenanceObject->getMaintenanceBackgroundMultiImage()) {
            $multiImage = $this->helperImage->getMultipleImagesUrl(
                $maintenanceObject->getMaintenanceBackgroundMultiImage()
            );
        }

        $maintenanceObject->setMaintenanceLogo($logoUrl);
        $maintenanceObject->setMaintenanceBackgroundVideo($videoUrl);
        $maintenanceObject->setMaintenanceBackgroundImage($backgroundImageUrl);
        $maintenanceObject->setMaintenanceBackgroundMultiImage($multiImage);
        if (!$maintenanceObject->getMaintenanceProgressValue()) {
            $maintenanceObject->setMaintenanceProgressValue(Image::PROGRESS_VALUE);
        }
        $comingSoonObject  = new ComingSoonSetting($configModule['comingsoon_setting']);

        $logoUrl = $this->helperImage->getLogoUrl(
            $comingSoonObject->getComingsoonLogo(),
            true,
            ['area' => 'frontend']
        );
        $videoUrl = $this->helperImage->getVideoUrl($comingSoonObject->getComingsoonBackgroundVideo());
        $backgroundImageUrl = $this->helperImage->getBackGroundImageUrl(
            $comingSoonObject->getComingsoonBackgroundImage()
        );

        $multiImage = [];
        if ($comingSoonObject->getComingsoonBackgroundMultiImage()) {
            $multiImage = $this->helperImage->getMultipleImagesUrl(
                $comingSoonObject->getComingsoonBackgroundMultiImage()
            );
        }

        $comingSoonObject->setComingsoonLogo($logoUrl);
        $comingSoonObject->setComingsoonBackgroundVideo($videoUrl);
        $comingSoonObject->setComingsoonBackgroundImage($backgroundImageUrl);
        $comingSoonObject->setComingsoonBackgroundMultiImage($multiImage);

        $this->config->setGeneral($generalObject)
            ->setDisplaySetting($displayObject)
            ->setMaintenanceSetting($maintenanceObject)
            ->setComingsoonSetting($comingSoonObject);

        return $this->config;
    }

    /**
     * @param SocialContact $socialContactSettingObject
     *
     * @return SocialContact
     */
    public function setSocialIconUrl($socialContactSettingObject)
    {
        $list = [
            'social_facebook',
            'social_twitter',
            'social_instagram',
            'social_google',
            'social_youtube',
            'social_pinterest'
        ];

        foreach ($list as $icon) {
            $imgPath = 'Mageplaza_BetterMaintenance::media/' . $icon . '.png';
            $url     = $this->helperImage->getViewFileUrl($imgPath, ['area' => 'frontend']);
            $socialContactSettingObject->setData($icon . '_icon_url', $url);
        }

        return $socialContactSettingObject;
    }
}

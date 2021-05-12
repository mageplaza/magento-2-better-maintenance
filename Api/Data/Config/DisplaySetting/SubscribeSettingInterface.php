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

namespace Mageplaza\BetterMaintenance\Api\Data\Config\DisplaySetting;

/**
 * Interface SubscribeSettingInterface
 * @package Mageplaza\BetterMaintenance\Api\Data\Config\DisplaySetting
 */
interface SubscribeSettingInterface
{
    const SUBSCRIBE_TYPE          = 'subscribe_type';
    const SUBSCRIBE_LABEL_COLOR   = 'subscribe_label_color';
    const BUTTON_LABEL            = 'button_label';
    const BUTTON_LABEL_COLOR      = 'button_label_color';
    const BUTTON_BACKGROUND_COLOR = 'button_background_color';
    const SUBSCRIBE_LABEL         = 'subscribe_label';

    /**
     * @return string
     */
    public function getSubscribeType();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSubscribeType($value);

    /**
     * @return string
     */
    public function getSubscribeLabelColor();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSubscribeLabelColor($value);

    /**
     * @return string
     */
    public function getButtonLabel();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setButtonLabel($value);

    /**
     * @return string
     */
    public function getButtonLabelColor();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setButtonLabelColor($value);

    /**
     * @return string
     */
    public function getButtonBackgroundColor();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setButtonBackgroundColor($value);

    /**
     * @return string
     */
    public function getSubscribeLabel();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSubscribeLabel($value);

}

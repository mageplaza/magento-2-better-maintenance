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
namespace Mageplaza\BetterMaintenance\Plugin;

use Closure;

/**
 * Class CsrfValidatorSkip
 * @package Mageplaza\BetterMaintenance\Plugin
 */
class CsrfValidatorSkip
{
    /**
     * @param $subject
     * @param Closure $proceed
     * @param $request
     * @param $action
     *
     * @SuppressWarnings("Unused")
     */
    public function aroundValidate(
        $subject,
        Closure $proceed,
        $request,
        $action
    ) {
        if ($request->getModuleName() === 'mpbettermaintenance') {
            return; // Skip CSRF check
        }
        $proceed($request, $action); // Proceed Magento 2 core functionality
    }
}

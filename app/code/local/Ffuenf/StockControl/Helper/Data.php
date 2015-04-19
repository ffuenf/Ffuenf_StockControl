<?php
/**
 * Ffuenf_StockControl extension
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 * 
 * @category       Ffuenf
 * @package        Ffuenf_StockControl
 * @author         Achim Rosenhagen <a.rosenhagen@ffuenf.de>
 * @copyright      Copyright (c) 2015 ffuenf (http://www.ffuenf.de)
 * @license        http://opensource.org/licenses/mit-license.php MIT License
*/

namespace Ffuenf\StockControl;
class Ffuenf_StockControl_Helper_Data extends Mage_Core_Helper_Abstract
{

    /**
    * Path for the config for extension active status
    */
    const CONFIG_EXTENSION_ACTIVE = 'stockcontrol/general/enabled';

    /**
     * Variable for if the extension is active
     *
     * @var bool
     */
    protected $bExtensionActive;

    /**
     * Check to see if the extension is active
     *
     * @return bool
     */
    public function isExtensionActive()
    {
        if ($this->bExtensionActive === null) {
        $this->bExtensionActive = Mage::getStoreConfigFlag(self::CONFIG_EXTENSION_ACTIVE);
        }
        return $this->bExtensionActive;
    }

    public function log($message, $level = null, $file = 'ffuenf_stockcontrol.log', $forceLog = false)
    {
        Mage::log($message, $level, $file, $forceLog);
    }
}

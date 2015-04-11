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

class Ffuenf_StockControl_Model_Source_Order
{
    public function toOptionArray()
    {
        return array(
            array('value' => 'asc', 'label' => Mage::helper('ffuenf_stockcontrol')->__('Ascending')),
            array('value' => 'desc', 'label' => Mage::helper('ffuenf_stockcontrol')->__('Descending'))
        );
    }
}
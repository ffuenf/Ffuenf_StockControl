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

namespace Ffuenf_StockControl;
class Ffuenf_StockControl_Model_Source_Sort
{
    public function toOptionArray()
    {
        return array(
            array('value' => 'entity_id', 'label' => Mage::helper('ffuenf_stockcontrol')->__('Product ID')),
            array('value' => 'name', 'label' => Mage::helper('ffuenf_stockcontrol')->__('Product Name')),
            array('value' => 'qty', 'label' => Mage::helper('ffuenf_stockcontrol')->__('Product Qty')),
            array('value' => 'is_in_stock', 'label' => Mage::helper('ffuenf_stockcontrol')->__('Stock Status'))
        );
    }
}
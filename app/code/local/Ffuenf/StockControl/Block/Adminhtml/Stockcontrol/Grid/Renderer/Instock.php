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
class Ffuenf_StockControl_Block_Adminhtml_Stockcontrol_Grid_Renderer_Instock extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $instock = $row->getData($this->getColumn()->getIndex());
        if ($instock)
        {
            $type = 'notice';
            $text = Mage::helper('ffuenf_stockcontrol')->__('In Stock');
        } else {
            $type = 'critical';
            $text = Mage::helper('ffuenf_stockcontrol')->__('Out of Stock');
        }
        return '<span onclick="changeStatus(' . $row->getId() . ', ' . $instock . ')" class="grid-severity-' . $type . '"><span>' . $text . '</span></span>';
    }
}
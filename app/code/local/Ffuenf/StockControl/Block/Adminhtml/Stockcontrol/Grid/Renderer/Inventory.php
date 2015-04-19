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
class Ffuenf_StockControl_Block_Adminhtml_Stockcontrol_Grid_Renderer_Inventory extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $qty = $row->getData($this->getColumn()->getIndex());
        
        if (Mage::getStoreConfig('stockcontrol/general/inline_edit')) {
            $html = '<input onblur="updateStock(this, ' . $row->getId() . '); return false" class="validate-number input-text ' . $this->getColumn()->getInlineCss() . '" style="width:30%;float:left" type="text" name="qty" value="' . (float)$qty . '" />';
        } else {
            $html = '<input class="validate-number input-text ' . $this->getColumn()->getInlineCss() . '" style="width:30%;float:left" type="text" name="qty" value="' . (float)$qty . '" />';
            $html .= '<button onclick="updateStock(this, ' . $row->getId() . '); return false">' . Mage::helper('ffuenf_stockcontrol')->__('Update') . '</button>';
        }
        return $html;
    }
}
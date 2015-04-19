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
 * @category   Ffuenf
 * @package    Ffuenf_StockControl
 * @author     Achim Rosenhagen <a.rosenhagen@ffuenf.de>
 * @copyright  Copyright (c) 2015 ffuenf (http://www.ffuenf.de)
 * @license    http://opensource.org/licenses/mit-license.php MIT License
*/

class Ffuenf_StockControl_Model_Adminhtml_Stockcontrol extends Mage_Core_Model_Abstract
{
    public function updateStock()
    {
        $productid = (int)Mage::app()->getRequest()->getParam('id');
        $qty = Mage::app()->getRequest()->getParam('qty');
        
        if (is_numeric($qty))
        {
            $stockitem = Mage::getModel('cataloginventory/stock_item')->loadByProduct($productid);
            $stockitem->setQty($qty);
            
            if ($qty > 0 && Mage::getStoreConfig('stockcontrol/change_status'))
            {
                $stockitem->setIsInStock(0);
            } else {
                $stockitem->setIsInStock(1);
            }
            try {
                $stockitem->save();
            } catch (\Exception $e) {
                Mage::log($e->getMessage(), null, 'exception.log');
            }
        }
    }
    public function changeStatus()
    {
        $productid = (int)Mage::app()->getRequest()->getParam('id');
        $instock = Mage::app()->getRequest()->getParam('instock');
        $stockitem = Mage::getModel('cataloginventory/stock_item')->loadByProduct($productid);
        
        if ($instock)
        {
            $stockitem->setIsInStock(0);
        } else {
            $stockitem->setIsInStock(1);
        }
        $stockitem->save();
    }
}

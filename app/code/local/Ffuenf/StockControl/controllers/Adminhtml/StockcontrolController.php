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

class Ffuenf_StockControl_Adminhtml_StockcontrolController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Catalog'))->_title(Mage::helper('ffuenf_stockcontrol')->__('StockControl'));
        $this->loadLayout();
        $this->_setActiveMenu('catalog/stockcontrol');
        $this->renderLayout();
    }
    
    public function gridAction()
    {
        $this->loadLayout('adminhtml_stockcontrol_grid');
        $this->renderLayout();
    }
    
    public function updateStockAction()
    {
        $this->adminStock()->updateStock();
    }
    
    public function changeStatusAction()
    {
        $this->adminStock()->changeStatus();
    }
    
    public function adminStock()
    {
        return Mage::getModel('stockcontrol/adminhtml_stockcontrol');
    }
}
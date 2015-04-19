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
class Ffuenf_StockControl_Block_Adminhtml_Stockcontrol_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('stockcontrol_grid');
        $this->setDefaultSort(Mage::getStoreConfig('stockcontrol/sort_by'));
        $this->setDefaultDir(Mage::getStoreConfig('stockcontrol/order'));
        $this->setDefaultLimit(100);
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    /**
     * Prepare grid collection object
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('catalog/product')->getCollection()
            ->addAttributeToSelect(array('name', 'sku'));
        $collection->joinField('qty',
            'cataloginventory/stock_item',
            'qty',
            'product_id=entity_id',
            '{{table}}.stock_id=1',
            'left'
        );
        $collection->joinField('is_in_stock',
            'cataloginventory/stock_item',
            'is_in_stock',
            'product_id=entity_id',
            '{{table}}.stock_id=1',
            'left'
        );
        $collection->addAttributeToFilter('type_id', array('in' => array('simple', 'downloadable', 'virtual')));
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    /**
     * Configuration of grid
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareColumns()
    {
        $this->addColumn('entity_id', array(
            'header' => Mage::helper('ffuenf_stockcontrol')->__('ID'),
            'align' =>'right',
            'width' => '50px',
            'index' => 'entity_id',
            'type' => 'number',
        ));
        $this->addColumn('sku', array(
            'header' => Mage::helper('ffuenf_stockcontrol')->__('SKU'),
            'align' =>'left',
            'index' => 'sku',
            'width' => '100px'
        ));
        $this->addColumn('name', array(
            'header' => Mage::helper('ffuenf_stockcontrol')->__('Name'),
            'align' =>'left',
            'index' => 'name'
        ));
        $this->addColumn('qty', array(
            'header' => Mage::helper('ffuenf_stockcontrol')->__('Quantity'),
            'align' =>'left',
            'index' => 'qty',
            'width' => '100px',
            'type' => 'number',
            'renderer' => 'Ffuenf_StockControl_Block_Adminhtml_Stockcontrol_Grid_Renderer_Inventory'
        ));
        $this->addColumn('in_stock', array(
            'header' => Mage::helper('ffuenf_stockcontrol')->__('Stock Status'),
            'align' =>'left',
            'index' => 'is_in_stock',
            'width' => '100px',
            'type' => 'options',
            'options' => array(1 => Mage::helper('ffuenf_stockcontrol')->__("In Stock"), 0 => Mage::helper('ffuenf_stockcontrol')->__("Out of Stock")),
            'renderer' => 'Ffuenf_StockControl_Block_Adminhtml_Stockcontrol_Grid_Renderer_Instock'
        ));
        $this->addColumn('action', array(
            'header' => Mage::helper('ffuenf_stockcontrol')->__('Action'),
            'width' => '50px',
            'type' => 'action',
            'getter' => 'getId',
            'align' => 'center',
            'actions' => array(
                array(
                    'caption' => Mage::helper('ffuenf_stockcontrol')->__('Edit'),
                    'url' => array(
                        'base'=>'*/catalog_product/edit',
                        'params'=>array('store'=>$this->getRequest()->getParam('store'))
                    ),
                    'field' => 'id'
                )
            ),
            'filter' => false,
            'sortable' => false,
            'index' => 'stores',
        ));
        return parent::_prepareColumns();
    }
    
    /**
     * Grid url getter
     *
     * @return string current grid url
     */
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }
}
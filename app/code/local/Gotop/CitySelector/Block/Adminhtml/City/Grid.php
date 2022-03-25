<?php
/**
 * Created by PhpStorm.
 * User: lucky
 * Date: 24/05/17
 * Time: 13:16
 */
class Gotop_CitySelector_Block_Adminhtml_City_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    public function __construct()
    {
        parent::__construct();
        $this->setId('grid_id');
        // $this->setDefaultSort('COLUMN_ID');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('gotop_cityselector/city')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {

       $this->addColumn('gotop_cityselector_id',
           array(
               'header'=> $this->__('ID'),
               'index' => 'gotop_cityselector_id'
           )
       );
       $this->addColumn('gotop_cityselector_name',
           array(
               'header'=> $this->__('Name'),
               'index' => 'gotop_cityselector_name'
           )
       );
       $this->addColumn('gotop_cityselector_phone_1',
           array(
               'header'=> $this->__('Phone 1'),
               'index' => 'gotop_cityselector_phone_1'
           )
       );
       $this->addColumn('gotop_cityselector_phone_2',
           array(
               'header'=> $this->__('Phone 2'),
               'index' => 'gotop_cityselector_phone_2'
           )
       );
//       $this->addColumn('gotop_cityselector_created_at',
//           array(
//               'header'=> $this->__('Created at'),
//               'index' => 'gotop_cityselector_created_at'
//           )
//       );




                $this->addExportType('*/*/exportCsv', $this->__('CSV'));
        
                $this->addExportType('*/*/exportExcel', $this->__('Excel XML'));
        
        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
       return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

        protected function _prepareMassaction()
    {
        $modelPk = Mage::getModel('gotop_cityselector/city')->getResource()->getIdFieldName();
        $this->setMassactionIdField($modelPk);
        $this->getMassactionBlock()->setFormFieldName('ids');
        // $this->getMassactionBlock()->setUseSelectAll(false);
        $this->getMassactionBlock()->addItem('delete', array(
             'label'=> $this->__('Delete'),
             'url'  => $this->getUrl('*/*/massDelete'),
        ));
        return $this;
    }
    }

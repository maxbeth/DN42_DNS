<?php

class DNS42_ManagedDomain extends Gatuf_Model {
	public $_model = __CLASS__;
	
	function init () {
		$this->_a['table'] = 'managed_domains';
		$this->_a['model'] = __CLASS__;
		$this->primary_key = 'id';
		
		$this->_a['cols'] = array (
			'id' =>
			array (
			       'type' => 'Gatuf_DB_Field_Sequence',
			       'blank' => true,
			),
			'key' =>
			array (
			       'type' => 'Gatuf_DB_Field_Foreignkey',
			       'blank' => false,
			       'model' => 'DNS42_UpdateKey',
			       'relate_name' => 'managed_domains',
			),
			'user' =>
			array (
			       'type' => 'Gatuf_DB_Field_Foreignkey',
			       'blank' => false,
			       'model' => 'Gatuf_User',
			       'relate_name' => 'managed_domains',
			),
			'dominio' =>
			array (
			       'type' => 'Gatuf_DB_Field_Varchar',
			       'blank' => false,
			       'size' => 256,
			       //'unique' => true,
			),
			'delegacion' =>
			array (
			       'type' => 'Gatuf_DB_Field_Integer',
			       'blank' => false,
			       'default' => 0, /* 0 = Delegación en prueba, 1 = Delegación fallida, 2 = Delegación buena */
			),
		);
		
		$this->default_order = 'dominio ASC';
	}
}


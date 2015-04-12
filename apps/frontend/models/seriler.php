<?php
namespace Modules\Frontend\Models;
class seriler extends ModelBase{
	public function initialize(){
		parent::initialize();
		$this->belongsTo('marka_id', 'Modules\Frontend\Models\markalar', 'id', array(
			'alias' 	 => 'markalar',
			'foreignKey' => true
		));
	}
	/**
	 * Girilen markaya ait araç serilerini getirir
	 * @param int $markaId
	 * @return phalcon result
	 */
	public function markayaPermalinkGoreGetir($markaPermalink){
		$marka = markalar::findFirst(array(
				"conditions"=>"permalink = ?1",
				"bind"=>array(
						1=>$markaPermalink
				)	
		));
		return self::find(array(
				"conditions"=>"marka_id=?1",
				"bind" => array(
						1=>$marka->id
				)	
		));
	}
	

}	
?>
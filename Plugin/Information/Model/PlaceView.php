<?php
App::uses('InformationAppModel', 'Information.Model');
/**
 * Place Model
 *
 * @property User $User
 * @property Point $Point
 * @property PlaceType $PlaceType
 * @property Country $Country
 * @property Zone $Zone
 * @property BdDistrict $BdDistrict
 * @property BdThanas $BdThanas
 */
class PlaceView extends InformationAppModel {

	var $name = 'PlaceView';
    var $useTable = 'place_views';
    var $primaryKey = 'id';
    var $useDbConfig = 'default';
}

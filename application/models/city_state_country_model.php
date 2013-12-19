<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class city_state_country_model extends CI_Model {

	public function getCountry() {
		return $this -> db -> get('country') -> result();
	}

	public function getState($countryID) {
		$this -> db -> where('countryID', $countryID);
		return $this -> db -> get('state') -> result();
	}
	
	public function getCity($stateID) {
		$this -> db -> where('stateId', $stateID);
		return $this -> db -> get('city') -> result();
	}
	
}
?>

<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class stud_model extends CI_Model {

	public function getStudDetails() {
		return $this -> db -> query("SELECT `studID`, `studName`, `studEmail`, DATE_FORMAT(studDOB, '%d-%m-%Y') as studDOB, `studPhoneNo`, `studCollegeName`, `studAddress1`, `studAddress2`, `cityName`, `stateName`, `countryName` FROM (`tblstudent`) JOIN `city` ON `city`.`cityId` = `tblstudent`.`studCity` JOIN `state` ON `state`.`stateId` = `city`.`stateId` JOIN `country` ON `state`.`countryID` = `country`.`countryID`") -> result();
	}

	public function getStudDetail($studID) {
		return $this -> db -> query("SELECT `studID`, `studName`, `studEmail`, DATE_FORMAT(studDOB, '%d-%m-%Y') as studDOB, `studPhoneNo`, `studCollegeName`, `studAddress1`, `studAddress2`, `studCity`, `state`.`stateId`, `country`.`countryID` FROM (`tblstudent`) JOIN `city` ON `city`.`cityId` = `tblstudent`.`studCity` JOIN `state` ON `state`.`stateId` = `city`.`stateId` JOIN `country` ON `state`.`countryID` = `country`.`countryID` where `studID`=$studID") -> row();
	}

	public function insertStudDetails($data) {
		if (isset($data)) {
			return $this -> db -> insert('tblstudent', $data);
		}
		return false;
	}

	public function updateStudDetails($data, $studID) {
		if (isset($data)) {
			$this -> db -> where('studID', $studID);
			return $this -> db -> update('tblstudent', $data);
		}
		return false;
	}

}
?>

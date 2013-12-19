<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class controller extends CI_Controller {

	public function index($studID = '') {
		$this -> load -> model('stud_model');
		$this -> load -> model('city_state_country_model');
		if ($studID != '') {
			$this -> data['StudList'] = $this -> stud_model -> getStudDetail($studID);
			echo json_encode($this -> data);
		} else {
			if (isset($_POST['btnsave'])) {
				$studData = array('studName' => $_POST['studname'], 'studEmail' => $_POST['email'], 'studDOB' => date("Y-m-d", strtotime($_POST['dob'])), 'studPhoneNo' => $_POST['phoneno'], 'studCollegeName' => $_POST['collegename'], 'studAddress1' => $_POST['address1'], 'studAddress2' => $_POST['address2'], 'studCity' => $_POST['city']);
				if ($_POST['studid'] != "" ? $this -> stud_model -> updateStudDetails($studData, $_POST['studid']) : $this -> stud_model -> insertStudDetails($studData)) {
					redirect(base_url() . "controller");
				} else {
					$this -> data['error'] = "An Error Occured.";
				}

			}
			$this -> data['StudList'] = $this -> stud_model -> getStudDetails();
			$this -> data['CountryList'] = $this -> city_state_country_model -> getCountry();
			$this -> load -> view('index', $this -> data);
		}
	}

	public function state($countryID = '') {
		$this -> load -> model('city_state_country_model');
		$this -> data['StateList'] = $this -> city_state_country_model -> getState($countryID);
		echo json_encode($this -> data);
	}

	public function city($stateID = '') {
		$this -> load -> model('city_state_country_model');
		$this -> data['CityList'] = $this -> city_state_country_model -> getCity($stateID);
		echo json_encode($this -> data);
	}
	
	public function sqlquery(){
		$this -> load -> view('assign3');
	}

	public function stringsort() {
		if (isset($_POST['btnsave'])) {
			$this -> load -> model('string_function_model');
			$str = $_POST['string'];
			$result = $this -> string_function_model -> strsplit($str);
			$WC = $result[0];
			$wordlist = $result[1];
			for ($i = 0; $i <= $WC; $i++) {
				for ($j = 0; $j <= $WC; $j++) {
					if ($this -> string_function_model -> strlength($wordlist[$i]) == $this -> string_function_model -> strlength($wordlist[$j])) {
						if ($wordlist[$i] < $wordlist[$j]) {
							$temp = $wordlist[$i];
							$wordlist[$i] = $wordlist[$j];
							$wordlist[$j] = $temp;
						}
					} elseif ($this -> string_function_model -> strlength($wordlist[$i]) < $this -> string_function_model -> strlength($wordlist[$j])) {
						$temp = $wordlist[$i];
						$wordlist[$i] = $wordlist[$j];
						$wordlist[$j] = $temp;
					}
				}
			}
			$output='';
			foreach ($wordlist as $key) {
				$output.=$key." ";
			}
			$this -> data['output']=$output; 
		}else{
			$this -> data['output']='';
		}
		$this -> load -> view('assign2',$this -> data);
	}

}

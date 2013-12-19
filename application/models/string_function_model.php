<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *
 */
class string_function_model extends CI_Model {

	public function strlength($string){
		$l = 0;	
		while (isset($string[$l])) {
			$l++;
		}
		return $l;
	}
	
	public function strsplit($str){
		$len=0;	
		$WC= 0;
		$word='';
		$result=array();
		$wordlist=array();
		while (isset($str[$len])) {
			if($str[$len]==" "){
				$wordlist[$WC]=$word;
				$word='';
				$WC++;
			}else{
				$word.=$str[$len];
			}
			$len++;
		}
		$wordlist[$WC]=$word;
		$result[0]=$WC;
		$result[1]=$wordlist;	
		return $result;	
	}		

}
?>

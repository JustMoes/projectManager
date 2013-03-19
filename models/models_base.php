<?PHP

class models_base {
	
	public function __construct(){}
	
	/*
	  * @Author		Nick Smit
	  *	@Version	1.0
	  *	
	  * @param	$uStr	Unindentified object	Input to escape
	*/
	protected function mysql_real_escape($uStr) {
		if(is_array($uStr)) {
			if(count($uStr) > 0) {
				$o = array();
				foreach($uStr as $key => $val) {
					if(is_array($val))
						$o[$key] = $this -> mysql_real_escape($val);
					else
						$o[$key] = @mysql_real_escape_string($val);
				}
				return $this -> flattenArray($o);
			} else
				return @mysql_real_escape_string(implode("", $uStr));
		} else
			return @mysql_real_escape_string($uStr);
	}
	
	/*
	  * @Author		Nick Smit
	  *	@Version	1.0
	  *	
	  * @param	$sInput 	String	String to be hashed
	*/
	protected function _hash($sInput) {
		return crypt($sInput, SEC_HASH_VALUE);
	}
	
	/*
	  * @Author		Nick Smit
	  *	@Version	1.0
	  *	
	  * @param	$aInput		Array	Input array
	  * @param 	$iMaxDepth 	Integer	Max depth to flatten
	  * @param  $iDepth		Integer	Current depth
	*/
	private function flattenArray($aInput, $iMaxDepth = NULL, $iDepth = 0)
	{
		if(!is_array($aInput))
			return $aInput;
	
		$iDepth++;
		$array = array(); 
		foreach($aInput as $key => $value) {
			if(($iDepth <= $iMaxDepth or is_null($iMaxDepth)) && is_array($value)){
				$array = array_merge($array, flattenArray($value, $iMaxDepth, $iDepth));
			} else {
				array_push($array, $value);
			}
		}
		return $array;
	}
	
}

?>
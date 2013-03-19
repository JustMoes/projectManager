<?PHP

/* This class uses an internal database */

class mError {
	
	/* Array with all error messages */
	public $aErrors = array();
	
	/* Integer, Storing auto increment */
	private $iLastID = 0;
	
	/* Using constructor for creating internal database */
	public function __construct() {
		$this -> registerError('wrongTag', 2, 'Er is iets misgegaan tijdens de foutafhandeling');
		
		$this -> registerError('wrongQuery', 2, 'Er is iets misgegaan bij het opvragen van gegevens uit de database');
		$this -> registerError('nullResult', 0, 'Er zijn geen resultaten gevonden voor de zoekopdracht');
	}
	
	/* 
	  * @Author		Nick Smit 
	  * @Version	1.0
	  *
	  * @param	$sTag				String	Quickfind tag of an error
	 */
	public function getError($sTag) {
		$iNr = $this -> getErrorNumberFromTag($sTag);
		
		/* Check if the error exists */
		if($iNr === false) {
			throw new cError('wrongTag');
		}
		
		return $this -> aErrors[$iNr];
	}
	
	/* 
	  * @Author		Nick Smit 
	  * @Version	1.0
	  *
	  * @param	$sTag				String	Quickfind tag of an error
	  * @param 	$iErrorLevel		Integer	The error level(0 = notice, 1 = warning, 2 = fatal)
	  * @param 	$sDisplayMessage	String	The message that will be displayed when the error occurs
	 */
	private function registerError($sTag, $iErrorLevel, $sDisplayMessage) {
		$this -> aErrors[] = array($aTag, $this -> getErrorID($iErrorLevel), $sDisplayMessage);
	}
	
	
	/*
	  * @Author		Nick Smit
	  * @Version	1.0
	  *
	  * @param $iErrorLevel		Integer	The error level(0 = notice, 1 = warning, 2 = fatal)
	*/
	private function getErrorID($iErrorLevel) {
		$sPrefix = $iErrorLevel . 'x' ;
		
		(string)$hex = dechex($this -> iLastID);
		for($i = strlen($hex); $i < 6; $i++) {
			$hex = '0' . $hex;
		}
		$this -> iLastID += 1;
		
		return $sPrefix . $hex;
	}
	
	/* 
	  * @Author		Nick Smit 
	  * @Version	1.0
	  *
	  * @param	$sTag				String	Quickfind tag of an error
	 */
	private function getErrorNumberFromTag($sTag) {
		for($i = 0; $i < count($this -> aErrors); $i++) {
			if($this -> aErrors[$i][0] == $sTag)
				return $i;
		}
		return false;
	}
	
}

?>
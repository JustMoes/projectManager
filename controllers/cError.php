<?PHP

class cError {
	
	/* 
	  * @Author		Nick Smit 
	  * @Version	1.0
	  *
	  * @param	$sTag		String	Quickfind tag of an error
	  * @param	$sDetails	String	Details for debugging purposes
	 */
	public function __construct($sErrorTag, $sDetails = null) {
		
		$this -> import();
		
		$omError = new mError;
		
		$aError = $omError -> getError($sErrorTag);
		
		list($level, $id) = explode('x', $aError[1]);
		if($level > 0) {
			$this -> report($aError, $sDetails);
		}
		
		return array($aError[1], $aError[2]);
	}
	
	/* 
	  * @Author		Nick Smit 
	  * @Version	1.0
	  *
	  * @param	$aError		Array	All error information
	  * @param	$sDetails	String	Details for debugging purposes
	*/
	public function report($aError, $sDetails) {
		$message =  "Hallo " . ERROR_MAIL_NAME . "\n";
		$message .= "\n";
		$message .= "De onderstaande error heeft plaatsgevonden:\n";
		$message .= "Tag: " . $aError[0] . "\n";
		$message .= "ID: " . $aError[1] . "\n";
		$message .= "Details: " . $sDetails . "\n";
		$message .= "\n";
		$message .= "Dit is een automatisch verzonden bericht. Beantwoord deze mail AUB niet.";
		
		$headers  = 'From: '. ERROR_MAIL_FROM . "\r\n" .
    				'Reply-To: '. ERROR_MAIL_FROM . "\r\n" .
    				'X-Mailer: PHP/' . phpversion();
		
		@mail(ERROR_MAIL_TO, 'Er heeft een error plaats gevonden in ' . ERROR_PROJECT_NAME . ' ['.$aError[1].']', $message, $headers);
	}
	
	/* 
	  * @Author		Nick Smit 
	  * @Version	1.0
	*/
	private function import() {
		include_once(MODELS . 'mError.php');
	}
	
}

?>
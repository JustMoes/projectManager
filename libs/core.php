<?PHP

class core {
	
	public function __construct() {}
	
	/*
	  * @Author		Nick Smit
	  *	@Version	1.00
	  *	
	  * @param	$get	String	The $_GET variable, could be manipulated
	*/
	public function getView($get) {
		switch ($get) {
			
			default:
				$this -> runView('login');
			break;
			case 'login' :
				$this -> runView('login');
			break;
			
		}
	}
	
	/*
	  * @Author		Nick Smit
	  *	@Version	1.00
	  *	
	  * @param	$view	String	The view to be runned
	*/
	private function runView($view) {
		switch ($view) {
			case 'login' :
				include_once(VIEWS . 'login.php');
			break;
		}
	}
	
}

?>
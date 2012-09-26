<?php
/**
 * 
 * An abstract class controller. 
 * @author rithychhen
 * @version 2.
 *
 */
abstract class mainController {
	protected $load;
	/**
	 * Constructor an mainController with initial load instance.
	 */
	public function __construct() {
		$this->load = new Load ();
	}
	/** abstract method, will be implemented by subclass */
	abstract public function index();
	
}
?>
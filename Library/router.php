<?php
/**
 * A Router class, route the request to the appropriate controller.
 * @author rithychhen
 * @version 2.
 */
class Router {
	/**
	 * Build path to controller files, and call the appropriate method. 
	 * @param unknown_type $request request object.
	 */
	public static function route(Request $request) {
		$controller = $request->getController () . "Controller";
		$method = $request->getMethod ();
		$argument = $request->getArgument ();
		//build path.
		$filePath = PATH . 'Application/Controller/' . $controller . '.php';
		if (is_readable ( $filePath )) {
			require_once $filePath;
			$controller = new $controller ();
			//if can not the method, just call index.
			if (!is_callable ( array ($controller, $method ) )) {
				$method = 'index';
			}
			if (! empty ( $argument )) { //with argument.
				call_user_func ( array ($controller, $method ), $argument );
			} else { //without argument.
				call_user_func ( array ($controller, $method ) );
			}
			return;
		}
	}
}
?>

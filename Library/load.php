<?php
/**
 * 
 * A load class: allows to load the model and the view. 
 * @author rithychhen
 * @version 2.
 */
class Load
{
	/**
	 * Load the view page.
	 * @param unknown_type $viewName the name of the view. 
	 * @param unknown_type $vars the argument. 
	 */
	public function view($viewName, $vars = null) {
		//build the view path.
		$viewFile = PATH . 'Application/View/' . $viewName. 'View.php';
		//if the view file is readable.
		if (is_readable($viewFile)) {
			if (isset($vars)) {
				//there is an argument. extract it to variable.
				extract($vars);
			}
			//load the view page.
			require ($viewFile);
			return true;
		} else {
			echo "Error loading view page";
		}
	}
	/**
	 * load a model.
	 * @param unknown_type $modelName the name of the model that will be loaded by the controller.
	 */
	public function model($modelName) {
		//build path to model file.
		$modelFile = PATH . 'Application/Model/'. $modelName . 'Model.php';
		//if the model file is readable.
		if (is_readable($modelFile)) {
			require_once ($modelFile);
			$model = $modelName . "Model";
			//create a model instand and return it to the controller.
			$new_model = new $model; 
			return $new_model;
		} else {
			echo "Error loading model page";
		}
	}
}

?>
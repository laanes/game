<?php require_once('../init/init.php');

class Layout {
	
	public static function include_layout_template( $template="" ) {
		
	include(C::$PROJECT_PATH . C::$DS . "layouts" . C::$DS . $template);

	}

}

?>
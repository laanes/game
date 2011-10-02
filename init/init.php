<?php

C::init();

foreach(C::$LIBRARIES as $index => $lib): require_once($lib); endforeach;

require_once( C::$CLASS_PATH . C::$DS . "character.php" );
require_once( C::$CLASS_PATH . C::$DS . "database.php" );
require_once( C::$CLASS_PATH . C::$DS . "layout.php" );

final class C {

	public static $DS = DIRECTORY_SEPARATOR;

	private static $PROJECT_FOLDER = "game";
	public  static $PROJECT_PATH;
	public  static $LIBRARY_PATH;
	public  static $CLASS_PATH;
	public 	static $LIBRARIES;

	public 	static $DBHOST = "localhost";
	public  static $DBNAME = "test";
	public  static $DBUSER = "root";
	public  static $DBPASS = "";

	public static function init() {
			
	self::setPaths();
	self::setIncludeProperties();

	}

	private static function setPaths() {
	
	/* Proect path */
	self::$PROJECT_PATH = "C:".self::$DS."wamp".self::$DS."www".self::$DS.self::$PROJECT_FOLDER;

	/* Includes path */
	self::$LIBRARY_PATH = self::$PROJECT_PATH . self::$DS . "includes";
	self::$CLASS_PATH = self::$PROJECT_PATH . self::$DS . "classes";



	}

	private static function setIncludeProperties( ) {

	$libs = scandir( self::$LIBRARY_PATH );
		
	foreach( $libs as $index => $lib ) {
		
	if( preg_match( "#p$#", $lib ) ) {
		
	$validLibs[] = self::$LIBRARY_PATH . self::$DS . $lib; 

	}

	}

	self::$LIBRARIES = $validLibs;

	}

}

?>
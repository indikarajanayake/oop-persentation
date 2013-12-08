<?php
/**
 * Create a single instance of the class.
 * If instance already initiated return the exsisting instance or create 
 * a new instance.
 * 
 * Can use for the senarios which single instance need like Db Connections 
 * 
 */
class DbSingletonPattern 
{
	//create a private property for instance
	private static $dbclass;
	private $id = 0;
	/**
	 *A empty private constructor to prevent initate objects using
	 * new method 
	 */
	 private function __construct()
	 {
		 //add a variable to tack the instance created
		$this->id ++;
	 }
	
	/**
	 * Static public method to initiate and return the instance of the 
	 * class
	 * 
	 */ 
	 public static function getInstance()
	 {
		 if (!self::$dbclass) {			
			 self::$dbclass = new DbSingletonPattern();
		 }
		  
		 return self::$dbclass;
	 }
	 
	 /**
	  * create a public method to make a connection
	  * 
	  */ 
	 public function connect(){
		 
	 }
	 
	 public function getId(){
		 return $this->id;
	 }
	 	 
	//create the other methods to perform db actions
	
}


//crate a instances 
$database = DbSingletonPattern::getInstance();
$database2 = DbSingletonPattern::getInstance();
$database3 = DbSingletonPattern::getInstance();

//try to create a instance using new keyword. Should give fatal error
//$database4 = new DbSingletonPattern();


var_dump("db 1 id ".$database->getId());
var_dump("db 2 id ".$database2->getId());
var_dump("db 3 id ".$database3->getId());

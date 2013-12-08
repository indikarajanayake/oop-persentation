<?php

/**
 * Call for demonstrate Commnand pattern.
 * Encapsulate the all the methods to excecute the action in another 
 * object
 * 
 */ 
class StockCommandPattern 
{
	private $price;
	private $qty;
	
	
	function __construct( $price, $qty )
	{
		$this->price 	= $price;
		$this->qty		= $qty;		
	}
	
	
	//Encapulate the action to perform sell 
	function sellAction()
	{
		var_dump("Sell Action Call");
		
	}
	//Encapsulate the action to perform buy
	function buyAction(){
		var_dump("Buy Action Call");
	}
	
}

//create a abstact class for buy and sell commands

abstract class StockCommand{
	
	protected $stock;
	
	function __construct( $stock)
	{
		$this->stock = $stock;
	}
	
	//create a abstract function to excecute the action
	abstract function execute();
	
}


// class for perform buy action
class StockBuyCommand extends StockCommand
{
	public function execute()
	{
		$this->stock->buyAction();
	}
}

// class for perform sell action
class StockSellCommand extends StockCommand
{
	public function execute()
	{
		$this->stock->sellAction();
	}
}

//creat a stock
$stock = new StockCommandPattern( 12.30, 1000);
//create a buy action
$buyCommand 	= new StockBuyCommand($stock);
//crate a sell action
$sellCommand	= new StockSellCommand($stock);

// based on the condition call the appropiate action 
$buyCommand->execute();  // call for buy action
$sellCommand->execute(); // call for sell action



?>

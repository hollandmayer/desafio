<?php

class ConnectionFactory{
	
	public static function getConnectionFatory(){
		try{
			$con = new PDO("mysql:host=localhost;dbname=desafio","root","");
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $con;	
		}catch(PDOException $e){
			echo $e->getMessage();	
		}				
	}
	
}	

?>


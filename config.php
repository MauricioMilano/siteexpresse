<?php 
	function conecta_bd(){
        global $db;
		
		try {
			$db = new PDO('sqlite:/home/expresse/public_html/db/expresse.db');
	                        
	        if ($db){
				return $db;
			}
	        else {
	        	die('Nao foi possivel conectar.');
	        }
		} catch (PDOexception $e) 
		{ 
			echo "PDO Exception: " . $e-> etmessage(); 
		}
		
	}
?>
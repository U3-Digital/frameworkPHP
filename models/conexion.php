<?php

class Conexion{

	public static function conectar(){

		//		 $link = new PDO("mysql:host=dineralia.net;dbname=dineralia","admin","Fy$8r@soR4cy");
		 $link = new PDO("mysql:host=dineraliahm.com;dbname=dinerali_sistema","dinerali_admin",";]oX3Gi7Ld7Fj1");
		//$link = new PDO("mysql:host=localhost;dbname=sistema","root","123456");
	


		return $link;

	}

}

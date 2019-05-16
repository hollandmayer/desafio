<?php

class Localizador{
	
	private $ip;
	private $apiKey;
	private $lang;
	private $fields;
	private $excludes;
	
	//Pega o IP do usuário
	public function __construct() {
		
		if (isset($_SERVER["HTTP_CLIENT_IP"]))
			$this->ip = $_SERVER["HTTP_CLIENT_IP"];
		else if(isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
			$this->ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		else if(isset($_SERVER["HTTP_X_FORWARDED"]))
			$this->ip = $_SERVER["HTTP_X_FORWARDED"];
		else if(isset($_SERVER["HTTP_FORWARDED_FOR"]))
			$this->ip = $_SERVER["HTTP_FORWARDED_FOR"];
		else if(isset($_SERVER["HTTP_FORWARDED"]))
			$this->ip = $_SERVER["HTTP_FORWARDED"];
		else if(isset($_SERVER["REMOTE_ADDR"]))
			$this->ip = $_SERVER["REMOTE_ADDR"];
		else
			$this->ip = "UNKNOWN";					
	}
	
	//Seta os parâmetros que serão repassados ao geolocalizador
	public function setConfiguracao($apiKey, $lang, $fields, $excludes){
		$this->apiKey = $apiKey;
		$this->lang = $lang;
		$this->fields = $fields;
		$this->excludes = $excludes;		
	}	
	
	//Retorna os dados relacionados com a localização obtida.
	public function getGeolocalizacao() {
                
        $url = "https://api.ipgeolocation.io/ipgeo?apiKey=".$this->apiKey."&ip=".$this->ip."&lang=".$this->lang."&fields=".$this->fields."&excludes=".$this->excludes;
        $cURL = curl_init();

        curl_setopt($cURL, CURLOPT_URL, $url);
        curl_setopt($cURL, CURLOPT_HTTPGET, true);
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURL, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Accept: application/json"));
        return curl_exec($cURL);
    }
	
}

?>

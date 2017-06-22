<?php

/**
 * Controller por defecto si no se usa el routes
 * 
 */
 
class IndexController extends AppController
{	


    public function index()
    {
		/*aqui ya entramos con un omolds validando al usuario*/
    	$tokenUsu = obtenerToken();
	    //printVar($tokenUsu,'token'); 
	      
	    /*validamos los datos del usuario segun su token*/
		/*los datos son retornados en json por eso el json_decode para decoficicar los datos*/
	    $dataToken = json_decode(sendGetToken($tokenUsu));
		$this->dataUsu =  $dataToken->data_usu_nivel_1;
		
		$this->active = 'Clientes';
    } 
   
    public function instructores()
    {
		/*aqui ya entramos con un omolds validando al usuario*/
    	$tokenUsu = obtenerToken();
	    //printVar($tokenUsu,'token'); 
	      
	    /*validamos los datos del usuario segun su token*/
		/*los datos son retornados en json por eso el json_decode para decoficicar los datos*/
	    $dataToken = json_decode(sendGetToken($tokenUsu));
		$this->dataUsu =  $dataToken->data_usu_nivel_1;
		$this->active = 'Instructores';
    } 
	
	 public function promociones()
    {
		/*aqui ya entramos con un omolds validando al usuario*/
    	$tokenUsu = obtenerToken();
	    //printVar($tokenUsu,'token'); 
	      
	    /*validamos los datos del usuario segun su token*/
		/*los datos son retornados en json por eso el json_decode para decoficicar los datos*/
	    $dataToken = json_decode(sendGetToken($tokenUsu));
		$this->dataUsu =  $dataToken->data_usu_nivel_1;
		$this->active = 'Promociones';
    } 
	
	 public function gastos()
    {
		/*aqui ya entramos con un omolds validando al usuario*/
    	$tokenUsu = obtenerToken();
	    //printVar($tokenUsu,'token'); 
	      
	    /*validamos los datos del usuario segun su token*/
		/*los datos son retornados en json por eso el json_decode para decoficicar los datos*/
	    $dataToken = json_decode(sendGetToken($tokenUsu));
		$this->dataUsu =  $dataToken->data_usu_nivel_1;
		$this->active = 'Gastos';
    } 
	
	 public function rutinas()
    {
		/*aqui ya entramos con un omolds validando al usuario*/
    	$tokenUsu = obtenerToken();
	    //printVar($tokenUsu,'token'); 
	      
	    /*validamos los datos del usuario segun su token*/
		/*los datos son retornados en json por eso el json_decode para decoficicar los datos*/
	    $dataToken = json_decode(sendGetToken($tokenUsu));
		$this->dataUsu =  $dataToken->data_usu_nivel_1;
		$this->active = 'Rutinas';
    } 
	
	 public function reportes($anio = 0, $mes = 0)
    {
		date_default_timezone_set('America/Bogota');
		setlocale(LC_MONETARY,"es_ES");
		if($mes == 0){
			$mes = date("m");
			$filtroMes = false;
		}else{
			$filtroMes = true;
		}
		
		if($anio == 0){
			$anio = date("Y");
		}
		
		/*aqui ya entramos con un omolds validando al usuario*/
    	$tokenUsu = obtenerToken();
	    //printVar($tokenUsu,'token'); 
	      
	    /*validamos los datos del usuario segun su token*/
		/*los datos son retornados en json por eso el json_decode para decoficicar los datos*/
	    $dataToken = json_decode(sendGetToken($tokenUsu));
		$this->dataUsu =  $dataToken->data_usu_nivel_1;
		$this->active = 'Reportes';
		$this->anio = $anio;
		$this->mes = $mes;
    } 
	
	 public function buzon()
    {
		/*aqui ya entramos con un omolds validando al usuario*/
    	$tokenUsu = obtenerToken();
	    //printVar($tokenUsu,'token'); 
	      
	    /*validamos los datos del usuario segun su token*/
		/*los datos son retornados en json por eso el json_decode para decoficicar los datos*/
	    $dataToken = json_decode(sendGetToken($tokenUsu));
		$this->dataUsu =  $dataToken->data_usu_nivel_1;
		$this->active = 'Buzon';
    } 

}
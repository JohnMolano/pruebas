<?php

/**
 * Controller por defecto si no se usa el routes
 * 
 */
 
class PublicoController extends AppController
{	


    public function index()
    {
    		Redirect::to("/");
    		exit;
 
    }
    
 
	
	
	
	 public function agregarAlBuzon()
    {
    	
			if(isset($_POST['mensaje']) ){
				
				$tokenUsu = obtenerToken();
				$dataToken = json_decode(sendGetToken($tokenUsu));
				
				if($dataToken->idres == 0){
					$mensajes = new Mod49GymBuzon();
					$mensajes->mensaje = ($_POST['mensaje']);
					if($mensajes->save()){
						$this->tipoMsm = 'success';
						$this->mensaje .= 'Ok El mensaje fue enviado al buzón <script> location.reload(); </script>';
					}else{
						$this->tipoMsm = 'danger';
						$this->mensaje = '<strong>Error</strong> al guardar el mensaje en el buzón';
					} 
				}
				
			}
		
    	 
    }
	
	 public function guardaAlBuzon()
    {
    	
			if(isset($_POST['mensaje']) ){
				
				$tokenUsu = obtenerToken();
				$dataToken = json_decode(sendGetToken($tokenUsu));
				
				if($dataToken->idres == 0){
					$mensajes = new Mod49GymBuzon();
					$mensajes->mensaje = ($_POST['mensaje']);
					if($mensajes->save()){
						$this->tipoMsm = 'success';
						$this->mensaje .= 'Ok El mensaje fue enviado al buzón <script> window.top.actualizarIframe(); </script>';
					}else{
						$this->tipoMsm = 'danger';
						$this->mensaje = '<strong>Error</strong> al guardar el mensaje en el buzón';
					} 
				}
				
			}
		
    	 
    }
	
	
		


   
    
    
    
   

}
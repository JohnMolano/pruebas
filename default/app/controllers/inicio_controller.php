<?php

/**
 * Controller por defecto si no se usa el routes
 * 
 */
 
class InicioController extends AppController
{	

	public function registraUsuarioOmolds($idUsuario = 0, $claveAcceso  = Null)
    {
   
    	if($idUsuario != 0){
					/*como el usuario no existia lo creamos en nuestra base*/
    				$RegistromDataUsu = new Mod48StockomProducto();
    				$validaUser  = $RegistromDataUsu->find_first("idUsuario = '".$idUsuario."'");
    				$RegistromDataUsu = new Mod48StockomProducto();
					$RegistromDataUsu->idUsuario = $idUsuario;
    				if(isset($validaUser->idUsuario)){
						/*aqui lo enviamos de nuevo al index de registrom*/
					return Redirect::to("inicio/index/");		
					}else{
						$RegistromDataUsu->idUsuario = $idUsuario;
    					if($RegistromDataUsu->save()){
							return Redirect::to("inicio/index/");	
						}	
					}
				
    				
    		
    	}else{
    		return Redirect::to("login");	
    	}
    }	


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
	
	
	public function listadoClientes()
    {
		/*aqui ya entramos con un omolds validando al usuario*/
    	$tokenUsu = obtenerToken();
	    //printVar($tokenUsu,'token'); 
	      
	    /*validamos los datos del usuario segun su token*/
		/*los datos son retornados en json por eso el json_decode para decoficicar los datos*/
	    $dataToken = json_decode(sendGetToken($tokenUsu));
	    //printVar($dataToken);exit;
	    if($dataToken->idres == 0){
			$clientes = new Mod49GymCliente();
			$this->clientes  = $clientes->find();	
			
			$promociones = new Mod49GymPromociones();
			$this->promociones  = $promociones->find("activo = 'S' ");	
			
			$rutinas = new Mod49GymRutinas();
			$this->rutinas  = $rutinas->find("activa = 'S' ");
			
		}
	}
	
	
    public function guardacliente()
    {

    	if(isset($_POST['nombre']) && !empty($_POST['email'])){
		
    		$cliente = new Mod49GymCliente();
			$cliente->email = ($_POST['email']);
			$cliente->nombre = ($_POST['nombre']);
			$cliente->cedula = ($_POST['cedula']);
			$cliente->telefono = ($_POST['telefono']);
			$cliente->celular = ($_POST['celular']);
			$cliente->fechaNacimiento = ($_POST['fechaNacimiento']);
			$cliente->anos = edad($_POST['fechaNacimiento']);
			$cliente->pesoActual = ($_POST['pesoActual']);
			$cliente->estaturaActual = ($_POST['estaturaActual']);
			$cliente->responsable = ($_POST['responsable']);
			$cliente->celResponsable = ($_POST['celResponsable']);
			$cliente->parentesco = ($_POST['parentesco']);
			$cliente->activo = 'Activo';
			
			if($cliente->save()){
				$this->tipoMsm = 'success';
				$this->mensaje .= 'Ok cliente guardado <script> window.top.actualizarIframe(); </script>';
			}else{
				$this->tipoMsm = 'danger';
				$this->mensaje = '<strong>Error</strong> al guardar el cliente';
			} 
		    	
    	
    	}
    	 
    }
	
	 public function FotoCliente()
    {
		header("Access-Control-Allow-Origin: *");
		header('Content-Type: application/json');
		$this->template=NULL;
		$return = new stdClass();
		putenv('TZ=America/Bogota');	

    	if(isset($_POST['idUsuario']) && !empty($_POST['foto'])){
		
    		$cliente = new Mod49GymCliente();
			
			$validUsu = $cliente->find_first("conditions: id = '".$_REQUEST["idUsuario"]."'",true);
			if(isset($validUsu->id)){
				$cliente = new Mod49GymCliente();
				$cliente->id = $validUsu->id;
				$cliente->foto = ($_POST['foto']);
				if($cliente->update()){
					$return->idError = '0';
					$return->descripcion .= 'Ok cliente guardado <script> window.top.actualizarIframe(); </script>';
				}else{
					$return->idError = '1';
					$return->descripcion = 'Error al guardar la foto del cliente';
				} 
			}else{
				$return->idError = 8;
				$return->descripcion = 'Cliente no existe';	
			}
    	}else{
			$return->idError = 9;
			$return->descripcion = 'Datos Incompletos';
		}
		
		die(json_encode($return));
		exit;
    	
    }

	
	
	public function editarCliente()
    {

    	if(isset($_POST['nombre']) && !empty($_POST['email'])){
			$tokenUsu = obtenerToken();
			$dataToken = json_decode(sendGetToken($tokenUsu));
			$cliente = new Mod49GymCliente();
			$validarCliente  = $cliente->find_first("id = '".$_POST['idUsuario']."'");	
			if(!empty($validarCliente->id)){
				$cliente = new Mod49GymCliente();
				$cliente->id = $validarCliente->id;
				$cliente->email = ($_POST['email']);
				$cliente->nombre = ($_POST['nombre']);
				$cliente->cedula = ($_POST['cedula']);
				$cliente->telefono = ($_POST['telefono']);
				$cliente->celular = ($_POST['celular']);
				$cliente->fechaNacimiento = ($_POST['fechaNacimiento']);
				$cliente->anos = edad($_POST['fechaNacimiento']);
				$cliente->pesoActual = ($_POST['pesoActual']);
				$cliente->estaturaActual = ($_POST['estaturaActual']);
				$cliente->responsable = ($_POST['responsable']);
				$cliente->celResponsable = ($_POST['celResponsable']);
				$cliente->parentesco = ($_POST['parentesco']);
				//$cliente->activo = 'Activo';
				if($cliente->update()){
					$this->tipoMsm = 'success';
					$this->mensaje .= 'Ok el cliente fue actualizado <script> window.top.actualizarIframe(); </script>';
				}else{
					$this->tipoMsm = 'danger';
					$this->mensaje = '<strong>Error</strong> al actualizado el cliente';
				} 
			}else{
				$this->tipoMsm = 'danger';
				$this->mensaje = '<strong>Error</strong> el cliente no existe';
			}
		    	
    	
    	}
    	 
    }
	
	public function eliminaCliente()
    {
    	
		$cliente = new Mod49GymCliente();
		$validaCliente  = $cliente->find_first("id = '".$_POST['idCampo']."'");

		if(isset($validaCliente->id)){
			if($cliente->delete($validaCliente->id)){
				$this->tipoMsm = 'success';
				$this->mensaje = '<strong>Ok</strong> el cliente fue eliminado <script> window.top.actualizarIframe(); </script>';
			}else{
				$this->tipoMsm = 'danger';
				$this->mensaje = '<strong>Error</strong> al eliminar el cliente';
			}
		}	
    	
   }
   
   public function guardaPromocionCliente()
    {

    	if(isset($_POST['idPromocion']) && !empty($_POST['idCampo'])){
			
			$cliente = new Mod49GymCliente();
			$validaCliente  = $cliente->find_first("id = '".$_POST['idCampo']."'");

			if(isset($validaCliente->id)){
				$Promociones = new Mod49GymPromociones(); 
				$validaPromo  = $Promociones->find_first("id = '".$_POST['idPromocion']."'");
				if(isset($validaPromo->id)){
					if(isset($_POST['idPromocionAct'])){
						$PromocionesUsuarioAct = new Mod49GymPromocionesUsuario(); 
						$PromocionesUsuarioAct->id = $_POST['idPromocionAct'];
						$PromocionesUsuarioAct->activo = 'N';
						$update = $PromocionesUsuarioAct->update();
						$cliente = new Mod49GymCliente();
						$cliente->id = $validaCliente->id;
						$cliente->colorLista = '';
						$cliente->update();
					}else{
						$update = true;
					}
					if($update){
						$PromocionesUsuario = new Mod49GymPromocionesUsuario(); 
						$PromocionesUsuario->idPromocion = $_POST['idPromocion'];
						$PromocionesUsuario->idUsuario = $_POST['idCampo'];
						$PromocionesUsuario->fechaInicio = fechaActual(1);
						$PromocionesUsuario->fechaFin = sumarDias(fechaActual(1), $validaPromo->diasDuracion);
						$PromocionesUsuario->pago = $validaPromo->precio;
						$PromocionesUsuario->activo = 'S';
						if($PromocionesUsuario->save()){
							$this->tipoMsm = 'success';
							$this->mensaje .= 'Ok promoción guardada al cliente <script> window.top.actualizarIframe(); </script>';
						}else{
							$this->tipoMsm = 'danger';
							$this->mensaje = '<strong>Error</strong> al guardar la promoción del cliente';
						} 
					}else{
						$this->tipoMsm = 'danger';
						$this->mensaje = '<strong>Error</strong> al generar nueva promoción al cliente';
					}
					
				}else{
					$this->tipoMsm = 'danger';
					$this->mensaje = '<strong>Error</strong> la promocion no existe';
				}	
			}else{
				$this->tipoMsm = 'danger';
				$this->mensaje = '<strong>Error</strong> el cliente no existe';
			}	
    	
    	}
    	 
    }
   
   
   public function guardaRutinaCliente()
    {
    	
		$cliente = new Mod49GymCliente();
		
		$validaCliente  = $cliente->find_first("id = '".$_POST['idCampo']."'");

		if(isset($_POST['idRutina']) && !empty($_POST['idCampo'])){
			if(isset($validaCliente->id)){
					
					$rutinas = new Mod49GymRutinas();
					$validaRutina  = $rutinas->find_first("id = '".$_POST['idRutina']."'");
					if(isset($validaRutina->id)){
						
						$clienteRutinasValida = new Mod49GymRutinasUsuario();
						$validaRutinaCliente  = $clienteRutinasValida->find_first("idUsuario = '".$_POST['idCampo']."'");
						
						$clienteRutinas = new Mod49GymRutinasUsuario();
						$clienteRutinas->idRutina = $validaRutina->id;
						$clienteRutinas->idUsuario = $_POST['idCampo'];
						$clienteRutinas->queTrabaja = $validaRutina->queTrabaja;
						$clienteRutinas->repeticiones = $validaRutina->repeticiones;
						$clienteRutinas->cantidadPorRepeticion = $validaRutina->cantidadPorRepeticion;
						$clienteRutinas->diasQueTrabaja = 'Todos';
						$clienteRutinas->fechaInicio = $_POST['fechaInicio'];
						$clienteRutinas->fechaFin = $_POST['fechaFin'];
						$clienteRutinas->activa = 'S';
						
						if(isset($validaRutinaCliente->id)){
							$clienteRutinas->id = $validaRutinaCliente->id;
							if($clienteRutinas->update()){
								$this->tipoMsm = 'success';
								$this->mensaje .= 'Ok rutino actualizada al cliente <script> window.top.actualizarIframe(); </script>';
							}else{
								$this->tipoMsm = 'danger';
								$this->mensaje = '<strong>Error</strong> al actualizar la rutina del cliente';
							} 
						}else{
							if($clienteRutinas->save()){
								$this->tipoMsm = 'success';
								$this->mensaje .= 'Ok rutina guardada al cliente <script> window.top.actualizarIframe(); </script>';
							}else{
								$this->tipoMsm = 'danger';
								$this->mensaje = '<strong>Error</strong> al guardar la rutina del cliente';
							} 
						}
					
						
					}else{
						$this->tipoMsm = 'danger';
						$this->mensaje = '<strong>Error</strong> la rutino no existe';
					}

			}else{
				$this->tipoMsm = 'danger';
				$this->mensaje = '<strong>Error</strong> el cliente no existe';
			}
		}
    	
   }
   
   public function listadoIntructores()
    {
		/*aqui ya entramos con un omolds validando al usuario*/
    	$tokenUsu = obtenerToken();
	    //printVar($tokenUsu,'token'); 
	      
	    /*validamos los datos del usuario segun su token*/
		/*los datos son retornados en json por eso el json_decode para decoficicar los datos*/
	    $dataToken = json_decode(sendGetToken($tokenUsu));
	    //printVar($dataToken);exit;
	    if($dataToken->idres == 0){
			$instructores = new Mod49GymInstructores();
			$this->instructores  = $instructores->find("activo = 'S'");	
			
		}
	}
	
	
   public function guardaInstructor()
    {

    	if(isset($_POST['nombre']) && !empty($_POST['email'])){
		
    		$instructores = new Mod49GymInstructores();
			$instructores->email = ($_POST['email']);
			$instructores->nombre = ($_POST['nombre']);
			$instructores->celular = ($_POST['celular']);
			$instructores->tipo = ($_POST['tipo']);
			$instructores->clave = ($_POST['clave']);
			$instructores->activo = 'S';
			
			if($instructores->save()){
				$this->tipoMsm = 'success';
				$this->mensaje .= 'Ok instructor guardado <script> window.top.actualizarIframe(); </script>';
			}else{
				$this->tipoMsm = 'danger';
				$this->mensaje = '<strong>Error</strong> al guardar el instructor';
			} 
		    	
    	
    	}
    	 
    }
	
	public function editarInstructor()
    {

    	if(isset($_POST['nombre']) && !empty($_POST['email'])){
			$tokenUsu = obtenerToken();
			$dataToken = json_decode(sendGetToken($tokenUsu));
			$instructor = new Mod49GymInstructores();
			$validarInstructor  = $instructor->find_first("id = '".$_POST['idUsuario']."'");	
			if(!empty($validarInstructor->id)){
				$instructor = new Mod49GymInstructores();
				$instructor->id = $validarInstructor->id;
				$instructor->email = ($_POST['email']);
				$instructor->nombre = ($_POST['nombre']);
				$instructor->celular = ($_POST['celular']);
				$instructor->tipo = ($_POST['tipo']);
				$instructor->clave = ($_POST['clave']);
				$instructor->activo = 'S';
				if($instructor->update()){
					$this->tipoMsm = 'success';
					$this->mensaje .= 'Ok el instructor fue actualizado <script> window.top.actualizarIframe(); </script>';
				}else{
					$this->tipoMsm = 'danger';
					$this->mensaje = '<strong>Error</strong> al actualizado el instructor';
				} 
			}else{
				$this->tipoMsm = 'danger';
				$this->mensaje = '<strong>Error</strong> el instructor no existe';
			}
		    	
    	
    	}
    	 
    }
	
	public function eliminaInstructor()
    {
    	
		$instructor = new Mod49GymInstructores();
		$validarInstructor  = $instructor->find_first("id = '".$_POST['idCampo']."'");

		if(isset($validarInstructor->id)){
			if($instructor->delete($validarInstructor->id)){
				$this->tipoMsm = 'success';
				$this->mensaje = '<strong>Ok</strong> el instructor fue eliminado <script> window.top.actualizarIframe(); </script>';
			}else{
				$this->tipoMsm = 'danger';
				$this->mensaje = '<strong>Error</strong> al eliminar el instructor';
			}
		}	
    	
   }
	
	public function listadoPromociones()
    {
		setlocale(LC_MONETARY,"es_ES");
		/*aqui ya entramos con un omolds validando al usuario*/
    	$tokenUsu = obtenerToken();
	    //printVar($tokenUsu,'token'); 
	      
	    /*validamos los datos del usuario segun su token*/
		/*los datos son retornados en json por eso el json_decode para decoficicar los datos*/
	    $dataToken = json_decode(sendGetToken($tokenUsu));
	    //printVar($dataToken);exit;
	    if($dataToken->idres == 0){
			$promociones = new Mod49GymPromociones();
			$this->promociones  = $promociones->find();	
			
		}
	}
	
	 public function guardaPromocion()
    {

    	if(isset($_POST['nombre']) && !empty($_POST['precio'])){
		
    		$promociones = new Mod49GymPromociones();
			$promociones->precio = ($_POST['precio']);
			$promociones->nombre = ($_POST['nombre']);
			$promociones->diasDuracion = ($_POST['diasDuracion']);
			$promociones->activo = 'S';
			
			if($promociones->save()){
				$this->tipoMsm = 'success';
				$this->mensaje .= 'Ok promoción guardada <script> window.top.actualizarIframe(); </script>';
			}else{
				$this->tipoMsm = 'danger';
				$this->mensaje = '<strong>Error</strong> al guardar la promoción';
			} 
		    	
    	
    	}
    	 
    }
	
	public function editarPromocion()
    {

    	if(isset($_POST['nombre']) && !empty($_POST['precio'])){
			$tokenUsu = obtenerToken();
			$dataToken = json_decode(sendGetToken($tokenUsu));
			$promocion = new Mod49GymPromociones();
			$validarPromocion  = $promocion->find_first("id = '".$_POST['idPromocion']."'");	
			if(!empty($validarPromocion->id)){
				$promociones = new Mod49GymPromociones();
				$promociones->id = $validarPromocion->id;
				$promociones->precio = ($_POST['precio']);
				$promociones->nombre = ($_POST['nombre']);
				$promociones->diasDuracion = ($_POST['diasDuracion']);
				$promociones->activo = 'S';
			
				if($promociones->update()){
					$this->tipoMsm = 'success';
					$this->mensaje .= 'Ok la promoción fue actualizado <script> window.top.actualizarIframe(); </script>';
				}else{
					$this->tipoMsm = 'danger';
					$this->mensaje = '<strong>Error</strong> al actualizado la promoción';
				} 
			}else{
				$this->tipoMsm = 'danger';
				$this->mensaje = '<strong>Error</strong> la promoción no existe';
			}
		    	
    	
    	}
    	 
    }
	
	public function eliminaPromocion()
    {
    	
		$promocion = new Mod49GymPromociones();
		$validarPromocion  = $promocion->find_first("id = '".$_POST['idCampo']."'");

		if(isset($validarPromocion->id)){
			if($promocion->delete($validarPromocion->id)){
				$this->tipoMsm = 'success';
				$this->mensaje = '<strong>Ok</strong>  la promoción fue eliminado <script> window.top.actualizarIframe(); </script>';
			}else{
				$this->tipoMsm = 'danger';
				$this->mensaje = '<strong>Error</strong> al eliminar la promoción';
			}
		}	
    	
   }
   
   public function listadoGastos($anio = 0, $mes = 0)
    {
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
	    //printVar($dataToken);exit;
	    if($dataToken->idres == 0){
			$gastos = new Mod49GymGastos();
			$this->anioActual = date("Y");
			$this->anio = $anio;
			$this->mes = $mes;
			if($filtroMes){
				$this->gastos  = $gastos->find(" MONTH(fechaGasto) = '".$mes."' AND YEAR(fechaGasto) = '".$anio."' ");	
			}else{
				$this->gastos  = $gastos->find("  YEAR(fechaGasto) = '".$anio."' ");	
				$this->mes = 0;
			}
			
			
		}
	}
	
	
	public function guardaGasto()
    {

    	if(isset($_POST['motivo']) && !empty($_POST['precio'])){
		
    		$gastos = new Mod49GymGastos();
			$gastos->precio = ($_POST['precio']);
			$gastos->motivo = ($_POST['motivo']);
			$gastos->fechaGasto = ($_POST['fechaGasto']);
			
			if($gastos->save()){
				$this->tipoMsm = 'success';
				$this->mensaje .= 'Ok gasto guardado <script> window.top.actualizarIframe(); </script>';
			}else{
				$this->tipoMsm = 'danger';
				$this->mensaje = '<strong>Error</strong> al guardar el gasto';
			} 
		    	
    	
    	}
    	 
    }
	
	public function editarGasto()
    {

    	if(isset($_POST['motivo']) && !empty($_POST['precio'])){
			$tokenUsu = obtenerToken();
			$dataToken = json_decode(sendGetToken($tokenUsu));
			$gastos = new Mod49GymGastos();
			$validarGasto  = $gastos->find_first("id = '".$_POST['idGasto']."'");	
			if(!empty($validarGasto->id)){
				$gastos = new Mod49GymGastos();
				$gastos->id = $validarGasto->id;
				$gastos->precio = ($_POST['precio']);
				$gastos->motivo = ($_POST['motivo']);
				$gastos->fechaGasto = ($_POST['fechaGasto']);
			
				if($gastos->update()){
					$this->tipoMsm = 'success';
					$this->mensaje .= 'Ok el gasto fue actualizado <script> window.top.actualizarIframe(); </script>';
				}else{
					$this->tipoMsm = 'danger';
					$this->mensaje = '<strong>Error</strong> al actualizado el gasto';
				} 
			}else{
				$this->tipoMsm = 'danger';
				$this->mensaje = '<strong>Error</strong> el gasto no existe';
			}
		    	
    	
    	}
    	 
    }
	
	public function eliminaGasto()
    {
    	
		$gasto = new Mod49GymGastos();
		$validarGasto  = $gasto->find_first("id = '".$_POST['idCampo']."'");

		if(isset($validarGasto->id)){
			if($gasto->delete($validarGasto->id)){
				$this->tipoMsm = 'success';
				$this->mensaje = '<strong>Ok</strong>  el gasto fue eliminado <script> window.top.actualizarIframe(); </script>';
			}else{
				$this->tipoMsm = 'danger';
				$this->mensaje = '<strong>Error</strong> al eliminar el gasto';
			}
		}	
    	
   }

   
   public function listadoRutinas()
    {
		setlocale(LC_MONETARY,"es_ES");
		/*aqui ya entramos con un omolds validando al usuario*/
    	$tokenUsu = obtenerToken();
	    //printVar($tokenUsu,'token'); 
	      
	    /*validamos los datos del usuario segun su token*/
		/*los datos son retornados en json por eso el json_decode para decoficicar los datos*/
	    $dataToken = json_decode(sendGetToken($tokenUsu));
	    //printVar($dataToken);exit;
	    if($dataToken->idres == 0){
			$rutinas = new Mod49GymRutinas();
			$this->rutinas  = $rutinas->find();	
			
			
		}
	}
	
	public function guardaRutina()
    {

    	if(isset($_POST['nombre']) && !empty($_POST['repeticiones'])){
		
    		$rutinas = new Mod49GymRutinas();
			$rutinas->nombre = ($_POST['nombre']);
			$rutinas->queTrabaja = ($_POST['queTrabaja']);
			$rutinas->repeticiones = ($_POST['repeticiones']);
			$rutinas->cantidadPorRepeticion = ($_POST['cantidadPorRepeticion']);
			$rutinas->activa = 'S';
			
			if($rutinas->save()){
				$this->tipoMsm = 'success';
				$this->mensaje .= 'Ok rutina guardada <script> window.top.actualizarIframe(); </script>';
			}else{
				$this->tipoMsm = 'danger';
				$this->mensaje = '<strong>Error</strong> al guardar la rutina';
			} 
		    	
    	
    	}
    	 
    }
	
	public function editarRutina()
    {

    	if(isset($_POST['nombre']) && !empty($_POST['repeticiones'])){
			$tokenUsu = obtenerToken();
			$dataToken = json_decode(sendGetToken($tokenUsu));
			$rutinas = new Mod49GymRutinas();
			$validarRutinas  = $rutinas->find_first("id = '".$_POST['idRutina']."'");	
			if(!empty($validarRutinas->id)){
				$rutinas = new Mod49GymRutinas();
				$rutinas->id = $validarRutinas->id;
				$rutinas->nombre = ($_POST['nombre']);
				$rutinas->queTrabaja = ($_POST['queTrabaja']);
				$rutinas->repeticiones = ($_POST['repeticiones']);
				$rutinas->cantidadPorRepeticion = ($_POST['cantidadPorRepeticion']);
				$rutinas->activa = 'S';
			
				if($rutinas->update()){
					$this->tipoMsm = 'success';
					$this->mensaje .= 'Ok la rutina fue actualizada <script> window.top.actualizarIframe(); </script>';
				}else{
					$this->tipoMsm = 'danger';
					$this->mensaje = '<strong>Error</strong> al actualizado la rutina';
				} 
			}else{
				$this->tipoMsm = 'danger';
				$this->mensaje = '<strong>Error</strong> la rutina no existe';
			}
		    	
    	
    	}
    	 
    }
	
	public function eliminaRutina()
    {
    	
		$rutinas = new Mod49GymRutinas();
		$validarRutina  = $rutinas->find_first("id = '".$_POST['idCampo']."'");

		if(isset($validarRutina->id)){
			if($rutinas->delete($validarRutina->id)){
				$this->tipoMsm = 'success';
				$this->mensaje = '<strong>Ok</strong>  la rutina fue eliminado <script> window.top.actualizarIframe(); </script>';
			}else{
				$this->tipoMsm = 'danger';
				$this->mensaje = '<strong>Error</strong> al eliminar la rutina';
			}
		}	
    	
   }
	
	
	public function listadoBuzon()
    {
		setlocale(LC_MONETARY,"es_ES");
		/*aqui ya entramos con un omolds validando al usuario*/
    	$tokenUsu = obtenerToken();
	    //printVar($tokenUsu,'token'); 
	      
	    /*validamos los datos del usuario segun su token*/
		/*los datos son retornados en json por eso el json_decode para decoficicar los datos*/
	    $dataToken = json_decode(sendGetToken($tokenUsu));
	    //printVar($dataToken);exit;
	    if($dataToken->idres == 0){
			$mensajes = new Mod49GymBuzon();
			$this->mensaje  = $mensajes->find();	
			
			
		}
	}
	
	public function eliminaBuzon()
    {
    	
		$mensajes = new Mod49GymBuzon();
		$validarMensaje  = $mensajes->find_first("id = '".$_POST['idCampo']."'");

		if(isset($validarMensaje->id)){
			if($mensajes->delete($validarMensaje->id)){
				$this->tipoMsm = 'success';
				$this->mensaje = '<strong>Ok</strong>  el mensaje fue eliminado <script> window.top.actualizarIframe(); </script>';
			}else{
				$this->tipoMsm = 'danger';
				$this->mensaje = '<strong>Error</strong> al eliminar el mensaje';
			}
		}	
    	
   }
	

    
    
    



   public function reporteExcel()
    {

		if(isset($_POST['mes'])){
			$mes = $_POST['mes'];
			$filtroMes = true;
		}else{
			$filtroMes = false;
			$mes = date("m");
		}
		
		if(isset($_POST['anio'])){
			$anio = $_POST['anio'];
		}else{
			$anio = date("Y");
		}

		
		setlocale(LC_MONETARY,"es_ES");
		/*aqui ya entramos con un omolds validando al usuario*/
    	$tokenUsu = obtenerToken();
	    //printVar($tokenUsu,'token'); 
	      
	    /*validamos los datos del usuario segun su token*/
		/*los datos son retornados en json por eso el json_decode para decoficicar los datos*/
	    $dataToken = json_decode(sendGetToken($tokenUsu));
	    //printVar($dataToken);exit;
	    if($dataToken->idres == 0){
			$gastosMod = new Mod49GymGastos();
			if($filtroMes){
				$gastos  = $gastosMod->find(" MONTH(fechaGasto) = '".$mes."' AND YEAR(fechaGasto) = '".$anio."' ");	
			}else{
				$gastos  = $gastosMod->find("  YEAR(fechaGasto) = '".$anio."' ");	
			}
			
			if(isset($gastos[0]->id)){
				Load::lib('excel');
						
					ini_set('display_errors', 'Off');
		 
					//invoco la clase para generar el libro excel
					$libro = new Spreadsheet_Excel_Writer();
					$libro->setTempDir (dirname(__FILE__).'/../../public/temp' ); 
					//creo una hoja, es decir, puedo crear N hojas
					$hoja1 = $libro->addWorksheet("Gastos");
					 
					//charset
					$hoja1->setInputEncoding('utf-8');
					 
					//Formato de letra, en este caso negrita, existen más, números, fecha, etc...
					$format6 =& $libro->addFormat();
					$format6->setFgColor('gray');
					$format6->setPattern(1);
					$format6->setBold();


					$rowData = 1;

					
					$hoja1->write(0, 0, 'Motivo', $format6);
					$hoja1->write(0, 1, 'Fecha gasto', $format6);
					$hoja1->write(0, 2, 'Valor', $format6);
					
					foreach($gastos as $campos):
						$hoja1->write($rowData,  0, utf8_decode($campos->motivo));
						$hoja1->write($rowData,  1, $campos->fechaGasto);
						$hoja1->write($rowData,  2, $campos->precio);
						$total += $campos->precio;
						$rowData++;  
					endforeach;
					$hoja1->write($rowData, 1, 'Total en gastos', $format6);
					$hoja1->write($rowData,  2, $total);
					$reporte = true;
					
			}else{
					$reporte = false;
			} 	
			
		}
		
		/*ingresos de ese mes*/
		$promocionesMod = new Mod49GymPromocionesUsuario();
			if($filtroMes){
				$promociones  = $promocionesMod->find(" MONTH(fecha) = '".$mes."' AND YEAR(fecha) = '".$anio."' ");	
			}else{
				$promociones  = $promocionesMod->find("  YEAR(fecha) = '".$anio."' ");	
			}
			
			if(isset($promociones[0]->id)){

					$hoja2 = $libro->addWorksheet("Promociones");
					 
					//charset
					$hoja2->setInputEncoding('utf-8');
					 
					//Formato de letra, en este caso negrita, existen más, números, fecha, etc...
					$format6 =& $libro->addFormat();
					$format6->setFgColor('gray');
					$format6->setPattern(1);
					$format6->setBold();


					$rowData = 1;

					
					$hoja2->write(0, 0, 'Fecha', $format6);
					$hoja2->write(0, 1, 'Promocion', $format6);
					$hoja2->write(0, 2, 'Usuario', $format6);
					$hoja2->write(0, 3, 'Pago', $format6);
					
					foreach($promociones as $campos):
						$hoja2->write($rowData,  0, $campos->fecha);
						$hoja2->write($rowData,  1, utf8_decode( getPromocion( $campos->idPromocion)));
						$hoja2->write($rowData,  2, utf8_decode( getUsuario( $campos->idUsuario)));
						$hoja2->write($rowData,  3, $campos->pago);
						$totalPromo += $campos->pago;
						$rowData++;  
					endforeach;
					$hoja2->write($rowData, 2, 'Total en promociones', $format6);
					$hoja2->write($rowData,  3, $totalPromo);
					$reporte = true;
					
					
			} else{
					$reporte = false;
			} 
			
			if($reporte){
				$libro->send("Reporte_".fechaActual(1).".xls");
				$libro->close();
			}else{
				echo "<script> alert('No hay datos para este reporte'); window.location.href= '".APP_PAGE_OMOLDS."index/reportes/'; </script>";

			} 
		exit;  
	}
	

   

}


function edad($fecha){
    $fecha = str_replace("/","-",$fecha);
    $fecha = date('Y/m/d',strtotime($fecha));
    $hoy = date('Y/m/d');
    $edad = $hoy - $fecha;
    return $edad;
}

function diferenciaDias($start, $end) { 
	date_default_timezone_set('America/Bogota');
	$datetime1 = new DateTime($start);
	$datetime2 = new DateTime($end);
	$interval = $datetime1->diff($datetime2);
	return $interval->format('%R%a');

} 

function sumarDias($fecha, $dias){
	date_default_timezone_set('America/Bogota');
	$fecha = new DateTime($fecha);
	$fecha->add(new DateInterval('P'.$dias.'D'));
	return $fecha->format('Y-m-d');
		
}
function getPromocionCliente($idCliente, $colorLista){
	$promocionesUsuario = new Mod49GymPromocionesUsuario();
	$validaUsuario = $promocionesUsuario->find_first("idUsuario = '".$idCliente."' AND activo = 'S' ");	
	if(!empty($validaUsuario->id)){
		if($colorLista != 'danger'){
			$diferenciaDias = diferenciaDias( fechaActual(1), $validaUsuario->fechaFin);
			/*si el usuario esta dentro de los 5 ultimos dias de vencimiento de la promocion*/
			if($diferenciaDias <= 5){
				$cliente = new Mod49GymCliente();
				$cliente->id = $idCliente;
				$cliente->colorLista = 'danger';
				$cliente->update();
			}
		}
		$dataPromo = $validaUsuario;
	}else{
		$dataPromo =  false;
	}
				
	return $dataPromo;
}



function getPromocion($idPromocion){
	
	$promociones = new Mod49GymPromociones();
	$validaPromo = $promociones->find_first("id = '".$idPromocion."'  ");	
	if(!empty($validaPromo->id)){
		$dataPromo = $validaPromo->nombre;
	}else{
		$dataPromo =  'Promoción';
	}
				
	return $dataPromo;
}

function getUsuario($idUsuario){
	
	$cliente = new Mod49GymCliente();
	$validaCliente = $cliente->find_first("id = '".$idUsuario."'  ");	
	if(!empty($validaCliente->id)){
		$dataCliente = $validaCliente->nombre;
	}else{
		$dataCliente =  'Usuario';
	}
				
	return $dataCliente;
}


function getRutinaCliente($idCliente){
	$rutinaUsuario = new Mod49GymRutinasUsuario();
	$validaUsuario = $rutinaUsuario->find_first("idUsuario = '".$idCliente."' AND activa = 'S' ");	
	if(!empty($validaUsuario->id)){
		$dataRutina = $validaUsuario;
	}else{
		$dataRutina =  false;
	}
				
	return $dataRutina;
}


function fechaActual($tipo){
	date_default_timezone_set('America/Bogota');
	if($tipo == 1){
	 return date('Y-m-d');
	}else{
	  return date('Y-m-d H:m:s');
	}
	
	//return '2016-03-09 15:03:51';
}

function tamano_archivo($peso , $decimales = 2 ) {
$clase = array(" Bytes", " KB", " MB", " GB", " TB"); 
return round($peso/pow(1024,($i = floor(log($peso, 1024)))),$decimales ).$clase[$i];
}
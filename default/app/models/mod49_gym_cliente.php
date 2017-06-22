<?php

	class Mod49GymCliente extends ActiveRecord

{

	

	public function getTodas(){

        return $this->find();

    }

	

}

?>
<?php

	class Mod49GymInstructores extends ActiveRecord

{

	

	public function getTodas(){

        return $this->find();

    }

	

}

?>
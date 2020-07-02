<?php
include __DIR__.'/../model/Lembrete.php';

class LembreteControl{
	function insert($obj){		
		$lembrete = new Lembrete();	
		/* CHANCE DE MANIPULAR A REQUISIÇÃO ANTES DE ACESSAR O MODEL */			
		return $lembrete->insert($obj);		
	}

	function update($obj,$id){
		$lembrete = new Lembrete();
		return $lembrete->update($obj,$id);
	}

	function delete($obj,$id){
		$lembrete = new Lembrete();
		return $lembrete->delete($obj,$id);
	}

	function find($id = null){
		$lembrete = new Lembrete();
		return $lembrete->find($id);
	}

	function findAll(){
		$lembrete = new Lembrete();
		return $lembrete->findAll();
	}
}

?>
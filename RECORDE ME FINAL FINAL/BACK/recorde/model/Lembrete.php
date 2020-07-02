<?php

include __DIR__.'/Conexao.php';


class lembrete extends Conexao {
	private $id; 
	private $titulo;		//colunas da tabela
	private $data;
	private $lembrete;
 

    public function getId()
    {
        return $this->id;
    }
 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

	public function getTitulo()
	{
		return $this->titulo;
	}

	
	public function setTitulo($titulo)
	{
		$this->titulo = $titulo;

		return $this;
	}

	
	public function getData()
	{
		return $this->data;
	}

	
	public function setData($data)
	{
		$this->data = $data;

		return $this;
	}

	public function getLembrete()
	{
		return $this->lembrete;
	}

	public function setLembrete($lembrete)
	{
		$this->lembrete = $lembrete;

		return $this;
	}


   
    public function insert($obj){    
    	$sql = "INSERT INTO lembrete (titulo,data,lembrete) VALUES (:titulo,:data,:lembrete)";
    	$consulta = Conexao::prepare($sql);
		$consulta->bindValue('titulo', $obj->titulo);
		$consulta->bindValue('data', $obj->data);
		$consulta->bindValue('lembrete', $obj->lembrete);
        $consulta->execute();
        return Conexao::lastId(); 

	}

	public function update($obj,$id = null){
		$sql = "UPDATE lembrete SET  
            lembrete = :lembrete ,
        WHERE id = :id ";
        $consulta->bindValue('lembrete ' , $obj->lembrete );
		$consulta->bindValue('id', $id);
		return $consulta->execute();
	}

	public function delete($obj,$id = null){
		$sql =  "DELETE FROM lembrete WHERE id = :id";
		$consulta = Conexao::prepare($sql);
		$consulta->bindValue('id',$id);
		$consulta->execute();
        return $consulta->execute();
	}

	public function find($id = null){
        $sql =  "SELECT * FROM lembrete WHERE id = :id";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id',$id);
        $consulta->execute();
        return $consulta->fetch();
	}

	public function findAll(){
		$sql = "SELECT * FROM lembrete";
		$consulta = Conexao::prepare($sql);
		$consulta->execute();
		return $consulta->fetchAll();
	}


	
}
 
?>
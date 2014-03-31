<?php 

// include "include/connection.class.php";
// $db = new Connection();
// $db->connect();

class Database extends Connection{
	public $queryResult = array();
	public $query = array();
	public $whereConditions = array();
	public $data;
	public $db;
	
	private $connection;
	
	public function dbConnect(){
		$connection = new Connection();
		$this->db = $connection->connect();
	}
	
	public function dbClose(){
		mysqli_close($this->db);
	}
		
	
	protected function executeQuery($query){
		$this->dbConnect();
		
		$query = mysqli_query($this->db, $query);		
				
		return $query;
		
		$this->dbClose();
	}
	
	public function select($select, $from){
			
		$this->query[]  = $select;
		$this->query[] .= $from;
			
		$sql  = 'SELECT '.$this->query[0].' ';
		$sql .= 'FROM   '.$this->query[1].' ';			
	
		$result = array();
		$result = $this->executeQuery($sql);	
	
		
		foreach(mysqli_fetch_assoc($result) as $value){			
			$this->data .= $value/*."<br />"*/;			
												
		}
							
		
		unset($this->query);
		return $this->data;
	
	}
	
	//:: @TODO Write loop logic to handle Where Conditions
	public function selectWhere($select, $from, $conditions = array() ){
				
			$this->query[]				 = $select;
			$this->query[]				.= $from;
			$this->whereConditions[] 	.= $conditions;
			$this->query[] 				.= $operator;
			
			$sql  = 'SELECT '.$this->query[0].' ';
			$sql .= 'FROM	'.$this->query[1].' ';
/*			foreach($this->whereCondtions as $var){
				$sql .= ;
			}*/
	}
	
	public function sanitize($input){
		$input = mysqli_real_escape_string($this->db, $input);
		
		return $input;
	
	}
	
	public function insertInto($table, $field, $values){
		$fieldResult = "";
		$valueResult = "";
		
		$fieldData = $field;
		$valuesData = $values;
		
		//:: Deal with Fields
		$fieldCount = count($fieldData);
		$fieldEnd = $fieldCount - 1;
		
		//:: Initialize The Fields Counter
		$fCounter = 0;
		
		
		foreach ($fieldData as $fData){
			
			$fieldResult .= $fData;
			
			//:: If the array is not at the end, appaend a ", ". Else append a "".
			if($fCounter < $fieldEnd){				
				
				$fieldResult .= ", ";
				
			}
			else{
				
				$fieldResult .= "";
					
			}
			
			//:: Increment Fields counter
			$fCounter++;
		}
		
		//:: Deal with Values
		$valueCount = count($valuesData);
		$valueEnd = $valueCount - 1;
		
		//:: Initialize the Values Counter
		$vCounter = 0;
		
		foreach ($valuesData as $vData){
			
			$valueResult .= '"'.$vData.'"';			
			
			//:: If the array is not at the end, appaend a ", ". Else append a ""
			if($vCounter < $valueEnd){
				
				$valueResult .= ", ";
				
			}
			else{
				
				$valueResult .= "";
				
			}
			
			//:: Increment Values counter
			$vCounter++;
		}		
		
		//:: Write Query and Execute
		$sql  = "INSERT INTO ".$table." ";
		$sql .= '(';
		$sql .= $fieldResult;
		$sql .= ')';
		$sql .= ' VALUES('.$valueResult.')';
		
		
		$this->executeQuery($sql);
	
	}
	
	public function delete($tableName, $id){
		$sql  = 'DELETE FROM ';
		$sql .= $table." ";
		$sql .= 'WHERE ID = ';
		$sql .= $id;
		
	}
	
	
}




?>
<?php
require_once('init.php');

class Country {
	
	private $name;
	private $postalCode;
	private $code;
	
	public function __get($property)
	{
        if (property_exists($this,$property))
            return $this->$property;
    }


	private function has_attribute($attribute)
	{
		$object_properties=get_object_vars($this);
        return array_key_exists($attribute,$object_properties);
	}
	
	private function instantation($order_array)
	{
        foreach ($order_array as $attribute=>$value)
		{
            	if ($result=$this->has_attribute($attribute))
					$this->$attribute=$value;
       }
	}
	
	public function find_code_by_country($name)
	{
		  global $database;
		  $error=null;
		  $result=$database->query("SELECT * from countries where name='".$name."'");
		  $found_order=$result->fetch_assoc();
		  if (!$result){
			$error='Can not find the code by the country name. Error is:'.$database->get_connection()->error;
		  }
		  elseif ($result->num_rows>0){
			$this->instantation($found_order);
		  }
		  else{
		  $error="Can not find the code by the country name";}
		return $error;
	 }

	 public function find_code_by_pc($pc)
	 {
		   global $database;
		   $error=null;
		   $result=$database->query("SELECT * from countries where postalCode='".$pc."'");
		   $found_order=$result->fetch_assoc();
		   if (!$result){
			 $error='Can not find the code. Error is:'.$database->get_connection()->error;
		   }
		   elseif ($result->num_rows>0){
			 $this->instantation($found_order);
		   }
		   else{
			$error="Can not find the code";}
		return $error;
	  }


	 public function fetch_countries(){
        global $database;
        $result=$database->query("SELECT * from countries");
        $countries=null;
        if ($result){
           	 $i=0;
           	 if ($result->num_rows>0){ 
                	while($row=$result->fetch_assoc()){ 
						$country=new Country();
                    	$country->instantation($row);
                    	$countries[$i]=$country;
                    	$i+=1;      
					}
			 }
		}

       return $countries;      
	}
	

	public function getCountries()
    {
        global $database;
        $result=$database->query("select * from countries");
        if ($result){
            $countries = array();
            if ($result->num_rows>0)
            {
                while($row=$result->fetch_assoc()){
                  array_push($countries,$row);
                }
            }
        }
        return $countries;
    }

    public function add_pc($name, $code, $pc)
    {
		global $database;
		
		$error=null;
        $sql="INSERT into countries(name, code, postalCode) values ('".$name."','".$code."','".$pc."')";
        $result=$database->query($sql);
         if (!$result)
			$error='Can not add order. Error is:'.$database->get_connection()->error;
			
        return $error;          
	}

}

$country = new Country ();



?>
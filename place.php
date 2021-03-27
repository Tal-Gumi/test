<?php
require_once('init.php');

class Place {
	
	private $place;
	private $Cname;
	private $latitude;
	private $longitude;

	
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
	
	public function find_places_by_name($name)
	{
		  global $database;
		  $error=null;
		  $result=$database->query("SELECT * from place where Cname='".$name."'");
		  $found_places=$result->fetch_assoc();

		  if (!$result){
			$error='Can not find the order number. Error is:'.$database->get_connection()->error;
		  }
		  elseif ($result->num_rows>0){
			$this->instantation($found_places);
		  }
		  else{
		  $error="Can not find order by this number";}
		return $error;
	 }


    public function add_places($place, $Cname, $latitude, $longitude)
    {
		global $database;
		$error="";
        $sql="INSERT into place (place, Cname, latitude, longitude) values ('".$place."','".$Cname."','".$latitude."','".$longitude."')";
        $result=$database->query($sql);
         if (!$result)
			$error='Can not add place. Error is:'.$database->get_connection()->error;
			
        return $error;          
	}

}

$place = new Place ();



?>
<?php
    class Mycon
    {
        private $servername="localhost";
        private $username="root";
        private $password="root";
        private $dbase;
        private $count=0;
        public $con;
        function __construct($database)
        {
            $this->dbase=$database;
            $this->con=mysqli_connect($this->servername,$this->username,$this->password,$this->dbase);
            if(!($this->con))
            {
                echo mysqli_connect_error();
                return;
            }
          
        }
        
        public function select($query)
        {
            $result=mysqli_query($this->con, $query);
            if (mysqli_num_rows($result)>0) 
			{
                //global $result;
				return true;
			}
			else
			{
				return false;
			}
        }
        public function insert($query)
        {
             if(mysqli_query($this->con, $query))
             {
                 return true;
             }
             else{
                 return false;
             }
            
        }
        public function check_insert($query)
        {
            $result = mysqli_query($this->con, $query);
           
        }
        
        public function allinfo($query)
        {
           $result = mysqli_query($this->con, $query);
           return $result;
        }
                      



    public function countTotal($sql)
    {
        $result = mysqli_query($this->con, $sql);
      
        if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            
            $this->count=$row["id"];
        }
        } 
        return $this->count; 
    }
}  

?>
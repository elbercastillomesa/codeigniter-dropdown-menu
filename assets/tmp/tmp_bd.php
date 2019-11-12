<?php

/*	INSERTAR INSTITUCIONES EDUCATIVAS	*/

class DB {

    protected $servername   = "localhost";
    protected $username     = "root";
    protected $password     = "ondasvalle/*123";
    protected $dbname       = "ondas_bd";
    protected $conn         = FALSE;


    public function connect(){
        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function insert($sql = ''){

        if ($this->conn->query($sql) === TRUE) {

            $last_id = $this->conn->insert_id;
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }

        return $last_id;
    }

    public function query($sql = ''){

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $return[] = $row;
            }
        } else {
            $return = '';
        }

        return $return;
    }

    public function close(){
        $this->conn->close();
    }
}

?>
<?php

class DBCon {
    
    private $con = null;
    private $proc = null;
    private $params = [];
    private $prozedureNames = [];

    private function connection()
    {
        include "../konfig.php";
        $this->con = @mysqli_connect($config['DBServer'], $config['DBUser'], $config['DBPasswort'], $config['DBName']);
        //$this->con = new mysqli($config['DBServer'], $config['DBUser'], $config['DBPasswort'], $config['DBName']);
        $this->con->set_charset("utf8");
    }

    public function getInstance()
    {
        if($this->con == null)
            $this->connection();
        
        return $this->con;
    }

    public function setProcedure ($ident,$procName)
    {
        $this->proc[$ident] = $this->con->stmt_init();
        $this->prozedureNames[$ident] = $procName;
    }

    /*
    i =	die entsprechende Variable hat den Typ integer
    d =	die entsprechende Variable hat den Typ double
    s =	die entsprechende Variable hat den Typ string
    b =	die entsprechende Variable ist ein BLOB und wird paketweise geschickt
     */
    public function bindProcedureParam($ident,$paramname,$val,$type = 's')
    {
        $this->params[$ident][] = array('typ' => $type, 'parametername'=> $paramname, 'val' =>$val);
        //$this->proc[$ident]->bindParam($type,$paramname,$val);
    }

    

    public function execute_Procedure($ident)
    {
        $procParams = "(";
        $bindTypen = '';
        $vals = [];
        $tyarr = [];
        $procName =  $this->prozedureNames[$ident];
        $count = 0;
        //var_dump($this->params[$ident]);
        foreach($this->params[$ident] as $p)
        {
            if($count == 0)
                $procParams .= '?';//$p['parametername'];
            else
                $procParams .= ', ?';//.$p['parametername'];

            $bindTypen .= $p['typ'];
            $tyarr[] = $p['typ'];
            $vals[] = $p['val'];
            $count++;
        }
        $procParams .=')';
       
        $smt = $this->proc[$ident]->prepare("Call ".$procName.$procParams);
        
        
       // echo "Call ".$procName.$procParams;

        $arr = array_merge(array($bindTypen),$vals);
        //print_r($arr);
        var_dump( $this->proc[$ident]);
        //var_dump( $smt);
        call_user_func_array(array($this->proc[$ident], 'bind_param'),$arr );



        //$this->proc[$ident]->bindParam($bindTypen,$vals);
        $out = null;
        $this->proc[$ident]->execute();
        $res = $this->proc[$ident]->get_result();
        var_dump($res);
        while($ds = $res->fetch_assoc())
        {
            $out[] = $ds;
        } 
        $this->proc[$ident]->close();
        return $out;
    }


    public function query($query)
    {
        $result = $this->con->query($query);
        return $result->fetchArray();
    }
}


?>
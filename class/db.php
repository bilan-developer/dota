<?php
 
Class DB {
 
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "dota";
    private $charset = "utf8";
   
    public $pdo = "";
 
    public function __construct()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $opt = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        $this->pdo = new PDO($dsn, $this->user, $this->password, $opt);
    }

    /**
    *
    * Добавление записи в бд
    * @param type $data ассоц масив данных
    * @return 
    */
    public function add($date){
    	$field = $this->set_fields($date);
       
    	$sql = "INSERT INTO {$this->table_name} SET ".$field;
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($date);
      
    }

    /**
        * Обновление данных в таблице. Опциональный параметр $where
        * @param Array $data - данные обновления
        * @param String $where - критерий поиска.
        * @return Boolean
        */
        public function edit($data, $where = "")
        {
            $fields = $this->set_fields($data);
            $sql = "UPDATE `{$this->table_name}` SET ".$fields;
            if(!empty($where)){
                $sql.= " WHERE ".$where;
            }
            $stmt = $this->pdo->prepare( $sql );
            return $stmt->execute($data);
        }

         /**
        * Обновление данных в таблице. Опциональный параметр $where
        * @param Array $data - данные обновления
        * @param String $where - критерий поиска.
        * @return Boolean
        */
        public function delit($id)
        {
            
            $sql = "DELETE FROM {$this->table_name} WHERE id=".$id;            
            $stmt = $this->pdo->prepare( $sql );
            return $stmt->execute();
        }




    /**
    *
    */

   public function getAll() {
        $sql = "SELECT * FROM {$this->table_name}";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    /**
         * Внутренная функция для формирования строки SET
         * @param Array $items
         * @return String
         */
        private function set_fields($items) {
            $str = array();
            if (empty($items)) {
                return "";
            }
            foreach ($items as $key => $value){
                $str[] = "`".$key."`=:".$key;
            }
            return implode(',', $str);
        }

    /**
    * Получение данных по id
    * @param Number $idc
    * @return String
    */
    public function getItemById($id){
        if($id==0){
            $sql = "SELECT * FROM {$this->table_name} ORDER BY id ASC LIMIT 1";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return ($result);
        }else{
            $sql = "SELECT * FROM {$this->table_name} WHERE id=".$id;
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return ($result);
        }
    }
    public function getNextItemById($id){

        $sql = "SELECT * FROM {$this->table_name} WHERE id> $id ORDER BY id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return ($result);
    }

    
 
}
<?php

    class SqlHelper{
        
        private $host;
        private $user;
        private $password;
        private $database;
        
        protected $mysql;
        
        
        function __construct(){
            //获取配置文件的信息
            if ($config = parse_ini_file("config.ini")){
                
                $this->host = $config['host'];
                $this->user = $config['user'];
                $this->password = $config['password'];
                $this->database = $config['database'];
                
                //连接数据库
                $this->mysql = new mysqli($this->host, $this->user, $this->password,  $this->database);
                //结果集处理
            }
        }
        
        function __destruct(){
            
            $this->mysql->close();
        }
        /*
         * select
         */
        function execute_dql1($sql){
            $res = $this->mysql->query($sql) or die("错误-dql：". $this->mysql->error);
            return $res;
        }
        
        /* 返回一个数组 */
        function execute_dql2($sql){
            $arr = array();
            $res = $this->mysql->query($sql) or die("错误-dql：". $this->mysql->error);
            while ($row = $res->fetch_assoc()) {
                $arr[] = $row;
            }
            $res->free();
            return $arr;
        }
        /*
         * updata insert delete
         */
        function execute_dml($sql){
            
            $bool = $this->mysql->query($sql) or die("错误-dml：". $this->mysql->error);
            if (!$bool){
                return 0;   //失败
            }elseif ($this->mysql->affected_rows > 0){
                return 1;   //成功
            }else {
                return 2;   //没有影响还是失败1
            }
        }

        //计算总共多少页
        function pagingCount($sql){

            $res = $this->mysql->query($sql) or die("错误-dql：". $this->mysql->error);
            $row = $res->fetch_array();
            return $row[0]; 
        }
        
    }  
?>
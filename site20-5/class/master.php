<?php

    class Master{

        private $pdo;

        public function connect($name, $host, $username, $password){

            global $pdo;

            try{
                $pdo = new PDO("mysql:dbname=".$name.";host=".$host,$username,$password);
            } catch(PDOException $error){
                $msgEror = $error->getMessage();
            }

        }

        public function sendMessage($username, $email, $phone, $message){

            global $pdo;

            $sql = $pdo->prepare("INSERT INTO message (message_name, message_email, message_phone, message_desc) VALUES (:n, :e, :p, :m)");
            $sql->bindValue(":n",$username);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":p",$phone);
            $sql->bindValue(":m",$message);
            $sql->execute();

            return true;

        }

        public function getDataById($data, $table, $id){

            global $pdo;

            $sql = $pdo->prepare("SELECT * FROM ".$table." WHERE ".$table."_id = ".$id);
            $sql->execute();
            
            if($sql->rowCount() > 0){

                $return = $sql->fetch();

                return $return[$data];

            }

            else{
                
                return "DADO NÃO ENCONTRADO.";

            }

        }

        public function listTable($table){

            global $pdo;

            $sql = $pdo->prepare("SELECT * FROM ".$table);
            $sql->execute();

            return $sql;

        }

    }


?>
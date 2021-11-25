<?php

    class User{

        private $pdo;

        public function connect($name, $host, $username, $password){

            global $pdo;

            try{
                $pdo = new PDO("mysql:dbname=".$name.";host=".$host,$username,$password);
            } catch(PDOException $error){
                $msgEror = $error->getMessage();
            }

        }

        public function login($username, $password){

            if($username == "pbg!godoycustom" && $password = "jbg@115721"){

                session_start();

                $_SESSION['username'] = "GODOY CUSTOM";

                return true;

            }
            else{

                return false;

            }

        }

    }

?>
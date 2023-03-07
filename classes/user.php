<?php
    include_once '../lib/database.php';
    include_once '../helpers/format.php';
?>

<?php
    class user {
        private $db;
        private $fm;

        public function__construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }
        
    }
?>
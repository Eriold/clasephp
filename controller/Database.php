<?php
class Database
{
    private $db_host = '';
    private $db_user = '';
    private $db_pass = '';
    private $db_name = '';
    public function connect()
    {
        if (!$this->con) {
            $myconn = mysqli_connect($this->db_host, $this->db_user, $this->db_pass);
            if ($myconn) {
                // $seldb = @mysql_select_db($this->db_name, $myconn);
                $seldb = mysqli_select_db($this->db_name, $myconn);
                if ($seldb) {
                    $this->con = true;
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return true;
        }
    }
    public function disconnect()
    {
    }
    public function select()
    {
    }
    public function insert()
    {
    }
    public function delete()
    {
    }
    public function update()
    {
    }
}

<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';
?>
<?php
class reviews
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function show_reviews()
    {
        $query = "SELECT * FROM ykienkhachhang ORDER BY MaYKien DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function getreviewsbyId($id)
    {
        $query = "SELECT * FROM ykienkhachhang WHERE MaYKien='$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>
<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';
?>
<?php
class nhacungcap
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_nhacungcap($nccName)
    {
        $nccName = $this->fm->validation($nccName);
        $NccName = mysqli_real_escape_string($this->db->link, $nccName);
        if (empty($nccName)) {
            $alert = "<span class='error'> Không được bỏ trống </span>";
            return $alert;
        } else {
            $query = "INSERT INTO nhacungcap(TenNCC) VALUES ('$nccName')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'> Thêm dữ liệu thành công </span>";
                return  $alert;
            } else {
                $alert = "<span class='error'> Thêm dữ liệu thất bại </span>";
                return  $alert;
            }
        }
    }

    public function show_nhacungcap()
    {
        $query = "SELECT * FROM nhacungcap ORDER BY MaNCC DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function getNccbyId($id)
    {
        $query = "SELECT * FROM nhacungcap WHERE MaNCC='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_nhacungcap($nccName, $status, $id)
    {
        $nccName = $this->fm->validation($nccName);
        $nccName = mysqli_real_escape_string($this->db->link, $nccName);
        $id = mysqli_real_escape_string($this->db->link, $id);
        if (empty($nccName)) {
            $alert = "<span class='error'> Không được bỏ trống </span>";
            return $alert;
        } else {
            $query = "UPDATE nhacungcap  SET TenNCC = '$nccName' , TrangThai='$status' WHERE MaNCC='$id'";
            $result = $this->db->update($query);
            if ($result) {
                $alert = "<span class='success'> Thay đổi nhà cung cấp thành công </span>";
                return  $alert;
            } else {
                $alert = "<span class='error'>  Thay đổi tên nhà cung cấp thất bại </span>";
                return  $alert;
            }
        }
        $query = "SELECT * FROM nhacungcap WHERE MaNCC='$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>
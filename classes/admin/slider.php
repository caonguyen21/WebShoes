<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';
?>
<?php
class slider
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert($productID)
    {
        $productID = mysqli_real_escape_string($this->db->link, $productID);
        if (empty($productID)) {
            $alert = "<span class='error'> Không được bỏ trống </span>";
            return $alert;
        } else {
            $query = "INSERT INTO slider (MaGiay, TrangThai) VALUES ('$productID', 1)";

            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'> Thêm dữ liệu thành công </span>";
                return $alert;
            } else {
                $alert = "<span class='error'> Thêm dữ liệu thất bại </span>";
                return $alert;
            }
        }
    }
    public function update_slider($productID, $status, $id)
    {
        $productID = mysqli_real_escape_string($this->db->link, $productID);
        $id = mysqli_real_escape_string($this->db->link, $id);
        if (empty($productID)) {
            $alert = "<span class='error'> Không được bỏ trống </span>";
            return $alert;
        } else {
            $query = "UPDATE slider  SET MaGiay = '$productID' , TrangThai='$status' WHERE sliderID='$id'";
            $result = $this->db->update($query);
            if ($result) {
                $alert = "<span class='success'> Thay đổi sldier thành công </span>";
                return $alert;
            } else {
                $alert = "<span class='error'>  Thay đổi slider thất bại </span>";
                return $alert;
            }
        }
        $query = "SELECT * FROM loaigiay WHERE MaLoai='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_slider()
    {
        $query = "SELECT slider.* , sanpham.TenGiay , sanpham.AnhBia ,sanpham.GiaBan FROM slider 
        INNER JOIN sanpham ON sanpham.MaGiay = slider.MaGiay 
        ORDER BY slider.sliderID DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function getsliderbyId($id)
    {
        $query = "SELECT * FROM slider WHERE sliderID='$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>
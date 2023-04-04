<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';
?>

<?php
class cart
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function add_to_cart($quantity, $id)
    {
        $quantity = $this->fm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $sId = session_id();

        $query = "SELECT * FROM sanpham WHERE MaGiay = '$id'";
        $resutl = $this->db->select($query)->fetch_assoc();

        $AnhBia = $resutl['AnhBia'];
        $GiaBan = $resutl['GiaBan'];
        $TenGiay = $resutl['TenGiay'];
        $Size = $resutl['Size'];
        $query_cart = "SELECT * FROM giohang WHERE MaGiay = '$id' AND sId = '$sId' ";
        $check_cart = $this->db->select($query_cart);
        if ($check_cart) {
            $msg = "Sản phẩm này đã có trong giỏ hàng";
            return $msg;
        } else {
            $query_insert = "INSERT INTO giohang (MaGiay, SoLuong, sId, AnhBia, GiaBan, TenGiay, Size) VALUES('$id', '$quantity', '$sId', '$AnhBia', '$GiaBan', '$TenGiay', '$Size')";
            $insert_cart = $this->db->insert($query_insert);
            if ($resutl) {
                header('Location:shoping-cart.php');
            } else {
                // error
            }
        }
    }
    public function get_product_cart()
    {
        $sId = session_id();
        $query = "SELECT * FROM giohang WHERE sId = '$sId'";
        $result = $this->db->select($query);
        return $result;
    }
    public function UpdateCart($quantity, $cartId)
    {
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $cartId = mysqli_real_escape_string($this->db->link, $cartId);
        $query = "UPDATE giohang SET 
        SoLuong = '$quantity' 
        WHERE cartId='$cartId'";
        $result = $this->db->update($query);
        if ($result) {
            $msg = "<span class='success'> Cập nhật số lượng sản phẩm thành công </span>";
            return $msg;
        } else {
            $msg = "<span class='error'> Cập nhật số lượng sản phẩm thất bại </span>";
            return $msg;
        }
    }
    public function del_product_cart($cartid)
    {
        $cartid = mysqli_real_escape_string($this->db->link, $cartid);
        $query = "DELETE FROM giohang WHERE cartId='$cartid'";
        $result = $this->db->delete($query);
        if ($result) {
            header('Location:shoping-cart.php');
        } else {
            $msg = "<span class='error'> Xóa sản phẩm thất bại </span>";
            return $msg;
        }
    }
    public function check_cart()
    {
        $sId = session_id();
        $query = "SELECT * FROM giohang WHERE sId = '$sId'";
        $result = $this->db->select($query);
        return $result;
    }
    public function del_all_data_cart()
    {
        $sId = session_id();
        $query = "DELETE FROM giohang WHERE sId = '$sId'";
        $result = $this->db->select($query);
        return $result;
    }
    public function insertOrder($customer_id)
    {
        $sId = session_id();
        $query = "SELECT * FROM giohang WHERE sId = '$sId'";
        $get_product = $this->db->select($query);
        if ($get_product) {
            while ($result = $get_product->fetch_assoc()) {
                $productid = $result['MaGiay'];
                $productname = $result['TenGiay'];
                $quantity = $result['SoLuong'];
                $price = $result['GiaBan'] * $result['SoLuong'];
                $image = $result['AnhBia'];
                $customerid = $customer_id;
                $NgayDat = date('Y-m-d H:i:s');
                $TinhTrang = '0';
                $Size = $result['Size'];
                $query_order = "INSERT INTO dondathang(MaGiay, TenGiay, SoLuong,  GiaBan, AnhBia, MaKH, NgayDat, TinhTrang, Size) VALUES(' $productid','  $productname',' $quantity',' $price',' $image',' $customerid','$NgayDat','$TinhTrang','$Size')";
                $insert_order = $this->db->insert($query_order);
                return $insert_order;
            }
        }
    }
}
?>
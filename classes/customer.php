<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';
?>

<?php
class customer
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_customer($data)
    {
        $TaiKhoanKH = mysqli_real_escape_string($this->db->link, $data['tentk']);
        $MatKhau = mysqli_real_escape_string($this->db->link, md5($data['psw']));
        $pswrepeat = mysqli_real_escape_string($this->db->link, md5($data['pswrepeat']));
        $HoTen = mysqli_real_escape_string($this->db->link, $data['hoten']);
        $EmailKH = mysqli_real_escape_string($this->db->link, $data['email']);
        $DiaChiKH = mysqli_real_escape_string($this->db->link, $data['diachi']);
        $DienThoaiKH = mysqli_real_escape_string($this->db->link, $data['sdt']);
        $NgaySinh = mysqli_real_escape_string($this->db->link, $data['ngaysinh']);
        $TrangThai = '1';
        if ($TaiKhoanKH == "" || $MatKhau == "" || $pswrepeat == "" || $HoTen == "" || $EmailKH == "" || $DiaChiKH == "" || $DienThoaiKH == "" || $NgaySinh == "") {
            $alert = "<span class='error'> Không được bỏ trống </span>";
            return $alert;

        } else {
            $check_email = "SELECT * FROM khachhang WHERE  EmailKH ='$EmailKH' LIMIT 1";
            $result_check = $this->db->select($check_email);
            if ($result_check) {
                $alert = "<span class='error'> Email này đã tồn tại! vui lòng nhập email khác! </span>";
                return $alert;
            } else {
                $query = "INSERT INTO khachhang(TaiKhoanKH,MatKhau,HoTen,EmailKH,DiaChiKH,DienThoaiKH,NgaySinh,TrangThai) VALUES ('$TaiKhoanKH','$MatKhau','$HoTen','$EmailKH','$DiaChiKH','$DienThoaiKH','$NgaySinh', '$TrangThai')";
                $result = $this->db->insert($query);
                if ($result) {
                    $alert = "<span class='success'> Đăng ký tài khoản thành công </span>";
                    header("Location:index.php");
                } else {
                    $alert = "<span class='error'> Đăng ký tài khoản thất bại </span>";
                    return $alert;
                }
            }
        }
    }
    public function login_customer($data)
    {
        $EmailKH = mysqli_real_escape_string($this->db->link, $data['email']);
        $MatKhau = mysqli_real_escape_string($this->db->link, md5($data['psw']));
        if ($EmailKH == "" || $MatKhau == "") {
            $alert = "<span class='error'> Không được bỏ trống </span>";
            return $alert;

        } else {
            $check_login = "SELECT * FROM khachhang WHERE  EmailKH ='$EmailKH' AND  MatKhau = '$MatKhau'LIMIT 1";
            $result_check = $this->db->select($check_login);
            if ($result_check != false) {
                $value = $result_check->fetch_assoc();
                Session::set('customer_login', true);
                Session::set('customer_id', $value['MaKH']);
                Session::set('customer_name', $value['TaiKhoanKH']);
                header('Location:index.php');
            } else {
                $alert = "<span class='error'> Email hoặc mật khẩu không đúng! Vui lòng nhập lại! </span>";
                return $alert;
            }
        }
    }
}
?>
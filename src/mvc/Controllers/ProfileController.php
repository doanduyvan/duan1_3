<?php
namespace Controllers;

use Core\Controller;
use Core\Session;
use Models\UsersModel;

class ProfileController extends Controller{

    private $data = [];
    private $usersModel = null;
    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->data['Menu'] = 2;
        parent::Users();
    }

    public function index(){
        $this->Render("Users/profile/profileview",$this->data);
    }

    public function getprofile(){
        $user = Session::get("account");
        if(!$user){
            $res = [
                'error' => "Bạn chưa đăng nhập"
            ];
            echo json_encode($res);
        }
        $idUser = $user['id'];
        $data = $this->usersModel->getUserById($idUser);
        echo json_encode($data);
    }

    public function editprofile(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $user = Session::get("account");
            if(!$user){
                $res = [
                    'error' => "Bạn chưa đăng nhập"
                ];
                echo json_encode($res);
            }
            $idUser = $user['id'];
            $data = json_decode(file_get_contents("php://input"),true);
            $dataSave = [
                'fullname' => $data['fullname'],
                'phonename' => $data['phone'],
                'address' => $data['address']
            ];
            $res = $this->usersModel->editProfile($idUser,$dataSave);
            if($res){
                $_SESSION['account']['name'] = $data['fullname'];
                $res = [
                    'success' => "Cập nhật thành công"
                ];
                echo json_encode($res);
            }else{
                $res = [
                    'error' => "Có lỗi xảy ra"
                ];
                echo json_encode($res);
            }
        }
    }

    public function changepassword(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $user = Session::get("account");
            if(!$user){
                $res = [
                    'error' => "Bạn chưa đăng nhập"
                ];
                echo json_encode($res);
            }
            $idUser = $user['id'];
            $data = json_decode(file_get_contents("php://input"),true);
            $newpass = $data['newpass'];
            $oldpass = $data['oldpass'];
            $res = $this->usersModel->updatePass($idUser, $oldpass, $newpass);
            echo json_encode($res);
        }
    }
}
<?php

namespace Models;
use Core\Mail;
class UsersModel extends BaseModel
{
    private $table = "users";

    public function __construct()
    {
        parent::__construct();
    }


    public function getUserById($id){
        $data = $this->getbyid($this->table,$id);
        unset($data['password']);
        unset($data['roles']);
        return $data;
    }

    public function addusermodel($data){

      return $this->addrow($this->table,$data,['roles']);

    }

    public function checklogin($email,$password,$role){
        // chuyển email thành chống sql injection
        $email = addslashes($email);
        $password = addslashes($password);
        $sql = "SELECT * FROM $this->table WHERE email = '$email' AND password = '$password' AND roles = $role";
        $result = $this->query($sql);
        $data = false;
        if($result->rowCount() > 0){
            $data = $result->fetch();
        }
        return $data;
    }
  
    public function checkAccount($email){
        $email = addslashes($email);
        $sql = "SELECT * FROM $this->table WHERE email = '$email'";
        $result = $this->query($sql);
        $data = false;
        if($result->rowCount() > 0){
            $data = $result->fetch();
        }
        return $data;
    }

    public function changePassword($idemail,$password){
        $password = addslashes($password);
        $sql = "UPDATE $this->table SET password = '$password' WHERE id = $idemail";
        return $this->query($sql);
    }

    public function createAdmin($email, $fullname){
        $email = addslashes($email);
        $fullname = addslashes($fullname);
        $password = $this->randomPassword();

        $checkEmail = $this->checkAccount($email);
        if($checkEmail){
            return ['error' => 'Email đã tồn tại'];
        }

        $dataSave = [
            'email' => $email,
            'password' => $password,
            'fullname' => $fullname,
            'roles' => 2,
            'created_at' => NOW
        ];

        try{
        // $sql = "INSERT INTO $this->table(email,password,fullname,roles) VALUES ('$email','$password','$fullname',2)";
        // $check = $this->query($sql);
        $check = $this->addrow($this->table,$dataSave,['roles']);
        if(!$check){
            throw new \PDOException();
        }
        }catch(\PDOException $e){
            return ['error' => 'Có lỗi xảy ra'];
        }

        $mail = new Mail();
        $mail->sendTo($email,$fullname);
        $subject = "Tài khoản quản trị viên Web Điện thoại";
        $body = "<h2>Mật khẩu của bạn là: $password</h2>";
        $mail->setContent($subject,$body);
        $mail->send();
        $dataRes = [
            'message' => 'Tài khoản đã được tạo, vui lòng kiểm tra email để lấy mật khẩu',
        ];
        return $dataRes;
    }

    public function editProfile($id,$data){
        return $this->editrow($this->table,$id,$data,['roles']);
    }

    public function updatePass($id,$oldPass, $newPass){
        $oldPass = addslashes($oldPass);
        $newPass = addslashes($newPass);
        $user = $this->getbyid($this->table,$id);
        if(!$user){
            return ['error' => 'Tài khoản không tồn tại'];
        }
        if($user['password'] != $oldPass){
            return ['error' => 'Mật khẩu cũ không đúng'];
        }
        $dataSave = [
            'password' => $newPass
        ];
        $res = $this->editrow($this->table,$id,$dataSave);
        if($res){
            return ['success' => 'Đổi mật khẩu thành công'];
        }
        return ['error' => 'Có lỗi xảy ra'];
    }

    public function getAccountAdmin(){
        $sql = "SELECT * FROM $this->table WHERE roles = 2";
        $result = $this->query($sql);
        $data = [];
        if($result->rowCount() > 0){
            $data = $result->fetchAll(\PDO::FETCH_ASSOC);
        }
        foreach($data as $key => $value){
            unset($data[$key]['password']);
        }
        return $data;
    }

    public function randomPassword($length = 8){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++){
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
?>
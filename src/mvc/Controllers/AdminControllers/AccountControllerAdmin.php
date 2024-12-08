<?php
namespace AdminControllers;

use Core\Controller;

class AccountControllerAdmin extends Controller
{
    private $data = [];
    private $UsersModel;
    public function __construct()
    {
        $this->UsersModel = new \Models\UsersModel();
        $this->data['currentMenu'] = 7;
        parent::Admin();
    }

    public function index()
    {
        $this->data['accounts'] = $this->UsersModel->getAccountAdmin();
        $this->Render('Admin/accounts/ManageAccountView', $this->data);

    }

    public function add()
    {
        $this->data['currentMenu'] = 6;
        $this->Render('Admin/accounts/AddAccountView', $this->data);
    }


    // post api

    public function createaccount(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = json_decode(file_get_contents('php://input'), true);
            $email = $data['email'];
            $name = $data['name'];
            $dataRes = $this->UsersModel->createAdmin($email,$name);
            echo json_encode($dataRes);
        }
    }
}
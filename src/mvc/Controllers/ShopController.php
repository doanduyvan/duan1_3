<?php

namespace Controllers;

use Core\Controller;
use Core\Session;

class ShopController extends Controller{
    private $data = [];
    private $productsModel = null;
    private $categoryModel = null;
    private $brandModel = null;
    private $reviewModel = null;
    public function __construct()
    {
        $this->categoryModel = new \Models\CategoryModel();
        $this->productsModel = new \Models\ProductsModel();
        $this->brandModel = new \Models\BrandModel();
        $this->reviewModel = new \Models\ReviewModel();
        $this->data['Menu'] = 2;
        parent::Users();
    }

    public function index(){
        $this->data['products'] = $this->productsModel->getallproduct();
        $this->data['category'] = $this->categoryModel->getallcategory();
        $this->data['brands'] = $this->brandModel->getallbrand();
        $this->Render("Users/shop/ShopView",$this->data);
    }

    public function showproduct($id = null){

        if($id && !is_numeric($id)){
            header("Location:".WEB_ROOT."shop");
        }
        $this->data['product'] = $this->productsModel->getbyidproduct($id);
        if(empty($this->data['product'])){
            header("Location:".WEB_ROOT."shop");
        }
        $this->data['imgdetails'] = $this->productsModel->getimgdetails($id);
        $this->data['category'] = $this->categoryModel->getbyidcategory($this->data['product']['productcategory_id']);
        $this->data['idProduct'] = $id;
        $this->Render("Users/shop/ProductDetailView",$this->data);
    }

    public function cart(){
        $this->Render("Users/shop/CartView");
    }

    public function checkout(){
        $cart = Session::get("cart");
        if(!$cart){
            header("Location:". WEB_ROOT . "shop");
        }
        $this->data['cart'] = $cart;
        $this->Render("Users/shop/CheckoutView",$this->data);
    }

    // post

    public function addtocartpost(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $user = Session::checkUsers();
            if(!$user){
                $datarespon = [
                    "status" => 0,
                    "message" => "Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng"
                ];
                echo json_encode($datarespon);
                return;
            }else{
                $datarespon = [
                    "status" => 1,
                    "message" => "Thêm sản phẩm vào giỏ hàng thành công"
                ];
                echo json_encode($datarespon);
                return;
            }

            $dataresquest = json_decode(file_get_contents("php://input"),true);
            $test = ['ok' => 'da ket noi thanh cong'];

            echo json_encode($test);
        }
    }

    public function searchproduct(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $dataresquest = json_decode(file_get_contents("php://input"),true);
            $data = $this->productsModel->searchproduct($dataresquest['value']);
            echo json_encode($data);
        }
    }

    public function getcomment(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $dataresquest = json_decode(file_get_contents("php://input"),true);
            $idProduct = $dataresquest['idProduct'];
            $data = $this->reviewModel->getComment($idProduct);
            echo json_encode($data);
        }
    }

    public function addcomment(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $dataresquest = json_decode(file_get_contents("php://input"),true);
            $user = Session::get('account');
            if(!$user){
                $datarespon = [
                    "status" => 0,
                    "message" => "Bạn cần đăng nhập để bình luận"
                ];
                echo json_encode($datarespon);
                return;
            }
            $idUser = $user['id'];
            $content = $dataresquest['message'];
            if($content == ""){
                $datarespon = [
                    "status" => 0,
                    "message" => "Nội dung không được để trống"
                ];
                echo json_encode($datarespon);
                return;
            }
            $idProduct = $dataresquest['idProduct'];
            $time = NOW;
            $dataSave = [
                'users_id' => $idUser,
                'product_id' => $idProduct,
                'comment' => $content,
                'created_at' => $time
            ];
            $result = $this->reviewModel->addComment($dataSave);
            if($result){
                $datarespon = [
                    "status" => 1,
                    "message" => "Bình Luận đã được đăng"
                ];
                echo json_encode($datarespon);
                return;
            }else{
                $datarespon = [
                    "status" => 0,
                    "message" => "Có lỗi xảy ra"
                ];
                echo json_encode($datarespon);
                return;
            }
        }
    }
        
}
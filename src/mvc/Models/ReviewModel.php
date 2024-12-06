<?php
namespace Models;

class ReviewModel extends BaseModel{
    private $table = "reviews";

    function __construct()
    {
        parent::__construct();
    }

    public function getComment($idProduct){
        $sql = "SELECT re.*, u.fullname, u.img FROM $this->table as re inner join users as u on re.users_id = u.id WHERE product_id = $idProduct ORDER BY re.id DESC";
        $result = $this->query($sql);
        $data = [];
        if($result->rowCount() > 0){
            $data = $result->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function addComment($data){
        return $this->addrow($this->table,$data);
    }


}
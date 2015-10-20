<?php
namespace App\Product;


class Products
{
    public $user_id = '';
    public $title = '';
    public $description = '';
    public $product_picture = '';
    public $created = '';
    public $product_code = '';
    public $data = array();


    function __construct()
    {
        $this->conn = new \PDO('mysql:host=localhost;dbname=lostnfound', 'root', '');
        $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function add_product($title, $description, $product_code, $created, $user_id)
    {
        try {
            $this->title = $title;
            $this->description = $description;
            $this->product_code = $product_code;
            $this->created = $created;
            $this->user_id = $user_id;

            $query = "INSERT INTO products (user_id, title, description, product_code) VALUES (:user_id, :title, :description, :product_code)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(
                    ':user_id' => $this->user_id,
                    ':title' => $this->title,
                    ':description' => $this->description,
                    ':product_code' => $this->product_code)
            );
            $_SESSION['product_add_success'] = "Product Added Successfully";
            header('location:../../product_list.php');
        } catch
        (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
}
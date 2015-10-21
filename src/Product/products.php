<?php
namespace App\Product;


class Products
{
    public $user_id = '';
    public $title = '';
    public $description = '';
    public $product_id = '';
    public $product_picture = '';
    public $created = '';
    public $product_code = '';
    public $id = '';
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
            header('location:../../product_add.php');
        } catch
        (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    public function find_all_product($user_id)
    {
        try {
            $this->user_id = $user_id;

            $query = "SELECT * FROM `products` WHERE `products`.`user_id`=" . $this->user_id;
            $result = $this->conn->query($query);
            foreach ($result as $row) {
                $this->data[] = $row;
            }

            return $this->data;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    public function find_one_product($product_id)
    {
        try {
            $this->product_id = $product_id;
            $query = "SELECT * FROM `products` WHERE product_code='$this->product_id'";
            $result = $this->conn->query($query);
            foreach ($result as $row) {
                $this->data = $row;
            }
            return $this->data;
        } catch (\PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    public function product_update($title, $description, $product_code)
    {
        try {
            $this->title = $title;
            $this->description = $description;
            $this->product_code = $product_code;

            $sql = "UPDATE `products` SET `title`=:title, `description`=:description  WHERE `product_code` =:product_code";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':product_code', $product_code);
            $stmt->bindValue(':title', $title);
            $stmt->bindValue(':description', $description);
            if ($stmt->execute()) {
                $_SESSION['product_update_success'] = "Your Product Successfully Updated!";
                header('location:../../product_edit.php?id=' . $product_code);
            }
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    public function product_delete($product_code)
    {
        try {
            $this->product_code = $product_code;

            $sql = "DELETE FROM `products` WHERE `product_code` =:product_code";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array('product_code' => $this->product_code));
            header('location:../../product_list.php');
        }
        catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
}

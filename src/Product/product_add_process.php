<?php
include_once "../../vendor/autoload.php";
SESSION_START();
use App\Product\Products;
use App\Users\Users;
use App\utility;
use App\Profile\Profiles;


include 'dbConfig.php';
$statusMsg = '';

// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);


if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
       $title = $_POST['title'];
        $description = $_POST['description'];
        $product_picture = $_POST['product_picture'];
        $created = $_POST['created'];
        $product_code = $_POST['product_code'];
        $user_id = $_SESSION['user_id'];
        //creating object of product
        $product = new Products();

        //Adding data to database
        $product->add_product($title, $description, $product_code, $created, $user_id);
    } else {
        header('location:../../dashboard.php');
    }
     $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $db->query("INSERT into images (user_id, file_name, uploaded_on) VALUES ($user_id, '".$fileName."', NOW())");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}
else {
    $_SESSION['invalid'] = "Access Denied ! Please login for continue";
    header('location:../../index.php');
}

?>





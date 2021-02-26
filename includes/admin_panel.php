<?php
class Database{
 
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "api";
    private $username = "root";
    private $password = "k@m@l1997";
    public $conn;
 
    // get the database connection
    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
    
}

class Data{
 
    // database connection and table name
    private $conn;
    
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // check if given email exist in the database
    function insertInAdminPanel($subdomain,$company_logo,$company_name,$product_id,$domain_name,$user_id){
        
        // query to check if email exists
        $query = "INSERT INTO `adminpanel`( `u_id`,`subdomain`,`domain`,`company_logo`, `company_name`, `product_id`) VALUES ('".$user_id."','".$subdomain."','".$domain_name."','".$company_logo."','".$company_name."','".$product_id."')";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute the query
        $num = $stmt->execute();
    
        // if email exists, assign values to object properties for easy access and use for php sessions
        if($num>0){
    
            // get record details / values
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // return true because email exists in the database
            return true;
        }
    
        // return false if email does not exist in the database
        return false;
    }
    
}
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$data = new Data($db);
$subdomain = $_POST["subdomain"];
$user_id = $_POST["user_id"];
$domain_name = $_POST["domain_name"];
$company_logo;
$company_name = $_POST["company_name"];
$product_id = $_POST["product_id"];
$server_url = 'http://localhost';
$upload_dir_logo = 'admin_panel_logo_uploads/';
$response = array();

if($_FILES['logo'])
{
    $icon_name = $_FILES["logo"]["name"];
    $logo_tmp_name = $_FILES["logo"]["tmp_name"];
    $error = $_FILES["logo"]["error"];

    if($error > 0){
        $response = array(
            "status" => "error",
            "error" => true,
            "message" => "Error uploading the logo!"
        );
    }else 
    {
        $random_name = rand(1000,1000000)."-".$icon_name;
        $upload_name = $upload_dir_logo.strtolower($random_name);
        $upload_name = preg_replace('/\s+/', '-', $upload_name);
    
        if(move_uploaded_file($logo_tmp_name , $upload_name)) {
            $response = array(
                "status" => "success",
                "error" => false,
                "message" => "File uploaded successfully",
                "url" => $server_url."/".$upload_name
              );
              $company_logo = $server_url."/".$upload_name;
        }
        else
        {
            $response = array(
                "status" => "error",
                "error" => true,
                "message" => "Error uploading the file!"
            );
        }
    }
}else{
    $response = array(
        "status" => "error",
        "error" => true,
        "message" => "No file was sent!"
    );
}
$stmt = $data->insertInAdminPanel($subdomain,$company_logo,$company_name,$product_id,$domain_name,$user_id);
exec('php test.php', $output, $exitCode);
if($stmt==true){
    http_response_code(200);
    echo json_encode(
        array(
            "message" => "Inserted Successfully",
            "output" => $output
        )
    );
}
else{
    http_response_code(404);
    // tell the user no products found
    echo json_encode(
        array("message" => "Failed to save details")
    );
}
?>
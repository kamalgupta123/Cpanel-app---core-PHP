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
    function MakeApp($uid,$app_name,$splash_screen_image_path,$username,$domain,$phone,$email,$colorcode,$json_file_path){

            // query to check if email exists
            $query = "INSERT INTO `makeapp`(`uid`, `appname`, `splashscreen`, `username`, `domain`, `phone`, `email`, `colorcode`, `json_file`) VALUES (".$uid.",'".$app_name."','".$splash_screen_image_path."','".$username."','".$domain."','".$phone."','".$email."','".$colorcode."','".$json_file_path."')";

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
$data = new Data($db);
// initialize object
$uid = $_POST["uid"];
$app_name = $_POST["appname"];
$username = $_POST["username"];
$domain = $_POST["domain"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$colorcode = $_POST["colorcode"];
$splash_screen_image_path;
$json_file_path;
$upload_dir_file = 'file_uploads/';
$upload_dir_splash = 'splash_image_uploads/';
$server_url = 'http://localhost';

if($_FILES['file'])
{
    $file_name = $_FILES["file"]["name"];
    $file_tmp_name = $_FILES["file"]["tmp_name"];
    $error = $_FILES["file"]["error"];

    if($error > 0){
        $response = array(
            "status" => "error",
            "error" => true,
            "message" => "Error uploading the file!"
        );
    }else 
    {
        $random_name = rand(1000,1000000)."-".$file_name;
        $upload_name = $upload_dir_file.strtolower($random_name);
        $upload_name = preg_replace('/\s+/', '-', $upload_name);
    
        if(move_uploaded_file($file_tmp_name , $upload_name)) {
            $response = array(
                "status" => "success",
                "error" => false,
                "message" => "File uploaded successfully",
                "url" => $server_url."/".$upload_name
              );
            $json_file_path = $server_url."/".$upload_name;
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

if($_FILES['splash_image'])
{
    $splash_image_name = $_FILES["splash_image"]["name"];
    $splash_image_tmp_name = $_FILES["splash_image"]["tmp_name"];
    $error = $_FILES["splash_image"]["error"];

    if($error > 0){
        $response = array(
            "status" => "error",
            "error" => true,
            "message" => "Error uploading the splash_image!"
        );
    }else 
    {
        $random_name = rand(1000,1000000)."-".$splash_image_name;
        $upload_name = $upload_dir_splash.strtolower($random_name);
        $upload_name = preg_replace('/\s+/', '-', $upload_name);
    
        if(move_uploaded_file($splash_image_tmp_name , $upload_name)) {
            $response = array(
                "status" => "success",
                "error" => false,
                "message" => "File uploaded successfully",
                "url" => $server_url."/".$upload_name
              );
              $splash_screen_image_path = $server_url."/".$upload_name;
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

$stmt = $data->MakeApp($uid,$app_name,$splash_screen_image_path,$username,$domain,$phone,$email,$colorcode,$json_file_path);
exec('php test.php', $output, $exitCode);
if($stmt==true){
    http_response_code(200);
    echo json_encode(
        array(
            "message" => "Done Making App",
            "output" => $output
        )
    );
}
else{
    http_response_code(404);
    // tell the user no products found
    echo json_encode(
        array("message" => "Failed To Make App")
    );
}
?>
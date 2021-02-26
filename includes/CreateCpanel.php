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
    function CreateCpanel($username,$password,$user_id,$email,$domain_name,$client_name,$project_id){

        if(!empty($username)||!empty($password)||!empty($user_id)||!empty($email)||!empty($domain_name)||!empty($client_name)||!empty($project_id)){
            // query to check if email exists
            $query = "INSERT INTO `cpanel`(`username`, `password`, `user_id`, `email`, `domain_name`,`client_name`,`project_id`) VALUES ('".$username."','".$password."','".$user_id."','".$email."','".$domain_name."','".$client_name."',".$project_id.")";

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
$username = $_POST["username"];
$password = $_POST["password"];
$user_id = $_POST["user_id"];
$email = $_POST["email"];
$domain_name = $_POST["domain_name"];
$client_name = $_POST["client_name"];
$project_id = $_POST["project_id"];

$stmt = $data->CreateCpanel($username,$password,$user_id,$email,$domain_name,$client_name,$project_id);
exec('php test.php', $output, $exitCode);
if($stmt==true){
    http_response_code(200);
    echo json_encode(
        array(
            "message" => "Created Cpanel",
            "output" => $output
        )
    );
}
else{
    http_response_code(404);
    // tell the user no products found
    echo json_encode(
        array("message" => "Failed To Create Cpanel")
    );
}
?>
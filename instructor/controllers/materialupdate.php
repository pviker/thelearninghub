
<?

include ("../controllers/db.php");

if(isset($_POST["btn-upload"])) {
    
    
    $file_name = $_FILES["myFile"]["name"];
    $file_size = $_FILES["myFile"]["size"];
    $file_type = $_FILES["myFile"]["type"];
    $file_temp = $_FILES["myFile"]["tmp_name"];
    $date = date("m/d/Y");
    $title = $_POST["title"];
    
    $open_file = fopen($file_temp, "r");
    $file_content = fread($open_file, $file_size);
    $file_content = addslashes($file_content);
    fclose($open_file);
    
    if($file_size > 0) {
    
    $insert_query = "insert into course_content (file_name, file_type, file_size, file_content) values
    ('" . $file_name . "','" . $file_type . "','" . $file_size . "','" . $file_content . "')";
    
    mysqli_query($conn, $insert_query);
    
    $_SESSION["msg"] = "File uploaded successfully.";
    
    header("Location: ../view/content/addcoursematerials.php");
    
    } else {
        
        $_SESSION["errormsg"] = "Error. File not uploaded.";
    }
        
}

?>

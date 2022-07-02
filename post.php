<?php
include('config.php');
include('session.php');
if (isset($_POST['post'])) {
    $file_type = $_FILES['img']['type']; //نفصح نوع ملف 

    $allowed = array("image/jpeg", "image/jpg", "image/png");
    if (!in_array($file_type, $allowed)) {

        $img_err = '<h1 style = "color:red;">Only jpg, jpeg, and png files are allowed, <a href = "index.php">back to index</a></h1>';
        echo $img_err;



        exit();
    }
    $path = getcwd() . '\\img\\' . $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'], $path);
   
    $sql = "insert into posts (text_p, picture, create_at,User_id) values (?,?,?, ?)";
    

    if (!empty($link)) {
        $sql = mysqli_prepare($link,$sql);
        mysqli_stmt_bind_param($sql,"ssss",$content,$picture,$time,$user_id);
        $content  = $_POST['content'];
        $picture = $_FILES['img']['name'];
        $time =  date('Y-m-d h:i:sa');


        mysqli_stmt_execute($sql);
        mysqli_stmt_close($sql);
    } else {
        echo "<h1 style = 'color:red;'>Something went wrong, please try again later.</p>";
    }


?>
    <script>
        window.location = 'index.php';
    </script>
<?php
}
?>
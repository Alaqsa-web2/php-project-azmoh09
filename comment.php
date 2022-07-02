<?php
include('config.php');
include('session.php');


if (isset($_POST['comment'])) {

    $sql = "insert into comments (text, create_at, User_id, post_id ) values (?,?,?, ?)";
    if (!empty($link)) {
        $sql = mysqli_prepare($link,$sql );
        mysqli_stmt_bind_param($sql,"ssss",$comment,$time,$user_id,$post_id);

        $comment = $_POST['comment_content'];
        $post_id = $_POST['id'];
        $time =  date('Y-m-d h:i:sa');
        mysqli_stmt_execute($sql);
        mysqli_stmt_close($sql);
    } else {
        echo "Something went wrong, please try again later.";
    }


?>
    <script>
        window.location = 'index.php';
    </script>

<?php
}
?>
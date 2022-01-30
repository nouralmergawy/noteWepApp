<?php
 if(!isset($_SESSION)){ 
     session_start(); 
 } 
include_once 'DBConector.php';
$id_user = $_SESSION['id'];
$sql_show = "SELECT * FROM usernotes WHERE user_id ='$id_user'";
$query = mysqli_query($conn, $sql_show);
if(mysqli_num_rows($query)>0){
    while($row =mysqli_fetch_array($query) ){
        ?>
        <div class="col-md-4 mt-3">
            <div class="card">
                <h3 class="heading"><?php echo $row['note'];?></h3>
                <a href="home.php?edit=<?php echo $row['note_id'] ;?>"
                    class="btn btn-info float-right">Edit</a>
                <a href="note.php?delete=<?php echo $row['note_id'];?>"
                    class="btn btn-danger">Delete</a>
            </div>
        </div>
<?php
    }
}else {
    echo "empety ";
}
if(array_key_exists('add', $_POST)) {
    add($conn);
}

function add($conn) {
    $date = date('Y-m-d H:i:s');
    $note= $_POST['notebox'];
    if($note != ""){
        $id = $_SESSION['id'];
        $sql = "INSERT INTO usernotes (user_id,note,date) 
        VALUES ('$id','$note','$date')";
        if (mysqli_query($conn, $sql)) {
            echo "sucssfuly";
?>
            <meta http-equiv="refresh" content="0000; url=/webproject/home.php">
<?php
        } else {
            echo "Error: " . $sql . "
                " . mysqli_error($conn);
        }
    }else{
    }
}
if (isset($_GET['delete'])){
    delete($conn) ;
}

function delete($conn) {
    $id = $_GET['delete'];
    echo $id;
    $sql_delete = "DELETE FROM usernotes WHERE note_id ='$id'";
    if (mysqli_query($conn,$sql_delete)) {
        echo "sucssfuly";
?>
        <meta http-equiv="refresh" content="0000; url=/webproject/home.php">
<?php
	 } else {
		echo "Error: " . $sql_delete . "

" . mysqli_error($conn);
	 }
}

if(array_key_exists('update', $_POST)) {
    update($conn);
}

function update($conn) {
    $date = date('Y-m-d H:i:s');
    $note_update= $_POST['notebox'];
    $id= $_SESSION['note_id'];
    echo "tessst";
    echo $note_update;
    $sql_update = "UPDATE usernotes SET note = '$note_update' , date='$date' WHERE note_id='$id'";
    if (mysqli_query($conn,$sql_update)) {
        echo "sucssfuly";
?>
        <meta http-equiv="refresh" content="0000; url=/webproject/home.php">
<?php
	 } else {
		echo "Error: " . $sql_update . "
                    " . mysqli_error($conn);
	 }  
}

mysqli_close($conn);
?>
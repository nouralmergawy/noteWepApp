<?php
session_start();
if(!isset($_SESSION['id'])){
    echo 'you must sign in first you will be redirected...';
    header("refresh:4;url=http://localhost/webproject/index.php");
}else{?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>home</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="homeStyle.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>
<div class="container">
<div class="row">
<nav class="navbar navbar-dark " style=" background-color: #252347;
                                        margin-top: 7px;">
    <a class="navbar-brand" href="http://localhost/webproject/home.php">Note App</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/webproject/home.php">Home</a>
      </li>
    </ul>
    <a class="btn btn-outline-danger my-2 my-sm-0" href="http://localhost/webproject/logout.php">logout</a>
    </div>
    </nav>
    <div class="container">
    <form action="note.php" method="post">
<?php   
        if (isset($_GET['edit'])){
            include_once 'DBConector.php';   
            
            $id = $_GET['edit'];
            $select = "SELECT * FROM usernotes WHERE note_id ='$id'";
            if ( $res = mysqli_query($conn,$select)) {
                $row =mysqli_fetch_assoc($res);
                ?>
                 <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <input class="form-control" type="text" name ="notebox" id ="note"  
                        value = "<?php echo $row['note'];?>" placeholder="add your note">
                        </div>
                    </div>
                    <div class="col-md-4">        
                        <div class="form-group">
                        <button id="update" class="btn btn-primary" name="update" value="update">update</button>
                        </div>
                    </div>
<?php
                if(!isset($_SESSION)){ 
                    session_start(); 
                } 
                $_SESSION['note_id'] =  $id;
                echo "sucssfuly";
            } else {
                echo "Error: " . $select . "
        
        " . mysqli_error($conn);
             }
        }else {?>
        <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                    <input  class="form-control" type="text" name ="notebox"id ="note"  
                        value ="" placeholder="add your note">
                </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
                <button id="add" class="btn btn-primary" name="add" value="add">add</button>
            </div>
            </div>
        </div>

<?php
        }    
?>
    </form>
        <div class="row">
                <?php include_once 'note.php';?>
            </div>
        </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>

</html>
<?php
}
?>

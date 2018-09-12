<?php 
session_start();
/*if(!isset(_SESSION["uid"])){
    header("location:index.php");
}*/
?>

<!DOCTYPE html>
<?php 
include "db.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Awesome Shopping Center</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/selector.js"></script>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fix-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand">Awesome Shopping Store</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li style="left:10px;top:10px;">
                        <select name="search_cat" id="search_cat" style="width:50px;" class="form-control">
                                <option value=""></option>
                                <?php
                                    $sql="SELECT * FROM categories";
                                    $List=mysqli_query($con,$sql);
                                    if($List==FALSE){
                                        echo "query failed";
                                    }
                                    $Count=$List->num_rows;
                                    if($Count>0){
                                        while($row=$List->fetch_assoc()){
                                            echo '<option value='.$row["cat_id"].'>'.$row["cat_title"].'</option>';
                                        }
                                    }
                                ?>
                        </select>
                        <select id="width_tmp_select" style="display:none;">
                            <option id="width_tmp_option"></option>
                        </select>
                    </li>
                    <li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search"></li>
                    <li style="top:10px;left:20px;"><input type="submit" class="btn btn-primary" id="search_btn"></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
                        <div class="dropdown-menu" style="width:400px">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <div>
                                        <div class="row">
                                            <div class="clo-md-3">S1.No</div>
                                            <div class="clo-md-3">Product Image</div>
                                            <div class="clo-md-3">Product Name</div>
                                            <div class="clo-md-3">Price in $</div>
                                        </div>                                       
                                    </div>
                                </div>
                                <div class="panel-body"></div>
                                <div class="panel-footer"></div>
                            </div> 
                        </div>
                    </li>
                    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo "Hi,".$_SESSION["name"]; ?></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" style="text-decoration:none; color:blue;">Change  password</a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php" style="text-decoration:none; color:blue;">Log out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>    
        </div>
        <p><br/></p>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <div id="get_category"></div>
                    <div id="get_brand"></div>
                </div>
                <div class="col-md-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">Products</div>
                        <div class="panel-body">
                            <div id="get_product"></div>
                        </div>
                        <div class="panel-footer">&copy right; 2016</div>
                     </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </body>
</html>

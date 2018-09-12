<?php
include "db.php";
if(isset($_POST["category"])){
    $category_query="select * from categories";
    $run_query=mysqli_query($con,$category_query);
    echo "
        <div class='nav nav-pills nav-stacked'>
                        <li class='active'><a href='#'><h4>Categories</h4></a></li>
         ";
    if(mysqli_num_rows($run_query)>0){
        while($row=mysqli_fetch_array($run_query)){
            $cid=$row["cat_id"];
            $cat_name=$row["cat_title"];
            echo "<li><a href='#' class='category' cid='$cid'>$cat_name</li>";
        }
        echo "</div>";
    }
}

if(isset($_POST["brand"])){
    $brand_query="select * from brands";
    $run_query=mysqli_query($con,$brand_query);
    echo "
        <div class='nav nav-pills nav-stacked'>
                        <li class='active'><a href='#'><h4>Brands</h4></a></li>
         ";
    if(mysqli_num_rows($run_query)>0){
        while($row=mysqli_fetch_array($run_query)){
            $bid=$row["brand_id"];
            $brand_name=$row["brand_title"];
            echo "<li><a href='#' class='selectBrand' bid='$bid'>$brand_name</li>";
        }
        echo "</div>";
    }
}

if(isset($_POST["getProduct"])){
    $product_query="select * from products ORDER BY RAND() LIMIT 0,9";
    $run_query=mysqli_query($con,$product_query);
    if(mysqli_num_rows($run_query)>0){
        while($row=mysqli_fetch_array($run_query)){
            $pro_id=$row['product_id'];
            $pro_cat=$row['product_cat'];
            $pro_brand=$row['product_brand'];
            $pro_title=$row['product_title'];
            $pro_price=$row['product_price'];
            $pro_image=$row['product_image'];
            echo "<div class='col-md-4'>
                                <div class='panel panel-info'>
                                    <div class='panel-heading'>$pro_title</div>
                                    <div class='panel-body'>
                                        <img src='product_image/$pro_image' style='width:160px; height:160px;'/>
                                    </div>
                                    <div class='panel-heading'>$$pro_price.00
                                        <button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddtoCart</button>
                                    </div>
                                </div>
                            </div>";
        }
    }
}

if(isset($_POST["get_selected_Category"])){
    $cid=$_POST["cat_id"];
    $sql="select * from products where product_cat='$cid'";
    $run_query=mysqli_query($con,$sql);
    if(mysqli_num_rows($run_query)>0){
        while($row=mysqli_fetch_array($run_query)){
            $pro_id=$row['product_id'];
            $pro_cat=$row['product_cat'];
            $pro_brand=$row['product_brand'];
            $pro_title=$row['product_title'];
            $pro_price=$row['product_price'];
            $pro_image=$row['product_image'];
            echo "<div class='col-md-4'>
                                <div class='panel panel-info'>
                                    <div class='panel-heading'>$pro_title</div>
                                    <div class='panel-body'>
                                        <img src='product_image/$pro_image' style='width:160px; height:160px;'/>
                                    </div>
                                    <div class='panel-heading'>$$pro_price.00
                                        <button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddtoCart</button>
                                    </div>
                                </div>
                            </div>";
        }
    }
}

if(isset($_POST["search"])){
    $keyword=$_POST["keyword"];
    $cat_id=$_POST["cat_id"];
    if($cat_id==""){
        $sql="select * from products where product_keywords like '%$keyword%'";
    }else{
        $sql="select * from products where product_keywords like '%$keyword%' and product_cat=$cat_id";
    }
    $run_query=mysqli_query($con,$sql);
    if(mysqli_num_rows($run_query)>0){
        while($row=mysqli_fetch_array($run_query)){
            $pro_id=$row['product_id'];
            $pro_cat=$row['product_cat'];
            $pro_brand=$row['product_brand'];
            $pro_title=$row['product_title'];
            $pro_price=$row['product_price'];
            $pro_image=$row['product_image'];
            echo "<div class='col-md-4'>
                                <div class='panel panel-info'>
                                    <div class='panel-heading'>$pro_title</div>
                                    <div class='panel-body'>
                                        <img src='product_image/$pro_image' style='width:160px; height:160px;'/>
                                    </div>
                                    <div class='panel-heading'>$$pro_price.00
                                        <button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddtoCart</button>
                                    </div>
                                </div>
                            </div>";
        }
    }
}



?>

<?php
    require_once "config.php";
    $errors=[];
    session_start();
    if($_SERVER['REQUEST_METHOD']=='GET'){
    if(isset($_GET['id']) && !empty(trim($_GET['id'])) )
    {
            $id_through_get=trim($_GET['id']);
            $sql="SELECT * FROM medicines WHERE Medicine_id=?";
            if($stmt=mysqli_prepare($link,$sql))
            {
                    mysqli_stmt_bind_param($stmt,'i',$id_through_get);
                    mysqli_stmt_execute($stmt);
                    $result=mysqli_stmt_get_result($stmt);
                    if(mysqli_num_rows($result) == 1 )
                    {
                            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                            $id=$row['Medicine_id'];
                            $medicine_name=$row['Medicine_name'];
                            $diseases=$row['Diseases'];
                            $price_per_piece=$row['Price_per_piece'];
                            $selling_price=$row['selling_price'];
                            $total_stock=$row['total_stock'];
                            $in_stock=$row['in_stock'];
                    }
                    else{
                        echo "More than one ID";
                    }

            }else{
                echo "something Error occured";
            }
            
    }
    else{
        echo "Something Went Wrong";
    }
}
  else if($_SERVER['REQUEST_METHOD']=='POST'){

        $id=trim($_POST['medicine_id']);
        $medicine_name=trim($_POST['medicine_name']);
        $in_stock=trim($_POST['in_stock']);
        
        $sql="SELECT * FROM medicines WHERE Medicine_id=?";
        
            if($stmt=mysqli_prepare($link,$sql))
            {
                    mysqli_stmt_bind_param($stmt,'i',$id);
                    mysqli_stmt_execute($stmt);
                    $result=mysqli_stmt_get_result($stmt);
                    if(mysqli_num_rows($result) == 1 )
                    {
                            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                            $diseases=$row['Diseases'];
                            $price_per_piece=$row['Price_per_piece'];
                            $selling_price=$row['selling_price'];
                            $total_stock=$row['total_stock'];
                            $before_in_stock=$row['in_stock'];
                            $actual_name=$row['Medicine_name'];
                    }
            }
           
        $sql1="SELECT * FROM medicines WHERE Medicine_id=? AND Medicine_name=?";
        $stmt1=mysqli_prepare($link,$sql1);
        mysqli_stmt_bind_param($stmt1,'is',$id,$medicine_name);
        mysqli_stmt_execute($stmt1);
        $result=mysqli_stmt_get_result($stmt1);
        if(mysqli_num_rows($result)==1){
            
            $price_per_piece=$_POST['price_per_piece'];
            $selling_price=$_POST['selling_price'];
            $diseases=$_POST['disease'];
            if(filter_var($price_per_piece, FILTER_VALIDATE_INT) == false && filter_var($price_per_piece, FILTER_VALIDATE_FLOAT) == false){
                    $errors['price_not_num']= "There is string in the input ,please input only int or double.";
            }
            if(filter_var($selling_price, FILTER_VALIDATE_INT) == false && filter_var($selling_price, FILTER_VALIDATE_FLOAT) == false){
                $errors['selling_price_not_num']= "There is string in the input ,please input only int or double.";
        }
        if(filter_var($in_stock, FILTER_VALIDATE_INT) == false || $in_stock < 0){
            $errors['in_stock']="Please Write only positive integers.";
            }
           else if($in_stock <$before_in_stock)
            {
                $errors['in_stock']="Please Write a greater or equal value than " . $before_in_stock;
            }
            if(count($errors)==0)
            {
                $sql_update="UPDATE medicines SET Medicine_name=?, Diseases=?, Price_per_piece=?, selling_price=?, in_stock=?, total_stock=total_stock + ? WHERE Medicine_id=?";
                $stmt2=mysqli_prepare($link,$sql_update);
                $i=$in_stock-$before_in_stock;
                mysqli_stmt_bind_param($stmt2,'ssddiii',$medicine_name,$diseases,$price_per_piece,$selling_price,$in_stock,$i,$id);
                mysqli_stmt_execute($stmt2);
                if(isset($_SESSION['employee_password']))
                {
                    $url="employee.php?password=emp@123";
                    header('Location: ' . $url);
                }
                else if(isset($_SESSION['admin_password'])){
                        $url="admin.php?tablename=cart";
                        header('Location: ' . $url);}
            }
        }
        else{
            $sql="SELECT * FROM medicines WHERE Medicine_name=?";
            $stmt=mysqli_prepare($link,$sql);
            mysqli_stmt_bind_param($stmt,'s',$medicine_name);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result) == 1){
            $row=mysqli_fetch_array($result);
            $id_of_medicine=$row['Medicine_id'];
            $NAME_EXIST="The Medicine with same name already exists with ID : " . $id_of_medicine;
            $errors['name']=$NAME_EXIST;
        }
        }
    }
    ?>
<!DOCTYPE html>
<head>
    <title>Update the Medicine</title>
    <link rel="stylesheet" href="table.css">
</head>
<body>
   <form action="<?php echo $_SERVER['PHP_SELF'];?>" method=post>
    <table class="medicine_update">
        <tr><th>Medicine ID</th>
            <th><input type=text name="medicine_id" value=<?php echo $id; ?> hidden><?php echo $id ?></th>
        </tr>
        <tr><th>Medicine Name</th>
            <th><input type=text name="medicine_name" value=<?php echo  $medicine_name  ; ?> >
            <br>
            <small style="color:red;font-weight:420;"><?php echo $errors['name'] ?? '' ?></small>
        </th>
        </tr>
        <tr><th>Diseases</th>
            <th><input type=text name="disease" value=<?php echo $diseases; ?>></th>
        </tr>
        <tr><th>Price Per Piece</th>
            <th><input type=text name="price_per_piece" value=<?php echo $price_per_piece; ?>>
            <br>
            <small style="color:red;font-weight:420;"><?php echo $errors['price_not_num'] ?? '' ?></small></th>
        </tr>
        <tr><th>Selling Price</th>
            <th><input type=text name="selling_price" value=<?php echo $selling_price; ?>>
            <br>
            <small style="color:red;font-weight:420;"><?php echo $errors['selling_price_not_num'] ?? '' ?></small></th>
        </tr>
        <tr><th>In Stock</th>
        <th>
            <input type=text name="in_stock" value=<?php echo $in_stock; ?>>
            <br>
            <small style="color:red;font-weight:420;"><?php echo $errors['in_stock'] ?? '' ?></small>
            <br>
            <small style="color:red;font-weight:420;">Note : Increase in stock will also result in increase of total stock</small>
        </th>
        </tr>
        <tr><th>Total Stock</th>
            <th><?php echo $total_stock ?></th>
        </tr>
    </table>
    <div class="buttontotherow">
        <button type="submit" id="update">UPDATE</button>
    </div>
</form>
<div class="buttontotherow">
<form action="<?php if(isset($_SESSION['employee_password']))
                {
                    echo "employee.php";
                }
                else if(isset($_SESSION['admin_password'])){
                        echo "admin.php?tablename=cart";}
                      
            ?>" method="get">
    <input type="text" value="cart" name="tablename" hidden>
    <button type="submit">BACK TO THE CART</button>
</form>
</div>
</body>
</html>
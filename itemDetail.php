<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <link href="css/style.css" rel="stylesheet">
     
     <link href="css/fontawesome-all.css" rel="stylesheet">
     
</head>
<body>
    <nav class="custom-navbar navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Clothing Shop</a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
           
            <form class=" navbar-form navbar-right" action="index.php">
                <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default ">Submit</button>
                <!-- <a href="#" class="btn btn-success"><span class="fa fa-shopping-cart"></span></a> -->
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li ><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
                aria-haspopup="true" aria-expanded="false">Pages <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <?php
                $sql = "SELECT * FROM Category";
                $result = mysqli_query($con,$sql);
                if($result)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo"<li><a href='Subcategory.php?id=".$row['CategoryID']."'>".$row['CategoryName']."</a></li>";
                    }
                   
                }else
                {
                    echo "Table not found";
                }
                ?>
                    <!-- <li><a href="#">Man</a></li>
                    <li><a href="#">Woman</a></li>-->
                    <li><a href="#">Accessories</a></li> 
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
                </li>
                <li ><a href="#">Contact <span class="sr-only"></span></a></li>
            </ul>
           
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-->
    </nav>
    <div class="custom-slider">
         <div class="container">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              
                
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                  <?php
                if(isset($_GET['id']))
                {
                    $sql = "SELECT * FROM Item where ItemID=".$_GET['id'];
                    $result = mysqli_query($con,$sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $SubcategoryId=$row['SubcategoryID'];
                    
                    $sql = "SELECT * FROM Subcategory where SubcategoryID=".$SubcategoryId;
                    $result = mysqli_query($con,$sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $CategoryID = $row['CategoryID'];  
                        if($CategoryID==1)
                        {
                            echo "<img src='images/men-main.jpg' class='img-responsive' alt='Lorem ipsum dolor si amet'>";    
                        }else{
                            echo "<img src='images/women-main.jpg' class='img-responsive' alt='Lorem ipsum dolor si amet'>";    
                        }
                    }

                    }
                }
                else
                {
                    echo"invalid";
                }
                 
                ?>
                    
                  </div>
                </div>
              </div>
         </div> <!-- container -->
     </div> <!-- custom-slider -->
    <br>
    <br>
    <div class="custom-content">
        <div class="container" >
        <div class="row">
            <div class="col-md-4">
                
                    <?php
                    $sql = "SELECT * FROM Category";
                    $result = mysqli_query($con,$sql);
                    if($result)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                           echo"<div class='list-group'>";
                            echo "<a href='#' class='list-group-item disabled'><h3>".$row['CategoryName']."</h3></a>";
                            $sql = "SELECT * FROM Subcategory where CategoryID=".$row['CategoryID'];
                            $resulti = mysqli_query($con,$sql);
                        while($rowi = mysqli_fetch_assoc($resulti))
                        {   
                            $sql = "SELECT * FROM Item where SubcategoryID=".$rowi['SubcategoryID'];
                            $resultii = mysqli_query($con,$sql);
                            $itemCount=mysqli_num_rows($resultii);
                            echo"<a href='item.php?id=".$rowi['SubcategoryID']."' class='list-group-item'>".$rowi['Name']."<span class='badge'>".$itemCount."</span></a>";     
                        }
                        echo"</div>";
                        }
                       
                    }else
                    {
                        echo "Table not found";
                    }
                    ?>
                
            </div>
            <div class="col-md-8">
                
                <?php
                if(isset($_GET['id']))
                {
                    $sql = "SELECT * FROM Item where ItemID =".$_GET['id'];
                 $result = mysqli_query($con,$sql);
                 if($result)
                 {
                     while($row = mysqli_fetch_assoc($result))
                     {
                        echo "<div class='col-md-12'>
                            <div class='img-responsive'>
                                <a href='#'>";
                                echo "<img src='images/".$row['image']."' alt='Nature' style='width:100% '>";
                                echo"<div class='caption'>
                                    <h3 class='text-center'>".$row['Name']."</h3>
                                    </div>";
                                echo"</a>";
                                    echo"<div class='caption'>
                                    <h5 class='text-center'>"."Price:&nbsp".$row['Price']."</h5>
                                    <h5 class='text-center'>"."Size:&nbsp".$row['Size']."</h5>
                                    <h5 class='text-center'>"."Quantity:&nbsp".$row['Quantity']."</h5>
                                    </div>";
                            
                                echo "</div>
                                </div>";
                        //  echo"<li><a href='Subcategory.php?id=".$row['CategoryID']."'>".$row['CategoryName']."</a></li>";
                     }
                    
                 }else
                 {
                     echo "Table not found";
                 }

                }else
                {
                    echo"invalid";
                }
                 
                ?>
            </div>
        </div>

        </div><!-- container -->
    </div> <!-- custom-content -->
   <div class="navbar-bottom">
       <br>
       <div class="text-muted">
           <p class="text-center" >©Copyrights 2018</p>
        </div>
       
   </div>
    
</body>
</html>
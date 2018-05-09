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
           
            <form class=" navbar-form navbar-right">
                <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
                <!-- <a href="#" class="btn btn-success"><span class="fa fa-shopping-cart"></span></a> -->
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
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
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                 
                </ol>
              
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                    <img src="images/1.jpg" class="img-responsive" alt="Lorem ipsum dolor si amet">
                  </div>
                  <div class="item">
                    <img src="images/2.jpg" class="img-responsive" alt="Lorem ipsum dolor si amet">
                  </div>
                  ...
                </div>
              
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
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
                    <!-- <a href="#" class="list-group-item disabled"><h3>Men</h3></a>
                    
                    <a href="#" class="list-group-item">Morbi leo risus<span class="badge">14</span></a>
                    <a href="#" class="list-group-item">Porta ac consectetur ac<span class="badge">14</span></a>
                    <a href="#" class="list-group-item">Vestibulum at eros<span class="badge">14</span></a> -->
                    
                <!-- <div class="list-group">
                    <a href="#" class="list-group-item disabled"><h3>Women</h3></a>
                    <a href="#" class="list-group-item">Dapibus ac facilisis in<span class="badge">14</span></a>
                    <a href="#" class="list-group-item">Morbi leo risus<span class="badge">14</span></a>
                    <a href="#" class="list-group-item">Porta ac consectetur ac<span class="badge">14</span></a>
                    <a href="#" class="list-group-item">Vestibulum at eros<span class="badge">14</span></a>
                    </div> -->
            </div>
            <div class="col-md-8">
                <!-- <div class="col-md-6  ">
                    <img src="1.jpg"  alt="..." class="img-responsive">
                </div> -->
                <?php
                 $sql = "SELECT * FROM Category";
                 $result = mysqli_query($con,$sql);
                 if($result)
                 {
                     while($row = mysqli_fetch_assoc($result))
                     {
                        echo "<div class='col-md-6'>
                            <div class='img-responsive'>
                                <a href='Subcategory.php?id=".$row['CategoryID']."'>";
                                if($row['CategoryID']==1)
                                {
                                    echo "<img src='images/mens-clothing.jpg' alt='Nature' style='width:100% '>";
                                }else{
                                    echo "<img src='images/women-clothing.jpg' alt='Nature' style='width:100% '>";
                                
                                }
                                echo"<div class='caption'>
                                    <h3 class='text-center'>".$row['CategoryName']."</h3>
                                    </div>
                                </a>
                            </div>
                            </div>";
                        //  echo"<li><a href='Subcategory.php?id=".$row['CategoryID']."'>".$row['CategoryName']."</a></li>";
                     }
                    
                 }else
                 {
                     echo "Table not found";
                 }
                ?>
                <!-- <div class="col-md-6">
                        <div class="img-responsive">
                          <a href="#">
                            <img src="images/mens-clothing.jpg" alt="Nature" style="width:100% ">
                            <div class="caption">
                                <h3 class="text-center">Men</h3>
                            </div>
                          </a>
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="img-responsive">
                          <a href="#">
                            <img src="images/women-clothing.jpg" alt="Nature" style="width:100% ">
                            <div class="caption">
                                <h3 class="text-center">Women</h3>
                            </div>
                          </a>
                        </div>
                </div> -->
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
<!doctype html>
<html lang="en">

<head>
    <style>
    .card-img-top {
        width: 100%;
        height: 20vw;
        object-fit: cover;
    }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>iDiscuss </title>
</head>

<body>


    <body style='background-color: #9999ff'>
        <?php include "_header.php"?>
        <?php include "_dbconnect.php"?>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="carousel1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="carousel2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="carousel3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="container my-3">

            <h2 class="text-center">Welcome to iDiscuss- Browse Catergories</h2>
            <div class="row">
                <?php
                    $sql="SELECT * FROM `categories`";
                    $result=mysqli_query($conn,$sql);
                   
                    while ($row=mysqli_fetch_assoc($result)) {
                       $id= $row['category_id'];
                       // echo $row['category_name'];
                       $cat=$row['category_name'];
                       $cat_desc=$row['categoy_description'];
                         echo'<div class="col-md-4 my-2">
                        <div class="card " >
                            <img src="'.$cat.'.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><a href="thread_list.php?catid=' .$id. '">' .$cat. '</a></h5>
                                <p class="card-text">'.substr($cat_desc, 0, 90). '...
                                <br>
                                <a href="thread_list.php" class="btn btn-primary md -6" >Explore Forum</a> 
                            </div>
                        </div>
                        
                </div>';


                
                        
                        }
                    ?>
            </div>

        </div>







        <?php include "_footer.php"?>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
        </script>
    </body>

</html>


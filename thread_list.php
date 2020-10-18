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

    <php <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
            integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <title>iDiscuss </title>
</head>

<body>


    <body style='background-color: #9999ff'>
        <?php include "partials/_header.php"?>
        <?php include "partials/_dbconnect.php";?>
        <?php
        $id=$_GET['catid'];
        $sql="SELECT * FROM `categories` WHERE category_id=$id";
        $result=mysqli_query($conn,$sql);
         while ($row=mysqli_fetch_assoc($result)) {
            
            //echo $row['category_name'];
            $catname=$row['category_name'];
            $catdesc=$row['categoy_description'];
            
            
       
         }
         ?>
        <?php
        $method=$_SERVER['REQUEST_METHOD'];
        //$showalert=false;
        if ($method=='POST') {
            $th_title=$_POST['title'];
            $th_desc=$_POST['desc'];
            
            $sql="INSERT INTO `threads` ( `thread_title`, `thread_des`, `thread_user_id`, `thread_category_id`, `timestamp`) VALUES ( '$th_title', '$th_desc', '0', '$id', current_timestamp());";
            $result=mysqli_query($conn,$sql);
            //$showalert=true;
            /*if ($showalert) {
                echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
            }*/
        }
        ?>
        <div class="container" my-4>
            <div class="jumbotron">
                <h1 class="display-4">Welcome to <?php echo $catname ?> forums</h1>
                <p class="lead"></p>
                <hr class="my-4">
                <p><?php echo $catdesc?>

                </p>
                <p>
                    No Spam / Advertising / Self-promote in the forums.
                    Do not post copyright-infringing material.
                    Do not post “offensive” posts, links or images.
                    Do not cross post questions.
                    Do not PM users asking for help.
                    Remain respectful of other members at all times.
                </p>


            </div>
            <div class="container">
                <h3 style="text-align:center">Ask a question </h3>
            </div>
            <div class="container">

                <form method="post" action=<?php echo $_SERVER['REQUEST_URI']
                ?>>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><strong>Question Title</strong></label>
                        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp"
                            placeholder="Question title here">

                    </div>
                    <div class="form-group">
                        <label for="desc"><strong>Ellaborate your question</strong></label>
                        <textarea class="form-control" id="desc" name="desc" rows="3"
                            placeholder="Question description here"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>


            <h3 style="text-align:center">Browse questions </h3>
            <?php
                    $id=$_GET['catid'];
                    $sql="SELECT * FROM `threads` WHERE thread_category_id=$id";
                    $result=mysqli_query($conn,$sql);
                    $questions= true;
                   
                    while($row=mysqli_fetch_assoc($result)) {

                        // echo $row['category_name'];
                       
                        $id=$row['thread_id'];
                        $title=$row['thread_title'];

                        $desc=$row['thread_des'];
                        $questions=false;
                       
                  
                   
                        
                        echo' <div class="media">
                                <img src="userdefault.png" class="mr-3" alt="..." width="54" px>
                                <div class="media-body">
                                    <h5 class="mt-0"><a href="thread.php?threadid='.$id.'">'. $title .'</a></h5>
                           '.$desc.'
                        </div>
                    </div>';

                }
                        if ($questions) {
                    echo'<div class="alert alert-secondary" style="width: 100%;" role="alert">
    <p class="text-center">
     <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>        <strong>Oops!</strong> No questions found. Be the first one to ask.
    </p>
</div>'    ;
                    }
               
         
            
        ?> <?php //include "partials/_footer.php"?>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
                integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
                crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
                integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
                crossorigin="anonymous">
            </script>
    </body>

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Art by you</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php">Art by you</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="post.php">Post</a></li>
                        <li class="nav-item"><a class="nav-link" href="artist.php">Artists</a></li>
                        <li class="nav-item"><a class="nav-link" href="collections_T.php">Collections</a></li>
                        
                        <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Signin</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                    <li><a class="dropdown-item" href="signin.php">Sign In</a></li>
                                    <li><a class="dropdown-item" href="signin.php?redirect=false">Sign Out</a></li>
                                </ul>
                            </li>
                        

                    </ul>
                   
                </div>
            </div>
        </nav>

            <!--Artist image and Intro -->
            <section class="py-5 bg-light" id="scroll-target">
                <div class="container px-5 my-5">
                    <div>
                        <?php
                            $artistName=$_GET['name'];
                            require_once 'serverLogin.php';
                            $conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
                            if (!$conn)die("Unable to connect to MySQL: " . mysql_error());
                           
                
                            $myquery = "SELECT * from artists WHERE Name = '$artistName'";
                            $result=mysqli_query($conn,$myquery);
                            
                            
                            if($result = $conn->query($myquery)){
                                while ($line =$result->fetch_assoc()){
                                    $artistName = $line["Name"];
                                    $Image1 = $line["ArtistImage"];
                                    $artistType = $line["Type"];
                                    $artistIntro = $line["Description"];

                                
                            
                                    $output = <<<HTML
                                    <div class="row gx-5 align-items-center">
                                        <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0" src="$Image1" alt="..." /></div>
                                        <div class="col-lg-6">
                                            <h2 class="fw-bolder">$artistName - $artistType</h2>
                                            <p class="lead fw-normal text-muted mb-0">$artistIntro</p>
                                        </div>
                                    </div>
                                    HTML;

                                    echo $output;

                                }
                            }
                               

                                
                            mysqli_close ($conn); 
                        ?>
                    </div>
                </div>
            </section>


        <!--Artist's creations-->
        <section class="py-5">
                <div class="container px-5 my-5">
                    
                    <div class="row gx-5">
                        <?php
                            $artistName=$_GET['name'];
                            require_once 'serverLogin.php';
                            $conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
                            if (!$conn)die("Unable to connect to MySQL: " . mysql_error());
                           
                            $myquery1= "SELECT ArtistID from artists WHERE Name = '$artistName'";
                            $result1 = mysqli_query($conn, $myquery1);
                            $line = mysqli_fetch_assoc($result1);
                            $artistID = $line["ArtistID"];
                            $myquery = "SELECT * from artwork WHERE ArtistID = '$artistID'";
                            $result=mysqli_query($conn,$myquery);
                            
                            
                            if($result = $conn->query($myquery)){
                                while ($line2 =$result->fetch_assoc()){
                                    $artName = $line2["Title"];
                                    $Image = $line2["ArtImage"];
                                    $output = <<<HTML
                                                <div class="col-lg-4 mb-5">
                                        <div class="card h-100 shadow border-0">
                                            <img class="card-img-top" src="$Image" alt="..." />
                                            <div class="card-body p-4">
                                            
                                                <a class="text-decoration-none link-dark stretched-link"><h5 class="card-title mb-3">$artName</h5></a>
                                                
                                            </div>
                                        </div>
                                    </div> 
                                    HTML;
                                 echo $output;
                                }
                            }
                            mysqli_close ($conn);
                        ?>
                    </div>
                </div>
            </section>
        </main>


        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2022</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

<?php
session_start();
$artistID = $_SESSION['ArtistID'];
// connecting to database
require_once 'serverLogin.php';
$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
$query ="SELECT Name From artists WHERE ArtistID ='$artistID'";
$ans = mysqli_query($conn, $query);
if (mysqli_num_rows($ans) > 0) {
    $row = mysqli_fetch_assoc($ans);
    $artistName =$row["Name"];
}


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
            <!-- Page Content-->
            <!-- Contact form-->
            <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                <div class="text-center mb-5">
                    
                    <h1 class="fw-bolder"><?php echo $artistName; ?> Upload new Art</h1>
                    
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form method="post" id="contactForm" data-sb-form-api-token="API_TOKEN">

                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" name ="name" placeholder="Enter artist Name" data-sb-validations="required" />
                                <label for="name">Name</label>
                                <div class="invalid-feedback" data-sb-feedback="username:required">A name is required.</div>
                            </div>
                            <!--Art title input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="art-title" type="text" name ="artTitle" placeholder="Enter your art's title" data-sb-validations="required" />
                                <label for="art-title">Art Title</label>
                                <div class="invalid-feedback" data-sb-feedback="ArtTitle:required">A Art Title is required.</div>
                            </div>
                            <!--Theme-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="Theme" type="text" name ="Theme" placeholder="Enter your art's theme" data-sb-validations="required" />
                                <label for="theme">Theme</label>
                                <div class="invalid-feedback" data-sb-feedback="Theme:required">A Art Theme is required.</div>
                            </div>
                            <!--File Name for upload-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="fileName" type="text" name ="fileName" placeholder="upload your file" data-sb-validations="required" />
                                <label for="filename">File Name</label>
                                <div class="invalid-feedback" data-sb-feedback="password:required">A Art File is required</div>
                            </div> 

                           
                            
                            
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-lg " id="submitButton" type="submit" name="submit">Submit</button></div>

                            <?php
                                // connecting to database
                               require_once 'serverLogin.php';
                               $conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
                               
                               
                               if(isset($_POST['submit'])){
                                
                                
                                $name = $_POST['name'];
                                $artTitle = $_POST['artTitle'];
                                $theme = $_POST['Theme'];
                                $filename = $_POST['fileName'];
                                $fetchFile = "files/$theme/$filename";
                                
                                $myquery ="SELECT ArtistID FROM artists WHERE Name ='$name'";
                                $result = mysqli_query($conn,$myquery);
                                $line = $result->fetch_assoc();
                                $artistID = $line['ArtistID'];
                                

                                $myquery2 ="SELECT ThemeID FROM themes WHERE Theme ='$theme'";
                                $result2 = mysqli_query($conn,$myquery2);
                                $line2= $result2->fetch_assoc();
                                $ThemeID = $line2['ThemeID'];
                                

                                $statement = $conn->prepare("INSERT INTO artwork (Title, ArtImage, ThemeID, ArtistID) VALUES (?,?,?,?)");
                                $statement->bind_param("ssii" ,$artTitle ,$fetchFile ,$ThemeID, $artistID);
                                $statement->execute();


                                

                                

                               }  
                            
                            ?>
                        </form>
                    </div>
                </div>
            </div>
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

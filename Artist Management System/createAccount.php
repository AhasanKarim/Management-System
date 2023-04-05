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
            <!-- Page Content-->
            <!-- Contact form-->
            <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                <div class="text-center mb-5">
                    
                    <h1 class="fw-bolder">Create an account</h1>
                    
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
                        <form method="POST" id="contactForm" data-sb-form-api-token="API_TOKEN">

                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" name ="name" placeholder="Enter artist Name" data-sb-validations="required" required/>
                                <label for="name">Name</label>
                                <div class="invalid-feedback" data-sb-feedback="username:required">A name is required.</div>
                            </div>
                            <!--Type of Artist-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="artist-Type" type="text" name ="artistType" placeholder="Enter your artist type" data-sb-validations="required" required />
                                <label for="artist-Type">Type of Artist</label>
                                <div class="invalid-feedback" data-sb-feedback="password:required">A artist type is required.</div>
                            </div>
                            <!--About-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="description" type="text" name ="description" placeholder="Enter your description" data-sb-validations="required" required />
                                <label for="description">Tell us about you</label>
                                <div class="invalid-feedback" data-sb-feedback="password:required">A description is required.</div>
                            </div>
                            <!--Image of user-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="userImage" type="text" name ="userImage" placeholder="upload your file" data-sb-validations="required" required />
                                <label for="password">upload a image of yourself</label>
                                <div class="invalid-feedback" data-sb-feedback="password:required">A userImage is required</div>
                            </div> 
                            <!--Username-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="Username" type="text" name ="username" placeholder="Username" data-sb-validations="required" required/>
                                <label for="Username">create a username</label>
                                <div class="invalid-feedback" data-sb-feedback="password:required">A Username is required</div>
                            </div>
                            <!-- Password-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="password" type="password" name="password" placeholder="Enter your password..." data-sb-validations="required" required />
                                <label for="password">Password</label>
                                <div class="invalid-feedback" data-sb-feedback="password:required">A password is required.</div>
                            </div>

                           
                            
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br/>
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-lg w-25" id="submitButton" name="submit" type="submit">Submit</button></div>
                        </form>

                        <?php
                        // Checking for Form submission
                        if(isset($_POST['submit'])) {
                            $name = $_POST["name"];
                            $type = $_POST["artistType"];
                            $description = $_POST["description"];
                            $artistImage = $_POST["userImage"];
                            $artistImageDir = "files/artists/$artistImage";
                            $username = $_POST["username"];
                            $password = $_POST["password"];
                                                        
                                                        
                            
                            if (isset($_POST["submit"])) {

                            require_once 'serverlogin.php';
                            $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                                                    
                                
                                $query = "SELECT * FROM signin WHERE Username='$username'";
                                $result = mysqli_query($conn, $query);
                                $count = mysqli_num_rows($result);

                            if ($count > 0) {
                                // Error Message
                                $error = "Username already exists please try something else!";
                            } 
                            else {
                            // Inserting new artist into databases
                            $query = "INSERT INTO artists (Name, ArtistImage, Type, Description) VALUES ('$name','$artistImageDir','$type','$description')";
                            mysqli_query($conn, $query);
                                                    
                            $artist_id = mysqli_insert_id($conn);

                            $query = "INSERT INTO Signin (Username, Password, ArtistID) VALUES ('$username', '$password', '$artist_id')";
                            mysqli_query($conn, $query);
                            }
                                                            
                            session_start();

                            $_SESSION['signin'] = true;
                            $_SESSION['UserID'] = $row['UserID'];
                            $_SESSION['ArtistID'] = $row['ArtistID'];
                                                            
                            // Redirect to post page
                            header("Location: post.php");
                            exit;
                                                            
                                                        
                            }
                            
                            
                        }
                        
                        //Error Message
                        if(isset($error))
                        {
                            echo $error;
                        }
                        ?>

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

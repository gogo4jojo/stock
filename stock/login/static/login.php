<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale'1.0">
        <meta charset="UTF-8">
        <meta name="description" content="">
        <title>Login/Sign Up</title>
        <link rel="stylesheet" href="picture.css">
    </head>

    <body> 
            <?php
                $host = "localhost";
                $dbname = "test";
                $username = "new_user";
                $password = "password";

                $conn = mysqli_connect($host, $username, $password, $dbname);

                $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL); 
                $passcode = $_POST["passcode"];

                $select = mysqli_query($conn, "SELECT * FROM info WHERE (email = '$email' AND passcode = '$passcode');");

                if (mysqli_num_rows($select) > 0) {
                    $fetch = mysqli_fetch_assoc($select);
                    ?>
                    
                    <div class="container">
                        <h2>Welcome <?php echo $fetch['username'];?></h2>
                        <div class="profile-pic-div">
                            <img src="user.jpg" id="photo">
                            <input type="file" id="file" accept=".png,.jpg">
                            <label for="file" id="uploadBtn">Choose Photo</label>
                        </div>

                        <div class="options" class="form__input-group">
                            <a href='index.html' id="main">Main</a>
                            <h4>Posts</h4>
                            <h4>Comments</h4>
                            <h4 style="color:red">Sign out</h4>
                            <h4 style="color:red">Delete account</h4>     
                        </div>
                    </div>

                <?php
                    
                } else { 
                ?> 
                    <div class="container">
                        <p>"incorrect username/password"</p>
                        <a href='index.html'>Main</a>
                    </div>
                <?php
                }?> 
                

        <script src="picture.js"></script>
    </body>
</html>
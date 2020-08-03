<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
        footer {
        text-align: center;
       
        background-color: DarkSalmon;
        color: white;
        }
</style>
</head>
<body>
    <h2>CV Form</h2>
    <img src="job-portal.jpg" class="float-right" alt="Job Seeker" width="600" height="500"> 
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    <div class="form-group row">
        <label for="uname" class="col-sm-2 col-form-label">Name:</label>
            <div class="col-sm-10">
                <input type="text"  name="name" id="uname" placeholder="Enter Name">
            </div>
    </div>

    <div class="form-group row">
        <label for="ph" class="col-sm-2 col-form-label">Phone:</label>
            <div class="col-sm-10">
                <input type="text" name="phone" id="ph" placeholder="Enter Your Phone">
                
            </div>
    </div>

    <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label">Address:</label>
            <div class="col-sm-10">
                <input type="text" name="add" id="address"  placeholder="Enter Address">
                
            </div>
    </div>

    <div class="form-group row">
        <label for="nrcs" class="col-sm-2 col-form-label">NRC:</label>
            <div class="col-sm-10">
                <input type="text" name="nrc" id="nrcs"  placeholder="Enter NRC">
            </div>
    </div>

    <div class="form-group row">
        <label for="ee" class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
                <input type="email" name="email" id="ee"  placeholder="Enter Email" >
            </div>
    </div>

    <div class="form-group row">
        <label for="cc" class="col-sm-2 col-form-label">City:</label>
            <div class="col-sm-10">
                <input type="text" name="city" id="cc"  placeholder="Enter City">
            </div>
    </div>

    <div class="form-group row">
        <label for="edu" class="col-sm-2 col-form-label">Education:</label>
            <div class="col-sm-10">
                <textarea  name="edu" id="edu"></textarea>
            </div>
    </div>

    <div class="form-group row">
        <label for="ss" class="col-sm-2 col-form-label">Skills:</label>
            <div class="col-sm-10">
                <textarea   name="skill" id="ss"></textarea>
            </div>
    </div>

    <div class="form-group row">
        <label for="ex" class="col-sm-2 col-form-label">Experiences:</label>
            <div class="col-sm-10">
                <textarea   name="exp" id="ex"></textarea>
            </div>
    </div>

    <div class="form-group row">
        <label for="pp" class="col-sm-1 col-form-label">Position:</label>
            <div class="col-sm-10">
                <input type="text" name="pos" id="pp">
            </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary" name="submit">Sign in</button>
        </div>
    </div>

    <footer>
  <p>About Job Seeker</p>
</footer>
</form>

<?php include 'seekfunction.php';

        if(isset($_POST['submit']))
        {
        
            $name =$_POST["name"];
            $phone = $_POST["phone"];
            $address=$_POST["add"];
            $nrc =$_POST["nrc"];
            $email = $_POST["email"];
            $city=$_POST["city"];
            $education =$_POST["edu"];
            $skill = $_POST["skill"];
            $experience=$_POST["exp"];
            $position=$_POST["pos"];


            $list=new Seek($name,$phone,$address,$nrc,$email,$city,$education,$skill,$experience,$position);
            $list->Info();

            $arr=array("Name"=>$list->get_name(),"Phone"=>$list->get_phone(),"Address"=>$list->get_address(),"NRC"=>$list->get_nrc(),"Email"=>$list->get_email(),"City"=>$list->get_city(),"Education"=>$list->get_education(),"Skills"=>$list->get_skill(),"Experiences"=>$list->get_experience(),"Position"=>$list->get_position());
            $add=json_encode($arr);
            
            $myfile = fopen("seeker.txt", "a") or die("Unable to open file!");
            fwrite($myfile, $add."\n");
            fclose($myfile);

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "job";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO seeker (name, phone,address,nrc,email,city,education,skill,experience,position)
            VALUES ('$name', '$phone', '$address','$nrc','$email','$city','$education','$skill','$experience','$position')";

            if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }

        
              
    ?>


        

</body>
</html>
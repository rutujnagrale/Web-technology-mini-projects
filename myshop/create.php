<?php


$servername = "localhost";
$username = "root";
$password = "";
$database = "myshop";


$connection = new mysqli($servername,$username,$password,$database);

$name="";
$email="";
$phone="";
$address="";

if ( $_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    do{
        if( empty($name) || empty($email) || empty($phone) || empty($address) )
        {
            echo "Please fill all the fields";
            break;
        }

        // add new client into the database
        $sql = "INSERT INTO `clients`(`name`, `email`, `phone`, `address`) VALUES ('$name','$email','$phone','$address')";

        $result = $connection->query($sql);

        if(!$result)
        {
            echo "Error: " . $sql . "<br>" . $connection->error;
            break;
        }

        $name="";
        $email="";
        $phone="";
        $address="";

        echo "client added";

        header("location: index.php");
        exit;



    }while(false);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <title>MYshop</title>
</head>
<body>

    <div class="container my-5">
        <h2>New client</h2>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" values="<?php echo $name; ?>" >
                </div>
            </div>
           <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" values="<?php echo $email; ?>" >
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" values="<?php echo $phone; ?>" >
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" values="<?php echo $address; ?>" >
                </div>
            </div>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Sumbit</button>
                </div>
                <div class="offset-sm-3 col-sm-3 d-grid">
                   <a  class="btn btn-outline-primary"  href="index.php" role="button" >Cancel</a>
                </div>
            </div>
        </form>

   </div>
        
    
</body>
</html>
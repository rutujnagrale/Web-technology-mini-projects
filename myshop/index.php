<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>My shop</title>
</head>
<body>

<div class="container my-5" >
    <h2>List of client</h2>
    <a class = "btn btn-primary" href="create.php" role="button" >New client</a>
    <br>

    <table class="table" >

    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Address</td>
            <td>Created at</td>
            <td>Action</td>
        </tr>
    </thead>

    <tbody>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "myshop";


    $connection = new mysqli($servername,$username,$password,$database);
    if($connection->connect_error){
        die("Connection failed: ".$connection->connect_error);
    }


    $sql = "SELECT *from clients";
    $result = $connection->query($sql);

    if(!$result)
    {
        die("Invalid query : " . $connection->error);
    }

    while($row = $result->fetch_assoc()){
        echo "
        <tr>
            <td>$row[id]</td>
            <td>$row[name]</td>
            <td>$row[email]</td>
            <td>$row[phone]</td>
            <td>$row[address]</td>
            <td>$row[create_at]</td>
            <td>
                <a class='btn btn-primary btn-sm' href='edit.php?id= $row[id]'>Edit</a>

                <a class='btn btn-primary btn-sm' href='delete.php?id= $row[id]'>Delete</a>

            </td>
        </tr>
        
        ";
    }

    
    ?>
        
    </tbody>
    </table>

</div>
    
</body>
</html>
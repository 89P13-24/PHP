<?php

include 'config/db_connect.php';
    $name = '';
    $phone = NULL;
    $error ="";
    if(isset($_POST['submit'])){
        if(empty($_POST['name'])){
            $error = 'A Company name is required <br/>';
        }else{
            $name = $_POST['name'];
        }
        $phone = $_POST['phone'];
    
        if(!$error){
            $name = mysqli_real_escape_string($conn,$_POST['name']);
            $phone = mysqli_real_escape_string($conn,$_POST['phone']);

            $sql = "INSERT INTO pharmaco(name,phone_no) VALUES('$name','$phone')";

            if(mysqli_query($conn,$sql)){
                header('Location:index.php');
            }else{
                echo 'query.error'.mysqli_error($conn);
                }
        }
    }
?>

<html>
    <?php include 'templates/header.php'; ?>
    <h4 class="center grey-text">Add a Pharmaceutical Company</h4>
    <form action="PharmaCo.php" method = "POST" class = "white">
        <label for="name">Enter Company Name:</label>
        <input type="text" name = "name" value ="<?php echo htmlspecialchars($name)?>">
        <div class="red-text"><?php echo $error; ?></div>
        <label for="phone">Enter Phone Number</label>
        <input type="number" name ="phone" class = "block" value ="<?php echo htmlspecialchars($phone)?>" min ="100000000">
        <div class = "center">
            <input type="submit" name ="submit" value="submit" class = "btn brand z-depth-0">
        </div>
    </form>
    <?php include 'templates/footer.php'; ?>

</html>
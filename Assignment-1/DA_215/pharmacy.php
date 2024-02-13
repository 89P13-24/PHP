<?php
    include 'config/db_connect.php';
    $name = $address ='';
    $phone = NULL;
    $error ="";
    if(isset($_POST['submit'])){
        if(empty($_POST['name'])){
            $error = 'A Company name is required <br/>';
        }else{
            $name = $_POST['name'];
        }
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        if(!$error){
            $name = mysqli_real_escape_string($conn,$_POST['name']);
            $address = mysqli_real_escape_string($conn,$_POST['address']);
            $phone = mysqli_real_escape_string($conn,$_POST['phone']);

            $sql = "INSERT INTO pharmacy(name,address,phone_no) VALUES('$name','$address','$phone')";

            if(mysqli_query($conn,$sql)){
                header('Location: index.php');
            }else{
                echo 'query error'.mysqli_error($conn);
            }
        }
    }
?>

<html>
    <?php include 'templates/header.php'; ?>
    <h4 class="center grey-text">Add a Pharmacy</h4>
    <form action="pharmacy.php" method = "POST" class = "white">
        <label for="name">Enter Pharmacy Name:</label>
        <input type="text" name = "name" value ="<?php echo htmlspecialchars($name)?>">
        <div class="red-text"><?php echo $error; ?></div>
        <label for="address">Enter Address of Pharmacy:</label>
        <input type="text" name = "address" value ="<?php echo htmlspecialchars($address)?>">
        
        <label for="phone">Enter Phone Number</label>
        <input type="number" name ="phone" class = "block" min ="100000000" value="<?php echo htmlspecialchars($phone)?>">
        <div class = "center">
            <input type="submit" name ="submit" value="submit" class = "btn brand z-depth-0">
        </div>
    </form>
    <?php include 'templates/footer.php'; ?>

</html>
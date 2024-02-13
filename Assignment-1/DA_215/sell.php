<?php
    include 'config/db_connect.php';
    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $company = mysqli_real_escape_string($conn, $_POST['Cname']);
        $pharmacy = mysqli_real_escape_string($conn, $_POST['phname']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);

        $sql = "INSERT INTO sell(drug_name,company,pharmacy,price) VALUES('$name','$company','$pharmacy','$price')";
        if(mysqli_query($conn,$sql)){
            header('Location: index.php');
        }else{
            echo 'query error: '.mysqli_error($conn);
        }
    }
?>
<html>
    <?php include 'templates/header.php'; ?>
    <h4 class="center grey-text">Add Drug-Pharmacy Details</h4>
    <form action="sell.php" method = "POST" class = "white">
        <label for="name">Enter Drug's Trade_Name:</label>
        <input type="text" name = "name" value ="" required>
        <label for="Cname">Enter Drug's Company Name:</label>
        <input type="text" name = "Cname" value ="" required>
        <!-- <div class="red-text"><?php echo $errors['Cname']; ?></div> -->
        <label for="phname">Enter Drug available in </label>
        <input type="text" name ="phname" value="" required>
        <label for="price">Enter Drug's price (in Rs):</label>
        <input type="number" name = "price" value="">
        <div class = "center">
            <input type="submit" name ="submit" value="submit" class = "btn brand z-depth-0">
        </div>
    </form>
    <?php include 'templates/footer.php'; ?>

</html>
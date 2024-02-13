<?php
    include 'config/db_connect.php';
    if(isset($_POST['submit'])){
        $company = mysqli_real_escape_string($conn, $_POST['Cname']);
        $pharmacy = mysqli_real_escape_string($conn, $_POST['phname']);
        $start = mysqli_real_escape_string($conn, $_POST['start']);
        $end = mysqli_real_escape_string($conn, $_POST['end']);
        $info = mysqli_real_escape_string($conn, $_POST['info']);
        $supervisor = mysqli_real_escape_string($conn, $_POST['supervisor']);

        $sql = "INSERT INTO contracts(pharmacies,company,start_date,end_date,info,supervisor) VALUES('$pharmacy','$company','$start','$end','$info','$supervisor')";
        if(mysqli_query($conn,$sql)){
            header('Location: index.php');
        }else{
            echo 'query error: '.mysqli_error($conn);
        }
    }
?>
<html>
    <?php include 'templates/header.php'; ?>
    <h4 class="center grey-text">Add Contract Details</h4>
    <form action="contract.php" method = "POST" class = "white">
        <label for="Cname">Enter Pharmaceutical Company Name:</label>
        <input type="text" name = "Cname" value ="" required>
        <label for="phname">Enter Pharmacy Name:</label>
        <input type="text" name ="phname" value="" required>
        <label for="start">Enter Contract's start date:</label>
        <input type="date" name = "start" value="">
        <label for="end">Enter Contract's end date:</label>
        <input type="date" name = "end" value="">
        <label for="info">Enter Information about Contract:</label>
        <input type="text" name ="info">
        <label for="supervisor">Enter Supervisor's name:</label>
        <input type="text" name="supervisor">
        <div class = "center">
            <input type="submit" name ="submit" value="submit" class = "btn brand z-depth-0">
        </div>
    </form>
    <?php include 'templates/footer.php'; ?>

</html>
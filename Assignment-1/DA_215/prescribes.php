<?php

include 'config/db_connect.php';
$name = $Cname = $pssn = $dssn = "";
$date = $qty = NULL;
$errors = array('name' => '','Cname'=>'','pssn'=>'','dssn'=>'','date'=>'');
if(isset($_POST['submit'])){
    if(empty($_POST['name'])){
        $errors['name'] = 'Trade_Name is Required<br/>';
    }else{
        $name = $_POST['name'];
    }
    if(empty($_POST['Cname'])){
        $errors['Cname'] = 'Company Name is Required<br/>';
    }else{
        $Cname = $_POST['Cname'];
    }
    if(empty($_POST['pssn'])){
        $errors['pssn'] = 'Patient ID is Required<br/>';
    }else{
        $pssn = $_POST['pssn'];
    }
    if(empty($_POST['dssn'])){
        $errors['dssn'] = 'Doctor ID is Required<br/>';
    }else{
        $dssn = $_POST['dssn'];
    }
    $qty = $_POST['qty'];
    if(!array_filter($errors)){
        $pssn = mysqli_real_escape_string($conn, $_POST['pssn']);
        $dssn = mysqli_real_escape_string($conn, $_POST['dssn']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $company = mysqli_real_escape_string($conn, $_POST['Cname']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $qty = mysqli_real_escape_string($conn, $_POST['qty']);

        $sql = "INSERT INTO prescription(patient_id,doctor_id,drugs,company,pres_date,quantity) VALUES('$pssn','$dssn','$name','$Cname','$date','$qty')";
        if(mysqli_query($conn,$sql)){
            header('Location: index.php');
        }else{
            echo 'query error: '.mysqli_error($conn);
        }
    }
}

?>
<html>
    <?php include 'templates/header.php'; ?>
    <h4 class="center grey-text">Add a Prescription</h4>
    <form action="prescribes.php" method = "POST" class = "white">
        <label for="pssn">Enter Patient's ID</label>
        <input type="text" name = "pssn" value ="<?php echo htmlspecialchars($pssn)?>" >
        <div class="red-text"><?php echo $errors['pssn']; ?></div>
        <label for="dssn">Enter Doctor's ID</label>
        <input type="text" name = "dssn" value ="<?php echo htmlspecialchars($dssn)?>">
        <div class="red-text"><?php echo $errors['dssn']; ?></div>
        <label for="name">Enter Drug's Trade_Name:</label>
        <input type="text" name = "name" value ="<?php echo htmlspecialchars($name)?>">
        <div class="red-text"><?php echo $errors['name']; ?></div>
        <label for="Cname">Enter Drug's Company Name</label>
        <input type="text" name = "Cname" value ="<?php echo htmlspecialchars($Cname)?>">
        <div class="red-text"><?php echo $errors['Cname']; ?></div>
        <label for="date">Enter Date of Prescription</label>
        <input type="date" name = "date" value ="<?php echo htmlspecialchars($date)?>">
        <div class="red-text"><?php echo $errors['date']; ?></div>
        <label for="qty">Enter Drug's Quantity</label>
        <input type="number" name = "qty" class = "block" value ="<?php echo htmlspecialchars($qty)?>" min = "1">

        <div class = "center">
            <input type="submit" name ="submit" value="submit" class = "btn brand z-depth-0">
        </div>
    </form>
    <?php include 'templates/footer.php'; ?>

</html>
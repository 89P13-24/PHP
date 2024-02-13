<?php
include 'config/db_connect.php';
$ssn = $name = $speciality  = "";
$exp = NULL;
$errors = array('ssn' =>'','name'=>'','speciality' =>'','exp' => '');
    if(isset($_POST['submit'])){
        if(empty($_POST['ssn'])){
            $errors['ssn'] = 'An ID is required <br/>';
        }else{
            $ssn = $_POST['ssn'];
        }
        if(empty($_POST['name'])){
            $errors['name'] = 'Your name is required <br/>';
        }else{
            $name = $_POST['name'];
            if(!preg_match('/^[a-zA-Z\s]+$/',$name)){
                $errors['name'] = 'Name must be letters and space only <br?>';
            }
        }
        if(empty($_POST['speciality'])){
            $errors['speciality'] = 'A Speciality is required <br/>';
        }else{
            $speciality = $_POST['speciality'];
        }
        if(empty($_POST['exp'])){
            $errors['exp'] = 'Your years of experience is required <br/>';
        }else{
            $exp = $_POST['exp'];
            if($exp > 100){
                $errors['exp'] = 'Enter a Valid number <br/>';
            }
        }
        if(!array_filter($errors)){
            $ssn = mysqli_real_escape_string($conn, $_POST['ssn']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $years = mysqli_real_escape_string($conn, $_POST['exp']);
            $speciality = mysqli_real_escape_string($conn, $_POST['speciality']);
        

            $sql = "INSERT INTO doctor(ssn,name,speciality,years) VALUES('$ssn','$name','$speciality','$years')";
            if(mysqli_query($conn,$sql)){
                header('Location: index.php');
            }else{
                echo 'query error: '.mysqli_error($conn);
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'templates/header.php';?>
    
    <h4 class="center grey-text">Add a Doctor</h4>
    <form action="doctor.php" class = "white" method = "POST">
        <label for="ssn">Enter your ID:</label>
        <input type="text" name = "ssn" value= "<?php echo htmlspecialchars($ssn)?>">
        <div class="red-text"><?php echo $errors['ssn']; ?></div>
        <label for="name">Enter your Name:</label>
        <input type="text" name = "name" value = "<?php echo htmlspecialchars($name)?>">
        <div class="red-text"><?php echo $errors['name']; ?></div>
        <label for="exp">Enter your Years of Experience :</label><br>
        <input type="number" name = "exp" class = "block" min = "0" value = "<?php echo htmlspecialchars($exp)?>"><br>
        <div class="red-text"><?php echo $errors['exp']; ?></div>
        <label for="speciality">Enter your Speciality:</label>
        <input type="text" name = "speciality" value = "<?php echo htmlspecialchars($speciality)?>">
        <div class="red-text"><?php echo $errors['speciality']; ?></div>
        <div class="center">
        <input type="submit" name ="submit" class = "btn brand z-depth-0" value = "submit">
        </div>
    </form>
    
    
    <?php include 'templates/footer.php';?>

</html>

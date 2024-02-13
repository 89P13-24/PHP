<?php
include('config/db_connect.php');
$ssn = $name = $address  = $doc_id ="";
$age = NULL;
$errors = array('ssn' =>'','name'=>'','address' =>'','age' => '','doc_id' => '');
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
        if(empty($_POST['address'])){
            $errors['address'] = 'An address is required <br/>';
        }else{
            $address = $_POST['address'];
        }
        if(empty($_POST['age'])){
            $errors['age'] = 'Your age is required <br/>';
        }else{
            $age = $_POST['age'];
            if($age > 150){
                $errors['age'] = 'Enter a Valid age <br/>';
            }
        }
        if(empty($_POST['doc_id'])){
            $errors['doc_id'] = 'Doctor ID is required <br/>';
        }else{
            $doc_id = $_POST['doc_id'];
        }
        if(!array_filter($errors)){
            $ssn = mysqli_real_escape_string($conn, $_POST['ssn']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $age = mysqli_real_escape_string($conn, $_POST['age']);
            $address = mysqli_real_escape_string($conn, $_POST['address']);
            $doc_id = mysqli_real_escape_string($conn, $_POST['doc_id']);

            $sql = "INSERT INTO patient(ssn,name,address,age,doc_id) VALUES('$ssn','$name','$address','$age','$doc_id')";
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
    <h4 class="center grey-text">Add a Patient</h4>
    <form action="patient.php" class = "white" method = "POST">
        <label for="ssn">Enter your ID:</label>
        <input type="text" name = "ssn" value= "<?php echo htmlspecialchars($ssn)?>">
        <div class="red-text"><?php echo $errors['ssn']; ?></div>
        <label for="name">Enter your Name:</label>
        <input type="text" name = "name" value = "<?php echo htmlspecialchars($name)?>">
        <div class="red-text"><?php echo $errors['name']; ?></div>
        <label for="age">Enter your Age (in years):</label><br>
        <input type="number" name = "age" class = "block" min = "1" value = "<?php echo htmlspecialchars($age)?>"><br>
        <div class="red-text"><?php echo $errors['age']; ?></div>
        <label for="address">Enter your Address:</label>
        <input type="text" name = "address" value = "<?php echo htmlspecialchars($address)?>">
        <div class="red-text"><?php echo $errors['address']; ?></div>
        <label for="doc_id">Enter your Doctor's ssn:</label>
        <input type="text" name = "doc_id" value = "<?php echo htmlspecialchars($doc_id)?>">
        <div class="red-text"><?php echo $errors['doc_id']; ?></div>
        <div class="center">
        <input type="submit" name ="submit" class = "btn brand z-depth-0" value = "submit">
        </div>
    </form>
    
    <?php include 'templates/footer.php';?>

</html>
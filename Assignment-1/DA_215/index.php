<?php
include('config/db_connect.php');
    $error = "";
    $pass = $id = "";
    if(isset($_POST['submit'])){
        if($_POST['person'] == 'Doctor'){
            if($_POST['id'] == 'P13'){
                if($_POST['password'] == 'ishan'){
                    $pass = $_POST['password'];
                    $id = $_POST['id'];
                    
                    header("Location:docview.php?id=".$_POST['id']."");
                }else{
                    $error = "User does not exist or Invalid Password!!";
                }
            }
        }
        else{
            if($_POST['id'] == 'B12'){
                if($_POST['password'] == 'som'){
                    $pass = $_POST['password'];
                    $id = $_POST['id'];
                    
                    header('Location:patient.php');
                }else{
                    $error = "User does not exist or Invalid Password!!";
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'templates/header.php';?>
    
    <h4 class="center grey-text">Login:</h4>
    <form action="index.php" method ="POST" class ="white">
        <h6 class ="grey-text">You want to login as:</h6>
        
        <input type="radio" name ="person" value = "Doctor" id = "Doctor" required>
        <label for="Doctor" ><span class ="blue-text">Doctor</span></label><br>
        
        <input type="radio" name ="person" value= "Admin" id ="Admin" required>
        <label for="Admin"><span class ="blue-text">Admin</label><br>
        
        <label for="id">Enter your ID:</label>
        <input type="text" name ="id" value="" required>
        <label for="password">Enter your password:</label>
        <input type="password" name = "password" value="" required>
        <div class="center">
            <input type="submit" name = "submit" value = "submit" class = "btn brand z-depth-0">
        </div>
        <br><div class="red-text center"><?php echo $error; ?></div>
    </form>
    <?php include 'templates/footer.php';?>
</html>
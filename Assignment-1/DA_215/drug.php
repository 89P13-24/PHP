<?php
include 'config/db_connect.php';
$name = $Cname = $formula = "";
$errors = array('name' => '','Cname'=>'','formula'=>'');
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
    
    $formula = $_POST['formula'];

    if(!array_filter($errors)){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $company = mysqli_real_escape_string($conn, $_POST['Cname']);
        $formula = mysqli_real_escape_string($conn, $_POST['formula']);

        $sql = "INSERT INTO drug(name,company,formula) VALUES('$name','$Cname','$formula')";
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
    <h4 class="center grey-text">Add a Drug</h4>
    <form action="drug.php" method = "POST" class = "white">
        <label for="name">Enter Drug's Trade_Name:</label>
        <input type="text" name = "name" value ="<?php echo htmlspecialchars($name)?>">
        <div class="red-text"><?php echo $errors['name']; ?></div>
        <label for="Cname">Enter Drug's Company Name</label>
        <input type="text" name = "Cname" value ="<?php echo htmlspecialchars($Cname)?>">
        <div class="red-text"><?php echo $errors['Cname']; ?></div>
        <label for="formula">Enter Drug's Formula</label>
        <input type="text" name ="formula" value="<?php echo htmlspecialchars($formula)?>">
        <div class = "center">
            <input type="submit" name ="submit" value="submit" class = "btn brand z-depth-0">
        </div>
    </form>
    <?php include 'templates/footer.php'; ?>

</html>
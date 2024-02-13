<?php
    include 'config/db_connect.php';
    

    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn,$_GET['id']);
        // echo $id;
        // make sql
        $sql = "SELECT * FROM patient WHERE doc_id  = '$id' ";

        // get the query result
        $result = mysqli_query($conn,$sql);

        // fetch result in array format
        $patients = mysqli_fetch_all($result,MYSQLI_ASSOC);

        mysqli_free_result($result);
        mysqli_close($conn);

    }
    
?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'templates/header.php';?>

    <!-- <div class="container center">
        <?php if($pizza) :?>
            <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
            <p>Created by: <?php echo htmlspecialchars($pizza['email']);?></p>
            <p><?php echo date($pizza['created_at']); ?></p>
            <h5>Ingredients</h5>
            <p><?php echo htmlspecialchars($pizza['ingredients']);?></p>

            <form action="details.php" method = "POST">
                <input type="hidden" name = "id_to_delete" value="<?php echo $pizza['id'] ?>">
                <input type="submit" name = "delete" value = "Delete" class = "btn brand z-depth-0">
            </form>


        <?php else:?>
            <h5>NO such pizza exist!</h5>
        <?php endif;?>
    </div> -->

    <?php include 'templates/footer.php';?>
</html>
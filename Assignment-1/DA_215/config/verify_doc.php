<html>
    <?php include 'templates/verify.php'; ?>
    <section class="container grey-text">
        <h4 class="center">Login</h4>
        <form action="verify_doc.php" method ="POST" class ="white">
            <label for="ID">Enter your ID:</label>
            <input type="text" name = "ID" >
            <label for="Password">Enter your Password</label>
            <input type="text" name = "Password" id = "Password" required>
            <div class="center">
            <input type="submit" name ="submit" class = "btn brand z-depth-0" value = "submit">
            </div>
        </form>
    </section>
    
    <?php include 'templates/footer.php'; ?>
</html>

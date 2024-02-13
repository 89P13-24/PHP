<?php
    
    // function sayHello($name = 'Shaun' , $time = 'morning'){
    //     echo "Good $time $name";
    // }
    // //sayHello('yosi','night');

    // function formatProduct($product){
    //     //echo "{$product['name']} costs ^{$product['price']} to buy <br />";
    //     return "{$product['name']} costs ^{$product['price']} to buy <br />";
    // }

    // // $formatted = formatProduct(['name' => 'gold star' , 'price' => '20']);
    // // echo $formatted;
    // $name = 'mario';
    // function sayBye(&$name){
    //     $name = 'yuhshi';   // local variable
    //     echo "bye $name";
    // }

    // sayBye($name);
    // echo $name;
    // include('ninja.php'); 
    // require('ninja.php');     
    // echo 'end of php';

?>
<?php
include('config/db_connect.php');
// write query for all pizzas

$sql = 'SELECT title,ingredients,id FROM pizzas ORDER BY created_at';

// make query and get results
$result = mysqli_query($conn,$sql);
// fetch the resulting rows as an array
$pizzas = mysqli_fetch_all($result,MYSQLI_ASSOC);
//print_r($pizzas);
// free result fro memory
mysqli_free_result($result);
// close connection
mysqli_close($conn);

//print_r(explode(',',$pizzas[0]['ingredients']));

?>
<!DOCTYPE html>
<html lang="en">
        <?php include 'templates/header.php';?>
        
        <h4 class ="center grey-text">Pizzas!</h4>

        <div class="container">
            <div class="row">
                <?php foreach($pizzas as $pizza): ?>
                    <div class="col s6 md3">
                        <div class="card z-depth-0">
                            <div class="card-content center">
                                <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                                <ul>
                                    <?php foreach(explode(',',$pizza['ingredients']) as $ing){ ?>
                                        <li><?php echo htmlspecialchars($ing);?></li>
                                    <?php }?>
                                </ul>
                            </div>
                            <div class="card-action right align">
                                <a href="details.php?id=<?php echo $pizza['id'] ?>" class="brand-text">more info</a>
                            </div>
                        </div>
                    </div>    
                <?php endforeach; ?>
                <!-- <?php if(count($pizzas) >= 3) :?>
                    <p>there are 2 or more pizzas</p>
                <?php else:?>
                    <p>there are less than 3 pizzas</p>
                <?php endif?> -->
            </div>
        </div>

        <?php include 'templates/footer.php';?>

</html>
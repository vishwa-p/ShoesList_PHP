<!doctype html>
<html>
<head>
    <title>PHP amd MySQL</title>
    <link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div class="mainbg">
        <h1>Welcome to my online shoes store</h1>

        <?php
$connect = mysqli_connect(
//   'localhost',

//  'username',

//  'password',

//  'database');

 'localhost',

 'id18480862_vishwa',       

 'eSZq<Z0rGo-[hD6M',     

 'id18480862_sampledb'); 
 $query = 'SELECT id,companyName,description,type,Price,date,photo,ReturnPolicy
            FROM Shoes
             ORDER BY companyName';
             $result = mysqli_query($connect, $query);
             if (!$result)
             {
                 echo 'Error Message: ' . mysqli_error($connect) . '<br>';
                 exit;
             }
            
        while ($record = mysqli_fetch_assoc($result))
        {
            $data = base64_decode( explode( ',', $record['photo'] )[1] );

            ?>
        <div class="content">
            <div class="imgcls">
                <?php 
           echo '<img src="data:image/jpg;base64,'.base64_encode( $data ).'" width="250" height="250">'; 
               
            ?>
            </div>
            <div class="data">
                <?php
            if($record['companyName']){
                ?>
                <h4>Company Name:</h4>
                <?php echo '<p>' . $record['companyName'] . '</p>';
                echo '<br>';
            }
           
            if ($record['description'])
            {
                ?><h4>Description: </h4><?php echo '<p>' . $record['description'] . '</p>';
                echo '<br>';
            }
            if ($record['type'])
            {
                ?><h4>Shoes Type: </h4><?php echo '<p>' . $record['type'] . '</p>';
                echo '<br>';
            }
            if ($record['Price'])
            {
                ?><h4 class="Price">Offer Price: $</h4><?php echo '<p class="Price">' . $record['Price'] . '</p>';
                echo '<br>';
            }
            if ($record['date'])
            {
                ?><h4 class="last">Offer Last Date: </h4><?php echo '<p class="last">' . $record['date'] . '</p>';
                echo '<br>';
            }
            if ($record['ReturnPolicy'])
            {
                ?><h4>Return Policy: </h4><?php echo '<p>' . $record['ReturnPolicy'] . '</p>';
                echo '<br>';
            }
            ?>
            </div>
        </div>
        <?php
        }
?>
    </div>
</body>
</html>
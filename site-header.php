<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Brand Mart- Shop with joy.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yesteryear&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="index-responsive.css">
</head>
<body>
<div class="banner">
            <div class="banner-logo">
                <img src="asset/mart-logo.png">
            </div>
            <div class="banner-searchbar">
            <form action="site-header.php" method="post">
                <input type="text" name="search" placeholder="Search Products"> 
                <input type="submit" name="submit" img src="asset/seach-icon.svg"  ></a>
                </form>
            </div>
            <div class="checkout">       
                <div class="cart">
                    <a><img src="asset/shopping-cart.svg" width="18px"> </a>
                </div>
                <div class="avatar">
                    <a href="login.php"><img src="asset/avatar.svg" width="18px"> </a>
                </div>
            </div> <!--end of checkout-->

        </div> <!--end of banner-->
</body>
</html>



<?php

$con = new PDO("mysql:host=localhost;dbname=ecommerce",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `tblsearch` WHERE pname = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table>
			<tr>
				<th>Name</th>
				<th>Description</th>
                <th>Catagory</th>
			</tr>
			<tr>
				<td><?php echo $row->pname; ?></td>
				<td><?php echo $row->prize;?></td>
                <td><?php echo $row->catagory;?></td>
			</tr>

		</table>
<?php 
	}
		
		
		else{
			echo "Name Does not exist";
		}


}

?>
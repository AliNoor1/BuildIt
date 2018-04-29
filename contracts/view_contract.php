<?php include $_SERVER['DOCUMENT_ROOT'] . "/scripts/base.php";?>

<!DOCTYPE html>
<html>

	<head>
		<link href="/contracts/BuildIt_ContractorUser_Page_style.css" type="text/css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="/css/navbar.css" type="text/css" rel="stylesheet">

	</head>

	<title>Contract</title>

	<body>

	<!-- NAVIGATION BAR -->
<?php include $_SERVER['DOCUMENT_ROOT'] . "/common/navbar.php";?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] != "GET"){
        echo "ERROR!";
    }
    elseif (empty($_GET['id'])){
        echo "ERROR GETTING ID";
    }
    else{
        $sql_query = "SELECT * FROM contracts  
                        JOIN users ON contracts.userid=users.userID
                        WHERE contracts.contract_id=" . $_GET['id'] . ";";
        $raw_results = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        if(mysqli_num_rows($raw_results) == 0){
            die("Error getting results");
        }
        $results = mysqli_fetch_array($raw_results);

    }
    ?>

	<div class="parent">

		<div class="leftContainer">

		<div class="a">

			<div class="top">

				<div class="postImage">
					<img src="https://www.shedsusa.com/application/files/6314/9090/7391/2017_ReadyClassic_ss.jpg" >
				</div>

				<div class="topUserInfo">

					<div class="topRight">
                        <a href="/user/index.php?username=<?=$results['username']?>" style="text-decoration: none">
                            <div class="userParent">
                                <div class="userImg">
                                    <img src="https://www.weact.org/wp-content/uploads/2016/10/Blank-profile.png">
                                </div>
                                <div class="userName">
                                    <p><?=$results['firstName'] . " " . $results['lastName']?></p>
                                </div>

                            </div>
                        </a>

						<div class="buttons">

							<div class="message">
								<a href="#"><i class="fa fa-envelope"></i> Message</a>
							</div>

							<div class="save">
								<a href="#"><i class="fa fa-bookmark"></i> Save</a>
							</div>

							<div class="buy">
								<a href="#"><i class="fa fa-usd"></i> Buy</a>
							</div>

						</div>

					</div>

				</div>

			</div>

			<div class="userLocation">
				<p><i class="fa fa-map-marker"></i> <?=$results['city'] . ", " . $results['state']?> </p>
			</div>

			<div class="desc">

				<p><?=$results['description']?></p>

			</div>


		</div>

		</div>

		<div class="rightContainer">

			<div class="priceInfo">

				<h1>Construction Cost</h1>
				<h2>$<?=$results['construction_cost']?></h2>

				<h1>Buy-out</h1>
				<h2>$<?=$results['contract_cost']?></h2>

			</div>
			<div class="buyButton2">
				<a href="#"><i class="fa fa-usd"></i> Buy</a>
			</div>

			<div class="related">
				<h1>Related</h1>

				<div class="post">
					<a href="#"><img src="https://www.shedsusa.com/application/files/6314/9090/7391/2017_ReadyClassic_ss.jpg"></a>
				</div>

			</div>


		</div>

	</div>



	</body>

</html>
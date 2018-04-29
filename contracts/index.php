<?php include $_SERVER['DOCUMENT_ROOT'] . "/contracts/header.php";?>

		
		<!-- PARENT CONTAINING LEFT AND RIGHT CONTAINER SO THEY TAKE UP THE WHOLE PAGE EQUALLY -->
		<div class="parent">
			
			<!-- LEFT CONTAINER -->
			<div class="leftContainer">
                <form name="filters" action="index.php" method="get">
                    <h1>Filters</h1>

                    <!-- LOCATION -->
<!--                    <div class="location">-->
<!---->
<!--                        <h2>Location</h2>-->
<!---->
<!--                        <select name="location">-->
<!--                            <option value="any">Any</option>-->
<!--                            <option value="1mi">1 Mile</option>-->
<!--                            <option value="5mi">5 Miles</option>-->
<!--                            <option value="10mi">10 Miles</option>-->
<!--                            <option value="25mi">25 Miles+</option>-->
<!--                        </select>-->
<!---->
<!--                    </div>-->

                    <!-- SIZE -->
                    <div class="size">

                        <h2>Size</h2>

                        <select name="footprint">
                            <option value="any">Any</option>
                            <option value="tiny">Tiny</option>
                            <option value="small">Small</option>
                            <option value="medium">Medium</option>
                            <option value="large">Large</option>
                        </select>

                    </div>



                    <!-- PRICE -->
                    <div class="price">

                        <h2>Price</h2>

                        <select name="price">
                            <option value="any">Any</option>
                            <option value="1">$0 - $999</option>
                            <option value="2">$1000 - $1999</option>
                            <option value="3">$2000 - $2999</option>
                            <option value="4">$3000 - $3999</option>
                            <option value="5">$4000 - $4999</option>
                            <option value="6">$5000+</option>
                        </select>

                    </div>

                    <!-- FOUNDATION -->
                    <div class="foundation">

                        <h2>Foundation Design</h2>

                            <p>
                            <input type="checkbox" name="rectangle" value="1">
                                <label>Rectangle Foundation</label>
                            </input>
                            </p>
                            <p>
                            <input type="checkbox" name="square" value="1">
                                <label>Square Foundation</label>
                            </input>
                            </p>
                            <p>
                            <input type="checkbox" name="m" value="1">
                                <label>"M" Foundation</label>
                            </input>
                            </p>
                            <p>
                            <input type="checkbox" name="l" value="1">
                                <label>"L" Foundation</label>
                            </input>
                            </p>
                            <p>
                            <input type="checkbox" name="w" value="1">
                                <label>"W" Foundation</label>
                            </input>
                            </p>

                    </div>


                    <!-- ROOF -->
                    <div class="roof">

                        <h2>Roof Design</h2>

                            <p>
                            <input type="checkbox" name="gable" value="1">
                                <label>Gable Roof</label>
                            </input>
                            </p>
                            <p>
                            <input type="checkbox" name="slant" value="1">
                                <label>Slant Roof</label>
                            </input>
                            </p>
                            <p>
                            <input type="checkbox" name="gambrel" value="1">
                                <label>Gambrel Roof</label>
                            </input>
                            </p>
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Apply Filters">
                        <a href="create_contract.php">
                            <input type="button" value="Create Contract">
                        </a>
                    </div>
                </form>
				
			</div>



			<!-- RIGHT CONTAINER -->
			<div class="rightContainer">
				
				<h1>Available Contracts</h1>
                        <?php

                        if ($_SERVER['REQUEST_METHOD']==='GET' && !empty($_GET['footprint'])) {

                            $sql_query = "SELECT * FROM contracts join users on contracts.userid=users.userID WHERE";

                            $footprint = $_GET['footprint'];
                            if ($footprint === 'any') {
                                $footprint = '%';
                            }

                            $sql_query = $sql_query . " (`footprint` LIKE '%" . $footprint . "%')";

                            $price = $_GET['price'];
                            if ($price === '1'){
                                $pricemin = '0';
                                $pricemax = '999';
                            }
                            elseif ($price === '2'){
                                $pricemin = '1000';
                                $pricemax = '1999';
                            }
                            elseif ($price === '3'){
                                $pricemin = '2000';
                                $pricemax = '2999';
                            }
                            elseif ($price === '4'){
                                $pricemin = '3000';
                                $pricemax = '3999';
                            }
                            elseif ($price === '5'){
                                $pricemin = '4000';
                                $pricemax = '4999';
                            }
                            elseif ($price === '6'){
                                $pricemin = '5000';
                                $pricemax = '1000000000';
                            }
                            else{
                                $pricemin = '-1';
                                $pricemax = '100000000';
                            }

                            $sql_query = $sql_query . " AND (`contract_cost` BETWEEN $pricemin AND $pricemax) AND (";


                            $foundation_design = [];
                            if (!empty($_GET['rectangle'])){
                                array_push($foundation_design, "rectangle");
                            }
                            if (!empty($_GET['square'])){
                                array_push($foundation_design, "square");
                            }
                            if (!empty($_GET['m'])){
                                array_push($foundation_design, "m");
                            }
                            if (!empty($_GET['l'])){
                                array_push($foundation_design, "l");
                            }
                            if (!empty($_GET['w'])){
                                array_push($foundation_design, "w");
                            }
                            if (empty($foundation_design)){
                                array_push($foundation_design,"%");
                            }
                            $i = 0;
                            foreach ($foundation_design as $item) {
                                if ($i != 0){
                                    $sql_query = $sql_query . " OR";
                                }
                                $sql_query = $sql_query . " `foundation_design` like '" . $item . "'";
                                $i++;
                            }

                            $sql_query = $sql_query . ") AND (";

                            $roof_design = [];
                            if (!empty($_GET['gable'])){
                                array_push($roof_design, "gable");
                            }
                            if (!empty($_GET['square'])){
                                array_push($roof_design, "slant");
                            }
                            if (!empty($_GET['gambrel'])){
                                array_push($roof_design, "gambrel");
                            }
                            if (empty($roof_design)){
                                array_push($roof_design,"%");
                            }
                            $i = 0;
                            foreach ($roof_design as $item) {
                                if ($i != 0){
                                    $sql_query = $sql_query . " OR";
                                }
                                $sql_query = $sql_query . " `roof_design` like '" . $item . "'";
                                $i++;
                            }

                            $sql_query = $sql_query . ");";

                        }
                        else{
                            $sql_query = "SELECT * FROM contracts  join users on contracts.userid=users.userID;";
                        }
                        if (empty($_GET['page'])){
                            $_GET['page'] = 1;
                        }

                        $results_per_page = 10;
                            $raw_results = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
                            if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
                                if(mysqli_num_rows($raw_results) > $results_per_page){// need multiple pages
                                    $pages = ceil(mysqli_num_rows($raw_results)/$results_per_page);
                                }
                                $i = 1;
                                while($results = mysqli_fetch_array($raw_results)){
                                    // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
                                    if($i > ($_GET['page']-1)*$results_per_page && $i <= ($_GET['page'])*$results_per_page) {
                                        ?>
                                        <a href="view_contract.php?id=<?=$results['contract_id']?>">
                                            <div class="post">

                                                <div class="postImage">
                                                    <img src="https://www.shedsusa.com/application/files/6314/9090/7391/2017_ReadyClassic_ss.jpg"></img>
                                                </div>

                                                <div class="rightSide">

                                                    <div class="topUserInfo">

                                                        <div class="userParent">

                                                            <div class="userImg">
                                                                <img src="https://www.weact.org/wp-content/uploads/2016/10/Blank-profile.png"></img>
                                                            </div>

                                                            <div class="userName">
                                                                <p><?= $results['firstName']. " ". $results['lastName'] ?></p>
                                                            </div>

                                                            <div class="userLocation">
                                                                <p>
                                                                    <i class="fa fa-map-marker"></i> <?= $results['city'] ?>
                                                                    , <?= $results['state'] ?></p>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="desc">
                                                        <p><?= $results['description'] ?></p>
                                                    </div>

                                                    <div class="estimates">
                                                        <p>
                                                            <span>Costruction Cost: $<?= $results['construction_cost'] ?></span>
                                                            <span>Buy-out Contract: $<?= $results['contract_cost'] ?></span>

                                                        </p>
                                                    </div>

                                                    <div class="bottomLinks">

                                                        <a href="#"><i class="fa fa-usd" aria-hidden="true"></i> Buy</a>
                                                        <a href="#"><i class="fa fa-envelope"></i> Message</a>
                                                        <a href="#"><i class="fa fa-bookmark" aria-hidden="true"></i>
                                                            Save</a>

                                                    </div>

                                                </div>

                                            </div>
                                        </a>
                                        <?php
                                    }
                                    $i++;

                                }

                            }
                            else{ // if there is no matching rows do following
                                echo "No results";
                            }

                            echo '<div class="bottomNavBar">';
                            echo '<form method="GET" action="index.php" id="pagenumbers">';
                            for ($i=0; $i<$pages; $i++){
                                echo '<a href="#" onclick="document.getElementById(\'pagenumbers\').submit('.($i+1).');">' . ($i+1) . '</a>';
                            }
                            foreach($_GET as $name => $value) {
                                if ($name != 'page') {
                                    $name = htmlspecialchars($name);
                                    $value = htmlspecialchars($value);
                                    echo '<input type="hidden" name="' . $name . '" value="' . $value . '">';
                                }
                            }
                            echo '</form>';
                            ?>
            </div>

        </div>
        </div>




<?php include $_SERVER['DOCUMENT_ROOT']."/common/footer.php";?>

</body>


</html>
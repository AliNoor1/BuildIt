<?php include $_SERVER['DOCUMENT_ROOT'] . "/contracts/header.php";
if(empty($_SESSION['LoggedIn']))
{
    //the user is not signed in
    echo 'Sorry, you have to be <a href="/login/">signed in</a> to create a contract.';
}

elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $size = mysqli_real_escape_string($conn,$_POST['size']);
    $construction_cost = mysqli_real_escape_string($conn,$_POST['construction_cost']);
    $contract_cost = mysqli_real_escape_string($conn,$_POST['contract_cost']);
    $foundation = mysqli_real_escape_string($conn,$_POST['foundation']);
    $roof = mysqli_real_escape_string($conn,$_POST['roof']);
    $description = mysqli_real_escape_string($conn,$_POST['description']);
    $city = mysqli_real_escape_string($conn,$_POST['city']);
    $state = mysqli_real_escape_string($conn,$_POST['state']);
    $zip = mysqli_real_escape_string($conn,$_POST['zip']);

    $querystring = "INSERT INTO contracts (userid, footprint, construction_cost, contract_cost,
                        foundation_design, roof_design, description, city, state, zip) 
                            VALUES('".$_SESSION['userid']."','".
                                        $size."','".
                                        $construction_cost."','".
                                        $contract_cost."','".
                                        $foundation."','".
                                        $roof."','".
                                        $description."','".
                                        $city."','".
                                        $state."','".
                                        $zip."');";
    var_dump($querystring);
    $registerquery = mysqli_query($conn, $querystring);

    if($registerquery)
    {
        echo "<meta http-equiv='refresh' content='0;/contracts/' />";
    }
    else
    {
        echo "<h1>Error</h1>";
        echo "<p>BAD</p>";
    }
}
else{
?>

    <form method="post" action="create_contract.php">
        <div>
            <label for="size">Size:</label>
            <select name="size">
                <option value="tiny">Tiny</option>
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
            </select>
        </div>
        <div>
            <label for="price">Construction Price:</label>
            <input type="text" name="construction_cost"/>
        </div><div>
            <label for="price">Contract Price:</label>
            <input type="text" name="contract_cost"/>
        </div>
        <div>
            <label for="foundation">Foundation Design:</label>
            <select name="foundation">
                <option value="rectangle">Rectangle Foundation</option>
                <option value="square">Square Foundation</option>
                <option value="m">"M" Foundation</option>
                <option value="l">"L" Foundation</option>
                <option value="w">"W" Foundation</option>
            </select>
        </div>
        <div>
            <label for="roof">Roof Design:</label>
            <select name="roof">
                <option value="gable">Gable Roof</option>
                <option value="slant">Slant Roof</option>
                <option value="gambrel">Gambrel Roof</option>
            </select>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea type="text" name="description" rows="5"></textarea>
        </div>
        <div>
            <label for="city">City:</label>
            <input type="text" name="city"/>
        </div>
        <div>
            <label for="state">State:</label>
            <select name="state">
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="DC">District Of Columbia</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
            </select>
        </div>
        <div>
            <label for="zip">Zip Code:</label>
            <input type="text" name="zip"/>
        </div>
        <div>
            <input type="submit" name="submit" value="Create" />
        </div>
    </form>
<?php }?>
</body>
</html>
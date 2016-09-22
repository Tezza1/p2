<!--<?php
    error_reporting(E_ALL);       # Report Errors, Warnings, and Notices
    ini_set('display_errors', 1); # Display errors on page (instead of a log file)
?>-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Powerful Profession Password Provider & Protector</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
    <link rel="stylesheet" href="css/style.css">
</head>

</head>
<body>
    <header>
        <h1>Powerful Profession Password Provider & Protector</h1>
        <h3><em>Helping to generate safe passwords to protect your precious information</em></h3>
        <br>
    </header>
    
    <img src="img/encryption.jpg" alt="Encrption" title="Encryption"/>
    <br>
    
    <div class="column" id="instructions">
        <h3>Step 1</h3>
        <p><span class="keyText">Length:</span> Decide on the length of your password. All paswords should be a minimum of 10 characters and a maximum of 25 characters.</p>
        <h3>Step 2</h3>
        <p><span class="keyText">Numbers:</span> By default passwords will only include letters. but there is an option to include numbers in your passwords as well as letters.</p>
        <h3>Step 3</h3>
        <p><span class="keyText">Special characters:</span> There are options of whether to include special characters and if so, what type of special characters to include.</p>
    </div>
    <br>

    <!-- PHP FORM VALIDATION -->
    <?php include "validation.php";?>

    <form form method="POST" action="index.php">
        <fieldset>
            <legend>Password generator</legend>

            <!-- FORM INPUTS TO SPECIFY LENGTH OF PASSWORD -->
            <br>
            <div class="column">
                
                <label for="numberLength">Length of password (10 - 25):</label>
                <br>
                <input type="number" name="numberLength" placeholder="Enter length">
                <br>

                <!-- DISPLAY ERROR -->
                <span class="error"><?php echo $numberLengthErr;?></span>

                 <!-- FORM INPUTS TO SPECIFY IF NUMBERS ARE INCLUDED -->
                <br>
                <label for="includeNumber">Include number:</label>
                <br>
                <input type="checkbox" name="includeNumber" value="yes"> Yes
                <br>

                <!-- FORM INPUTS TO SPECIFY: WHETHER TO INCLUDE UPPER CASE, LOWER CASE, BOTH -->
                <br>
                <p></p>
                <label for="caseSensitive">Case sensitive:</label>
                <br>
                <input type="radio" name="radioCase" value="lowerCase"> Lower case<br>
                <input type="radio" name="radioCase" value="upperCase"> Upper case<br>
                <input type="radio" name="radioCase" value="mixedCase"> Mixed cases<br>

                <!-- DISPLAY ERROR -->
                <span class="error"><?php echo $caseErr;?></span>

                <!-- FORM INPUTS TO SPECIFY: WHETHER TO INCLUDE A SPECIAL SYMBOL -->
                <br>
                <p></p>
                <label for="specialCharacters">Special charaters:</label>
                <br>
                <select name="specialCharacters">
                    <option value="none">None</option>
                    <option value="combo1">#$%&</option>
                </select>
                <br>

                <br>
                <br>
                <button type="submit" name="submit" value="Submit">Submit</button>
            </div>
        </fieldset>
    </form>
    <div>
        <h2>Your password is:</h2>
        <span class="keyText">
            <?php
                if (empty($password)) {
                    // empty array
                }
                else {
                    for ($j = 0; $j < $numberLength; $j++) {
                        echo $password[$j]; 
                    }
                }
            ?>
        </span>
    </div>
</body>
</html>

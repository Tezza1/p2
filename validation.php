<?php

     // INITIALIZE VARIABLES
     $numberLengthErr = "";
     $numberLength = 0;

     $inclNumber = "";

     $caseErr = "";
     $case = "";

     $specialCharacterErr = "";
     $specialCharacters = "";

     if ($_SERVER["REQUEST_METHOD"] == "POST") {

          // PHP VALIDATION FOR PASSWORD LENGTH
          if (empty($_POST["numberLength"])) {
              $numberLengthErr = "* field is required <br>";
          }
          elseif ($_POST["numberLength"] < 10) {
              $numberLengthErr = "* length must be minimum 10 characters <br>";
          }
          elseif ($_POST["numberLength"] > 25) {
              $numberLengthErr = "* length must be maximum 25 characters <br>";
          }
          else {
              $numberLength = $_POST["numberLength"];
          }

          // PHP VALIDATION TO INCLUDE NUMBERS
          if (empty($_POST["includeNumber"])){

          }
          else {
             $checkItem = $_POST["includeNumber"];

             if ($checkItem == "yes") {
                $inclNumber = "YES";
             }
          }


          // PHP VALIDATION TO CHECK CASE OF LETTERS
          if (empty($_POST["radioCase"])) {
                  $caseErr = "* select case of password";
          }
           else {
                  $item = $_POST["radioCase"];

                  if ($item == "lowerCase") {
                      $case = "LOWER";
                  }
                  elseif ($item == "upperCase") {
                      $case = "UPPER";
                  }
                  elseif ($item == "mixedCase") {
                      $case = "MIXED";
                  }
                  else {
                      $case = "ERROR";
                  }
           }

           // PHP VALIDATION TO CHECK IF SPECIAL CHARACTERS ARE INCLUDED

           $item2 = $_POST["specialCharacters"];

           if ($item2 == "none") {
               $specialCharacters = "NO";
           }
           elseif ($item2 == "combo1") {
               $specialCharacters = "YES";
           }
           else {
               $specialCharacters = "ERROR";
           }
     }

     // GENERATE PASSWORD
     $password = array();

     for ($i = 0; $i < $numberLength; $i++) {

        // insert number
        if ($inclNumber == "YES" && $i%3 == 0) {
            $elementItem = rand(48,57);
        }
        elseif ($specialCharacters == "YES" && $i%5 == 0) {
            $elementItem = rand(35,38);
        }
        else {

            if ( $case == "LOWER") {
                $elementItem = rand(97,122);
            }
            elseif ( $case == "UPPER") {
                $elementItem = rand(65,90);
            }
            elseif ($case == "MIXED") {
                $choose = rand(1,10);

                if ($choose%2 == 0){
                    $elementItem = rand(97,122);
                }
                else {
                    $elementItem = rand(65,90);
                }
            }
            else {
                // No items selected
            }
        }

        if ($case != ""){
               $password[$i] = chr($elementItem);
        }
     }

?>
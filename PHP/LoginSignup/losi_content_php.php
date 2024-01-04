<?php

    $losi_sucess_msg = "";
    $losi_error_msg = "";

    function losiGetInput() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $losi_userType = $_POST["user_type"];
            $losi_signInSignUpType = $_POST["signin_signup_type"];

            $losi_signInID = $_POST["losi-form-signin-id-textbox"];
            $losi_signInPassword = $_POST["losi-form-signin-password-textbox"];

            $losi_signUpID = $_POST["losi-form-signup-id-textbox"];
            $losi_signUpName = $_POST["losi-form-name-signup-textbox"];
            $losi_signUpPassword = $_POST["losi-form-password-signup-textbox"];

            // SIGN IN
            if($losi_signInSignUpType == 'Sign In') {
                 // AGENT
                  if($losi_userType == 'Agent') {
                     // START COMPARE DATABASE
                  }
                    
                // SUPPLIER
                elseif($losi_userType == 'Supplier') {
                    echo "Supplier";
                }
            }
            // SIGN UP
            elseif($losi_signInSignUpType == 'Sign Up') {
                if($losi_userType == 'Agent') {

                    $conn = connectToDatabase();

                    $agentName = $_POST["losi-form-name-signup-textbox"];
                    $agentID = $_POST["losi-form-signup-id-textbox"];
                    $agentPassword = password_hash($_POST["losi-form-password-signup-textbox"], PASSWORD_DEFAULT); // Hash the password for security

                    $sql = "INSERT INTO agent (AgentID, AgentName, AgentPassword, AgentEmail) VALUES ('$agentID', '$agentName', '$agentPassword', '$agentID@example.com')";

                    if ($conn->query($sql) === TRUE) {
                        $sucess_msg = "Agent added successfully";
                        closeDatabaseConnection($conn);
                    } else {
                        $error_msg = "Error: " . $sql . "<br>" . $conn->error;
                        closeDatabaseConnection($conn);
                    }
                }
                elseif($losi_userType == 'Supplier') {
                    echo "Supplier";
                }
            }
                
        }
    }

    function losiMysql($conn) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $id = $_POST["losi-form-agents-id-signup-textbox"];
        $name = $_POST["losi-form-agents-name-signup-textbox"];
        $password = $_POST["losi-form-agents-password-signup-textbox"];

        // Insert data into the database
        $sql = "INSERT INTO agent (AgentID, AgentName, AgentPassword) VALUES ('$id', '$name', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

 ?>



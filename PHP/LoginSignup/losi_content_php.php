<?php

$losi_sucess_msg = "";
$losi_error_msg = "";

// Why put ternary operators? (?) This is because its to prevent the UNDEFINED error because it sets to null initially
$losi_userType = isset($_POST["user_type"]) ? $_POST["user_type"] : null;
$losi_signInSignUpType = isset($_POST["signin_signup_type"]) ? $_POST["signin_signup_type"] : null;

$losi_signInID = isset($_POST["losi-form-signin-id-textbox"]) ? $_POST["losi-form-signin-id-textbox"] : null;
// NANTI KELUARKAN NI
$losi_signInPassword = isset($_POST["losi-form-signin-password-textbox"]) ? $_POST["losi-form-signin-password-textbox"] : null;

$losi_signUpID = isset($_POST["losi-form-signup-id-textbox"]) ? $_POST["losi-form-signup-id-textbox"] : null;
$losi_signUpName = isset($_POST["losi-form-name-signup-textbox"]) ? $_POST["losi-form-name-signup-textbox"] : null;

session_start(); // Start the session

function losiGetInput() {
    global $losi_userType, $losi_signInSignUpType, $losi_signInID, $losi_signInPassword, $losi_signUpID, $losi_signUpName;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Check if keys are set before using them
        if (isset($losi_signInSignUpType)) {
            // SIGN IN
            if ($losi_signInSignUpType == 'Sign In') {
                // AGENT
                if (isset($losi_userType) && $losi_userType == 'Agent') {
                    // START COMPARE DATABASE
                } elseif (isset($losi_userType) && $losi_userType == 'Supplier') {
                    echo "Supplier";
                }
            }
            // SIGN UP
            elseif ($losi_signInSignUpType == 'Sign Up') {
                if (isset($losi_userType)) {
                    $conn = connectToDatabase();
                    $losi_signUpPassword = password_hash($_POST["losi-form-password-signup-textbox"], PASSWORD_DEFAULT) ?? null;
                    $sql = "INSERT INTO agent (AgentID, AgentName, AgentPassword, AgentEmail) VALUES ('$losi_signUpID', '$losi_signUpName', '$losi_signUpPassword', '$losi_signUpID@prestasi.com')";
                    $_SESSION['losi_signUpName'] = $losi_signUpName;
                    $_SESSION['losi_signUpID'] = $losi_signUpID;

                    if ($conn->query($sql) === TRUE) {
                        $sucess_msg = "Agent added successfully";
                        closeDatabaseConnection($conn);
                    } else {
                        $error_msg = "Error: " . $sql . "<br>" . $conn->error;
                        closeDatabaseConnection($conn);
                        echo "<h2><a href='index.php'>Click here to go back!</a>";
                    }
                } elseif (isset($losi_userType) && $losi_userType == 'Supplier') {
                    echo "Supplier";
                }
            }
        }
    }
}

function losiMysql($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $id = isset($_POST["losi-form-agents-id-signup-textbox"]) ? $_POST["losi-form-agents-id-signup-textbox"] : null;
        $name = isset($_POST["losi-form-agents-name-signup-textbox"]) ? $_POST["losi-form-agents-name-signup-textbox"] : null;
        $password = isset($_POST["losi-form-agents-password-signup-textbox"]) ? $_POST["losi-form-agents-password-signup-textbox"] : null;

        // Check if keys are set before using them
        if (isset($id, $name, $password)) {
            // Insert data into the database
            $sql = "INSERT INTO agent (AgentID, AgentName, AgentPassword) VALUES ('$id', '$name', '$password')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

?>
<?php
ob_start(); // Start the session
session_start();

$losi_errorMsg = "";

// Why put ternary operators? (?) This is because it's to prevent the UNDEFINED error because it sets to null initially
$losi_userType = isset($_POST["user_type"]) ? $_POST["user_type"] : null;
$losi_signInSignUpType = isset($_POST["signin_signup_type"]) ? $_POST["signin_signup_type"] : null;

$losi_signInID = isset($_POST["losi-form-signin-id-textbox"]) ? $_POST["losi-form-signin-id-textbox"] : null;
$losi_signInPassword = isset($_POST["losi-form-signin-password-textbox"]) ? $_POST["losi-form-signin-password-textbox"] : null;

$losi_signUpID = isset($_POST["losi-form-signup-id-textbox"]) ? $_POST["losi-form-signup-id-textbox"] : null;
$losi_signUpName = isset($_POST["losi-form-name-signup-textbox"]) ? $_POST["losi-form-name-signup-textbox"] : null;

function losiGetInput() {
    global $losi_userType, $losi_signInSignUpType, $losi_signInID, $losi_signInPassword, $losi_signUpID, $losi_signUpName, $losi_errorMsg;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $_SESSION['losi_signInSignUpType'] = $losi_signInSignUpType;

        // Check if keys are set before using them
        if (isset($losi_signInSignUpType)) {
            // SIGN IN
            if ($losi_signInSignUpType == 'Sign In') {
                // AGENT
                if (isset($losi_userType) && $losi_userType == 'Agent') {
                    // Connect to the database
                    $conn = connectToDatabase();

                    // Check if Agent ID exists
                    $checkExistingID = "SELECT * FROM agent WHERE AgentID = '$losi_signInID'";
                    $result = $conn->query($checkExistingID);

                    $_SESSION['losi_userType'] = $losi_userType;

                    if ($result->num_rows > 0) {
                        // Agent ID exists, verify password
                        $row = $result->fetch_assoc();
                        $agentName = $row['AgentName'];
                        $storedPassword = $row['AgentPassword'];

                        if (password_verify($losi_signInPassword, $storedPassword)) {
                            // Password is correct, set session variables
                            $_SESSION['losi_signInID'] = $losi_signInID;
                            $_SESSION['losi_signInName'] = $agentName;

                            // Redirect to agent dashboard
                            header("Location: dashboard_agent.php");
                            exit;
                        } else {
                            // Incorrect password
                            $losi_errorMsg = "Incorrect password for Agent ID <i><span style='color: yellow;'>$losi_signInID</span></i>.";
                            $_SESSION['losi_errorMsg'] = $losi_errorMsg;

                            closeDatabaseConnection($conn);
                            header("Location: losi_result.php");
                            exit;
                        }
                    } else {
                        // Agent ID doesn't exist
                        $losi_errorMsg = "Agent ID <i><span style='color: yellow;'>$losi_signInID</span></i> not found.";
                        $_SESSION['losi_errorMsg'] = $losi_errorMsg;

                        closeDatabaseConnection($conn);
                        header("Location: losi_result.php");
                        exit;
                    }
                } elseif (isset($losi_userType) && $losi_userType == 'Supplier') {
                    // Connect to the database
                    $conn = connectToDatabase();
                
                    // Check if Supplier ID exists
                    $checkExistingID = "SELECT * FROM supplier WHERE SupplierID = '$losi_signInID'";
                    $result = $conn->query($checkExistingID);

                    $_SESSION['losi_userType'] = $losi_userType;
                
                    if ($result->num_rows > 0) {
                        // Supplier ID exists, verify password
                        $row = $result->fetch_assoc();
                        $supplierName = $row['SupplierName'];
                        $storedPassword = $row['SupplierPassword'];
                
                        if (password_verify($losi_signInPassword, $storedPassword)) {
                            // Password is correct, set session variables
                            $_SESSION['losi_signInID'] = $losi_signInID;
                            $_SESSION['losi_signInName'] = $supplierName;
                
                            // Redirect to supplier dashboard
                            header("Location: dashboard_supplier.php");
                            exit;
                        } else {
                            // Incorrect password
                            $losi_errorMsg = "Incorrect password for Supplier ID <i><span style='color: yellow;'>$losi_signInID</span></i>.";
                            $_SESSION['losi_errorMsg'] = $losi_errorMsg;
                
                            closeDatabaseConnection($conn);
                            header("Location: losi_result.php");
                            exit;
                        }
                    } else {
                        // Supplier ID doesn't exist
                        $losi_errorMsg = "Supplier ID <i><span style='color: yellow;'>$losi_signInID</span></i> not found.";
                        $_SESSION['losi_errorMsg'] = $losi_errorMsg;
                
                        closeDatabaseConnection($conn);
                        header("Location: losi_result.php");
                        exit;
                    }
                }
                
            }
            // SIGN IN ENDS

            // SIGN UP
            elseif ($losi_signInSignUpType == 'Sign Up') {
                if (isset($losi_userType) && $losi_userType == 'Agent') {
                    // Connect to the database
                    $conn = connectToDatabase();

                    // Check if Agent ID already exists
                    $checkExistingID = "SELECT * FROM agent WHERE AgentID = '$losi_signUpID'";
                    $result = $conn->query($checkExistingID);

                    if ($result->num_rows > 0) {
                        // Agent ID already exists
                        $losi_errorMsg = "Agent ID of <i><span style = 'color: yellow;'>" . $losi_signUpID . "</span></i> already exists. Please choose a different ID.";
                        $_SESSION['losi_errorMsg'] = $losi_errorMsg;

                        closeDatabaseConnection($conn);
                        header("Location: losi_result.php");
                        exit;
                    } else {
                        // Agent ID doesn't exist, proceed with signup
                        $losi_signUpPassword = password_hash($_POST["losi-form-password-signup-textbox"], PASSWORD_DEFAULT) ?? null;
                        $_SESSION['losi_signUpName'] = $losi_signUpName;
                        $_SESSION['losi_signUpID'] = $losi_signUpID;

                        $sql = "INSERT INTO agent (AgentID, AgentName, AgentPassword, AgentEmail) VALUES ('$losi_signUpID', '$losi_signUpName', '$losi_signUpPassword', '$losi_signUpID@prestasi.com')";

                        if ($conn->query($sql) === TRUE) {
                            closeDatabaseConnection($conn);
                            // Redirect only after successful signup
                            header("Location: dashboard_agent.php");
                            exit;

                        } else {
                            closeDatabaseConnection($conn);
                        }
                    }
                    
                } elseif (isset($losi_userType) && $losi_userType == 'Supplier') {
                    // Connect to the database
                    $conn = connectToDatabase();
            
                    // Check if Supplier ID already exists
                    $checkExistingID = "SELECT * FROM supplier WHERE SupplierID = '$losi_signUpID'";
                    $result = $conn->query($checkExistingID);
            
                    if ($result->num_rows > 0) {
                        // Supplier ID already exists
                        $losi_errorMsg = "Supplier ID of <i><span style='color: yellow;'>" . $losi_signUpID . "</span></i> already exists. Please choose a different ID.";
                        $_SESSION['losi_errorMsg'] = $losi_errorMsg;
            
                        closeDatabaseConnection($conn);
                        header("Location: losi_result.php");
                        exit;
                    } else {
                        // Supplier ID doesn't exist, proceed with signup
                        $losi_signUpPassword = password_hash($_POST["losi-form-password-signup-textbox"], PASSWORD_DEFAULT) ?? null;
                        $_SESSION['losi_signUpName'] = $losi_signUpName;
                        $_SESSION['losi_signUpID'] = $losi_signUpID;
            
                        $sql = "INSERT INTO supplier (SupplierID, SupplierName, SupplierPassword, SupplierEmail) VALUES ('$losi_signUpID', '$losi_signUpName', '$losi_signUpPassword', '$losi_signUpID@prestasi.com')";
            
                        if ($conn->query($sql) === TRUE) {
                            closeDatabaseConnection($conn);
                            // Redirect only after successful signup
                            header("Location: dashboard_supplier.php");
                            exit;
            
                        } else {
                            closeDatabaseConnection($conn);
                        }
                    }
                }
            }
        }
    }
}
?>
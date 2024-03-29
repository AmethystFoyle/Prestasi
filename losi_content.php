<div id = "losi-form">
    <!-- FILES ORDER ARE IMPORTANT -->
    <?php include 'PHP/DatabasePHP/mysqlconnect.php'; ?>
    <?php include 'PHP/LoginSignup/losi_content_php.php'; ?>

    <form action = "losi_content.php" method = "POST" id = "losi-form-signup">
        <div class = "btn-container">
            <button type="button" class = "btn-single" id = "losi-agent-btn" onclick = "toggleButtons('losi-agent-btn', 'losi-supplier-btn')">Agent</button>
            <button type="button" class = "btn-single" id = "losi-supplier-btn" onclick = "toggleButtons('losi-supplier-btn', 'losi-agent-btn')">Supplier</button>
            <div class = "radio-btns" name = "user_type">
                <input type = "radio" name = "user_type" value = "Agent" id="losi-user-type-form-agent">A
                <input type = "radio" name="user_type" value = "Supplier" id="losi-user-type-form-supplier">S
            </div>
        </div>

        <div class = "btn-container losi-signin-signup-section">
            <button type="button" class = "btn-single" id = "losi-signin-btn" onclick = "toggleButtons('losi-signin-btn', 'losi-signup-btn'); displaySignInForm()">Sign In</button>
            <button type="button" class = "btn-single" id = "losi-signup-btn" onclick = "toggleButtons('losi-signup-btn', 'losi-signin-btn'); displaySignUpForm()">Sign Up</button>
            <div class = "radio-btns" name = "signin_signup_type">
                <input type = "radio" name = "signin_signup_type" value = "Sign In" id="losi-signin-radio">Sign In
                <input type = "radio" name = "signin_signup_type" value = "Sign Up" id="losi-signup-radio">Sign Up
            </div>
        </div>
        <div class = "losi-form-input">
            <!--Sign in-->
            <div class = "losi-form-input-signin-container" id = "losi-form-sign-in-supplier-id">
                <label for = "losi-form-supplier-id-label">Supplier ID</label>
                <input type="text" id="losi-form-supplier-sign-in-id-textbox" name="losi-form-signin-supplier-id-textbox" placeholder="Enter the supplier ID" pattern="\d{4}" minlength="4" maxlength="4" required>
            </div>
            <div class = "losi-form-input-signin-container">
                <label for = "losi-form-id-label">Your ID</label>
                <input type="text" id="losi-form-id-textbox" name="losi-form-signin-id-textbox" placeholder="Enter your ID - 4 digits only! No more, no less!" pattern="\d{4}" minlength="4" maxlength="4" required>
            </div>
            <div class = "losi-form-input-signin-container">
                <label for = "losi-form-password-label">Password</label>
                <input type = "password" id = "losi-form-password-textbox" name = "losi-form-signin-password-textbox" placeholder = "Enter your password" autocomplete="off" required>
            </div>
    
            <!--Sign up-->
            <div class = "losi-form-input-signup-container" id = "losi-form-sign-up-supplier-id">
                <label for = "losi-form-supplier-id-label">Supplier ID</label>
                <input type="text" id="losi-form-sign-up-supplier-id-textbox" name="losi-form-signup-supplier-id-textbox" placeholder="Enter the supplier ID" pattern="\d{4}" minlength="4" maxlength="4" required>
            </div>
            <div class = "losi-form-input-signup-container">
                <label for = "losi-form-id-signup-label">Your ID</label>
                <input type = "text" id = "losi-form-id-signup-textbox" name = "losi-form-signup-id-textbox" placeholder = "Enter your ID - 4 digits only! No more, no less!" pattern="\d{4}" minlength="4" maxlength="4" required>
            </div>
            <div class = "losi-form-input-signup-container">
                <label for = "losi-form-name-signup-label">Your Name</label>
                <input type = "text" id = "losi-form-name-signup-textbox" name = "losi-form-name-signup-textbox" placeholder = "Enter your name" autocomplete="off" required>
            </div>
            <div class = "losi-form-input-signup-container">
                <label for = "losi-form-password-signup-label">Password</label>
                <input type = "password" id = "losi-form-password-signup-textbox" name = "losi-form-password-signup-textbox" placeholder = "Enter your password" autocomplete="off" required>
            </div>
            <div class = "losi-form-input-container">
                <label for = "losi-form-language-label">Interface Language</label>
                <div class = losi-form-language-container>
                    <button type="button" class = "btn-single" id = "losi-language-eng-btn" onclick = "toggleButtons('losi-language-eng-btn', 'losi-language-my-btn')">English</button>
                    <button type="button" class = "btn-single" id = "losi-language-my-btn" onclick = "toggleButtons('losi-language-my-btn', 'losi-language-eng-btn')">Bahasa Melayu</button>
                </div>
            </div>
            <input class = "btn-single" id = "losi-continue-btn" type = "submit" value = "Continue">
            <input type="hidden" name="submitted" value="TRUE" />

            <?php
                if(isset($_POST['submitted'])) {
                   losiGetInput();
            }
            ?>
        </div>
    </form>
</div>

<?php
ob_end_flush(); // Flush the output
?>
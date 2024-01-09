<div id = "losi-form">
    <!-- FILES ORDER ARE -->
    <?php include 'PHP/DatabasePHP/mysqlconnect.php'; ?>
    <?php include 'PHP/LoginSignup/losi_content_php.php'; ?>

    <form action = "index.php" method = "POST" id = "losi-form-signup">
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
            <div class = "losi-form-input-signin-container">
                <label for = "losi-form-id-label">Your ID</label>
                <input type = "text" id = "losi-form-id-textbox" name = "losi-form-signin-id-textbox" placeholder = "Enter your ID">
            </div>
            <div class = "losi-form-input-signin-container">
                <label for = "losi-form-password-label">Password</label>
                <input type = "password" id = "losi-form-password-textbox" name = "losi-form-signin-password-textbox" placeholder = "Enter your password">
            </div>
    
            <!--Sign up-->
            <div class = "losi-form-input-signup-container">
                <label for = "losi-form-id-signup-label">Your ID</label>
                <input type = "text" id = "losi-form-id-signup-textbox" name = "losi-form-signup-id-textbox" placeholder = "Enter your ID" required>
            </div>
            <div class = "losi-form-input-signup-container">
                <label for = "losi-form-name-signup-label">Your Name</label>
                <input type = "text" id = "losi-form-name-signup-textbox" name = "losi-form-name-signup-textbox" placeholder = "Enter your name" required>
            </div>
            <div class = "losi-form-input-signup-container">
                <label for = "losi-form-password-signup-label">Password</label>
                <input type = "password" id = "losi-form-password-signup-textbox" name = "losi-form-password-signup-textbox" placeholder = "Enter your password" required>
            </div>
            <div class = "losi-form-input-container">
                <label for = "losi-form-language-label">Interface Language</label>
                <div class = losi-form-language-container>
                    <button type="button" class = "btn-single" id = "losi-language-eng-btn" onclick = "toggleButtons('losi-language-eng-btn', 'losi-language-my-btn')">English</button>
                    <button type="button" class = "btn-single" id = "losi-language-my-btn" onclick = "toggleButtons('losi-language-my-btn', 'losi-language-eng-btn')">Bahasa Melayu</button>
                </div>
            </div>
            <input class = "btn-single" id = "losi-continue-btn" type = "submit" value = "Continue">
            <h2 id = "losi-sucess-message"><?php echo $sucess_msg; ?></h2>
            <h2 id = "losi-error-message"><?php echo $error_msg; ?></h2>
        </div>
    </form>
</div>
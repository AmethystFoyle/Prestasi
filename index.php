<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestasi</title>

    <!-- Load the font IBM Plex Mono from Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/ui.css">

    <link rel="stylesheet" href="CSS/losi_title_section.css">
    <link rel="stylesheet" href="CSS/losi_form.css">
</head>
<body>
    <!-- 1. Login Signup -->
    <div id = "login-signup-landing-page">
        <?php include 'HTML/LoginSignup/losi_header.html'; ?>
        <?php include 'losi_content.php'; ?>
        <?php include 'HTML/Global/debug.html'; ?>
    </div>

    <!-- JAVASCRIPT ALL BELOW -->
    <!-- All Global JS -->
    <script src="JS/Global/toggle_button.js"></script>
    <script src="JS/Global/debug.js"></script>

    <!-- 1. Login Signup -->
    <script src="JS/LoginSignup/losi_main.js"></script>
</body>
</html>
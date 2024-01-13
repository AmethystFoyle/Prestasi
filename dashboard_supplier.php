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

    <link rel="stylesheet" href="CSS/dashboard_header.css">
    <link rel="stylesheet" href="CSS/dashboard_content.css">
</head>
<body>
    <div class = "dashboard">

        <?php include 'PHP/Dashboard/dashboardphp.php'; ?>

        <?php include 'HTML/Dashboard/dashboard_header.php'; ?>
        <?php include 'HTML/Dashboard/Agent/dashboard_agent_content.php'; ?>
        <?php include 'HTML/Global/debug.html'; ?>
    </div>

    <!-- JAVASCRIPT ALL BELOW -->
    <!-- All Global JS -->
    <script src="JS/Global/toggle_button.js"></script>
    <script src="JS/Global/debug.js"></script>
</body>
</html>
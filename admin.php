<?php
session_start();
if (isset($_SESSION["id"])) {
    header("location: pages/dashboard/dashboard.php");
} ?>
<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <title>Devfolio</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="color-scheme" content="light only" />
    <meta name="description" content="Meu portfolio." />
    <meta property="og:site_name" content="Portfolio" />
    <meta property="og:title" content="Portfolio" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Meu portfolio." />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="800" />
    <meta property="og:url" content="https://abdalazard.online" />
    <meta property="twitter:card" content="summary_large_image" />
    <link rel="canonical" href="https://abdalazard.online" />
    <link
        href="https://fonts.googleapis.com/css2?display=swap&family=Inter:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="./styles.css" />
    <script type="text/javascript" src="./index.js">
    </script>
</head>
<?php include_once 'icon/network.php'; ?>

<body class="is-loading">
    <div id="wrapper">
        <div id="main">
            <div class="inner">
                <div class="container">
                    <a href="index.php">
                        <h2 id="text02" class="style1">Go back</h2>
                    </a>
                    <div id="container01" class="style1 container default">
                        <div class="wrapper">
                            <div class="inner" data-onvisible-trigger="1">

                                <h2 id="text05" class="style1">Access</h2>
                                <form action="src/Login/Login.php" METHOD="POST">
                                    <div>
                                        <input type="text" name="user" placeholder="Usuário" required>
                                    </div>
                                    <hr />
                                    <div>
                                        <input type="password" name="password" placeholder="Senha" required>
                                    </div>
                                    <hr />
                                    <div> <input type="submit" value="Acessar" class="button">
                                    </div>

                                </form>
                                <?php
                                    if (isset($_GET["msg"])) {
                                ?>
                                <h3 class="style22">
                                    <?php echo $_GET["msg"] ?>
                                </h3>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="index.js"></script>
</body>

</html>
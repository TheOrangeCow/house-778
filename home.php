<?php 
session_set_cookie_params(0, '/', 'house-778.org');
session_start();

if (!isset($_SESSION["user_id"])) {
    session_set_cookie_params(0, '/', 'house-778.org');
    session_start();
    define('BASE_PATH', __DIR__ . '/../');
    function generateUsername() {
        $randomNumber = rand(1000, 9999);
        return "Guest" . $randomNumber;
    }
    
    $username = generateUsername();
    $_SESSION["username"] = $username;
    $_SESSION['user_id'] = 1;
}
include "base/main.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>House</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://house-778.theorangecow.org/base/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
        <link rel="icon" href="https://house-778.theorangecow.org/base/icon.ico" type="image/x-icon">
        <style>
            li {
              list-style: none;
              padding-left: 0;
              margin: 0;
            }
        </style>
        <style>
            .grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 30px;
                transition: opacity 0.8s ease;
            }
            
            .grid.visible {
                opacity: 1;
            }
            
            .card {
                background: rgba(180,180,180,0.12);
                border-radius: 20px;
                overflow: hidden;
                padding: 20px;
                box-shadow: 0 10px 25px rgba(0,0,0,0.12);
                transition: transform .35s ease, box-shadow .35s ease;
                cursor: pointer;
                display: block;
                text-decoration: none;
                color: inherit;
                opacity: 0;
            }
            
            .card:hover {
                transform: scale(1.05) rotate3d(1,1,0,6deg);
                box-shadow: 0 20px 40px rgba(0,0,0,0.18);
            }
            
            .card-title {
                font-size: 20px;
                margin-bottom: 8px;
                font-weight: 600;
            }
            
            .card-desc {
                color: #555;
                font-size: 15px;
            }
        </style>
    </head>
    <body>
        <canvas class="back" id="canvas"></canvas>
        <?php include 'base/sidebar.php'; ?>
        <div class="con">
            <button class="circle-btn" onclick="openNav()">☰ </button>  
            <div class="navbar"></div>
        
            <div class="welcome section" id="p1">
                <h1 id="title">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> to house-778!</h1>
                <?php 
                if (isset($_SESSION['username']) && stripos($_SESSION['username'], 'Guest') !== false) {
                    echo "<p style='color: red;'>Some projects require you to sign in.</p><a href='https://auth.house-778.theorangecow.org'>Sign in</a>";
                } else {
                    echo "<a href='https://auth.house-778.theorangecow.org/logout.php'>Logout</a>"; 
                }
                ?>
            </div>
        
            <div class="section" id="p2">
                <h2>About</h2>
                <p>Hi, I am TheOrangeCow. This website is where i host my php projects. 
                <a href="https://github.com/TheOrangeCow">My GitHub account</a></p>
        
                <h3>Tic-Tac-Toe with Unbeatable AI</h3>
                <div class="status">
                    <p id="gameStatus">Your turn (X)</p>
                </div>
        
                <div class="board">
                    <div class="cell" data-row="0" data-col="0"></div>
                    <div class="cell" data-row="0" data-col="1"></div>
                    <div class="cell" data-row="0" data-col="2"></div>
                    <div class="cell" data-row="1" data-col="0"></div>
                    <div class="cell" data-row="1" data-col="1"></div>
                    <div class="cell" data-row="1" data-col="2"></div>
                    <div class="cell" data-row="2" data-col="0"></div>
                    <div class="cell" data-row="2" data-col="1"></div>
                    <div class="cell" data-row="2" data-col="2"></div>
                </div>
        
                <button id="resetButton">Restart Game</button>
            </div>
        
            <div class="section" id="p3">
                <h2>Projects</h2>
                <p>These are some of the cool projects I have made in php.</p>
            </div>
        
            <div class="grid">
                <a href="https://profile.house-778.theorangecow.org" class="card" id="p4">
                    <div class="card-title">Profile</div>
                    <div class="card-desc">A site were you can conetct with other house users.</div>
                </a>
                <a href="https://theme.house-778.theorangecow.org" class="card" id="p5">
                    <div class="card-title">Theme</div>
                    <div class="card-desc">A site were you can change your background.</div>
                </a>
                <a href="https://auth.house-778.theorangecow.org/account/" class="card" id="p6">
                    <div class="card-title">Account</div>
                    <div class="card-desc">A site were you can change your account settings.</div>
                </a>
                <br>
                <a href="https://bluffball.house-778.theorangecow.org" class="card" id="p7">
                    <div class="card-title">Bluffball</div>
                    <div class="card-desc">A site made for nerds needing the latest football data, with tools to link it into conversations.</div>
                </a>
        
                <a href="https://w4-schools.house-778.theorangecow.org" class="card" id="p8">
                    <div class="card-title">W4 Schools</div>
                    <div class="card-desc">A rip-off of W3Schools with an extensive list of tutorials (3). 
                    <?php if(isset($_SESSION['username']) && stripos($_SESSION['username'],'Guest') !== false){echo "(You need a House account to use this feature.)";} ?>
                    </div>
                </a>
        
                <a href="https://house-stack.house-778.theorangecow.org" class="card" id="p9">
                    <div class="card-title">House Stack</div>
                    <div class="card-desc">A rip-off of Stack Overflow. Extensive list of users (0). 
                    <?php if(isset($_SESSION['username']) && stripos($_SESSION['username'],'Guest') !== false){echo "(You need a House account to use this feature.)";} ?>
                    </div>
                </a>
        
                <a href="https://wordle.house-778.theorangecow.org" class="card" id="p10">
                    <div class="card-title">Wordle</div>
                    <div class="card-desc">Shows Wordle answers for yesterday, today, and tomorrow. 
                    <?php if(isset($_SESSION['username']) && stripos($_SESSION['username'],'Guest') !== false){echo "(You need a House account to use this feature.)";} ?>
                    </div>
                </a>
        
                <a href="https://library.house-778.theorangecow.org/" class="card" id="p11">
                    <div class="card-title">Library</div>
                    <div class="card-desc">Play blackjack and pooheads with friends, without money. 
                    <?php if(isset($_SESSION['username']) && stripos($_SESSION['username'],'Guest') !== false){echo "(You need a House account to use this feature.)";} ?>
                    </div>
                </a>
        
                <a href="https://chat.house-778.theorangecow.org/" class="card" id="p12">
                    <div class="card-title">Chat</div>
                    <div class="card-desc">An online chat system you can embed into applications. 
                    <?php if(isset($_SESSION['username']) && stripos($_SESSION['username'],'Guest') !== false){echo "(You need a House account to use this feature.)";} ?>
                    </div>
                </a>
        
                <a href="https://encrypt.house-778.theorangecow.org" class="card" id="p13">
                    <div class="card-title">Encrypt</div>
                    <div class="card-desc">Encrypt words and images, and hide messages inside pictures.</div>
                </a>
        
            </div>
        
            <div class="section" id="p14">
                <p>Get excited</p>
                <h2>Upcoming projects</h2>
                <li>
                    <ul>
                        <h3>Friend Face</h3>
                        <p>A new and better version of Facebook from the IT crowd</p>
                    </ul>
                </li>
            </div>
        </div>

            
        <script>
        
            window.onload = function() {
                let index = 1;
                function showNext() {
                    if (index <= 14) {
                        //if (welcome) {
                            var welcome = document.getElementById("p" + index.toString());
                            if (welcome.classList.contains('card')) {
                                welcome.style.opacity = "1";
                            }
                            
                            welcome.classList.add('visible');

                            index++;
                            setTimeout(showNext, 500);
                        //}
                    }
                }
                showNext();
            };

    
        </script>

    </body>


    <script src="https://theme.house-778.theorangecow.org/background.js"></script>
    <script src="https://house-778.theorangecow.org/base/main.js"></script>
    <script src="https://house-778.theorangecow.org/base/sidebar.js"></script>
    <script src="https://house-778.theorangecow.org/oandx.js"></script>
</html>







<?php
$code = isset($_GET['code']) ? intval($_GET['code']) : 500;
$redirect = isset($_GET['redirect']) ? $_GET['redirect'] : null;

$messages = [
    400 => "Bad Request",
    401 => "Unauthorized",
    403 => "Forbidden",
    404 => "Page Not Found",
    500 => "Internal Server Error",
    503 => "Service Unavailable",
    418 => "You need a house account or i am a tea pot."
];

$message = $messages[$code] ?? "Something went wrong";

http_response_code($code);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Error <?php echo $code; ?></title>

<style>
body {
    margin: 0;
    overflow: hidden;
    font-family: 'Segoe UI', sans-serif;
    background: #000000;
    color: white;
}

#particles {
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: 0;
}

.container {
    position: relative;
    z-index: 1;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.glitch {
    font-size: 120px;
    font-weight: bold;
    position: relative;
    color: #803f00;
    animation: glitch 1s infinite;
}

.glitch::before,
.glitch::after {
    content: attr(data-text);
    position: absolute;
    left: 0;
}

.glitch::before {
    animation: glitchTop 1s infinite;
    color: orange;
    clip-path: inset(0 0 50% 0);
}

.glitch::after {
    animation: glitchBottom 1s infinite;
    color: orange; /*#b35c00;*/
    clip-path: inset(50% 0 0 0);
}

@keyframes glitch {
    0% { transform: none; }
    20% { transform: skew(-2deg); }
    40% { transform: skew(2deg); }
    60% { transform: none; }
}

@keyframes glitchTop {
    0% { transform: translate(0,0); }
    50% { transform: translate(-5px,-5px); }
    100% { transform: translate(0,0); }
}

@keyframes glitchBottom {
    0% { transform: translate(0,0); }
    50% { transform: translate(5px,5px); }
    100% { transform: translate(0,0); }
}

.message {
    font-size: 28px;
    margin: 10px 0;
}

.desc {
    color: #b8ad94;
    margin-bottom: 30px;
}

.btn {
    padding: 12px 25px;
    border-radius: 8px;
    background: #803f00;
    color: white;
    text-decoration: none;
    transition: 0.3s;
}

.btn:hover {
    transform: scale(1.05);
}
</style>
</head>

<body>

<canvas id="particles"></canvas>

<div class="container">
    <div class="glitch" data-text="<?php echo $code; ?>">
        <?php echo $code; ?>
    </div>
    <div class="message"><?php echo $message; ?></div>
    <div class="desc">Ops, something broke...</div>
    <a href="<?php echo $redirect ?: '/'; ?>" class="btn">Go Home</a>
</div>

<script>
const canvas = document.getElementById("particles");
const ctx = canvas.getContext("2d");

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

let particles = [];

for (let i = 0; i < 100; i++) {
    particles.push({
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height,
        vx: Math.random() - 0.5,
        vy: Math.random() - 0.5,
        size: Math.random() * 2
    });
}

function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    particles.forEach(p => {
        p.x += p.vx;
        p.y += p.vy;

        if (p.x < 0 || p.x > canvas.width) p.vx *= -1;
        if (p.y < 0 || p.y > canvas.height) p.vy *= -1;

        ctx.fillStyle = "#803f00";
        ctx.fillRect(p.x, p.y, p.size, p.size);
    });

    requestAnimationFrame(animate);
}

animate();

window.addEventListener("resize", () => {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
});
</script>

</body>
</html>
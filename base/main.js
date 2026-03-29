function remove() {
    setTimeout(
    function() {
            var domainFooter = document.getElementById("domainFooter");
    domainFooter.remove();
    }, 10);
}

document.addEventListener('DOMContentLoaded', (event) => {

    fetch('https://house-778.org/get_ip.php')
        .then(response => response.text())
        .then(ip => {
            //149.71.111.132 - old ip     
            if (ip.trim() === "138.124.236.230") {
                if (window.name !== "redirected") {
                    window.name = "redirected";
                    window.location.href = "https://778.house-778.org";
                }
                const popup = document.createElement('div');
                popup.id = 'popup';
                const popupMessage = document.createElement('span');
                popupMessage.id = 'popupMessage';
                popup.appendChild(popupMessage);
                document.body.appendChild(popup);

                const times = [
                    { hour: 11, minute: 55, message: "It's 5 mins until the end of break" },
                    { hour: 13, minute: 35, message: "It's 5 mins until the end of lunch" }
                ];
                function checkTime() {
                    const now = new Date();
                    const currentHour = now.getHours();
                    const currentMinute = now.getMinutes();

                    times.forEach(time => {
                        if (currentHour === time.hour && currentMinute === time.minute) {
                            showMessage(time.message);
                        }
                    });
                }

                function showMessage(message) {
                    popupMessage.textContent = message;
                    popup.style.display = 'block';
                    setTimeout(() => {
                        popup.style.display = 'none';
                    }, 60000);
                }


                setInterval(checkTime, 1000);
            } else {
                console.log("Not in school");
            }
        })
        .catch(error => {
            console.error(error);
        });
});

function openNav() {
    document.getElementById("sidenav").style.width = "250px";
}
function closeNav() {
    document.getElementById("sidenav").style.width = "0";
}




function copyCode(button) {
    const codeDiv = button.parentElement;
    const code = codeDiv.querySelector('code').innerText;
    navigator.clipboard.writeText(code).then(() => {
    button.textContent = 'Copied!';
    setTimeout(() => {
        button.textContent = 'Copy Code';
    }, 2000);
    }).catch(err => {
    console.error('Failed to copy code: ', err);
    });
}

console.log(`
▖▖          ▄▖▄▖▄▖
▙▌▛▌▌▌▛▘█▌▄▖ ▌ ▌▙▌
▌▌▙▌▙▌▄▌▙▖   ▌ ▌▙▌
                  

Hay develipar check out my github https://github.com/theorangecow
`);



/*const banner = document.createElement('div');
banner.id = 'refreshBanner';
banner.style.position = 'fixed';
banner.style.top = '0';
banner.style.width = '100%';
banner.style.backgroundColor = '#000';
banner.style.color = 'white';
banner.style.textAlign = 'center';
banner.style.padding = '15px';
banner.style.fontSize = '16px';
banner.style.cursor = 'pointer';
banner.style.zIndex = '1000';
banner.style.boxShadow = '0 2px 5px rgba(0, 0, 0, 0.2)';
banner.style.boxSizing = 'border-box';

const title = document.createElement('h1');
title.textContent = 'Updates Available!';
title.style.margin = '0';
title.style.fontSize = '18px';

const text = document.createElement('p');
text.innerHTML = "We've made some updates to our system. If your site doesn't look right, click the button below to reset. If you want to <a href='https://house-778.org/update.php' style='color: #4FC3F7;'>learn more</a>.";
text.style.margin = '5px 0 0';
text.style.fontSize = '14px';

const button = document.createElement('button');
button.textContent = 'Reset Page';
button.style.marginTop = '10px';
button.style.padding = '10px 20px';
button.style.fontSize = '16px';
button.style.color = 'black';
button.style.backgroundColor = '#ffffff';
button.style.border = 'none';
button.style.borderRadius = '5px';
button.style.cursor = 'pointer';
button.style.outline = 'none';

button.addEventListener('click', function() {
    window.location.reload(true);
});

banner.appendChild(title);
banner.appendChild(text);
banner.appendChild(button);

document.body.appendChild(banner);
setTimeout(function() {
    banner.style.transition = 'opacity 1s';
    banner.style.opacity = '0';
    setTimeout(function() {
        banner.style.display = 'none';
    }, 1000);
}, 5000);


*/
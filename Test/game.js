const canvas = document.getElementById("game");
const ctx = canvas.getContext("2d");
canvas.width = 600;
canvas.height = 400;

let spacePressed = false;
let angle = 0;
let frame =0;
let score = 0;
let gameSpeed = 0;

function anime () {
    ctx.clearRect(0,0, canvas.width, canvas.height);
    //ctx.fillRect(10, canvas.height - 90 ,50, 50);
    cart.update();
    cart.draw();
    requestAnimationFrame(anime);
}

anime();

window.addEventListener("keydown", function(e){
    if(e.code === "Space") spacePressed = true;
});

window.addEventListener("keyup", function(e){
    if(e.code === "Space") spacePressed = false;
});
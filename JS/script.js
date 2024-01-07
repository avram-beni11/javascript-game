var player;
var obstacle = [];
var score = 0;

function startGame() {
    player = new component(80, 79, "assets/chicken.png", 10, 120, "image");
    player.gravity = 0.05;
    score = new component("30px", "Arial", "black", 650, 40, "text");
    gameArea.start();
}


var gameArea = {
    canvas: document.getElementById("canvas1"),
    start: function () {
        this.canvas.width = 800;
        this.canvas.height = 500;
        this.context = this.canvas.getContext("2d");
        document.body.insertBefore(this.canvas, document.body.childNodes[0]);
        this.frameNo = 0;
        this.interval = setInterval(updateGameArea, 20);
        window.addEventListener('keydown', function (e) {
            gameArea.key = e.keyCode;
        })
        window.addEventListener('keyup', function (e) {
            gameArea.key = false;
        })
    },
    clear: function () {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    }
}

function component(width, height, color, x, y, type) {
    this.type = type;
    if (type == "image") {
        this.image = new Image();
        this.image.src = color;
    }
    this.width = width;
    this.height = height;
    this.speedX = 0;
    this.speedY = 0;
    this.x = x;
    this.y = y;
    this.gravitySpeed = 5;
    this.update = function () {
        ctx = gameArea.context;
        if (this.type == "text") {
            ctx.font = this.width + " " + this.height;
            ctx.fillStyle = color;
            ctx.fillText(this.text, this.x, this.y);
        }
        if (type == "image") {
            ctx.drawImage(this.image,
                this.x,
                this.y,
                this.width, this.height);
        } else {
            ctx.fillStyle = color;
            ctx.fillRect(this.x, this.y, this.width, this.height);
        }
    }
    this.newPos = function () {
        this.gravitySpeed += this.gravity;
        this.x += this.speedX;
        this.y += this.speedY + this.gravitySpeed;
        this.hitBottom();
    }
    this.hitBottom = function () {
        var rockbottom = gameArea.canvas.height - this.height;
        if (this.y > rockbottom) {
            this.y = rockbottom;
            this.gravitySpeed = 0;
        }
    }
    this.crashWith = function (otherobj) {
        var myleft = this.x;
        var myright = this.x + (this.width);
        var mytop = this.y;
        var mybottom = this.y + (this.height);
        var otherleft = otherobj.x;
        var otherright = otherobj.x + (otherobj.width);
        var othertop = otherobj.y;
        var otherbottom = otherobj.y + (otherobj.height);
        var crash = true;
        if ((mybottom < othertop) || (mytop > otherbottom) || (myright < otherleft) || (myleft > otherright)) {
            crash = false;
        }
        return crash;
    }
}


function updateGameArea() {
    var x, y;
    for (i = 0; i < obstacle.length; i += 1) {
        if (player.crashWith(obstacle[i])) {
            gameArea.stop();
            return;
        }
    }
    gameArea.clear();
    player.speedY = 0;
    if (gameArea.key && gameArea.key == 38) { player.speedY = -3; }
    gameArea.frameNo += 1;
    if (gameArea.frameNo == 1 || everyinterval(130)) {
        x = gameArea.canvas.width;
        y = gameArea.canvas.height;
        obstacle.push(new component(50, 30, "red", 750, 480));
    } for (i = 0; i < obstacle.length; i += 1) {
        obstacle[i].x += -3.5; //Obstacle moves across the X axis
        obstacle[i].update();
    }
    player.newPos();
    player.update();

    score.text = "Score: " + gameArea.frameNo;
    score.update();

}

function everyinterval(n) {
    if ((gameArea.frameNo / n) % 1 == 0) { return true; }
    return false;
}

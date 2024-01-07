function loadRank() {
    let rank = "<table>";
    let keys = Object.keys(localStorage);
    for (let key of keys) {
        let usrObj = JSON.parse(localStorage[key]);
        rank += "<tr><td>" + usrObj.uname + "</td><td>" + usrObj.topScore + "</td></tr>";
        console.log(usrObj);
    }
    rank += "</table>";
    document.getElementById("rankTable").innerHTML = rank;
    
}


function updateScore() {
    let loggedIn = sessionStorage.uname;
    //console.log(loggedIn);

    let user = JSON.parse(localStorage[loggedIn]);
    console.log(user);

    let upScore = document.getElementById("scoreN").value;
    if (upScore > user.topScore) {
        user.topScore = upScore;
        localStorage[loggedIn] = JSON.stringify(user);
    }
    loadRank();
}


let modal = function () {
    document.querySelector(".modal").style.display = "block";
    window.onclick = function (e) {
        if (e.target == document.querySelector('.modal')) {
            document.querySelector('.modal').style.display = "none";
            x = false;
        }
    }
};
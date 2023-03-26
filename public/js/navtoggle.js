let minimised = (localStorage.getItem("minimised") === 'true');
if (minimised === null) {
    minimised = false;
}

function toggleNav() {
    var navTexts = document.getElementsByClassName("nav-text");

    for (var i = 0; i < navTexts.length; i++) {
        if (minimised) {
            navTexts.item(i).style.display = 'inline-block';
        } else {
            navTexts.item(i).style.display = 'none';
        }
    }
    minimised = !minimised;
    localStorage.setItem("minimised", minimised);
}

function initialLoad() {
    var navTexts = document.getElementsByClassName("nav-text");

    for (var i = 0; i < navTexts.length; i++) {
        if (minimised) {
            navTexts.item(i).style.display = 'none';
        } else {
            navTexts.item(i).style.display = 'inline-block';
        }
    }
}
initialLoad();
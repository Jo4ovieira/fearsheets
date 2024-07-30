window.onload = function loadAll() {
    element = document.getElementById('fav_element').value

    if(element == 1) {
        document.getElementById('img_frame').className += " img-frame-color-blood"
    }
    if(element == 2) {
        document.getElementById('img_frame').className += " img-frame-color-knowledge"
    }
    if(element == 3) {
        document.getElementById('img_frame').className += " img-frame-color-death"
    }
    if(element == 4) {
        document.getElementById('img_frame').className += " img-frame-color-energy"
    }
    if(element == 5) {
        document.getElementById('img_frame').className += " img-frame-color-fear"
    }
}

function editAgent(id) {
    window.location.href = "/agents/edit/" + id
}

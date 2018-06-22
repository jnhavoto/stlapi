// Get the container element
var divContainer = document.getElementById("menu_container");

// Get all buttons with class="btn" inside the container
var items = divContainer.getElementsByClassName("menu_item");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < items.length; i++) {
    items[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
    });
}
function toggleDropdown() {
    const menu = document.getElementById("dropdownMenu");
    menu.classList.toggle("hidden");
}

document.addEventListener("click", function(e) {
    const menu = document.getElementById("dropdownMenu");
    const trigger = document.querySelector("button");

    if (!trigger.contains(e.target) && !menu.contains(e.target)) {
        menu.classList.add("hidden");
    }
});
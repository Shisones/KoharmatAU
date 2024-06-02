document.addEventListener("DOMContentLoaded", (event) => {
    const navbar = document.querySelector(".navbar"); // Adjust the selector to match your navbar
    const sideMenuContainer = document.querySelector(".side-menu-container");
    const toggleButton = document.getElementById("toggle-button");
    const menuContent = document.getElementById("menu-content");
  
    // Toggle side menu visibility
    toggleButton.addEventListener("click", function () {
      if (menuContent.style.display === "none") {
        menuContent.style.display = "block";
        toggleButton.innerHTML = '<i class="bx bx-chevron-left"></i>';
        sideMenuContainer.style.marginLeft = "0";
      } else {
        menuContent.style.display = "none";
        toggleButton.innerHTML = '<i class="bx bx-chevron-right"></i>';
        sideMenuContainer.style.marginLeft =
          sideMenuContainer.offsetWidth * -1 + 15 + "px"; // Adjust based on the width of your side menu
      }
    });
})
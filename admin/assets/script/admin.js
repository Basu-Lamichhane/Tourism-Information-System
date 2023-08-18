// Selecting the sidebar and buttons
const sidebar = document.querySelector(".sidebar");
const sidebarOpenBtn = document.querySelector("#sidebar-open");
const sidebarCloseBtn = document.querySelector("#sidebar-close");
const sidebarLockBtn = document.querySelector("#lock-icon");
const mainContent = document.querySelector("#main-content");
mainContent.classList.add("shrink");

document.addEventListener("DOMContentLoaded", function () {
    mainContent.style.display = "block";
});

// Function to toggle the lock state of the sidebar
const toggleLock = () => {
    sidebar.classList.toggle("locked");
    // If the sidebar is not locked
    if (!sidebar.classList.contains("locked")) {
        sidebar.classList.add("hoverable");
        sidebarLockBtn.classList.replace("bx-lock-alt", "bx-lock-open-alt");
    } else {
        sidebar.classList.remove("hoverable");
        sidebarLockBtn.classList.replace("bx-lock-open-alt", "bx-lock-alt");
    }
};

// Function to hide the sidebar when the mouse leaves
const hideSidebar = () => {
    if (sidebar.classList.contains("hoverable")) {
        sidebar.classList.add("close");
        mainContent.classList.add("extend");
        mainContent.classList.remove("shrink");
    }
};

// Function to show the sidebar when the mouse enter
const showSidebar = () => {
    if (sidebar.classList.contains("hoverable")) {
        sidebar.classList.remove("close");
        mainContent.classList.remove("extend");
        mainContent.classList.add("shrink");
    }
};

// Function to show and hide the sidebar
const toggleSidebar = () => {
    sidebar.classList.toggle("close");
};

// If the window width is less than 800px, close the sidebar and remove hoverability and lock
if (window.innerWidth < 800) {
    sidebar.classList.add("close");
    sidebar.classList.remove("locked");
    sidebar.classList.remove("hoverable");
}

// Adding event listeners to buttons and sidebar for the corresponding actions
sidebarLockBtn.addEventListener("click", toggleLock);
sidebar.addEventListener("mouseleave", hideSidebar);
sidebar.addEventListener("mouseenter", showSidebar);
sidebarOpenBtn.addEventListener("click", toggleSidebar);
sidebarCloseBtn.addEventListener("click", toggleSidebar);


// For Go to shortcut
const searchBar = document.getElementById("search-bar");
const searchBtn = document.getElementById("search-btn");
const sideItems = document.querySelectorAll("li.item");

searchBtn.addEventListener("click", () => {
    sideItems.forEach(sideItem => {
        menuContent = sideItem.children[0].children[1].textContent;
        searchText = searchBar.value;
        console.log(searchText);
        console.log(menuContent);
        if (searchText == menuContent) {
            console.log("Found");
            sideItem.children[0].click();
        } else {
            console.log("Not Found");
        }
    });
});

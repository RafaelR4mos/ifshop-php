const myCoursesLink = document.getElementById("my-courses-link");

function logoutUser() {
  window.location.href = '/ifshop-php/pages/login.html'
  document.cookie = "userName=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  document.cookie = "userId=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}

window.addEventListener("DOMContentLoaded", () => {
  const locationPage = window.location.pathname;

  if (locationPage.includes("areaLogada") && myCoursesLink) {
    myCoursesLink.classList.add("active")
  } else if (myCoursesLink) {
    myCoursesLink.classList.remove("active");
  }
})
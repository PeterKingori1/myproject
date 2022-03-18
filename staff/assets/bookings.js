const extrasLink = document.querySelectorAll(".extras-link"),
  extrasContainer = document.querySelector(".extras-container");

extrasLink.forEach(addClass);

function addClass(extraLink) {
  extraLink.addEventListener("click", openExtrasDiv);
}

function openExtrasDiv() {
  window.onload = function () {
    extrasContainer.classList.add("open");
  };
}

// const queryString = window.location.search;

// console.log(queryString);

// const urlParams = new URLSearchParams(queryString);

// const bookingId = urlParams.get("getID");
// console.log(bookingId);

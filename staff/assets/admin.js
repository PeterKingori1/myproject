const roomBtn = document.querySelector(".rooms-button"),
  staffBtn = document.querySelector(".staff-button"),
  staffSection = document.querySelector(".staff-section"),
  roomSection = document.querySelector(".rooms-section");

window.addEventListener("load", () => {
  staffSection.classList.add("open");
});

staffBtn.addEventListener("click", () => {
  staffSection.classList.toggle("open");
  roomSection.classList.remove("open");
});

roomBtn.addEventListener("click", () => {
  roomSection.classList.toggle("open");
  staffSection.classList.remove("open");
});

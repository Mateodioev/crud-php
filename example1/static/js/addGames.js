const gameValue = document.querySelector("#gameRatingValue");
const gameInput = document.querySelector("#gameRating");

gameValue.textContent = `: ${gameInput.value}`;

gameInput.addEventListener("input", (event) => {
  // round 3 digits after comma
  const value = Math.round(event.target.value * 100) / 100;
  gameValue.textContent = `: ${value}`;
});

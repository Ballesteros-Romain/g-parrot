//================================== MENU BURGER OUVERT:FERMER======================================
const toggle = document.querySelector(".toggle ");
const body = document.querySelector("body");

toggle.addEventListener("click", function () {
  body.classList.toggle("open");
});

// ================================= BUTTON CONTACT SCROLL DOWN=========================================
let scrollToDown = document.getElementById("scrollToDown");
function scrollDown() {
  console.log("ok");
  window.scrollTo({
    top: 10000,
    behavior: "smooth",
  });
}
scrollToDown.addEventListener("click", scrollDown);
// ======================================================= FILTRER LES VOITURES =========================================================
document.addEventListener("DOMContentLoaded", function () {
  const classeSelect = document.getElementById("classe");
  const kmSelect = document.getElementById("km");
  const anneeSelect = document.getElementById("annee");
  const prixSelect = document.getElementById("prix");
  const filterButton = document.getElementById("filter-btn");
  const resetButton = document.getElementById("reset-btn");
  const cards = document.getElementsByClassName("card-occasion");

  filterButton.addEventListener("click", function () {
    const selectedClasse = classeSelect.value;
    const selectedKm = kmSelect.value;
    const selectedAnnee = anneeSelect.value;
    const selectedPrix = prixSelect.value;

    for (let i = 0; i < cards.length; i++) {
      const card = cards[i];
      const classe = card.dataset.classe;
      const km = parseFloat(card.dataset.km);
      const annee = parseInt(card.dataset.annee);
      const prix = parseFloat(card.dataset.prix);

      const classeMatch = selectedClasse === "" || selectedClasse === classe;
      const kmMatch =
        selectedKm === "" ||
        (km >= parseFloat(selectedKm.split("-")[0]) &&
          km <= parseFloat(selectedKm.split("-")[1]));
      const anneeMatch =
        selectedAnnee === "" ||
        (annee >= parseInt(selectedAnnee.split("-")[0]) &&
          annee <= parseInt(selectedAnnee.split("-")[1]));
      const prixMatch =
        selectedPrix === "" ||
        (prix >= parseFloat(selectedPrix.split("-")[0]) &&
          prix <= parseFloat(selectedPrix.split("-")[1]));

      if (classeMatch && kmMatch && anneeMatch && prixMatch) {
        card.style.display = "block";
      } else {
        card.style.display = "none";
      }
    }
  });

  resetButton.addEventListener("click", function () {
    classeSelect.value = "";
    kmSelect.value = "";
    anneeSelect.value = "";
    prixSelect.value = "";

    for (let i = 0; i < cards.length; i++) {
      const card = cards[i];
      card.style.display = "block";
    }
  });
});

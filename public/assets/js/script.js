//================================== MENU BURGER OUVERT:FERMER======================================
const toggle = document.querySelector(".toggle");
const body = document.querySelector("body");

toggle.addEventListener("click", function () {
  body.classList.toggle("open");
});

//========================= NO SCROLL X ========================================
window.addEventListener("scroll", function () {
  const scrollLeft = window.scrollX;

  if (scrollLeft > 0) {
    window.scrollTo({
      left: 0,
    });
  }
});

window.addEventListener("scroll", function () {
  const scrollRight = window.scrollX;

  if (scrollRight > 0) {
    window.scrollTo({
      right: 0,
    });
  }
});

// ======================================================= FILTRER LES VOITURES =========================================================

const filterForm = document.querySelector("#filter-form");
const carsContainer = document.querySelector("#cars-container");
const pagination = document.querySelector("#pagination");

filterForm.addEventListener("submit", async (e) => {
  e.preventDefault();

  const marque = document.querySelector("#marque").value;
  const kilometre = document.querySelector("#kilometre").value;
  const annee = document.querySelector("#annee").value;
  const price = document.querySelector("#price").value;

  try {
    const url = `get_cars?marque=${marque}&kilometre=${kilometre}&annee=${annee}&price=${price}`;
    const response = await fetch(url);

    if (response.ok) {
      const filteredData = await response.json();

      carsContainer.innerHTML = "";
      if (filteredData.length === 0) {
        const h = document.createElement("h5");
        h.textContent = "aucun résultat";
        carsContainer.appendChild(h);
      } else {
        filteredData.cars.forEach((car) => {
          const carCard = document.createElement("div");
          carCard.classList.add("card", "card-occasion");

          carCard.innerHTML = `
          <img src="${imageFolder}${car.image}" alt="photo de voiture">
          <h5>${car.marque}</h5>
          <p>Kilométrage: ${car.kilometre} km</p>
          <p>Année: ${car.annee}</p>
          <p>Prix: ${car.price / 100} €</p>
          <a href="${car.url}" class="btn btn-card">Je veux ce véhicule</a>
          `;
          carsContainer.appendChild(carCard);
          console.log("la requete a fonctionné");
        });
        document.querySelector("#pagination").innerHTML =
          filteredData.pagination;
      }
    } else {
      console.error("La requête a échoué avec le statut :", response.status);
    }
  } catch (error) {
    console.error("Une erreur s'est produite :", error);
  }
});

const resetButton = document.querySelector("#reset-btn");
resetButton.addEventListener("click", function () {
  window.location.replace("/vehicule");
});

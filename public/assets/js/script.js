//================================== MENU BURGER OUVERT:FERMER======================================
const toggle = document.querySelector(".toggle");
const body = document.querySelector("body");

toggle.addEventListener("click", function () {
  body.classList.toggle("open");
});

// ======================================================= FILTRER LES VOITURES =========================================================
// const filterButton = document.querySelector("#filter-btn");

// filterButton.addEventListener("click", function () {
//   // Obtenez les valeurs des filtres
//   const marque = document.querySelector("#marque").value;
//   const km = document.querySelector("#km").value;
//   const annee = document.querySelector("#annee").value;
//   const price = document.querySelector("#price").value;

//   // Envoyez une requête AJAX à la route de filtrage
//   const request = new XMLHttpRequest();
//   request.open("POST", "/cars/filter");
//   request.setRequestHeader("Content-Type", "application/json");
//   request.send(
//     JSON.stringify({
//       marque,
//       km,
//       annee,
//       price,
//     })
//   );

//   // Lorsque la requête AJAX est terminée, récupérez les voitures filtrées et affichez-les
//   request.onload = function () {
//     if (request.status === 200) {
//       // Les voitures filtrées sont dans la réponse JSON
//       const filteredCars = JSON.parse(request.responseText);

//       // Affichez les voitures filtrées
//       const carsContainer = document.querySelector("#cars-container");
//       if (carsContainer) {
//         carsContainer.innerHTML = "";

//         for (const car of filteredCars) {
//           const carCard = document.createElement("div");
//           carCard.classList.add("card", "card-occasion");

//           // Afficher l'image de la voiture
//           const image = document.createElement("img");
//           image.src = `/uploads/image/${car.image}`;
//           carCard.appendChild(image);

//           // Afficher la marque de la voiture
//           const marque = document.createElement("h5");
//           marque.textContent = car.marque;
//           carCard.appendChild(marque);

//           // Afficher le kilométrage de la voiture
//           const kilometre = document.createElement("p");
//           kilometre.textContent = `${car.kilometre} km`;
//           carCard.appendChild(kilometre);

//           // Afficher l'année de la voiture
//           const annee = document.createElement("p");
//           annee.textContent = `${car.annee}`;
//           carCard.appendChild(annee);

//           // Afficher le prix de la voiture
//           const price = document.createElement("p");
//           price.textContent = `${car.price / 100} €`;
//           carCard.appendChild(price);

//           // Ajouter la carte de voiture à la liste des voitures
//           carsContainer.appendChild(carCard);
//         }
//       } else {
//         const error = new Error("Une erreur s'est produite");
//         alert(error.message);
//       }
//     }
//   };
// });

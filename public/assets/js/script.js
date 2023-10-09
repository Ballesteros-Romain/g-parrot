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

// const filterForm = document.querySelector("#filter-form");

// filterForm.addEventListener("submit", async (e) => {
//   e.preventDefault();

//   const marque = document.querySelector("#marque").value;
//   const kilometre = document.querySelector("#kilometre").value;
//   const annee = document.querySelector("#annee").value;
//   const price = document.querySelector("#price").value;

//   try {
//     const response = await fetch("/cars/filter", {
//       method: "POST",
//       headers: {
//         "content-type": "application/json",
//       },
//       body: JSON.stringify({ marque, kilometre, annee, price }),
//     });

//     if (response.ok) {
//       const filteredData = await response.json();
//       console.log(filteredData);
//     } else {
//       console.error("larequete à échoué avec le statut : ", response.status);
//     }
//   } catch (error) {
//     console.error("Une erreur s'est produite :", error);
//   }
// });
const filterForm = document.querySelector("#filter-form");
const carsContainer = document.querySelector("#cars-container");

filterForm.addEventListener("submit", async (e) => {
  e.preventDefault();

  const marque = document.querySelector("#marque").value;
  const kilometre = document.querySelector("#kilometre").value;
  const annee = document.querySelector("#annee").value;
  const price = document.querySelector("#price").value;

  try {
    const response = await fetch("/get_all_cars", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: `marque=${marque}&kilometre=${kilometre}&annee=${annee}&price=${price}`,
    });
    console.log(response);
    if (response.ok) {
      const filteredData = await response.json();

      console.log(filteredData);
      //Supprimez le contenu existant dans la zone d'affichage des voitures
      carsContainer.innerHTML = "";

      // Parcourez les données filtrées et générez du contenu HTML pour chaque voiture
      filteredData.forEach((car) => {
        const carCard = document.createElement("div");
        carCard.classList.add("card", "card-occasion");

        // Affichez les données du véhicule (assurez-vous qu'elles correspondent à la structure de votre JSON)
        carCard.innerHTML = `
          <img src="${car.image}" alt="photo de voiture">
          <h5>${car.marque}</h5>
          <p>Kilométrage: ${car.kilometre} km</p>
          <p>Année: ${car.annee}</p>
          <p>Prix: ${car.price / 100} €</p>
        `;

        carsContainer.appendChild(carCard); // Ajoutez la carte de voiture à la zone d'affichage
        // console.log(carsContainer);
      });
    } else {
      console.error("La requête a échoué avec le statut :", response.status);
    }
  } catch (error) {
    console.error("Une erreur s'est produite :", error);
  }
});

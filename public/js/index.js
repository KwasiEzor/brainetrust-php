console.log("index is running ... !");

const CSRF_TOKEN = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");
const BASE_URL = "http://localhost";
// console.log(CSRF_TOKEN);

const buttons = document.querySelectorAll(".showDetails");

buttons.forEach((btn) => {
    btn.addEventListener("click", function () {
        // Getting the current id
        let currentid = btn.getAttribute("data-id");
        console.log(currentid);
        // fetch data by current id
        fetchClubById(currentid);
    });
});

const fetchClubById = (id) => {
    fetch(`clubs/${id}`, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-Token": CSRF_TOKEN,
        },
    })
        .then((response) => response.json())
        .then((club) => {
            console.log("Success:", club);
            const {
                id,
                name,
                address,
                training_day,
                training_time,
                contact_person,
                locality,
                mobile_number,
                phone_number,
            } = club;

            document.querySelector("#club_name").innerHTML = name;
            document.querySelector("#club_day").innerHTML = training_day;
            document.querySelector("#club_time").innerHTML = training_time;
        })
        .catch((error) => {
            console.error("Error:", error);
        });
};

/**
 *
 *GOOGLE MAPS
 *
 *
 */

let clubsData = [];

fetch("/clubs-data", {
    method: "GET",
    headers: {
        "Content-Type": "application/json",
        "X-CSRF-Token": CSRF_TOKEN,
    },
})
    .then((response) => response.json())
    .then((clubs) => {
        // console.log(clubs);
        clubsData.push(clubs);
    });

console.log(clubsData);

// function initMap() {
//     // The location of Uluru
//     const uluru = { lat: -25.344, lng: 131.031 };
//     // The map, centered at Uluru
//     const map = new google.maps.Map(document.getElementById("map"), {
//         zoom: 15,
//         center: uluru,
//     });
//     // The marker, positioned at Uluru
//     const marker = new google.maps.Marker({
//         position: uluru,
//         map: map,
//     });
// }

// window.onload = function () {
//     initMap();
// };

/**
 * About Page
 */

let aboutTitles = document.querySelectorAll(".about-title");
let aboutInfos = document.querySelectorAll(".about-infos");
aboutTitles.forEach((title, key) => {
    // console.log(title.innerHTML);
    if (
        title.innerHTML === "Affiliation" ||
        title.innerHTML === "Droit de table" ||
        title.innerHTML === "Cotisation annuelle" ||
        title.innerHTML === "Nous contacter" ||
        title.innerHTML === "Comment arriver au club ?"
    ) {
        title.parentElement.classList.add("about-none");
    }
});

// Navbar fixed top

document.addEventListener("DOMContentLoaded", function () {
    window.addEventListener("scroll", function () {
        if (window.scrollY > 50) {
            document.getElementById("navbar_top").classList.add("fixed-top");
            // add padding top to show content behind navbar
            navbar_height = document.querySelector(".navbar").offsetHeight;
            document.body.style.paddingTop = navbar_height + "px";
        } else {
            document.getElementById("navbar_top").classList.remove("fixed-top");
            // remove padding top from body
            document.body.style.paddingTop = "0";
        }
    });
});

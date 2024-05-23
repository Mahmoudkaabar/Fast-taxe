let select = document.querySelector('.select');
let loginModal = document.getElementById('loginModal');
let closeBtn = document.querySelector('.close');

select.addEventListener('change', function() {
    let selectValue = this.value;
    if (selectValue == 'log in') {
        loginModal.style.display = 'block';
        select.value = '';
    } else if (selectValue == 'Register') {
        window.location.href = "Register4.php";
        select.value = '';
    }
});

closeBtn.addEventListener('click', function() {
    loginModal.style.display = 'none';
});

window.addEventListener('click', function(event) {
    if (event.target == loginModal) {
        loginModal.style.display = 'none';
    }
});

function applyFilters() {
    let directRouteCheckbox = document.getElementById("directRoute").checked;
    let noSmokingCheckbox = document.getElementById("noSmoking").checked;
    let certifiedDriverCheckbox = document.getElementById("certifiedDrive").checked;
    let boxes = document.querySelectorAll(".box");

    for (const box of boxes) {
        let imgDirectRoute = box.querySelector("#imgDirectroute");
        let imgNoSmoking = box.querySelector("#imgnosmoking");
        let imgCertifiedDriver = box.querySelector("#imgCertifieddriver");

        let showBox = true;

        if (directRouteCheckbox && !imgDirectRoute) {
            showBox = false;
        }

        if (noSmokingCheckbox && !imgNoSmoking) {
            showBox = false;
        }

        if (certifiedDriverCheckbox && !imgCertifiedDriver) {
            showBox = false;
        }

        box.style.display = showBox ? "block" : "none";
    }
}

let directRouteCheckbox = document.getElementById("directRoute");
let noSmokingCheckbox = document.getElementById("noSmoking");
let certifiedDriverCheckbox = document.getElementById("certifiedDrive");

directRouteCheckbox.addEventListener("change", applyFilters);
noSmokingCheckbox.addEventListener("change", applyFilters);
certifiedDriverCheckbox.addEventListener("change", applyFilters);



function sortResults() {
    let sortOption = document.querySelector('input[name="sort"]:checked').value;
    let tripResults = document.getElementById('tripResults');
    let trips = Array.from(tripResults.getElementsByClassName('box'));

    trips.sort((a, b) => {
        let priceA = parseFloat(a.querySelector('.under span:nth-child(3)').innerText);
        let priceB = parseFloat(b.querySelector('.under span:nth-child(3)').innerText);
        let depTimeA = new Date('1970-01-01T' + a.querySelector('.top span:first-child').innerText + 'Z');
        let depTimeB = new Date('1970-01-01T' + b.querySelector('.top span:first-child').innerText + 'Z');

        if (sortOption === 'price') {
            return priceA - priceB;
        } else if (sortOption === 'fastest') {
            let arrTimeA = new Date('1970-01-01T' + a.querySelector('.top span:last-child').innerText + 'Z');
            let arrTimeB = new Date('1970-01-01T' + b.querySelector('.top span:last-child').innerText + 'Z');
            return (arrTimeA - depTimeA) - (arrTimeB - depTimeB);
        } else if (sortOption === 'early') {
            return depTimeA - depTimeB;
        }
    });

    tripResults.innerHTML = '';
    trips.forEach(trip => tripResults.appendChild(trip));
}




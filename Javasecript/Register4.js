document.addEventListener("DOMContentLoaded", function() {
    const passengerRadio = document.getElementById("passenger");
    const driverRadio = document.getElementById("driver");
    const driverFields = document.getElementById("driverFields");
    let DateBirth = document.getElementById('Date of Birth');
    let Gender = document.getElementById('Gender');
    let Dateobtaininlicense = document.getElementById('Date of obtaining driving license');

    passengerRadio.addEventListener("change", function() {
        driverFields.style.display = "none"; 
    });

    driverRadio.addEventListener("change", function() {
        driverFields.style.display = "block"; 
    });

   
});


let logout=document.querySelector('.logout');

logout.onclick = function() {
    
    window.location.href = "page1.php"; 
};





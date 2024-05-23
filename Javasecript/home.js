
let departure = document.getElementById('Departure');
let destination = document.getElementById('Distination');
let date = document.getElementById('Date');
let passenger = document.getElementById('Passenger');
let button = document.getElementById('button');





button.addEventListener('click', function(event) {
    event.preventDefault();

    if (!(departure.value && destination.value && date.value && passenger.value)) {
        alert("please enter all data");
    }
     else {
        this.form.submit();
    }
});


let select= document.querySelector('.select');
let loginModal = document.getElementById('loginModal');
let closeBtn = document.querySelector('.close');

select.addEventListener('change',function() {
  let selectValue = this.value;
  if (selectValue == 'log in') {

   loginModal.style.display = 'block';
    select.value='';

  } else if (selectValue == 'Register') {
    window.location.href = "Register4.php";
    select.value='';

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








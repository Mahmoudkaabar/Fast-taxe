



let button2 = document.querySelector('.button2'); 
let button1 = document.querySelector('.button1'); 



button2.onclick = function() {
    window.location.href = "pageSearch2.php"; 
};




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

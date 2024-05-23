

let logout=document.querySelector('.logout');

logout.onclick = function() {
    window.location.href = "page1.php"; 
};

let select= document.querySelector('.select');

select.addEventListener('change',function() {
  var selectValue = this.value;
  if (selectValue == 'log in') {
    window.location.href = "log in.html";

  } else if (selectValue == 'Register') {
    window.location.href = "Register4.html"; 
  }
});

 


let button= document.querySelector('.Return');

button.onclick = function() {
    window.location.href = "page5.php"; 
};



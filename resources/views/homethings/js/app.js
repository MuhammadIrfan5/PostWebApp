const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});



/*	$(document).ready(function(){
  $(".btn transparent mode").click(function(){
    $(".btn transparent").css("color", "red");
  });
});
*/
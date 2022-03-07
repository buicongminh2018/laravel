const itemSlierbar = document.querySelectorAll(".category-left-li");
itemSlierbar.forEach(function(menu,index){
    menu.addEventListener("click",function(){
         menu.classList.toggle("block");
    })
})
//
// const imgPosition = document.querySelectorAll(".slider-category-products-js .slider-category-products-js-content");
// const imgcontaint = document.querySelector(".slider-category-products-js");
// const dot =document.querySelectorAll(".dot");
// let index=0;
// let imgnumber=imgPosition.length;
//
// imgPosition.forEach(function(img,index){
//   img.style.left = index*100 + "%";
//   dot[index].addEventListener("click",function(){
//     imgcontaint.style.left="-" + index*100 + "%";
//     const dotActive= document.querySelector(".active");
//     dotActive.classList.remove("active");
//     dot[index].classList.add("active");
//   });
// })
//
// function imgSlide(){
//   index++;
//   if(index >= imgnumber){
//     index=0;
//   }
//   imgcontaint.style.left="-" + index*100 + "%";
//   const dotActive= document.querySelector(".active");
//   dotActive.classList.remove("active");
//   dot[index].classList.add("active");
//
//
// }
// setInterval(imgSlide,5000);

const imgPosition = document.querySelectorAll(".aspect-ratio-169 img");
const imgcontaint = document.querySelector(".aspect-ratio-169");
const dot =document.querySelectorAll(".dot");
let index=0;
let imgnumber=imgPosition.length;

imgPosition.forEach(function(img,index){
  img.style.left = index*100 + "%";
  dot[index].addEventListener("click",function(){
    imgcontaint.style.left="-" + index*100 + "%";
    const dotActive= document.querySelector(".active");
    dotActive.classList.remove("active");
    dot[index].classList.add("active");
  });
})

function imgSlide(){
  index++;
  if(index >= imgnumber){
    index=0;
  }
  imgcontaint.style.left="-" + index*100 + "%";
  const dotActive= document.querySelector(".active");
  dotActive.classList.remove("active");
  dot[index].classList.add("active");

  
}
setInterval(imgSlide,5000);
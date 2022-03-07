const baoquan = document.querySelector(".bao-quan");
const chitiet = document.querySelector(".chi-tiet");
if(baoquan){
    baoquan.addEventListener("click",function(){
        document.querySelector(".product-content-right-bottom-content-chitiet").style.display = "none"
        document.querySelector(".product-content-right-bottom-content-baoquan").style.display = "block"
    })
}
if(chitiet){
    chitiet.addEventListener("click",function(){
        document.querySelector(".product-content-right-bottom-content-baoquan").style.display = "none"
        document.querySelector(".product-content-right-bottom-content-chitiet").style.display = "block"
    })
}
const button = document.querySelector(".product-content-right-bottom-top");

if(button){
    button.addEventListener("click",function(){
        document.querySelector(".product-content-right-bottom-content-big").classList.toggle("active_down")
        
    })
}
 
const bigImg = document.querySelector(".product-content-left-big-img img");
const smalImg = document.querySelectorAll(".product-content-left-sm-img img");
smalImg.forEach(function(imgItem,X){
    imgItem.addEventListener("click",function(){
        bigImg.src= imgItem.src;
    })
})


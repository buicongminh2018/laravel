const header= document.querySelector("header");
window.addEventListener("scroll",function(){
  x= window.pageYOffset ;
  if(x>0){
    header.classList.add("tick")

  }else{
    header.classList.remove("tick")        
  }
})

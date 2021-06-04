function horizontal() {

   var navItems = document.getElementById("menu_dropdown").getElementsByTagName("li");

   for (var i=0; i< navItems.length; i++) {
      if(navItems[i].className == "submenu")
      {
         if(navItems[i].getElementsByTagName('ul')[0] != null)
         {
            navItems[i].onmouseover=function() {this.getElementsByTagName('ul')[0].style.display="block";this.style.backgroundColor = "";}
            navItems[i].onmouseout=function() {this.getElementsByTagName('ul')[0].style.display="none";this.style.backgroundColor = "";}
         }
      }
   }

}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ 
     if(!d.MM_p) d.MM_p=new Array();
         var i,j=d.MM_p.length,a=MM_preloadImages.arguments;   for  (i=0; i<a.length; i++)
            if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; 
               d.MM_p[j++].src=a[i];}}
}


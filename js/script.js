$(document).on('click','.btn-check', function(){
  let elemento = $(this)[0].parentElement.parentElement;
  let id =$(this).attr('id');
 // console.log(id);
  //console.log($(this).is(":checked"));
    

  const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
     checkbox.addEventListener('click', function() {
       const checked = document.querySelectorAll('input[type="checkbox"]:checked');
          if (checked.length > 1) {
             swal({
                   title: "Error",
                   text: "seleccione una sola opcion",             
                   icon: "error",
                   button: "aceptar",
                   });
             this.checked = false;
          }
     });
 });
  
})


$(document).on('click','#botonV', function(){
   let id1 = '';
   let id2 = '';
   $( ".btn-check" ).each(function( i ) {
     if($(this).is(":checked")){
        id1=$(this).attr('id');
        id2=$(this).attr('value'); 
        console.log(id2);
        console.log(id1);
      };
    
   });

  if (id1 == '') {
     swal({
        title: "Error",
        text: "Por favor, seleccione una opcion",             
        icon: "error",
        button: "aceptar",
      });
    //alert("Por favor llene todos los campos");
    return false;
}  


  $.ajax({
    type: "POST",
    url: "votar_action.php",
    data: {id1,id2,},
    cache: false,
    success: function (e) { 
    //alert(e)
     swal({
        title: "Voto",
        text: "Votacion completeda. Se cerrará esta sesión.",             
        icon: "success",
        timer: 1400,
         button: false,}).then(function(){window.location = "login.php";});
    },
    error: function (xhr, status, error) {
    console.error(xhr);
    swal({
        title: "Error",
        text: "Oh! ha ocurrido un error",             
        icon: "error",
        button: "aceptar",
      });
    }
});


})

var sidebar = document.getElementById("mySidenav");
var openA = document.getElementById("open");
var closeA = document.getElementById("close");
var oscuro = document.getElementById("oscuro");
var sidebarCont = document.getElementById("sidenavContent");

openA.addEventListener("click", openNav); 
closeA.addEventListener("click", closeNav); 
oscuro.addEventListener("click", closeNav); 

function openNav() {
    sidebar.classList.add("sizeChange", "sizeChangeMobile");
    oscuro.classList.add("opacidad");
    sidebarCont.style.display = "block";
  }
  
function closeNav() {
    sidebar.style.width = "0%";
    sidebar.classList.remove("sizeChange", "sizeChangeMobile");
    oscuro.classList.remove("opacidad");
    sidebarCont.style.display = "none";
  }

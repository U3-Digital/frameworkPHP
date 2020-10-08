$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

//poder cargar foto
function mostarImagen(ruta, preview) {

    let reader = new FileReader(); //Objeto que nos ayuda a leer
    let img = document.getElementById(preview); //obtiene el card image para manipularlo
    img.src = URL.createObjectURL(ruta.target.files[0]); //crea una ruta impotetica para suplantar la fake-path y la carga al src


}
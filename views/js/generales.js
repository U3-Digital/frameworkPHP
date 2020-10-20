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

/*=============================================
REVISAR SI EL LAS CONTRASEÑAS COINCIDEN CAMBIAR CONTRASEÑA
=============================================*/

function confirmarContrsena() {
    let contraseña = document.getElementById('ctNuevaContraseña');
    let contraseñaConfirmar = document.getElementById('ctNuevaNuevaContraseña');

    const btnEnviar = document.getElementById('enviarCambiarContraseña');


    const mensaje = document.createElement('div');
    mensaje.appendChild(document.createTextNode(mensaje));

    if (contraseña.value == contraseñaConfirmar.value) {
        contraseñaConfirmar.classList = "";
        contraseñaConfirmar.classList = "text";
         btnEnviar.disabled = false;
    } else {
        contraseñaConfirmar.classList = "";
        contraseñaConfirmar.classList = "text error-message";
        //btnEnviar.disabled = true;

        const divMensaje = document.querySelector('.mensajes');
        mensaje.classList = "alert alert-danger text-center";
        mensaje.innerText = "Las contraseñas no Coinciden";
        divMensaje.appendChild(mensaje);
        setTimeout(() => {
            document.querySelector('.mensajes div').remove();
        }, 3000);


    }

}

/*=============================================
REVISAR SI EXISTE ALGUN CAMPO EN ROJO CAMBIAR CONTRASEÑA
=============================================*/
const formularioContrasena= document.getElementById('enviarFormularioCambiarContraseña');
formularioContrasena.addEventListener('submit', accion => {
    accion.preventDefault();

    const contenedor = formularioContrasena.querySelectorAll('.error-message');
    let contador = 0;
    contenedor.forEach(element => {
        contador += 1;
    });
    const btnEnviar = document.getElementById('enviarCambiarContraseña');
    //console.log(contador);
    if (contador > 0) {
        btnEnviar.disabled = true;
    } else {
        btnEnviar.disabled = false;
        formularioContrasena.submit();
    }
});
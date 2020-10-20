/*=============================================
REVISAR SI EL USUARIO YA EXISTE
=============================================*/
document.getElementById('ctNuevoUsuario').addEventListener('change', function() {

    $(".alert").remove();

    var categoria = $(this).val();
    // console.log(categoria);

    var datos = new FormData();
    datos.append("usuario", categoria);


    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'views/modules/ajax/ajaxUsuarios.php', true);
    xhr.onload = function() {
        if (this.status === 200) {
            let caja = document.getElementById('ctNuevoUsuario');
            const mensaje = document.createElement('div');
            const btnEnviar = document.getElementById('enviarFormularioNuevoUsuario');

            mensaje.appendChild(document.createTextNode(mensaje));
            if (caja.value != "") {
                var usuario = JSON.parse(this.responseText, true);
                if (usuario.length < 1) {
                    caja.classList = "";
                    caja.classList = "text camposRojos";
                    btnEnviar.disabled = false;
                } else {
                   
                    caja.classList = "";
                    caja.classList = "text error-message";
                    const divMensaje = document.querySelector('.mensajes');
                    mensaje.classList = "alert alert-danger text-center";
                    mensaje.innerText = "Nombre de Usuario Existente";
                    divMensaje.appendChild(mensaje);
                    setTimeout(() => {
                        document.querySelector('.mensajes').remove();
                    }, 3000);
                } //else
            } //caja!=nada
        } //todo correcto
    };
    xhr.send(datos);
});


/*=============================================
REVISAR SI EL LAS CONTRASEÑAS COINCIDEN
=============================================*/

function revisarContrasena() {
    let contraseña = document.getElementById('ctNuevoUsuarioContraseña');
    let contraseñaConfirmar = document.getElementById('ctNuevoUsuarioConfirmarContraseña');
    const btnEnviar = document.getElementById('enviarFormularioNuevoUsuario');


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
    ACTIVAR O DESACTIVAR USUARIOS
=============================================*/

const usuario = document.querySelectorAll('.custom-control-label');
usuario.forEach(etSwitch => {
    etSwitch.addEventListener('click', valor => {
        const estado = valor.target.previousElementSibling.checked;
        const usuario = valor.target.htmlFor + "-" + estado;
        //idusuario-estado
        //ilse-false
        var datos = new FormData();
        datos.append("userId", usuario);
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'views/modules/ajax/ajaxUsuarios.php', true);
        xhr.onload = function() {
            if (this.status === 200) {

            } //todo correcto
        };
        xhr.send(datos);

    }); //addEventListenerClick
}); //ForEach


/*=============================================
        ELIMINAR USUARIOS
=============================================*/

$(document).ready(function() {
    $('.deletebtn').on('click', function() {
        $('#deletemodal').modal('show');

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        $('#delete_id').val(data[0]); //asigna el Id
    });
});

/*=============================================
REVISAR SI EXISTE ALGUN CAMPO EN ROJO
=============================================*/
const formulario = document.getElementById('nuevoUsuario');
formulario.addEventListener('submit', accion => {
    accion.preventDefault();

    const contenedor = formulario.querySelectorAll('.error-message');
    let contador = 0;
    contenedor.forEach(element => {
        contador += 1;
    });
    const btnEnviar = document.getElementById('enviarFormularioNuevoUsuario');
    //console.log(contador);
    if (contador > 0) {
        btnEnviar.disabled = true;
    } else {
        btnEnviar.disabled = false;
        formulario.submit();
    }
});
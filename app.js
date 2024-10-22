//selecciono el formulario que tiene los datos a enviar
const formulario = document.querySelector('form');

// Usando selectores para los inputs
const input_nombre = document.querySelector("#nombre");
const input_apellido = document.getElementById("apellido");
const input_email = document.getElementById("email");
const input_pass = document.getElementById("pass");

const datos = { input_nombre, input_apellido, input_email, input_pass };

formulario.addEventListener("submit", validar_campos);

function validar_campos(evento) {
    let es_valido = true;

    // recorro el array datos que tiene todos los inputs
    for (let campo in datos) {
        //compruebo si los campos estan vacíos, además recorto los espacios con trim
        if (datos[campo].value.trim() === '') {

            //pueden generar un mensaje creando un elmento de html y darle tiempo con setTimeOut para que desaparezca...
            alert("Todos los campos son obligatorios");
            es_valido = false;
            break;
        }
    }

    // Si no es válido, prevenir el envío del formulario con preventDefault()
    if (!es_valido) {
        evento.preventDefault();
    }
}


//Ver imagen cedula Proveedor
/* const imageInputs = document.querySelectorAll('.imageInput');
    const previews = document.querySelectorAll('.preview');

    imageInputs.forEach((imageInput, index) => {
        imageInput.addEventListener('change', function() {
            const file = imageInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previews[index].innerHTML = `<img src="${e.target.result}" alt="Image Preview">`;
                };
                reader.readAsDataURL(file);
            } else {
                previews[index].innerHTML = '<p>No image selected</p>';
            }
        });
    });

    const form = document.getElementById('RF_registro_usr.php');
    form.addEventListener('reset', function() {
      
        previews.forEach((preview, index) => {
            if (index === 0) {
                preview.innerHTML = '<p>Cédula delantera</p>';
            } else {
                preview.innerHTML = '<p>Cédula trasera</p>';
            }
        });
    }); */



document.querySelector('form').addEventListener('submit', function(e) {
    var response = grecaptcha.getResponse();
    if (response.length === 0) {
        e.preventDefault();
        alert('Por favor, completa el CAPTCHA.');
    }
});


// menu
    const menuButton = document.getElementById("menuButton");
    const userMenu = document.getElementById("userMenu");

    // Asegurarse de que el menú comience cerrado
    userMenu.style.display = "none";

    menuButton.addEventListener("click", function() {
        userMenu.style.display = userMenu.style.display === "block" ? "none" : "block"; // Alternar visibilidad
    });

    // Cerrar el menú si se hace clic fuera de él
    window.addEventListener("click", function(event) {
        if (!menuButton.contains(event.target) && !userMenu.contains(event.target)) {
            userMenu.style.display = "none";
        }
    });

    //Responsive del Header
    let menuList = document.getElementById("menuList")
        menuList.style.maxHeight = "0px";

        function toggleMenu(){
            if(menuList.style.maxHeight == "0px")
            {
                menuList.style.maxHeight = "300px";
            }
            else{
                menuList.style.maxHeight = "0px";
            }
        }
        

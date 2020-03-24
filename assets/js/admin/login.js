//https://www.espai.es/blog/2019/09/como-enviar-y-recibir-datos-con-la-api-fetch/

const btn_login=document.querySelector("#btn_login");

//EVENTLISTENER LOGIN

btn_login.addEventListener('click',() =>{
    
    let user=document.getElementById("user").value;
    let pass=document.getElementById("pass").value;
    const url = './bin/Controlador/login.php';
    
    if(user!='' && pass!=''){
        //USO DE AJAX CON FETCH Y FORMDATA PARA USAR POST  
        var formData = new FormData();
        formData.append('user', user);
        formData.append('pass', pass);
        formData.append('action', 'login');

        validar_usuario(formData,url).then(value=>{
            if(value.validate){
                Swal.fire({
                    title: 'Bienvenido '+value.user,
                    icon: 'success',
                    showConfirmButton: true,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                  }).then((result) => {
                    if (result.value) {
                        window.location.href='./mainpanel';
                    }
                  })
            }else{
               
            }
        });

    }else{
        console.log("es null");
    }

/*
    fetch(url, {
        method: 'POST', // or 'PUT'
        body: formData, // data can be `string` or {object}!
    }).then()
    .catch(error => console.error('Error:', error))
    .then(response => console.log('Success:', response));
    
    */
//USO DE AJAX CON FETCH 
   /*(async () => {
    try {
        // en el objeto “datos” tenemos los datos que vamos a enviar al servidor
        // en este ejemplo tenemos dos datos; un título y un array de números
        var datos = { titulo: "Listado de números", numeros: [2,4,6,8,10] };
        // en el objeto init tenemos los parámetros de la petición AJAX
        var init = {
             // el método de envío de la información será POST
            method: "POST",
            headers: { // cabeceras HTTP
                // vamos a enviar los datos en formato JSON
                'Content-Type': 'application/json'
            },
            // el cuerpo de la petición es una cadena de texto 
            // con los datos en formato JSON
            body: JSON.stringify(datos) // convertimos el objeto a texto
        };
        // realizamos la petición AJAX usando fetch
        // el primer parámetro es el recurso del servidor al que queremos acceder
        // en este ejemplo, es un fichero php llamado media.php que se encuentra
        // dentro de la carpeta ./php y con el código PHP que hay arriba.
        // el segundo parámetro es el objeto init con la información sobre los
        // datos que queremos enviar, el método de envio, etc.
        var response = await fetch('./bin/Controlador/login.php', init);
        console.log(response);
        if (response.ok) {
            // si la petición se ha resuelto correctamente, 
            // intentamos resolver otra promesa que convierta
            // lo que nos ha respondido el servidor en un objeto de JavaScript.
            // si el servidor no ha enviado correctamente la información
            // en formato JSON, no se podrán convertir correctamente
            // los datos a un objeto, por lo que la promesa fallará
            // y esto provocará un error.
            var respuesta = await response.json();
            // en este ejemplo, el servidor nos devuelve un objeto con dos datos,
            // la media de los números enviados, y un fragmento de HTML
            // con un el título y una lista con los números
        } else {
            throw new Error(response.statusText);
        }
    } catch (err) {
        console.log("Error al realizar la petición AJAX: " + err.message);
    }
})();*/

    //USO DE AJAX CON FETCH 
    /*async function leertodos(){
        const respuesta=await fetch('https://jsonplaceholder.typicode.com/todos');
        const datos=await respuesta.json();
        return datos;
    }
    leertodos().then(valor=>{
        console.log(valor);
        });*/
});



async function validar_usuario(formData,url){
    try {
        let datos=formData;
        let init={
            method:'POST',
            headers: {},
            body: datos
        };
        let response= await fetch(url, init);
        if (response.ok) {
            var respuesta = await response.json();
            return respuesta;
        }else{
            throw new Error(response.statusText);
        }
    } catch (err) {
        console.log("Error al realizar la petición AJAX: " + err.message);
    }
}

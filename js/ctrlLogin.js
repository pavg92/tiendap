/*
Archivo:  ctrlLogin.js
Objetivo: código de JavaScript para realizar login mediante llamada a PHP
Autor:    BAOZ
*/
//Si vuelve a cargar el script es porque se perdió la sesión
//sessionStorage.setItem("nTipoUsuario", "0");

//Configura y lanza la llamada parcial al servidor
function llamaLogin(stxtCan,stxtNom,stxtDescrip,stxtPrecio,stxtIma,stxtStock,stxtId){
var request = new XMLHttpRequest();
var url = "agregar.php";
var sQueryString="";
    var can = parseInt(stxtCan);
    var stock = parseInt(stxtStock)
	if (stxtCan==""){
		alert("Faltan datos para el ingreso");
    }else if(stxtCan<=0){
        alert("La cantidad debe ser mayor a 0");
    }else if(can>stock){ 
        alert("Stock de producto insuficiente");
	}else{
		//Arma los parámetros a enviar al servidor (se reciben como $_REQUEST)
		sQueryString="txtCan="+stxtCan+"&txtNom="+stxtNom+"&txtDescrip="+stxtDescrip+"&txtPrecio="+stxtPrecio+"&txtIma="+stxtIma+"&txtStock="+stxtStock+"&txtId="+stxtId;
		/*Al evento onreadystatechange se le asigna
		  una función anónima; es parte de la
		  configuración de la llamada*/
		request.onreadystatechange=function() {
			/*Si, cuando se ejecute la llamada, queda
			  en estado 4 y status 200, es que todo
			  salió bien y puede procesar la respuesta */
			if (request.readyState === 4 &&
				request.status === 200) {
				procesaLogin(can,stock,stxtId);
                alert("Producto agregado al carrito de compra")
			}else{
				if (request.status != 200 &&request.status != 0)
					alert("Hubo error, status "+ request.status);
			}
		};
		request.open("POST", url, true);
		//Se avisa que se envían parámetros que se van a entender como un formulario
		request.setRequestHeader("Content-type",
		"application/x-www-form-urlencoded");
		request.send(sQueryString);
	}
}

//Procesa la respuesta parcial del servidor
function procesaLogin(can,stock,stxtId){
   // sessionStorage.setItem("nTipoUsuario","1");
    var oNodoDiv = document.getElementById("div"+stxtId);
    var oStock = document.getElementById("stock"+stxtId)
    var vStock = document.getElementById("stockv"+stxtId)
    var ocan = stock-can;
    oStock.innerHTML = '<Strong style="color: red"> Stock: </Strong>'+ocan;
    vStock.value = ''+ocan;
    //alert(""+hola);
    if((stock-can)==0){
        oNodoDiv.style.display = "none";
        
        
    }

}

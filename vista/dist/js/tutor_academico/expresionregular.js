function filtronombre(string){
	var filtro = /^^[a-zA-ZáéíóúñÑ\s]{2,100}$/;

	if (string.search(filtro)) {
		return false;
	}
	else{
		true;
	}
}

function filtroselect(string){
	var filtro = /^^[0-9]{1,100}$/;

	if (string.search(filtro)) {
		return false;
	}
	else{
		true;
	}
}


function filtrocedula(string){
	var filtro = /^^[0-9\s]{5,8}/;

	if (string.search(filtro)) {
		return false;
	}
	else{
		true;
	}
}

function filtrotelefono(string){
	var filtro =/^^[a-zA-Z()-1234567890\s]{2,200}$/;

	if (string.search(filtro)) {
		return false;
	}
	else{
		true;
	}
}

function filtrocorreo(string){
	var filtro = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;

	if (string.search(filtro)) {
		return false;
	}
	else{
		true;
	}
}

function filtrodireccion(string){
	var filtro = /^^[a-zA-ZáéíóúñÑ!"#$%&/()=,.1234567890\s]{2,200}$/;

	if (string.search(filtro)) {
		return false;
	}
	else{
		true;
	}
}



 

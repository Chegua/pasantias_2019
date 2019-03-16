function filtrocargo(string){
	var filtro = /^^[0-9a-zA-ZáéíóúñÑ\s]{1,100}$/;

	if (string.search(filtro)) {
		return false;
	}
	else{
		true;
	}
}

function filtroselect(string){
	var filtro = /^^[0-9a-zA-ZáéíóúñÑ\s]*$/;

	if (string.search(filtro)) {
		return false;
	}
	else{
		true;
	}
}

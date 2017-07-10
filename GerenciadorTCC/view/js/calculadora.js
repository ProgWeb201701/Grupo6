
function Calcula_if(){
	v1 = parseFloat(document.getElementById("valor1").value);
	v2 = parseFloat(document.getElementById("valor2").value);
	if(document.getElementById("operador").value == "Soma")
		r = v1 + v2;
	if(document.getElementById("operador").value == "-")
		r = v1 - v2;
	if(document.getElementById("operador").value == "*")
		r = v1 * v2;
	if(document.getElementById("operador").value == "/")
		r = v1 / v2;
	document.getElementById("resultado").innerHTML = r;
}


function Calcula_if2(){
	v1 = parseFloat(document.getElementById("valor1").value);
	v2 = parseFloat(document.getElementById("valor2").value);
	o = document.getElementById("operador").value;
	if(o == "Soma")
		r = v1 + v2;
	if(o == "-")
		r = v1 - v2;
	if(o == "*")
		r = v1 * v2;
	if(o == "/")
		r = v1 / v2;
	document.getElementById("resultado").innerHTML = r;
}







function Calcula_switch(){
v1 = parseFloat(document.getElementById("valor1").value);
v2 = parseFloat(document.getElementById("valor2").value);
	switch(document.getElementById("operador").value){
		case "+":
			r = v1 + v2; break;
		case "-":
			r = v1 - v2; break;
		case "*":
			r = v1 * v2; break;
		case "/":
			r = v1 / v2; break;
		default: 
			alert('Selecione uma operação');
	}
	document.getElementById("resultado").innerHTML = r;
}

function Calcula_eval(){
	v1 = parseFloat(document.getElementById("valor1").value);
	v2 = parseFloat(document.getElementById("valor2").value);
	r = eval(v1 + document.getElementById("operador").value + v2);
	document.getElementById("resultado").innerHTML = r;
}
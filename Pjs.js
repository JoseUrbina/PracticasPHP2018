function Persona(nombre, edad)
{
	this.nombre =  nombre || "";
	this.edad = edad || 0;
}

function Estudiante(nombre, edad, noCarnet)
{
	this.noCarnet = noCarnet || "";
	Persona.prototype.constructor.call(this, nombre, edad);
}

Estudiante.prototype = new Persona();
Estudiante.prototype.constructor = Estudiante;

Estudiante.prototype.mensaje = function()
{
	console.log(this.nombre);
}

var e = new Estudiante("José",23, "e2342");
e.mensaje();

alert("hola");
// arrays donde se mostrarán los mesees cuando se selecciones la opcion mensualidad
var provincias_1 = new Array(
  "-",
  "Enero",
  "Febrero",
  "Marzo",
  "Abril",
  "Mayo",
  "Junio",
  "Julio",
  "Agosto",
  "Septiembre",
  "Octubre",
  "Noviembre",
  "Diciembre"
);

// arrays libros
var provincias_2 = new Array(
  "-",
  "American English File Starter A",
  "American English File Starter B",
  "American English File Starter 1A",
  "American English File Starter 1B",
  "American English File Starter 2A",
  "American English File Starter 2B",
  "American English File Starter 3A",
  "American English File Starter 3B",

  "American English File Starter 4A",
  "American English File Starter 4B",
  "American English File Starter 5A",
  "American English File Starter 5B",
  "PACK Story Central 1 (SB, WB, RB)",
  "PACK Story Central 2 (SB, WB, RB)",
  "PACK Story Central 3 (SB, WB, RB)",
  "PACK Story Central 4 (SB, WB, RB)",
  "PACK Story Central 5 (SB, WB, RB)",
  "PACK Story Central 1 (SB, WB, RB)",
  "Défi 1",
  "Défi 2",
  "Défi 3",
  "Défi 4"
);

//array examinacion cefr
var provincias_3 = Array(
  "-",
  "CEFR A1-",
  "CEFR A1+",
  "CEFR A2-",
  "CEFR A2+",
  "CEFR B1-",
  "CEFR B2+"
);

// arrays de matricula
var provincias_4 = new Array("-", "Matrícula nuevo ingreso", "Continuidad");

var todasProvincias = [
  [],
  provincias_1,
  provincias_2,
  provincias_3,
  provincias_4,
];

function cambia_provincia() {
  //tomo el valor del select del pais elegido
  var pais;
  pais = document.f1.pais[document.f1.pais.selectedIndex].value;
  //miro a ver si el pais está definido
  if (pais != 0) {
    //si estaba definido, entonces coloco las opciones de la provincia correspondiente.
    //selecciono el array de provincia adecuado
    mis_provincias = todasProvincias[pais];
    //calculo el numero de provincias
    num_provincias = mis_provincias.length;
    //marco el número de provincias en el select
    document.f1.provincia.length = num_provincias;
    //para cada provincia del array, la introduzco en el select
    for (i = 0; i < num_provincias; i++) {
      document.f1.provincia.options[i].value = mis_provincias[i];
      document.f1.provincia.options[i].text = mis_provincias[i];
    }
  } else {
    //si no había provincia seleccionada, elimino las provincias del select
    document.f1.provincia.length = 1;
    //coloco un guión en la única opción que he dejado
    document.f1.provincia.options[0].value = "-";
    document.f1.provincia.options[0].text = "-";
  }
  //marco como seleccionada la opción primera de provincia
  document.f1.provincia.options[0].selected = true;
}

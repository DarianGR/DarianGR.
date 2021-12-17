//Objeto del tipo Date con el nombre de date
const date = new Date();

//Esta funcion permite mostrar el calendario con las propiedades que tiene dentro de ella
//La funcion esta en forma compacta, la forma tradicional seria:
//const renderCalendar = function(){}
const renderCalendar = () => {
  date.setDate(1);
//seleccionar el contenedor para los dias para posteriormente modificarlo
  const monthDays = document.querySelector(".days");

//En esta variable se guarda el ultimo dia del mes actual 
//.getFullYear() devuelve el año actual
//getMonth() devuelve el mes actual
//Si se especifica 1, el resultado seria el numero del primer dia del mes y año actual
//Si se especifica 0, el resultado seria el numero del ultimo dia del mes anterior al actual, puede ser 30, 31 o 28
  const lastDay = new Date(
    date.getFullYear(),
    //se le suma 1 porque getMonth es en base a cero
    date.getMonth() + 1,
    0
  ).getDate();
  

//En esta variable se guarda el ultimo dia que tiene el mes anterior al actual (30 0 31, 28 en caso de febrero)
  const prevLastDay = new Date(
    date.getFullYear(),
    date.getMonth(),
    0
  ).getDate();

  //Se guarda el primer dia del mes actual
  const firstDayIndex = date.getDay();
  console.log(firstDayIndex);


  const lastDayIndex = new Date(
    date.getFullYear(),
    date.getMonth() + 1,
    0
  ).getDay();

  const nextDays = 7 - lastDayIndex - 1;
//Array con todos los meses de año para posteriormente poderlo mandar al h1 de html
  const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ];
//date.getMonth devuelve el index en base a cero de cada mes,
//Por ejemplo: El index 1 se refiere a Febrero 
//Es por eso que se especifica que el array con el indice que devuelva el objeto date, es el que se mostrará en la etiqueta h1 de html
  document.querySelector(".date h1").innerHTML = months[date.getMonth()];
//Se coloca la fecha en el parrafo correspondiente utilizando el metodo .toDateString(), el cual devuelve la fecha actual en un formato legible 
  document.querySelector(".date p").innerHTML = new Date().toDateString();
//Utilizando let, la variable solo se podrá utilizar en este bloque de codigo
  let days = "";

  for (let x = firstDayIndex; x > 0; x--) {
    days += `<div class="prev-date">${prevLastDay - x + 1}</div>`;
  }

  for (let i = 1; i <= lastDay; i++) {
    if (
      i === new Date().getDate() &&
      date.getMonth() === new Date().getMonth()
    ) {
      days += `<div class="today">${i}</div>`;
    } else {
      days += `<div>${i}</div>`;
    }
  }

  for (let j = 1; j <= nextDays; j++) {
    days += `<div class="next-date">${j}</div>`;
    monthDays.innerHTML = days;
  }
};

document.querySelector(".prev").addEventListener("click", () => {
  date.setMonth(date.getMonth() - 1);
  renderCalendar();
});

document.querySelector(".next").addEventListener("click", () => {
  date.setMonth(date.getMonth() + 1);
  renderCalendar();
});

renderCalendar();
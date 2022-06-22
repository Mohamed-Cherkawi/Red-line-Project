// Toggling the search bar icon js Code .
const icon = document.querySelector(".searchIcon");
const search = document.querySelector(".search");
// Bmi inputs .
const bmiInput1 = document.getElementById("bmiInput1");
const bmiInput2 = document.getElementById("bmiInput2");
// Elements :
const BodyMass = document.getElementById("bodyMass");
const BodyState = document.getElementById("bodyState");
// Calcuate btn .
const calculateBtn = document.getElementById("calculateBtn");

icon.onclick = function () {
  search.classList.toggle("active");
    };

// Events :
calculateBtn.addEventListener("click", CalculBmi);

function CalculBmi() {
  const bmiInput1V = bmiInput1.value;
  const bmiInput2V = bmiInput2.value;

  if( bmiInput1V == "" || bmiInput2V == "" ) {
    return ;
  }
  // Changing the type of the given data as string to an integers to begin the operations and stocking them to a variables .
  let weight = parseInt(bmiInput1V);
  let height = parseInt(bmiInput2V) / 100.0; // b m
  let bmi;

  bmi = weight / Math.pow(height, 2);

  // Adding some style to the element
  BodyMass.classList.add('text-dark');
  // i used the toFixed function because i just need to numbers after the semicolon .
  BodyMass.innerText = bmi.toFixed(1);
  
  BodyState.classList.add('text-dark');

  // Start of conditions :
  if (bmi < 18.5) {
    BodyState.innerText = "Underweight";
  } else if (bmi >= 18.5 && bmi <= 24.9) {
    BodyState.innerText = "Normal Weight";
  } else if (bmi >= 25.0 && bmi <= 29.9) {
    BodyState.innerText = "Pre-Obesity";
  } else if (bmi >= 30.0 && bmi <= 34.9) {
    BodyState.innerText = "Obesity Class 1";
  } else if (bmi >= 35.0 && bmi <= 39.9) {
    BodyState.innerText = "Obesity Class 2";
  } else {
    BodyState.innerText = "Obesity Class 3";
  }
}

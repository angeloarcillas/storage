function calculator() {
  let num1 = parseInt(document.querySelector(".num1").value);
  let num2 = parseInt(document.querySelector(".num2").value);
  let operator = document.querySelector(".operator").value;
  let total = 0;
  
  switch (operator) {
    case "+":
      total = num1 + num2;
      break;
    case "-":
      total = num1 - num2;
      break;
    case "*":
      total = num1 * num2;
      break;
    case "/":
      total = num1 / num2;
      break;

    default:
      alert("something went wrong");
      break;
  }

  document.querySelector(".result").innerHTML = total;
}

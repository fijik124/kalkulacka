const form = document.querySelector("#calcForm");
const inputA = document.querySelector("#a");
const inputB = document.querySelector("#b");
const op = document.querySelector("#operator");
const msg = document.querySelector("#message");

function show(text, isError = false) {
  msg.textContent = text;
  msg.classList.toggle("error", isError);
}

form.addEventListener("submit", (e) => {
  e.preventDefault();

  const a = inputA.value.trim();
  const b = inputB.value.trim();
  const operator = op.value;

  if (a === "" || b === "") {
    show("Vyplň obe čísla.", true);
    return;
  }

  if (isNaN(a) || isNaN(b)) {
    show("Zadaj platné čísla.", true);
    return;
  }

  const x = Number(a);
  const y = Number(b);

  let result;

  if (operator === "+") result = x + y;
  else if (operator === "-") result = x - y;
  else if (operator === "*") result = x * y;
  else if (operator === "/") {
    if (y === 0) {
      show("Delenie nulou nie je povolené.", true);
      return;
    }
    result = x / y;
  } else {
    show("Neznáma operácia.", true);
    return;
  }

  show(`Výsledok: ${result}`);
});
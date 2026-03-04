const msg = document.querySelector("#message");
const form = document.querySelector("#calcForm");

if (form) {
  form.addEventListener("input", () => {
    const message = document.querySelector(".message");
    if (message) message.remove();
  });
}
import { calculateAllOutputs, calculateOnBlur } from "./utils/calculations";

$(() => {
  $(".button-collapse").sideNav();

  if (document.getElementById("60co_input-1")) {
    calculateAllOutputs();
    const form = document.querySelector("form");
    form.addEventListener("blur", calculateOnBlur, true);
    // prevent onSubmit on Enter
    form.addEventListener(
      "keypress",
      e => {
        if (e.key === "Enter" || e.keyCode === 13) {
          if (e.target.type !== "submit") {
            e.preventDefault();
            e.stopPropagation();
          }
        }
      },
      true
    );
  }
});

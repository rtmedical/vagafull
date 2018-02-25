import { calculateAllOutputs, calculateOnBlur } from "./utils/calculations";

$(() => {
  $(".button-collapse").sideNav();

  if (document.getElementById("60co_input-1")) {
    calculateAllOutputs();
    document
      .querySelector("form")
      .addEventListener("blur", calculateOnBlur, true);
  }
});

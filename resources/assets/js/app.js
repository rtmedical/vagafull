import { calculateAllOutputs, calculateOnBlur } from "./utils/calculations";

$(() => {
  $(".button-collapse").sideNav();

  $("#fixed-btn-up").click(() => {
    $("html, body").animate({ scrollTop: 0 }, "fast");
    return false;
  });

  $("#fixed-btn-down").click(() => {
    $("html, body").animate({ scrollTop: $(document).height() }, "fast");
    return false;
  });

  if (document.getElementById("60co_input-1")) {
    calculateAllOutputs();

    const form = document.getElementById("spreadsheet-form");

    if (form) {
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
  }
});

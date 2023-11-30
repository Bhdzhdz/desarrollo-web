document.addEventListener("DOMContentLoaded", function () {
  const result = document.getElementById("result");
  const buttons = document.querySelectorAll("button");

  buttons.forEach((button) => {
    button.addEventListener("click", function () {
      if (button.id === "clear") {
        result.value = "";
      } else if (button.id === "equals") {

        if (result.value === "" || result.value === "Error") {
          result.value = "";
          return;
        }

        try {
          // Replace ÷ with / and × with *
          let expression = result.value.replace(/÷/g, '/').replace(/×/g, '*');
          result.value = eval(expression);
        } catch (error) {
          result.value = "Error";
        }
      } else if (button.id === "backspace") {
        result.value = result.value.slice(0, -1);
      } else {
        // Replace the visually displayed symbols
        const text = button.textContent;
        // result.value += (text === '÷') ? '/' : (text === '×') ? '*' : text;
        result.value += text;
      }
    });
  });
});

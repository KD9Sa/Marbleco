let button = document.getElementById("send-btn");
button.onclick = function () {
  button.disabled = true;
  button.textContent = "    ✓    ";
  button.style.width = "100px";
};

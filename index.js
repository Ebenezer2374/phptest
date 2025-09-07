document.addEventListener("DOMContentLoaded", () => {
  const passwordField = document.getElementById("password");
  const togglePassword = document.getElementById("togglePassword");

  togglePassword.addEventListener("click", () => {
    const isPassword = passwordField.type === "password";
    passwordField.type = isPassword ? "text" : "password";
    togglePassword.textContent = isPassword ? "🙈" : "👁️"; // switch icon
  });
});

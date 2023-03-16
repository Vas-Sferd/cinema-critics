const form = document.querySelector('form');
const usernameInput = document.getElementById('username');
const passwordInput = document.getElementById('password');

form.addEventListener('submit', (event) => {
  event.preventDefault();

  const formData = new FormData();
  formData.append('username', usernameInput.value);
  formData.append('password', passwordInput.value);

  fetch('login_process.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      window.location.href = 'index.php';
    } else {
      alert(data.message);
    }
  })
  .catch(error => alert(error.message));
});
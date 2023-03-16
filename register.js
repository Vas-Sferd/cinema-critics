document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const form = event.target;
    const formData = new FormData(form);

    fetch('register_process.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.status === 'success') {
        window.location.href = 'index.php';
      } else {
        const errorElement = document.getElementById('error-message');
        errorElement.textContent = data.message;
        errorElement.classList.remove('hidden');
      }
    })
    .catch(error => console.error(error));
  }); 
(function() {
    const form = document.querySelector('form');
    const password = document.querySelector('#password');
    const confirm_password = document.querySelector('#confirm_password');
  
    form.addEventListener('submit', function(event) {
      let error = '';
  
      if (password.value !== confirm_password.value) {
        error += 'Passwords must match\n';
      }
  
      if (error !== '') {
        alert(error);
        event.preventDefault();
      }
    });
  })(); 
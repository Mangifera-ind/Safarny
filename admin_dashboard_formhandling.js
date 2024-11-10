document.getElementById('update-delete-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    fetch('admin_update_delete.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('update-delete-message').innerText = data;
        form.reset();
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

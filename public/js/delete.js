document.addEventListener('DOMContentLoaded', function () {
    const deleteForms = document.querySelectorAll('form[data-confirm]');
    
    deleteForms.forEach(form => {
        form.addEventListener('submit', function (event) {
            const confirmation = confirm(form.getAttribute('data-confirm'));
            if (!confirmation) {
                event.preventDefault();
            }
        });
    });
});
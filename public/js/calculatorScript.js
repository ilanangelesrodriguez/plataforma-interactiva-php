function showForm(formId, clickedButton) {
    const forms = document.querySelectorAll('.calculadora__card-form');
    forms.forEach(form => form.style.display = 'none');
    const main = document.querySelector('.calculadora__main');
    main.style.display = 'none';
    const targetForm = document.getElementById(formId);
    if (targetForm) {
        targetForm.style.display = 'flex';
    }

    // Remover la clase 'indicator' de todos los botones
    const buttons = document.querySelectorAll('.calculadora__nav-item');
    buttons.forEach(button => button.classList.remove('indicator'));

    // Agregar la clase 'indicator' solo al botón clicado
    clickedButton.classList.add('indicator');
}
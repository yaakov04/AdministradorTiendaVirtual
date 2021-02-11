(function() {
    document.addEventListener('DOMContentLoaded', function() {

        if (document.querySelector('.navegacion')) {
            let nav = document.querySelector('.navegacion');
            nav.addEventListener('click', menuDesplegable);
        }
        if (document.querySelector('#submit')) {
            let btnSubmit = document.querySelector('#submit');
            btnSubmit.addEventListener('click', submitForm)
        }

        function menuDesplegable(e) {
            e.preventDefault();
            let menu = e.target;
            if (menu.getAttribute('data-menu') == 'true') {
                if (menu.className == 'navegacion__enlace seleccionada') {
                    menu.classList.remove('seleccionada');
                    ocultarMenu(menu);
                } else {
                    menu.classList.add('seleccionada');
                    mostrarMenu(menu);
                }
            } else {
                if (menu.getAttribute('data-link') == 'true') {
                    window.location.href = menu.href;
                }
            }

        } //
        function mostrarMenu(menu) {
            let altura = 40 * menu.parentElement.children[1].querySelectorAll('a').length
            menu.parentElement.children[1].style.height = altura.toString() + 'px';
        }

        function ocultarMenu(menu) {
            menu.parentElement.children[1].style.height = '0px';
        }

        function submitForm(e) {
            e.preventDefault();
        }









    }); //DOM CONTENT LOADED
})();
if (document.querySelector('#table_id')) {
    $(function() {

        $(document).ready(function() {
            $('#table_id').DataTable();
        });

    });
}
document.addEventListener("DOMContentLoaded", function() {
    var btn_solofrio = document.getElementById('solofrio');
    var btn_friocalor = document.getElementById('friocalor');
    var btn_1ton = document.getElementById('1tonelada');
    var btn_15ton = document.getElementById('1.5toneladas');
    var btn_2ton = document.getElementById('2toneladas');
    var btn_3ton = document.getElementById('3toneladas');
    var btn_todos = document.getElementById('todos');

    btn_solofrio.addEventListener('click', mostrar_solofrio);
    btn_friocalor.addEventListener('click', mostrar_friocalor);
    btn_1ton.addEventListener('click', mostrar_1ton);
    btn_15ton.addEventListener('click', mostrar_15ton);
    btn_2ton.addEventListener('click', mostrar_2ton);
    btn_3ton.addEventListener('click', mostrar_3ton);
    btn_todos.addEventListener('click', mostrar_todos);

    function mostrar_solofrio() {
        ocultarTodos();
        document.querySelectorAll('.col.mb-5').forEach(function(div) {
            if (div.querySelector('.fw-bolder').innerText.includes('Solo Frio')) {
                div.style.display = 'block';
            }
        });
    }

    function mostrar_friocalor() {
        ocultarTodos();
        document.querySelectorAll('.col.mb-5').forEach(function(div) {
            if (div.querySelector('.fw-bolder').innerText.includes('Frio y Calor')) {
                div.style.display = 'block';
            }
        });
    }

    function mostrar_1ton() {
        ocultarTodos();
        document.querySelectorAll('.col.mb-5').forEach(function(div) {
            if (div.querySelector('.fw-bolder').innerText.includes('1ton')) {
                div.style.display = 'block';
            }
        });
    }

    function mostrar_15ton() {
        ocultarTodos();
        document.querySelectorAll('.col.mb-5').forEach(function(div) {
            if (div.querySelector('.fw-bolder').innerText.includes('1.5ton')) {
                div.style.display = 'block';
            }
        });
    }

    function mostrar_2ton() {
        ocultarTodos();
        document.querySelectorAll('.col.mb-5').forEach(function(div) {
            if (div.querySelector('.fw-bolder').innerText.includes('2ton')) {
                div.style.display = 'block';
            }
        });
    }

    function mostrar_3ton() {
        ocultarTodos();
        document.querySelectorAll('.col.mb-5').forEach(function(div) {
            if (div.querySelector('.fw-bolder').innerText.includes('3ton')) {
                div.style.display = 'block';
            }
        });
    }

    function mostrar_todos() {
        document.querySelectorAll('.col.mb-5').forEach(function(div) {
            div.style.display = 'block';
        });
    }
    function ocultarTodos() {
        document.querySelectorAll('.col.mb-5').forEach(function(div) {
            div.style.display = 'none';
        });
    }
});

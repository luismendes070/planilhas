// ChatGPT
document.getElementById('formulario').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita o envio do formulário padrão

    // Obtém os dados inseridos pelo usuário
    var dados = document.getElementById('dados').value;

    // Envia os dados para o servidor usando AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'url_do_seu_script_php.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log('Dados enviados com sucesso!');
                // Aqui você pode adicionar qualquer código adicional que deseja executar após o envio bem-sucedido
            } else {
                console.error('Ocorreu um erro ao enviar os dados:', xhr.status);
            }
        }
    };
    xhr.send('dados=' + encodeURIComponent(dados)); // Envia os dados para o servidor
});

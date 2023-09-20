document.getElementById('submitButton').addEventListener('click', function(event){
event.preventDefault();

    const nomeUsuario = document.getElementById('nome').value;
    const emailUsuario = document.getElementById('email').value;
    const senhaUsuario = document.getElementById('senha').value;

    if (!nomeUsuario) {
        alert("Por favor, insira um nome!");
        return;
    }

    const usuario = {
        nome: nomeUsuario,
        email: emailUsuario,
        senha: senhaUsuario
    };
    fetch('/backend/cadastro.php', { 
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(usuario)
    })
    .then(response => {
        if (!response.ok) {
            if (response.status === 401 || response.status === 403) {
                window.location.href = './login.html';
                throw new Error('Não autorizado');
            } else {
                throw new Error('Sem rede ou não conseguiu localizar o recurso');
            }
        }
        return response.json();
    })
    .then(data => {
        if(!data.status){
            alert('Usuário já existe')
        }else{
            alert("Usuário criado: " + JSON.stringify(data));
            window.location.href = './';
        } 
       
    })
    .catch(error => alert('Erro na requisição: ' + error));
});

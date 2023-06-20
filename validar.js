function validarFormulario() {
    var email = document.getElementsByName('email')[0].value;
    var nome = document.getElementsByName('nome')[0].value;
    var senha = document.getElementsByName('senha')[0].value;
  
    var erroEmail = document.getElementById('erroEmail');
    var erroNome = document.getElementById('erroNome');
    var erroSenha = document.getElementById('erroSenha');
  
    var regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  
    var validacao = true;
  
    if (!regexEmail.test(email)) {
      erroEmail.textContent = 'Email inválido';
      validacao = false;
    } else {
      erroEmail.textContent = '';
    }
  
    if (nome.trim() === '') {
      erroNome.textContent = 'Nome é obrigatório';
      validacao = false;
    } else {
      erroNome.textContent = '';
    }
  
    if (senha.trim() === '') {
      erroSenha.textContent = 'Senha é obrigatória';
      validacao = false;
    } else {
      erroSenha.textContent = '';
    }
  
    return validacao;
  }
  function validarFormularioLogin() {
    var email = document.getElementsByName('email')[0].value;
    var senha = document.getElementsByName('senha')[0].value;
  
    var erroEmail = document.getElementById('erroEmail');
    var erroSenha = document.getElementById('erroSenha');
  
    var regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  
    var validacao = true;
  
    if (!regexEmail.test(email)) {
      erroEmail.textContent = 'Email inválido';
      validacao = false;
    } else {
      erroEmail.textContent = '';
    }
  
    if (senha.trim() === '') {
      erroSenha.textContent = 'Senha é obrigatória';
      validacao = false;
    } else {
      erroSenha.textContent = '';
    }
  
    return validacao;
  }
  
  function validarFormulario_tarefa() {
    var nometarefa = document.getElementById("nometarefa").value;
    var descricao = document.getElementById("descricao").value;
    var dataCriacao = document.getElementById("data_criacao").value;
    var dataConclusao = document.getElementById("data_conclusao").value;
    var mensagemErro = "";
  
    if (nometarefa.trim() === "") {
      mensagemErro = "Por favor, preencha o campo Nome da tarefa.";
      document.getElementById("erro-nometarefa").textContent = mensagemErro;
      return false;
    }
  
    if (descricao.trim() === "") {
      mensagemErro = "Por favor, preencha o campo Descrição.";
      document.getElementById("erro-descricao").textContent = mensagemErro;
      return false;
    }
  
    if (dataCriacao === "") {
      mensagemErro = "Por favor, selecione a Data de Criação.";
      document.getElementById("erro-data_criacao").textContent = mensagemErro;
      return false;
    }
  
    if (dataConclusao === "") {
      mensagemErro = "Por favor, selecione a Data de Conclusão.";
      document.getElementById("erro-data_conclusao").textContent = mensagemErro;
      return false;
    }
  
    return true;
  }

 
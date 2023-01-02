//console.log("teste");

const form = document.querySelector(".anime__details__form form"),
  continueBtn = form.querySelector(".anime__details__form button"),
  errorText = form.querySelector(".anime__details__form .errortxts"),
  chatBox = document.querySelector(".anime__details__review");

form.onsubmit = (e) => {
  e.preventDefault(); //impedindo a forma de submit

}

continueBtn.onclick = () => {
  //console.log("continueBtn");

  // Vamos começar

  let xhr = new XMLHttpRequest(); //criando XML objeto
  xhr.open("POST", "../anime-details/action/comentario.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        console.log(data);
        if (data == "sucesso") {
          location.href = '#';
        } 
        else {
          errorText.textContent = data;
          errorText.style.display = "block";
        }
      }
    }
  }
  /* temos que enviar os dados de formulário através ajax para php */
  let formData = new FormData(form); //criando novas formasDeta Object
  xhr.send(formData); //enviando os dados do formulário para php
}

setInterval(() => {
  // Vamos começar

  let xhr = new XMLHttpRequest(); //criando XML objeto
  xhr.open("POST", "../anime-details/action/get-cometario.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        chatBox.innerHTML = data;
      }
    }
  }
  /* temos que enviar os dados de formulário através ajax para php */
  let formData = new FormData(form); //criando novas formasDeta Object
  xhr.send(formData); //enviando os dados do formulário para php
}, 500); //esta função será executada com frequência após 500ms

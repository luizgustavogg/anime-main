const formtemporada = document.querySelector(".temporada form"),
continueBtntemporada = formtemporada.querySelector(".temporada button"),
errorTexttemporada = formtemporada.querySelector(".temporada .errortxt");

formtemporada.onsubmit = (e) => {
e.preventDefault(); //impedindo a formsa de submit

}

continueBtntemporada.onclick = () => {
//console.log("continueBtns");

// Vamos começar

let xhr = new XMLHttpRequest(); //criando XML objeto
xhr.open("POST", "action/edit/temporada.php", true);
xhr.onload = () => {
  if (xhr.readyState === XMLHttpRequest.DONE) {
    if (xhr.status === 200) {
      let data = xhr.response;
      console.log(data);
      if (data == "sucesso") {
        location.href = 'forms.php';
      } else {
        errorTexttemporada.textContent = data;
        errorTexttemporada.style.display = "block";
      }
    }
  }
}
/* temos que enviar os dados de formsulário através ajax para php */
let formDatatemporada = new FormData(formtemporada); //criando novas formasDeta Object
xhr.send(formDatatemporada); //enviando os dados do formulário para php
}

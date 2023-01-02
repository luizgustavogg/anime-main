const formepisodio = document.querySelector(".episodio form"),
continueBtnepisodio = formepisodio.querySelector(".episodio button"),
errorTextepisodio = formepisodio.querySelector(".episodio .errortxt");

formepisodio.onsubmit = (e) => {
e.preventDefault(); //impedindo a formsa de submit

}

continueBtnepisodio.onclick = () => {
//console.log("continueBtns");

// Vamos começar

let xhr = new XMLHttpRequest(); //criando XML objeto
xhr.open("POST", "action/episodio.php", true);
xhr.onload = () => {
  if (xhr.readyState === XMLHttpRequest.DONE) {
    if (xhr.status === 200) {
      let data = xhr.response;
      console.log(data);
      if (data == "sucesso") {
        location.href = 'forms.php';
      } else {
        errorTextepisodio.textContent = data;
        errorTextepisodio.style.display = "block";
      }
    }
  }
}

/* temos que enviar os dados de formsulário através ajax para php */
let formDataepisodio = new FormData(formepisodio); //criando novas formasDeta Object
xhr.send(formDataepisodio); //enviando os dados do formulário para php
}

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
xhr.open("POST", "action/temporada.php", true);
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

const form = document.querySelector(".categoria form"),
  continueBtn = form.querySelector(".categoria button"),
  errorText = form.querySelector(".categoria .errortxt");

form.onsubmit = (e) => {
  e.preventDefault(); //impedindo a formsa de submit

}

continueBtn.onclick = () => {
  //console.log("continueBtns");

  // Vamos começar

  let xhr = new XMLHttpRequest(); //criando XML objeto
  xhr.open("POST", "action/categoria.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        console.log(data);
        if (data == "sucesso") {
          location.href = 'forms.php';
        } else {
          errorText.textContent = data;
          errorText.style.display = "block";
        }
      }
    }
  }
  /* temos que enviar os dados de formsulário através ajax para php */
  let formData = new FormData(form); //criando novas formasDeta Object
  xhr.send(formData); //enviando os dados do formulário para php
}



const formanime = document.querySelector(".anime form"),
  continueBtnanime = formanime.querySelector(".anime button"),
  errorTextanime = formanime.querySelector(".anime .errortxt");

formanime.onsubmit = (e) => {
  e.preventDefault(); //impedindo a formsa de submit

}

continueBtnanime.onclick = () => {
  //console.log("continueBtns");

  // Vamos começar

  let xhr = new XMLHttpRequest(); //criando XML objeto
  xhr.open("POST", "action/anime.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        console.log(data);
        if (data == "sucesso") {
          location.href = 'forms.php';
        } else {
          errorTextanime.textContent = data;
          errorTextanime.style.display = "block";
        }
      }
    }
  }
  /* temos que enviar os dados de formsulário através ajax para php */
  let formDataanime = new FormData(formanime); //criando novas formasDeta Object
  xhr.send(formDataanime); //enviando os dados do formulário para php
}
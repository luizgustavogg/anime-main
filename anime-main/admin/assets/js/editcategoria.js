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
          location.href = 'tables.php';
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


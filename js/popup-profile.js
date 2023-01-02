function openPopup(popup) {
	/* Open popup and make accessible screen readers */
	$(popup).show().attr("aria-hidden", "false");
	/* Focus on element to guide screen readers to popup */
	$("#closePopup").focus();
}

function closePopup(popup) {
	/* Close popup and hide from screen readers */
	$(popup).hide().attr("aria-hidden", "true");
	/* Focus screen readers back to button */
	$("#openMyPopup").focus();
}

//console.log("teste");

const form = document.querySelector(".editp form"),
  continueBtn = form.querySelector(".editp button"),
  errorText = form.querySelector(".errortxt");

form.onsubmit = (e) => {
  e.preventDefault(); //impedindo a forma de submit

}

continueBtn.onclick = () => {
  //console.log("continueBtn");

  // Vamos começar

  let xhr = new XMLHttpRequest(); //criando XML objeto
  xhr.open("POST", "action/editp.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        console.log(data);
        if (data == "sucesso") {
          location.href = 'profile.php';
        } else {
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

function openPopup2(popup2) {
	/* Open popup and make accessible screen readers */
	$(popup2).show().attr("aria-hidden", "false");
	/* Focus on element to guide screen readers to popup */
	$("#closePopup2").focus();
}

function closePopup2(popup2) {
	/* Close popup and hide from screen readers */
	$(popup2).hide().attr("aria-hidden", "true");
	/* Focus screen readers back to button */
	$("#openMyPopup2").focus();
}

//console.log("teste");

const form2 = document.querySelector(".imguser form"),
  continueBtn2 = form2.querySelector(".imguser button"),
  errorText2 = form2.querySelector(".imguser .errortxt");

form2.onsubmit = (e) => {
  e.preventDefault(); //impedindo a forma de submit

}

continueBtn2.onclick = () => {
  //console.log("continueBtn");

  // Vamos começar

  let xhr = new XMLHttpRequest(); //criando XML objeto
  xhr.open("POST", "action/editimg.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        console.log(data);
        if (data == "sucesso") {
          location.href = 'profile.php';
        } else {
          errorText2.textContent = data;
          errorText2.style.display = "block";
        }
      }
    }
  }
  /* temos que enviar os dados de formulário através ajax para php */
  let formData2 = new FormData(form2); //criando novas formasDeta Object
  xhr.send(formData2); //enviando os dados do formulário para php
}

function openPopup3(popup3) {
	/* Open popup and make accessible screen readers */
	$(popup3).show().attr("aria-hidden", "false");
	/* Focus on element to guide screen readers to popup */
	$("#closePopup3").focus();
}

function closePopup3(popup3) {
	/* Close popup and hide from screen readers */
	$(popup3).hide().attr("aria-hidden", "true");
	/* Focus screen readers back to button */
	$("#openMyPopup3").focus();
}



const forms = document.querySelector(".bguser form"),
  continueBtns = forms.querySelector(".bguser button"),
  errorTexts = forms.querySelector(".bguser .errortxt");

forms.onsubmit = (e) => {
  e.preventDefault(); //impedindo a formsa de submit

}

continueBtns.onclick = () => {
  //console.log("continueBtns");

  // Vamos começar

  let xhr = new XMLHttpRequest(); //criando XML objeto
  xhr.open("POST", "action/editbguser.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        console.log(data);
        if (data == "sucesso") {
          location.href = 'profile.php';
        } else {
          errorTexts.textContent = data;
          errorTexts.style.display = "block";
        }
      }
    }
  }
  /* temos que enviar os dados de formsulário através ajax para php */
  let formData = new FormData(forms); //criando novas formasDeta Object
  xhr.send(formData); //enviando os dados do formulário para php
}
const sendData = () => {
  // e.preventDefault()
  fetch('http://localhost/backend/processForm.php', {
    method: 'post',
    // mode: 'no-cors',
    body: JSON.stringify({
      receiveFormData: true,
      name: document.querySelector('#name').value,
      phone: document.querySelector('#phone').value,
      email: document.querySelector('#email').value
    })
  }).then(responseObj => {
    if (responseObj.status == 200) {
      document.querySelector('#name').value = ""
      document.querySelector('#phone').value = ""
      document.querySelector('#email').value = ""
      const txtSuccess = document.querySelector('#text-cta')
      txtSuccess.style.color = '#ecf23a'
      txtSuccess.style.fontWeight = 'bold'
      txtSuccess.innerText = "¡Tu información ha sido enviada exitosamente!"
    } else {
      const txtSuccess = document.querySelector('#text-cta')
      txtSuccess.style.color = '#f4a875'
      txtSuccess.style.fontWeight = 'bold'
      txtSuccess.innerText = "Hubo un error al enviar la información ): inténtalo más tarde. ("+responseObj.status+")"
    }
  })
}

const postForm = document.getElementById('postForm');

postForm.addEventListener('submit',ev =>{
    ev.preventDefault();
    let payload = {};
    [...ev.target.elements].forEach(formElement => {
        if(typeof formElement.name !== 'undefined' && formElement.name !== ''){
            payload[formElement.name] = formElement.value;
        }

    })
    axios.post(APP_WEB_ROOT +'api/post/',payload).then(res =>{
        // TODO: add dynamically
        window.location.reload();
    }).catch(err=>{
        console.log(err)
    })
})
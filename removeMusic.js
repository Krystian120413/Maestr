const removeIcon = document.getElementById('removeIcon');

//remove from user playlist
removeIcon.addEventListener('click', () => {
    const addForm = document.createElement('form');
    const inputId = document.createElement('input');
    addForm.style.display = 'none';
    inputId.name = 'songId';
    inputId.type = 'number';
    inputId.value = Number(songId);

    let ajax_request = new XMLHttpRequest();
    const form_data = new FormData();

    form_data.append(inputId.name, inputId.value);

    ajax_request.open('POST', 'deleteUserSong.php')
    ajax_request.send(form_data);

    ajax_request.onreadystatechange = function(){
        if(ajax_request.readyState == 4 && ajax_request.status == 200){
            document.getElementById('message').innerText = 'Usunięto z ulubionych utworów';
            document.getElementById('message').style.display = 'block';

            setTimeout(() => {
                document.getElementById('message').innerText = '';
                document.getElementById('message').style.display = 'none';
            }, 2000);
        }
    }

    console.log(inputId.value);
})
const addIcon = document.getElementById('addIcon');

//add to user playlist
addIcon.addEventListener('click', () => {
    const addForm = document.createElement('form');
    const inputId = document.createElement('input');
    addForm.style.display = 'none';
    inputId.name = 'songId';
    inputId.type = 'number';
    inputId.value = songId;

    let ajax_request = new XMLHttpRequest();

    ajax_request.open('POST', 'addUserSong.php')
    ajax_request.send(inputId);

    ajax_request.onreadystatechange = () => {
        if(ajax_request.readyState == 4 && ajax_request.status == 200){
            document.getElementById('message').innerText = 'Dodano utwór do ulubionych';
            document.getElementById('message').style.display = 'block';

            setTimeout(() => {
                document.getElementById('message').innerText = '';
            document.getElementById('message').style.display = 'none';
            }, 2000);
        }
    }

    console.log(inputId.value);
})
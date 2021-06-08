let agent = navigator.userAgent.toLowerCase();
let ext = (agent.indexOf('firefox') != -1 || agent.indexOf('opera') != -1) ? '.ogg' : '.mp3';

const albumPosters = Array.from(document.getElementsByClassName('album-poster'));

const playBtn = document.getElementById('playBtn');
const playIcon = document.getElementById('playIcon');
const previousBtn = document.getElementById('previousBtn');
const shuffleBtn = document.getElementById('shuffleBtn');
const shuffleIcon = document.getElementById('shuffleIcon');
const nextBtn = document.getElementById('nextBtn');
const replayBtn = document.getElementById('replayBtn');
const replayIcon = document.getElementById('replayIcon');
const songTime = document.getElementById('songTime');
const fullSongTime = document.getElementById('fullSongTime');
const seekSlider = document.getElementById('seekSlider');
const volumeSlider = document.getElementById('volumeSlider');
const  volumeIcon = document.getElementById('volumeIcon');

const posters = Array.from(document.getElementsByClassName('album-poster'));

const footer = document.getElementById('footer');
const miniPoster = document.getElementById('miniPoster');
const title = document.getElementById('title');
const author = document.getElementById('author');
const audio = new Audio();

let id;
let poster;
let replay = false;
let shuffle = false;
audio.volume = volumeSlider.value / 100;


//playing after click
const selectToPlay = () => {
    posters.forEach((poster) => {
        poster.addEventListener('click', posterClicked);
    });
}

posters.forEach((pos, index) => {
    if(index != id){
        pos.addEventListener('mouseover', () => {
            pos.style.boxShadow = 'none';
            pos.style.transform = 'scale(0.98) translateY(5px)';
        });
    }
});

posters.forEach((po, index) => {
    po.addEventListener('mouseleave', () => {
        if(index != id){
            po.style.boxShadow = '0 15px 35px #2d8173';
            po.style.transform = 'none';
        }
    });
});

const songPlaying = () => {

    let s = parseInt(audio.currentTime % 60) < 10 ? "0" + parseInt(audio.currentTime % 60) : parseInt(audio.currentTime % 60);
    let m = parseInt((audio.currentTime / 60) % 60) < 10 ? "0" +  parseInt((audio.currentTime / 60) % 60) :  parseInt((audio.currentTime / 60) % 60);

    let fs = parseInt(audio.duration % 60) < 10 ? "0" + parseInt(audio.duration % 60) : parseInt(audio.duration % 60);
    let fm = parseInt((audio.duration / 60) % 60) < 10 ? "0" +  parseInt((audio.duration / 60) % 60) :  parseInt((audio.duration / 60) % 60);

    seekSlider.value = audio.currentTime;
    seekSlider.max = audio.duration;
    songTime.innerText = m+":"+s;
    fullSongTime.innerText = fm+":"+fs;

    if(audio.ended){
        if(shuffle){
            let rand = Math.floor(Math.random() * albumPosters.length);
            if(rand === id){
                if(id === albumPosters.length) id = rand - 1;
                else id = rand + 1;
            }
            else id = rand;
        }
        else {
            if(!replay) ++id;  
        }
        playNext();
    }   
}

//play next song
const playNext = () => {
    console.log(id);
    if(document.getElementById('title') + id == null) {
        ++id
        return playNext();
    };
    if(id >= albumPosters.length){
        id = 0;
        return playNext();
    }
    const tit = document.getElementById('title' + id).innerText;
    const au = document.getElementById('p' + id).innerText;
    const src = document.getElementById('musicSrc' + id).innerText;

    audio.src = src;
    audio.play();
    playIcon.innerText = 'pause_circle_filled';
    setInterval(songPlaying, 20);

    posters.forEach((p) => {
        p.style.boxShadow = '0 15px 35px #2d8173';
        p.style.transform = 'none';
    });

    poster = document.getElementById(id);
    poster.style.boxShadow = 'none';
    poster.style.transform = 'scale(0.98) translateY(5px)';

    miniPoster.src = poster.src;
    title.innerText = tit;
    author.innerText = au;
}

const posterClicked = (e) => {
    audio.pause();
    id = e.target.id;
    footer.style.display = 'flex';   

    playNext();
}

//play-pause button
const audioPause = () => {
    if(audio.paused && audio.currentTime > 0 && !audio.ended) {
        audio.play();
        playIcon.innerText = 'pause_circle_filled';
    }
    else {
        audio.pause();
        playIcon.innerText = 'play_circle_filled';
    }
    
}

playBtn.addEventListener('click', audioPause);


//changecurrentTime in audio using slider
seekSlider.addEventListener('input', () => {
    audio.currentTime = seekSlider.value;
})

//next button
nextBtn.addEventListener('click', () => {
    if(shuffle){
        let rand = Math.floor(Math.random() * albumPosters.length);
        if(rand === id){
            if(id === albumPosters.length) id = rand - 1;
            else id = rand + 1;
        }
        else id = rand;
    }
    else {
        ++id;   
    }
    playNext();
});

//previous button
previousBtn.addEventListener('click', () => {
    if(id > 0) --id;
    playNext();
})

//replay button
replayBtn.addEventListener('click', () => {
    replay = !replay;
    if(replay) replayIcon.style.color = 'rgb(29, 185, 84)';
    else replayIcon.style.color = '#fff';
})

//shuffle button
shuffleBtn.addEventListener('click', () => {
    shuffle = !shuffle;
    if(shuffle) shuffleIcon.style.color = 'rgb(29, 185, 84)';
    else shuffleIcon.style.color = '#fff';
})

//volume slider
volumeSlider.addEventListener('input', () => {
    audio.volume = volumeSlider.value / 100;
    vol = audio.volume;
    if(audio.volume === 0) volumeIcon.innerText = 'volume_off';
    else volumeIcon.innerText = 'volume_up';
})

//volume icon
volumeIcon.addEventListener('click', () => {
    if(audio.volume > 0){
        audio.volume = 0;
        volumeSlider.value = 0;
        volumeIcon.innerText = 'volume_off';
    }
})

selectToPlay();
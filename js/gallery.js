const customVideos = document.querySelectorAll('.custom-video');
        const playButtons = document.querySelectorAll('.play-button');

        playButtons.forEach((playButton, index) => {
             playButton.addEventListener('click', () => {
                customVideos[index].play();
                customVideos[index].controls = true;
                playButton.style.display = 'none';
            });
        });




const background = document.querySelector('.background');
const vid = background.querySelector('video');
const stall = document.getElementById('stall');
const img = stall.querySelector('img');

const toFishButton = document.getElementById('clickFish');
const toFreezerButton = document.getElementById('clickFreezer');
const toWhoWeAreButton = document.getElementById('clickWhoWeAre');

const stallSvg = document.getElementById('stallSvg');


const backButton = document.getElementById('backButton');

const state = {
    ROOM: 0,
    STALL: 1,
    FISH: 2
};

let currState;

// Upon enter site

function enterScene() {
    makeImgVisible('/wp-content/uploads/2024/01/room.png', () => {
        vid.src = '/wp-content/uploads/2024/01/roomToStall.mov';
        vid.style.display = "block";

        $(vid).one('canplay', function () { // only hide the stall image when video is ready
            stall.style.display = 'none';
        });
    });

    currState = state.ROOM;
    backButton.style.display = 'none';
    document.body.style.overflowY = 'scroll';

    const controller = new ScrollMagic.Controller();

    const scene = new ScrollMagic.Scene({
        duration: 2000,
        triggerElement: background,
        triggerHook: 0
    })
        .addIndicators({
            colorTrigger: "transparent",
            colorStart: "transparent",
            colorEnd: "transparent",
            addIndicators: false
        })
        .setPin(background)
        .addTo(controller);

    let accelAmount = 0.27; // determines how long the vid continues for after mouse stops scrolling
    let scrollPos = 0;
    let delay = 0;

    let vidEndTime = 2.399; // to be changed if vid source changes
    let frameInterval = 58 // too low: too hard to render (choppy), too high: too much time between frames

    scene.on('update', event => {
        scrollPos = event.scrollPos / 1200; // in seconds
    });

    let intervalId = setInterval(() => {
        delay += (scrollPos - delay) * accelAmount;

        vid.currentTime = delay;

        if (vid.currentTime > vidEndTime) { // need to be changed if vid source changes
            stallScene().then(() => {
                backButton.style.display = 'block';
                scene.destroy();
                clearInterval(intervalId);
            });
        }
    }, frameInterval);
}


function stallScene() {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            makeImgVisible('/wp-content/uploads/2024/01/stall.png');
            stallSvg.style.display = 'block';
            currState = state.STALL;
            document.body.style.overflow = 'hidden'; // remove scrolling
        
            // Set up buttons
            activeateButtons(toFishButton, toFreezerButton, toWhoWeAreButton);
            resolve(); // Resolve the promise when the operation is done
        }, 200);
    });
}

enterScene();
backButton.addEventListener('click', back);


// Fish zoom functions

function transitionToFish() {
    if (!toFishButton.disabled) {
        videoTransition('/wp-content/uploads/2024/01/fishZoomIn.mov', fishScene);
    }
}

toFishButton.addEventListener('click', transitionToFish);

function fishScene() {
    makeImgVisible('/wp-content/uploads/2024/01/fishzoom-1.png');
    stallSvg.style.display = 'none';

    currState = state.FISH;
    deactiveateButtons(toFishButton);
}


// Reverse functions

function reverseFromStallToRoom() {
    videoTransition('/wp-content/uploads/2024/01/stallToRoom.mov', enterScene);
}

function reverseFromFishToStall() {
    videoTransition('/wp-content/uploads/2024/01/fishZoomOut.mov', stallScene);
}


// Buttons

function back() {
    switch (currState) {
        case state.STALL:
            reverseFromStallToRoom();
            break;
        case state.FISH:
            reverseFromFishToStall();
            break;
        default:
            break;
    }
}


// General functions

function makeImgVisible(url, func = () => {}) {
    stallSvg.style.display = 'none';
    img.onload = () => {
        stall.style.display = 'block';
        vid.style.display = "none"; // hide the vid only when image is ready
        func();
    };
    img.src = url;
}

function videoTransition(url, func) {
    vid.style.display = "block";
    vid.src = url;

    $(vid).one('canplay', function () {
        this.play();
        $(stall).hide();
    });

    $(vid).one('ended', function () {
        func();
    });
}

function deactiveateButtons() {
    let buttons = Array.from(arguments);
    buttons.forEach(button => {
        button.disabled = true;
        button.style.display = 'none';
    });
}

function activeateButtons() {
    let buttons = Array.from(arguments);
    buttons.forEach(button => {
        button.disabled = false;
        button.style.display = 'block';
    });
}




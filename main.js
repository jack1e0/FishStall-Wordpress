const background = document.querySelector('.background');
const vid = background.querySelector('video');
const stall = document.getElementById('stall');
const img = stall.querySelector('img');

// SVGs
const stallFrontSvg = document.getElementById('stallFrontSvg');
const fishZoomSvg = document.getElementById('fishZoomSvg');

// Buttons in stallfront
const toFishButton = document.getElementById('clickFish');
const toFreezerButton = document.getElementById('clickFreezer');
const toWhoWeAreButton = document.getElementById('clickWhoWeAre');
const toManButton = document.getElementById('clickMan');

// Buttons in zoom fish
const squid = document.getElementById('squid');
const wholeFish = document.getElementById('wholeFish');
const steak = document.getElementById('steak');
const prawn = document.getElementById('prawn');
const fillet = document.getElementById('fillet');

// Back button
const backButton = document.getElementById('backButton');

const state = {
    ROOM: 0,
    STALL: 1,
    FISH: 2
};

let currState;

const currURL = new URL(window.location.href);
console.log(currURL.searchParams.get('state'));
const enteredState = currURL.searchParams.get('state');


// Upon enter site

if (enteredState == state.STALL) {
    stallScene();
} else if (enteredState == state.FISH) {
    fishScene();
} else {
    enterScene();
}


function enterScene() {
    makeImgVisible('/wp-content/uploads/2024/01/room.png', () => {
        vid.src = '/wp-content/uploads/2024/01/roomToStall.mov';
        vid.style.display = "block";

        $(vid).one('canplay', function () { // only hide the stall image when video is ready
            stall.style.display = 'none';
        });
    });

    currState = state.ROOM;
    modifyURL(state.ROOM);

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
            stallFrontSvg.style.display = 'block';
            currState = state.STALL;
            document.body.style.overflow = 'hidden'; // remove scrolling

            modifyURL(state.STALL);
        
            // Set up buttons
            activeateButtons(toFishButton, toFreezerButton, toWhoWeAreButton);
            resolve(); // Resolve the promise when the operation is done
        }, 200);
    });
}

// Hooking events to buttons

backButton.addEventListener('click', back);
fishZoomButtons();
toFishButton.addEventListener('click', transitionToFish);

// Hover events for fish zoom buttons
function fishZoomButtons() {
    squid.addEventListener('mouseenter', function() {
        if (currState == state.FISH) {
            document.getElementById('squidText').style.display = 'block';
        }
    });
      
    squid.addEventListener('mouseleave', function() {
        document.getElementById('squidText').style.display = 'none';
    });
    
    wholeFish.addEventListener('mouseenter', function() {
        if (currState == state.FISH) {
            document.getElementById('wholeFishText').style.display = 'block';
        }
    });
      
    wholeFish.addEventListener('mouseleave', function() {
        document.getElementById('wholeFishText').style.display = 'none';
    });

    prawn.addEventListener('mouseenter', function() {
        if (currState == state.FISH) {
            document.getElementById('prawnText').style.display = 'block';
        }
    });
      
    prawn.addEventListener('mouseleave', function() {
        document.getElementById('prawnText').style.display = 'none';
    });

    steak.addEventListener('mouseenter', function() {
        if (currState == state.FISH) {
            document.getElementById('steakText').style.display = 'block';
        }
    });
      
    steak.addEventListener('mouseleave', function() {
        document.getElementById('steakText').style.display = 'none';
    });

    fillet.addEventListener('mouseenter', function() {
        if (currState == state.FISH) {
            document.getElementById('filletText').style.display = 'block';
        }
    });
      
    fillet.addEventListener('mouseleave', function() {
        document.getElementById('filletText').style.display = 'none';
    });
}

// Fish zoom functions

function transitionToFish() {
    if (!toFishButton.disabled) {
        videoTransition('/wp-content/uploads/2024/01/fishZoomIn.mov', fishScene);
    }
}

function fishScene() {
    makeImgVisible('/wp-content/uploads/2024/01/fishzoom-1.png');
    stallFrontSvg.style.display = 'none';
    fishZoomSvg.style.display = 'block';
    deactiveateButtons(toFishButton);

    currState = state.FISH;
    modifyURL(state.FISH);
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
    stallFrontSvg.style.display = 'none';
    fishZoomSvg.style.display = 'none';
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

function modifyURL(newState) {
    currURL.searchParams.set('state', newState);
    window.history.replaceState({}, '', currURL);
}

// Outro transition
function outroToCart() {
    videoTransition('/wp-content/uploads/2024/01/transitionToCart.mov', ()=>{window.location.href = 'http://lin-lao-bei-seafood.local/cart/';})
  }
  
wholeFish.addEventListener('click', outroToCart);


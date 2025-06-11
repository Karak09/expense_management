<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        html,
body {
    padding: 0;
    margin: 0;
    font-family: sans-serif;
    background-color: #FAF9F6;
}

.container {
    position: fixed;
    top: 38%;
    left: 50%;
    transform: translate(-50%, -50%);
}

svg,
.form-container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.form-container {
    width: 270px;
}

svg {
    width: 1000px;
    pointer-events: none;
}

.form-container .form-row {
    width: 100%;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: flex-start;
}

.form-container .form-row input {
    width: 100%;
    height: 30px;
    margin: 0;
    padding: 5px;
    outline: none;
    border: 2px solid #dddddd;
}

.form-container .form-row input.valid {
    border-color: #000000;
}

.form-container .form-row input[type="checkbox"] {
    width: 20px;
    height: 20px;
    margin: 0 10px 0 0;
    padding: 0;
    border: 2px solid #dddddd;
}

.form-container .form-row input[type="submit"] {
    height: 40px;
    cursor: pointer;
    border: none;
    background-color: #eeeeee;
    /*pointer-events: none;*/
}

/*.form-container .form-row input[type="submit"].valid {*/
/*    pointer-events: auto;*/
/*}*/

.form-container input[type="submit"]:hover {
    background-color: #dddddd;
}

.form-container label,
.form-container input,
.form-container input::placeholder {
    font-size: 15px;
    font-family: inherit;
}

svg {
    stroke-width: 1.2px;
    /*stroke: #222245;*/
    stroke: #000000;
    fill: none
}
    </style>
</head>
<body>
<div class="container">
<div class="container">
<div class="form-container">
            <form action="{{ route('login') }}" method="POST">
            @csrf
                <label class="form-row">
                    <input autocomplete="one-time-code" type="text" id="mobile" name="mobile" placeholder="mobile" required>
                </label>
                <label class="form-row">
                    <input autocomplete="one-time-code" type="password" id="password" name="password" placeholder="password" required>
                </label>
                <label class="form-row">
                    <input type="checkbox" id="subscribe" name="subscribe"> agree to whatever
                </label>
                <div class="form-row">
                    <input type="submit" value="submit">
                </div>
            </form>
        </div>
        
        <svg viewBox="0 0 1000 1000" stroke-linecap="round" stroke-linejoin="round">
    
            <rect x="710" y="527" width="16" height="47" rx="10" ry="10"></rect>
    
            <g class="grabbing-hand">
                <path d="M48.89,54.39c-3.51.76-15.72,3-22.83-.68a14,14,0,0,0-6.41-1.52h0A3.79,3.79,0,0,1,17,51.09a3.7,3.7,0,0,1-1.1-2.64V27.75A3.75,3.75,0,0,1,19.63,24H24.1"/>
                <path class="grabbing-hand-finger-open" d="M57.05,29.76l24.82,0a4.07,4.07,0,0,0,4.11-4h0a4.07,4.07,0,0,0-4-4.11L48.69,21.3"/>
                <path class="grabbing-hand-finger-open" d="M59.34,37.74l28.81.61a4.06,4.06,0,0,0,4.14-4h0a4.06,4.06,0,0,0-4-4.15L57,29.64"/>
                <path class="grabbing-hand-finger-open" d="M57.13,45.9l26.94.78a4.07,4.07,0,0,0,4.15-4h0a4.07,4.07,0,0,0-4-4.14l-24.84-.8"/>
                <path class="grabbing-hand-finger-open" d="M48.89,54.39l27.82.36a4.06,4.06,0,0,0,4.2-3.93h0A4.06,4.06,0,0,0,77,46.62l-19.88-.78"/>
                <path class="grabbing-hand-finger-open" d="M40.78,28c5.75-5.85,12.66-22,10.5-25.88-2.25-4.09-6,.1-14.73,8.66C30.84,16.36,30.91,17.1,24.32,24"/>
            </g>
    
            <g class="pull-system">
                <line class="checkbox-pull-line" x1="0" y1="0" x2="0" y2="0"/>
                <g class="checkbox-pull-circle">
                    <circle cx="0" cy="0" r="10"/>
                    <circle cx="0" cy="0" r="4" fill="#000000"/>
                </g>
                <circle class="submit-btn-circle" cx="0" cy="0" r="3" stroke="none" fill="#000" />
                <path class="submit-btn-connector" d=""></path>
            </g>
    
            <g class="spray-hand-container">
                <g class="pushing-hand">
                    <circle cx="18" cy="0" r="5" fill="#000000"/>
                    <circle cx="18" cy="-70" r="5" fill="#000000"/>
                    <path d="M18,-70 v70" stroke-width="4"/>
                    <g>
                        <path d="M25.3,32.9V60.2a4.2,4.2,0,0,0,4.2,4.2h0a4.2,4.2,0,0,0,4.2-4.2V26.7"/>
                        <rect x="3.9" y="18.4" width="8.4" height="21.47" rx="3.7" transform="translate(10.2 -1) rotate(19.4)"/>
                        <path d="M20.9,24a3.4,3.4,0,0,0-1.7-1.1h0a4.2,4.2,0,0,0-5.4,2.5L9.1,38.8a4.3,4.3,0,0,0,2.6,5.4h0a4.3,4.3,0,0,0,5.4-2.6l1.8-5.1"/>
                        <path d="M18.4,37.9,17.3,43a4.2,4.2,0,0,0,3.4,4.9h0a4.3,4.3,0,0,0,4.5-2.3"/>
                        <path fill="white" d="M29,16.8c-6.4,5-15,13.2-12.8,17.8s6,.7,15.8-6.7c6.4-4.8,7.4-12.6.5-19.2V4.2A3.8,3.8,0,0,0,28.7.5H8A3.5,3.5,0,0,0,5.4,1.6,3.7,3.7,0,0,0,4.3,4.2V8.7"/>
                        <path d="M4.3,8.7c-5.8,6.4-3.6,20-2.2,24.8"/>
                    </g>
                </g>
                <g class="sprayer">
                    <g class="sprayer-head">
                        <defs>
                            <radialGradient id="grad1" cx="50%" cy="50%" r="50%" fx="100%" fy="50%">
                                <stop offset="0%" stop-color="#777777" stop-opacity="0"/>
                                <stop offset="100%" stop-color="#777777" stop-opacity="1"/>
                            </radialGradient>
                        </defs>
                        <rect x="82.39" y="19.85" width="13.06" height="16.79" rx="1.46"/>
                        <rect x="74.55" y="22.56" width="7.84" height="6.1" rx="1.13"/>
    
                        <line class="spray-line" stroke="#777777" stroke-dasharray="8 5" x1="22.4" y1="14.76" x2="74.27" y2="25.2" />
                        <line class="spray-line" stroke="#777777" stroke-dasharray="8 5" x1="21.51" y1="21.12" x2="74.27" y2="25.2" />
                        <line class="spray-line" stroke="#777777" stroke-dasharray="8 5" x1="21.44" y1="28.26" x2="74.27" y2="25.2" />
                        <line class="spray-line" stroke="#777777" stroke-dasharray="8 5" x1="22.37" y1="35.54" x2="74.27" y2="25.2" />
                        <line class="spray-line" stroke="#777777" stroke-dasharray="8 5" x1="24.21" y1="42.36" x2="74.27" y2="25.2" />
                        <line class="spray-line" stroke="#777777" stroke-dasharray="8 5" x1="24.31" y1="7.78" x2="74.27" y2="25.2" />
    
                        <circle fill="url(#grad1)" stroke="none" class="spray-bubble" cx="25.43" cy="12.97" r="12.47" />
                        <circle fill="url(#grad1)" stroke="none" class="spray-bubble" cx="15.6" cy="25.43" r="15.1" />
                        <circle fill="url(#grad1)" stroke="none" class="spray-bubble" cx="33.24" cy="37.13" r="9.21" />
                        <circle fill="url(#grad1)" stroke="none" class="spray-bubble" cx="35.92" cy="19.5" r="11.89" />
                        <circle fill="url(#grad1)" stroke="none" class="spray-bubble" cx="18.82" cy="34.45" r="11.89" />
                    </g>
                    <path d="M89,42h0a21.3,21.3,0,0,1,21.3,21.3v56.48a5.06,5.06,0,0,1-5.06,5.06H72.6a5.06,5.06,0,0,1-5.06-5.06V63.4A21.45,21.45,0,0,1,89,42Z" fill="#fff"/>
                    <rect x="78.3" y="36.64" width="21.24" height="6.15" rx="1.93" fill="#fff"/>
                    <rect x="76.33" y="71.46" width="33.96" height="23.23" fill="#cccccc"/>
                </g>
            </g>
    
            <g>
                <line class="gear-connector" x1="0" x2="0" y1="0" y2="0"/>
                <g class="gears">
                </g>
            </g>
    
            <g class="grabbing-hand">
                <g fill="#ffffff">
                    <rect class="grabbing-hand-finger-closed" x="44.79" y="13.38" width="8.42" height="22.15" rx="3.67" transform="translate(20.57 71.26) rotate(-85.25)"/>
                    <rect class="grabbing-hand-finger-closed" x="44.08" y="39.17" width="8.42" height="21.47" rx="3.67" transform="translate(-5.44 93.9) rotate(-85.25)"/>
                    <rect class="grabbing-hand-finger-closed" x="45.68" y="30.71" width="8.42" height="22.57" rx="3.67" transform="matrix(0.08, -1, 1, 0.08, 3.91, 88.24)"/>
                    <rect class="grabbing-hand-finger-closed" x="44.98" y="22.21" width="8.42" height="22.57" rx="3.67" transform="matrix(0.08, -1, 1, 0.08, 11.74, 79.74)"/>
                    <path class="grabbing-hand-finger-closed" d="M32.18,27.42c5,6.46,13.22,15.06,17.76,12.81,4.18-2.07.69-6-6.66-15.74C38.46,18.1,30.69,17.1,24.1,24"/>
                </g>
            </g>
    
            <g class="spiral-container">
                <path stroke-width=".8" class="spiral-path" d=""/>
            </g>
    
            <g class="weight-big-container">
                <line x1="14" x2="60" y1="14" y2="14"></line>
                <line x1="14" x2="60" y1="14" y2="55"></line>
                <circle cx="14" cy="14" r="5" fill="#000000" stroke="none"/>
    
                <g class="weight-big" stroke="none">
                    <path d="M25.5,16.7c.2-.6.5-1.3.7-2C31.1,3.1,23.2,0,14.3,0S-1.6,4.2,2.4,14.7a22.5,22.5,0,0,1,.8,2.4A14.4,14.4,0,0,0,0,26.2c0,8,6.5,11.6,14.5,11.6S29,34.2,29,26.2A14.6,14.6,0,0,0,25.5,16.7ZM14.4,5c5.6,0,9.3,1.9,7.1,8.5a13.5,13.5,0,0,0-7-1.8,14.6,14.6,0,0,0-7.2,1.9C5.5,7.5,8.8,5,14.4,5Z" fill="#231f20"/>
                    <path d="M15.1,15.6l-1.8-.2a9.2,9.2,0,0,0-9.1,9.2,6.2,6.2,0,0,0,.2,1.9A13.3,13.3,0,0,1,15.1,15.6Z" fill="#fff"/>
                </g>
            </g>
    
    
            <g class="scales-container">
    
                <defs>
                    <marker
                            id="ball"
                            viewBox="0 0 10 10"
                            refX="5"
                            refY="5"
                            markerUnits="strokeWidth"
                            markerWidth="5"
                            markerHeight="5"
                            orient="auto">
                        <circle cx="5" cy="5" r="3" fill="#000"/>
                    </marker>
                </defs>
    
    
                <rect x="10" y="-19" width="30" height="90" rx="15" ry="15" stroke-width="10" stroke="#ccc" />
                <rect class="timing-chain" x="10" y="-19" width="30" height="90" rx="15" ry="15" stroke="#fff" />
    
                <rect x="-31" y="-19" width="30" height="144" rx="15" ry="15" stroke-width="10" stroke="#ccc"/>
                <rect class="timing-chain" x="-31" y="-19" width="30" height="144" rx="15" ry="15" stroke="#fff"/>
    
                <g class="reels-connector">
                    <rect x="-8" y="3.2" width="25" height="10" rx="5" ry="5" />
                    <circle cx="-1" cy="8.5" r="3" fill="#000" stroke="none"/>
                    <circle cx="9.9" cy="8.5" r="3" fill="#000" stroke="none"/>
                </g>
    
                <g class="car-weight-connector">
                    <rect x="-36" y="97" width="10" height="95" rx="5" ry="5" />
                    <circle cx="-31" cy="103" r="3" fill="#000" stroke="none"/>
                    <circle cx="-31" cy="186" r="3" fill="#000" stroke="none"/>
                </g>
    
    
                <line class="scales-moving-line" x1="147.6" y1="30.52" x2="40" y2="12" stroke-width="2" marker-start="url(#ball)" marker-end="url(#ball)"/>
                <path fill="#000000" d="M102.45,30.68,92,20.26c-9.89,9.9-9.89,10.47-9.89,10.47Z" />
    
            </g>
    
            <g class="car-container">
                <g>
                    <g class="car">
                        <circle cx="17" cy="88" r="5" />
                        <circle cx="17" cy="88" r="2" fill="#000" />
                        <circle cx="32" cy="88" r="5" />
                        <circle cx="32" cy="88" r="2" fill="#000" />
    
                        <path d="M10,65 h30 l-5,15 h-20 l-5,-15 " fill="#000" />
                    </g>
    
                    <line x1="-51" y1="95" x2="145" y2="95"/>
                </g>
            </g>
    
        </svg>
    </div>
    <script src="https://unpkg.com/gsap@3/dist/gsap.min.js"></script>
    <script src="script.js"></script>
    <script>
        const containerEl = document.querySelector('.container');
const checkboxEl = document.querySelector('.form-container .form-row input[type="checkbox"]');
const mobileEl = document.querySelector('.form-container .form-row input[name="mobile"]');
const passwordEl = document.querySelector('.form-container .form-row input[name="password"]');
const submitBtn = document.querySelector('.form-container .form-row input[type="submit"]');

const sprayer = document.querySelector('.sprayer');
const sprayHandContainer = document.querySelector('.spray-hand-container');
const sprayLines = Array.from(document.querySelectorAll('.spray-line'));
const sprayBubbles = Array.from(document.querySelectorAll('.spray-bubble'));

const pushingHand = document.querySelector('.pushing-hand');
const sprayerHead = document.querySelector('.sprayer-head');
const gearsContainer = document.querySelector('svg .gears');
const gearConnector = document.querySelector('.gear-connector');

const pullSystemContainer = document.querySelector('.pull-system');

const checkboxPullLine = document.querySelector('.checkbox-pull-line');
const checkboxPullCircle = document.querySelector('.checkbox-pull-circle');
const btnPullLine = document.querySelector('.submit-btn-connector');
const btnHandlerCircle = document.querySelector('.submit-btn-circle');

const spiralContainer = document.querySelector('.spiral-container');
const weightBigContainer = document.querySelector('.weight-big-container');

const scalesContainer = document.querySelector('.scales-container');
const scalesLine = document.querySelector('.scales-moving-line');
const weightBig = document.querySelector('.weight-big');
const spiralPath = document.querySelector('.spiral-path');

const carContainer = document.querySelector('.car-container');
const car = document.querySelector('.car');
const carInclineWrapper = document.querySelector('.car-container g');
const timingChains = Array.from(document.querySelectorAll('.timing-chain'));
const reelsConnector = document.querySelector('.reels-connector');
const carWeightConnector = document.querySelector('.car-weight-connector');

const grabbingHand = document.querySelectorAll('.grabbing-hand');
const grabbingHandOpenFingers = Array.from(document.querySelectorAll('.grabbing-hand-finger-open'));
const grabbingHandClosedFingers = Array.from(document.querySelectorAll('.grabbing-hand-finger-closed'));


layoutPreparation();
scaleToFit();
window.onresize = scaleToFit;

function scaleToFit() {
    const h = 800;

    if (window.innerHeight < h) {
        gsap.set(containerEl, {
            scale: window.innerHeight / h,
            transformOrigin: "50% 75%"
        })
    }

}


let sprayRepeatCounter = 0;
const state = {
    handClosed: false,
    sumbitBtnOnPlace: false,
    sumbitBtnTextOpacity: 0,
    pullProgress: 0
}
let nameValid = false;
let passwordValid = false;

const passwordTl = createpasswordTl();
const gearsTls = createGearsTimelines();
createPullingTimeline(state.handClosed, checkboxEl.checked);


checkboxEl.addEventListener('change', () => {
    createPullingTimeline(state.handClosed, checkboxEl.checked);
})

mobileEl.addEventListener('input', () => {
    mobileValid = mobileEl.value.length > 3;
    if (mobileValid) {
        mobileEl.classList.add("valid");
        gearsTls.forEach(tl => {
            if (tl.paused()) {
                tl.play();
                gsap.fromTo(tl, {
                    timeScale: 0
                }, {
                    timeScale: 1
                })
            }
        })
    } else {
        mobileEl.classList.remove("valid");
        gearsTls.forEach(tl => {
            if (!tl.paused()) {
                gsap.to(tl, {
                    timeScale: 0,
                    onComplete: () => {
                        tl.pause();
                    }
                })
            }
        })
        sprayRepeatCounter = 0;
        gsap.to(submitBtn, {
            duration: .3,
            color: "rgba(0, 0, 0, " + 0 + ")"
        })
    }
})

passwordEl.addEventListener('input', () => {
    const passwordRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    passwordValid = passwordRegex.test(passwordEl.value);
    if (passwordValid) {
        passwordTl.play();
        passwordEl.classList.add("valid");
    } else {
        passwordTl.reverse();
        passwordEl.classList.remove("valid");
    }
})

submitBtn.addEventListener('click', () => {
    if (passwordValid && checkboxEl.checked && mobileValid && sprayRepeatCounter > 1) {
        gsap.to("svg > *", {
            duration: .1,
            opacity: 0,
            stagger: {
                each: 0.03,
                from: 'random',
                ease: 'none',
            }
        })
        gsap.to(".form-row", {
            delay: .4,
            duration: .1,
            opacity: 0,
            stagger: .1
        })
    }
})


function layoutPreparation() {
    gsap.set(pullSystemContainer, {
        x: 375,
        y: 646
    })
    gsap.set(sprayHandContainer, {
        x: 700,
        y: 621
    })
    gsap.set(sprayer, {
        x: -59.5,
        y: 53
    })
    gsap.set(carContainer, {
        x: 190,
        y: 802,
    })
    gsap.set(scalesContainer, {
        x: 170,
        y: 710,
    })
    gsap.set(grabbingHand, {
        x: 297,
        y: 830
    })
    gsap.set(grabbingHandClosedFingers, {
        opacity: 0
    })
    gsap.set(spiralContainer, {
        x: 305,
        y: 435,
        svgOrigin: "14 14",
        scaleX: -1,
    })
    gsap.set(weightBigContainer, {
        x: 305,
        y: 435,
    })
    gsap.set(submitBtn, {
        color: "rgba(0, 0, 0, " + 0 + ")"
    })
    gsap.set([sprayLines, sprayBubbles], {
        opacity: 0
    })
    gsap.set(timingChains[0], {
        attr: {
            "stroke-width": "5",
            "stroke-dasharray": "0 12",
        }
    })
    gsap.set(timingChains[1], {
        attr: {
            "stroke-width": "5",
            "stroke-dasharray": "0 12",
        }
    })
    gsap.set(checkboxPullLine, {
        attr: {
            y1: -105,
            y2: 44
        }
    });
    gsap.set(submitBtn, {
        transformOrigin: "100% 0%",
        rotation: -90
    })
    gsap.set(checkboxPullCircle, {
        y: 44
    });
}

function updateSpiralPath(centerX, centerY, radius, coils, points, offset) {
    let path = "";
    let thetaMax = coils * 2 * Math.PI;
    const awayStep = radius / thetaMax;
    const chord = 2 * Math.PI / points;
    thetaMax -= offset * points * chord;

    for (let theta = 0; theta <= thetaMax; theta += chord) {
        const away = awayStep * theta;
        const x = centerX + Math.cos(theta) * away;
        const y = centerY + Math.sin(theta) * away;

        if (theta === 0) {
            path += `M${x},${y}`;
        } else {
            const prevAway = awayStep * (theta - chord);
            const arcRadius = (away + prevAway) / 2;
            path += ` A${arcRadius},${arcRadius} 0 0,1 ${x},${y}`;
        }
    }

    const outerAngle = thetaMax + .5 * Math.PI;
    const outerLength = 50 + 25 * offset
    const endPoint = [
        Math.cos(outerAngle) * outerLength,
        Math.sin(outerAngle) * outerLength,
    ]
    path += (' l' + endPoint[0] + ',' + endPoint[1]);

    gsap.set(spiralPath, {
        attr: {
            d: path
        },
    })
    gsap.set(weightBig, {
        x: -47 + 3 * offset,
        y: 12 + outerLength
    })
}

function createpasswordTl() {
    const spiralTurnsNumber = 8;
    const spiralProgress = {v: 0}
    const hammerTimeStart = 1.85;
    const fingersDelay = .5;
    const fingersTimeDelta = .03;
    const tl = gsap.timeline({
        paused: true,
        defaults: {
            ease: "none",
            duration: 2
        },
        onUpdate: () => {
            updateSpiralPath(14, 14, 45, 17, 200, spiralTurnsNumber * spiralProgress.v);
        },
    })
        .to(spiralProgress, {
            v: 1
        }, 0)
        .to(spiralContainer, {
            rotation: -spiralTurnsNumber * 360,
        }, 0)

        .fromTo(scalesLine, {
            rotation: -20,
            svgOrigin: "92 20"
        }, {
            duration: .15,
            rotation: -1,
            svgOrigin: "92 20"
        }, hammerTimeStart)

        .fromTo(timingChains[0], {
            attr: {
                "stroke-dashoffset": 2
            }
        }, {
            duration: .15,
            attr: {
                "stroke-dashoffset": 20
            }
        }, hammerTimeStart)
        .fromTo(timingChains[1], {
            attr: {
                "stroke-dashoffset": 24
            }
        }, {
            duration: .15,
            attr: {
                "stroke-dashoffset": 6
            }
        }, hammerTimeStart)
        .to(reelsConnector, {
            duration: .15,
            y: 18
        }, hammerTimeStart)
        .to(carWeightConnector, {
            duration: .15,
            y: -18
        }, hammerTimeStart)
        .to(carInclineWrapper, {
            duration: .15,
            rotation: 6,
            svgOrigin: "120 93"
        }, hammerTimeStart)
        .fromTo(car, {
            x: -50,
        }, {
            duration: .6,
            x: 95,
            ease: "power2.in",
        }, hammerTimeStart)
    for (let i = 0; i < 5; i++) {
        tl
            .set(grabbingHandOpenFingers[i], {
                opacity: 0
            }, hammerTimeStart + fingersDelay + fingersTimeDelta * (i + 1))
            .set(grabbingHandClosedFingers[i], {
                opacity: 1
            }, hammerTimeStart + fingersDelay + fingersTimeDelta * (i + 1))
    }
    tl
        .fromTo(state, {
            handClosed: false
        }, {
            duration: .01,
            handClosed: true
        }, ">")
        .to(grabbingHand, {
            duration: fingersTimeDelta * 5,
            x: "+=20"
        }, hammerTimeStart + fingersDelay)

    tl.progress(0.001);

    return tl;
}

function createGearsTimelines() {
    const tls = []

    const params = {
        baseSize: 15,
        pitch: 11,
        teethCurve: .6,
        startPos: {x: 634, y: 389},
        speed: .2
    }
    const data = [{
        angle: 0, teethNumber: 10, hasHole: true
    }, {
        angle: -.5, teethNumber: 32, hasHole: true
    }, {
        angle: 1.65, teethNumber: 12, hasHole: false
    }];

    const handleRadius = 14;

    const gears = [];
    data.forEach((d, dIdx) => {

        const radius = (d.teethNumber * params.baseSize) / (2 * Math.PI);
        let x, y, startAngle;

        if (dIdx === 0) {
            startAngle = 0;
            x = params.startPos.x;
            y = params.startPos.y;
        } else {
            const parent = gears[dIdx - 1];

            const size = parent.teethNumber / d.teethNumber;

            x = parent.center.x + Math.cos(d.angle) * (parent.radius + radius);
            y = parent.center.y + Math.sin(d.angle) * (parent.radius + radius);

            startAngle = (1 + size) * d.angle - size * parent.angle;
        }


        const group = document.createElementNS("http://www.w3.org/2000/svg", "g");
        const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
        gearsContainer.appendChild(group);
        group.appendChild(path);

        const gear = {
            idx: dIdx,
            center: {x, y},
            radius,
            angle: startAngle,
            teethNumber: d.teethNumber,
            hasHole: d.hasHole,
            toothAngle: 2 * Math.PI / d.teethNumber,
            toothCurveAngle: params.teethCurve / d.teethNumber,
            group
        }


        const rOut = gear.radius + .25 * params.pitch;
        const rIn = rOut - .75 * params.pitch;
        let pathD = "M" + (gear.center.x + Math.cos(gear.angle - gear.toothAngle + gear.toothCurveAngle) * rOut) + ", " + (gear.center.y + Math.sin(gear.angle - gear.toothAngle + gear.toothCurveAngle) * rOut) + " ";
        for (let a = gear.angle; a < (gear.angle + 2 * Math.PI - .5 * gear.toothAngle); a += gear.toothAngle) {
            const pa = (a - .5 * gear.toothAngle);
            pathD += ("L" + (gear.center.x + Math.cos(pa - gear.toothCurveAngle) * rOut) + ", " + (gear.center.y + Math.sin(pa - gear.toothCurveAngle) * rOut) + " ");
            pathD += ("L" + (gear.center.x + Math.cos(pa) * rIn) + ", " + (gear.center.y + Math.sin(pa) * rIn) + " ");
            pathD += ("L" + (gear.center.x + Math.cos(a) * rIn) + ", " + (gear.center.y + Math.sin(a) * rIn) + " ");
            pathD += ("L" + (gear.center.x + Math.cos(a + gear.toothCurveAngle) * rOut) + ", " + (gear.center.y + Math.sin(a + gear.toothCurveAngle) * rOut) + " ");
        }

        if (gear.hasHole) {
            const holeRadius = .5 * rIn;
            pathD += ("M" + (gear.center.x - holeRadius) + ", " + (gear.center.y) + " ");
            pathD += `A ${holeRadius} ${holeRadius} 1 1 0 ${gear.center.x + holeRadius} ${gear.center.y}`;
            pathD += `A ${holeRadius} ${holeRadius} 1 1 0 ${gear.center.x - holeRadius} ${gear.center.y}`;
        }

        if (dIdx === 0) {
            const circle = document.createElementNS("http://www.w3.org/2000/svg", "circle");
            gsap.set(circle, {
                attr: {
                    cx: gear.center.x,
                    cy: gear.center.y,
                    r: 5,
                    fill: "#000000"
                }
            })
            gearsContainer.appendChild(circle);
            gsap.set(path, {
                attr: {
                    fill: "#000000",
                    "fill-opacity": .25
                }
            })

        } else if (dIdx === (data.length - 1)) {
            gsap.set(path, {
                attr: {
                    fill: "#000000",
                    "fill-opacity": .25
                }
            })
            const circle = document.createElementNS("http://www.w3.org/2000/svg", "circle");
            gsap.set(circle, {
                attr: {
                    cx: gear.center.x + handleRadius,
                    cy: gear.center.y,
                    r: 5,
                    fill: "#000000"
                }
            })
            gear.group.appendChild(circle);
        }

        path.setAttribute("d", pathD);


        const tl = gsap.timeline({
            repeat: -1,
            paused: true,
        })
            .to(group, {
                duration: params.speed * gear.teethNumber,
                rotation: 360 * (gear.idx % 2 ? -1 : 1),
                svgOrigin: gear.center.x + " " + gear.center.y,
                ease: "none",
            });

        if (dIdx === (data.length - 1)) {
            tl.eventCallback("onUpdate", () => {
                const angle = tl.progress() * 2 * Math.PI;
                const deltaY = Math.sin(angle) * handleRadius;
                gsap.set(pushingHand, {
                    y: deltaY,
                })
                if (deltaY > 8) {
                    const d = Math.max(0, deltaY - 8);
                    gsap.set(sprayerHead, {
                        y: d
                    })

                    let sprayProgress = Math.max(0, tl.progress() - .1);
                    sprayProgress *= (1 / .2);

                    let bubblesOpacity = (sprayProgress > 1) ? 0 : sprayProgress;
                    bubblesOpacity *= (1 - Math.pow(bubblesOpacity, 8));

                    const textProgress = Math.pow(sprayProgress / 1.5, 6);

                    if (!state.sumbitBtnOnPlace) {
                        state.sumbitBtnTextOpacity = (sprayRepeatCounter - 1) * .3 + .3 * textProgress;
                        state.sumbitBtnTextOpacity = Math.pow(state.sumbitBtnTextOpacity, 2);
                    }

                    gsap.set(submitBtn, {
                        color: "rgba(0, 0, 0, " + state.sumbitBtnTextOpacity + ")"
                    })
                    gsap.set(sprayLines, {
                        attr: {
                            "stroke-dashoffset": 70 * sprayProgress
                        },
                        opacity: Math.pow(bubblesOpacity, 2)
                    })
                    sprayBubbles.forEach((b, bIdx) => {
                        gsap.set(b, {
                            x: 25 * (1 - sprayProgress) * (1 + .1 * bIdx),
                            scale: .5 + 1.4 * Math.pow(sprayProgress, 2),
                            transformOrigin: "center center",
                            opacity: bubblesOpacity
                        })
                    })
                }

                gsap.set(gearConnector, {
                    attr: {
                        x1: gear.center.x + handleRadius * Math.cos(angle),
                        y1: gear.center.y + handleRadius * Math.sin(angle),
                        x2: 700 + 18,
                        y2: 646 - 100 + deltaY
                    }
                })
            });

            tl.eventCallback("onRepeat", () => {
                if (!state.sumbitBtnOnPlace) {
                    sprayRepeatCounter++;
                }
            });
        }

        tl.progress(0.6)
        tls.push(tl);
        gears.push(gear);
    })

    return tls;
}


function createPullingTimeline(isFixed, BtnPulled) {
    let tl = gsap.timeline({
        // paused: true,
        defaults: {
            ease: "power1.inOut",
            duration: 1
        },
        onUpdate: animatePullingLine
    });

    if (isFixed && BtnPulled) {
        tl
            .to(state, {
                pullProgress: 1
            }, 0)
            .to(submitBtn, {
                rotation: 0
            }, 0)
            .to(state, {
                duration: .1,
                sumbitBtnOnPlace: 1
            }, .9)
            .to(checkboxPullLine, {
                attr: {y2: 44 - 130}
            }, 0)
            .to(checkboxPullCircle, {
                y: 44 - 130
            }, 0)
    } else if (!isFixed && BtnPulled) {
        tl
            .to(state, {
                pullProgress: 1
            }, 0)
            .to(checkboxPullLine, {
                attr: {y2: 44 - 130}
            }, 0)
            .to(checkboxPullCircle, {
                y: 44 - 130
            }, 0)
    } else if (isFixed && !BtnPulled) {
        tl
            .to(state, {
                pullProgress: 0
            }, 0)
            .to(submitBtn, {
                rotation: -90
            }, 0)
            .to(state, {
                duration: .1,
                sumbitBtnOnPlace: 0
            }, 0)
            .to(checkboxPullLine, {
                attr: {y2: 44}
            }, 0)
            .to(checkboxPullCircle, {
                y: 44
            }, 0)
    } else if (!isFixed && !BtnPulled) {
        tl
            .to(state, {
                pullProgress: 0
            }, 0)
            .to(checkboxPullLine, {
                attr: {y2: 44}
            }, 0)
            .to(checkboxPullCircle, {
                y: 44
            }, 0)
    }


    function animatePullingLine() {
        const buttonOriginPoint = [260, -76];
        const btnWidth = 270;

        const deg = (gsap.getProperty(submitBtn, "rotation") - 4) * Math.PI / 180;

        const btnEnd = [
            buttonOriginPoint[0] - (btnWidth - 20) * Math.cos(deg),
            buttonOriginPoint[1] - (btnWidth - 20) * Math.sin(deg),
        ]
        gsap.set(btnHandlerCircle, {
            attr: {
                cx: btnEnd[0],
                cy: btnEnd[1]
            }
        })

        const handle = 7;
        const r = 10;

        let btnPullLinePath = "M" + (-r - handle) + "," + (250 - (isFixed ? 0 : state.pullProgress * 300));
        btnPullLinePath += "h" + (2 * handle);
        btnPullLinePath += "h" + (-handle);
        btnPullLinePath += " V" + (44 - state.pullProgress * 130);
        const slideAngle = .3 * Math.PI * (1 - (isFixed ? 1 : .5) * state.pullProgress);
        const dx = r * Math.cos(slideAngle);
        const dy = -r * Math.sin(slideAngle);
        btnPullLinePath += "a" + r + ', ' + r + " 0 0 1 " + (r + dx) + " " + dy;
        btnPullLinePath += " L" + btnEnd[0] + "," + btnEnd[1];

        gsap.set(btnPullLine, {
            attr: {
                d: btnPullLinePath
            },
            strokeWidth: 3
        })
    }

    return tl;
}
    </script>
</body>
</html> -->



              <!-- Panda Login -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Interactive Panda Login Form</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="./style.css">
        <style>
            * {
                    padding: 0;
                    margin: 0;
                    box-sizing: border-box;
                    font-family: "Nunito", sans-serif;
                }
                body {
                    background-color: #b0e57c;
                }
                .container {
                    height: 32em;
                    width: 32em;
                    position: absolute;
                    transform: translate(-50%, -50%);
                    top: 50%;
                    left: 50%;
                }
                form {
                    width: 24em;
                    height: 19em;
                    background-color:rgb(144, 104, 147);
                    position: absolute;
                    transform: translate(-50%, -50%);
                    top: calc(50% + 3.5em);
                    left: 50%;
                    padding: 0 3em;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    border-radius: 0.75em;
                    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
                    transition: transform 0.3s ease-in-out;
                }
                form:hover {
                    transform: translate(-50%, -50%) scale(1.05);
                }
                form label {
                    display: block;
                    margin-bottom: 0.3em;
                    font-weight: 600;
                    color: #34495e;
                }
                form input {
                    font-size: 1em;
                    font-weight: 400;
                    color: #34495e;
                    padding: 0.4em;
                    border: none;
                    border-bottom: 0.15em solid #34495e;
                    outline: none;
                    transition: border-color 0.3s ease-in-out;
                }
                form input:focus {
                    border-color: #55efc4;
                }
                form input:not(:last-child) {
                    margin-bottom: 1em;
                }
                form button {
                    font-size: 1em;
                    padding: 0.9em 0;
                    border-radius: 2em;
                    border: none;
                    outline: none;
                    background-color: #55efc4;
                    color: #34495e;
                    text-transform: uppercase;
                    font-weight: 600;
                    letter-spacing: 0.2em;
                    margin-top: 1em;
                    cursor: pointer;
                    transition: background-color 0.3s ease-in-out;
                }
                form button:hover {
                    background-color: #00b894;
                }
                .panda-face {
                    height: 8em;
                    width: 9em;
                    background-color: #ffffff;
                    border: 0.2em solid #34495e;
                    border-radius: 8em 8em 5.5em 5.5em;
                    position: absolute;
                    top: 2.5em;
                    margin: auto;
                    left: 0;
                    right: 0;
                    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
                    transition: transform 0.3s ease-in-out;
                }
                .container:hover .panda-face {
                    transform: scale(1.05);
                }
                .ear-l,
                .ear-r {
                    background-color: #34495e;
                    height: 2.8em;
                    width: 3em;
                    border: 0.2em solid #34495e;
                    border-radius: 2.8em 2.8em 0 0;
                    top: 1.8em;
                    position: absolute;
                }
                .ear-l {
                    transform: rotate(-38deg);
                    left: 11em;
                }
                .ear-r {
                    transform: rotate(38deg);
                    right: 11em;
                }
                .blush-l,
                .blush-r {
                    background-color: #fab1a0;
                    height: 1.2em;
                    width: 1.5em;
                    border-radius: 50%;
                    position: absolute;
                    top: 4.5em;
                }
                .blush-l {
                    transform: rotate(25deg);
                    left: 1.2em;
                }
                .blush-r {
                    transform: rotate(-25deg);
                    right: 1.2em;
                }
                .eye-l,
                .eye-r {
                    background-color: #34495e;
                    height: 2.3em;
                    width: 2.2em;
                    border-radius: 2.2em;
                    position: absolute;
                    top: 2.5em;
                }
                .eye-l {
                    left: 1.5em;
                    transform: rotate(-20deg);
                }
                .eye-r {
                    right: 1.5em;
                    transform: rotate(20deg);
                }
                .eyeball-l,
                .eyeball-r {
                    height: 0.7em;
                    width: 0.7em;
                    background-color: #ffffff;
                    border-radius: 50%;
                    position: absolute;
                    left: 0.6em;
                    top: 0.6em;
                    animation: blink 5s infinite ease-in-out;
                }
                @keyframes blink {
                    0%, 97%, 100% {
                        height: 0.7em;
                    }
                    98%, 99% {
                        height: 0;
                    }
                }
                .nose {
                    height: 1.2em;
                    width: 1.2em;
                    background-color: #34495e;
                    position: absolute;
                    top: 5em;
                    margin: auto;
                    left: 0;
                    right: 0;
                    border-radius: 1.5em 0 0 0.25em;
                    transform: rotate(45deg);
                }
                .nose:before {
                    content: "";
                    position: absolute;
                    background-color: #34495e;
                    height: 0.6em;
                    width: 0.1em;
                    transform: rotate(-45deg);
                    top: 0.85em;
                    left: 1.2em;
                }
                .mouth,
                .mouth:before {
                    height: 0.8em;
                    width: 0.95em;
                    background-color: transparent;
                    position: absolute;
                    border-radius: 50%;
                    box-shadow: 0 0.2em #34495e;
                }
                .mouth {
                    top: 5.7em;
                    left: 3.3em;
                }
                .mouth:before {
                    content: "";
                    position: absolute;
                    left: 0.9em;
                }
                .hand-l,
                .hand-r {
                    background-color: #34495e;
                    height: 3em;
                    width: 2.6em;
                    border: 0.2em solid #34495e;
                    border-radius: 0.7em 0.7em 2.3em 2.3em;
                    position: absolute;
                    top: 8.5em;
                    transition: transform 0.3s ease-in-out;
                }
                .hand-l {
                    left: 7.8em;
                }
                .hand-r {
                    right: 7.8em;
                }
                .paw-l,
                .paw-r {
                    background-color: #34495e;
                    height: 3.5em;
                    width: 3.5em;
                    border: 0.2em solid #34495e;
                    border-radius: 2.8em 2.8em 1.5em 1.5em;
                    position: absolute;
                    top: 27em;
                    transition: transform 0.3s ease-in-out;
                }
                .paw-l:hover,
                .paw-r:hover {
                    transform: rotate(360deg);
                }
                .paw-l {
                    left: 10.5em;
                }
                .paw-r {
                    right: 10.5em;
                }
                .paw-l:before,
                .paw-r:before {
                    position: absolute;
                    content: "";
                    background-color: #ffffff;
                    height: 1.5em;
                    width: 1.8em;
                    top: 1.2em;
                    left: 0.6em;
                    border-radius: 1.6em 1.6em 0.7em 0.7em;
                }
                .paw-l:after,
                .paw-r:after {
                    position: absolute;
                    content: "";
                    background-color: #ffffff;
                    height: 0.7em;
                    width: 0.7em;
                    top: 0.8em;
                    left: 1.4em;
                    border-radius: 50%;
                    box-shadow: 0.85em 0 0 #ffffff, -0.85em 0 0 #ffffff;
                }
                .auth-links {
                    margin-top: 10px;
                    display: flex;
                    justify-content: center;
                    gap: 30px;
                    font-size: 18px;
                }

                .auth-links a {
                    text-decoration: none;
                    color:rgb(143, 68, 122);
                    transition: color 0.3s ease;
                }

                .auth-links a:hover {
                    color: #0056b3;
                }

                .auth-links span {
                    color: #888;
                }
                .password-wrapper {
                    position: relative;
                    display: flex;
                    align-items: center;
                }

                .password-wrapper input[type="password"],
                .password-wrapper input[type="text"] {
                    width: 100%;
                    padding-right: 90px; /* space for the eye icon */
                }

                .toggle-password {
                    position: absolute;
                    right: 1px;
                    cursor: pointer;
                    user-select: none;
                    font-size: 23px;
                    color: #555;
                    transform: translateY(-25%);
                }
        </style>
    </head>
    <body>
        <div class="container">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <br><br><br>
            <label for="mobile">Mobile No:</label>
            <input type="text" id="mobile" name="mobile" required><br>
            <label for="password">Password:</label>
            <div class="password-wrapper">
                <input type="password" id="password" name="password" required>
                <span class="toggle-password" onclick="togglePassword()">
                🙈
                </span>
            </div>
            <br>
            <button type="submit">Submit</button>
            <div class="auth-links">
                <a href="{{ route('register') }}">Register</a>
                <span>|</span>
                <a href="{{ route('forgot-password') }}">Forgot Password</a>
            </div>
        </form>
            <div class="ear-l"></div>
            <div class="ear-r"></div>
            <div class="panda-face">
                <div class="blush-l"></div>
                <div class="blush-r"></div>
                <div class="eye-l">
                    <div class="eyeball-l"></div>
                </div>
                <div class="eye-r">
                    <div class="eyeball-r"></div>
                </div>
                <div class="nose"></div>
                <div class="mouth"></div>
            </div>
            <div class="hand-l"></div>
            <div class="hand-r"></div>
            <!-- <div class="paw-l"></div>
            <div class="paw-r"></div> -->
        </div>
    </body>

    <script src="./script.js"></script>
    <script>
        let usernameRef = document.getElementById("username");
        let passwordRef = document.getElementById("password");
        let eyeL = document.querySelector(".eyeball-l");
        let eyeR = document.querySelector(".eyeball-r");
        let handL = document.querySelector(".hand-l");
        let handR = document.querySelector(".hand-r");

        let normalEyeStyle = () => {
            eyeL.style.cssText = `
                left:0.6em;
                top: 0.6em;
            `;
            eyeR.style.cssText = `
            right:0.6em;
            top:0.6em;
            `;
        };

        let normalHandStyle = () => {
            handL.style.cssText = `
                    height: 2.81em;
                    top:8.4em;
                    left:7.5em;
                    transform: rotate(0deg);
                `;
            handR.style.cssText = `
                    height: 2.81em;
                    top: 8.4em;
                    right: 7.5em;
                    transform: rotate(0deg)
                `;
        };

        //When clicked on username input
        usernameRef.addEventListener("focus", () => {
            eyeL.style.cssText = `
                left: 0.75em;
                top: 1.12em;  
            `;
            eyeR.style.cssText = `
                right: 0.75em;
                top: 1.12em;
            `;
            normalHandStyle();
        });

        //When clicked on password input
        passwordRef.addEventListener("focus", () => {
            handL.style.cssText = `
                    height: 6.56em;
                    top: 3.87em;
                    left: 11.75em;
                    transform: rotate(-155deg);    
                `;
            handR.style.cssText = `
                height: 6.56em;
                top: 3.87em;
                right: 11.75em;
                transform: rotate(155deg);
            `;
            normalEyeStyle();
        });

        //When clicked outside username and password input
        document.addEventListener("click", (e) => {
            let clickedElem = e.target;
            if (clickedElem != usernameRef && clickedElem != passwordRef) {
                normalEyeStyle();
                normalHandStyle();
            }
        });
    </script>
    <script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const icon = document.querySelector('.toggle-password');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.textContent = '👁️'; // change icon
    } else {
        passwordInput.type = 'password';
        icon.textContent = '🙈';
    }
}
</script>

</html>

             <!-- Normal Login -->

<!-- <!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label for="mobile">Mobile No:</label>
        <input type="text" id="mobile" name="mobile" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Submit</button>
    </form>
    <a href="{{ route('register') }}">Register</a> |
    <a href="{{ route('forgot-password') }}">Forgot Password</a>
</body>
</html> -->

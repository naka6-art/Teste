<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>start</title>
</head>
<style>
  /* Shhhh I'm using three different fonts, but i don't care */
@import url("https://fonts.cdnfonts.com/css/longsile");
@import url("https://fonts.cdnfonts.com/css/thegoodmonolith");
@import url("https://fonts.cdnfonts.com/css/pp-neue-montreal");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

:root {
  --text: #ffcc00;
  --bg: #000000;
  --highlight-bg: #ffcc00;
  --type-line-opacity: 0.05;
}

body {
  background-color: var(--bg);
  min-height: 100vh;
  overflow: hidden;
  font-family: "Longsile", sans-serif;
  position: relative;
}

.background-frame {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100vh;
  background-image: url("https://assets.codepen.io/7558/web03.webp");
  background-size: 100% 100%;
  background-position: center;
  z-index: 0;
  pointer-events: none;
}

.bottom-gradient {
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 40vh;
  background: linear-gradient(
    to top,
    rgba(0, 0, 0, 1) 0%,
    rgba(0, 0, 0, 0) 100%
  );
  z-index: 1;
  pointer-events: none;
}

.background-image {
  position: fixed;
  width: calc(100%);
  height: calc(100vh);
  background-size: cover;
  background-position: center;
  opacity: 0;
  z-index: 1;
  mix-blend-mode: multiply;
  transition: opacity 0.8s ease-in-out;
}

.background-image.default {
  background-image: url("https://assets.codepen.io/7558/wave-bg-001.webp");
  opacity: 1;
}

.background-image.focus {
  background-image: url("https://assets.codepen.io/7558/wave-bg-002.webp");
}

.background-image.presence {
  background-image: url("https://assets.codepen.io/7558/wave-bg-003.webp");
}

.background-image.feel {
  background-image: url("https://assets.codepen.io/7558/wave-bg-004.webp");
}

.text-background {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 2;
  pointer-events: none;
}

.text-item {
  position: absolute;
  color: var(--text);
  font-size: 0.8rem;
  text-transform: uppercase;
  opacity: 0.8;
  white-space: nowrap;
  font-family: "TheGoodMonolith", monospace;
  z-index: 0;
}

.text-item::after {
  content: "";
  position: absolute;
  top: -2px;
  left: -4px;
  width: 0;
  height: calc(100% + 4px);
  background-color: var(--highlight-bg);
  z-index: 1;
  transition: width 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.text-item.highlight::after {
  width: calc(100% + 8px);
}

.text-item.highlight-reverse::after {
  width: 0;
  right: -4px;
  left: auto;
}

.main-content {
  position: relative;
  z-index: 10;
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.sliced-container {
  position: relative;
  width: auto;
  max-width: 100%;
  margin: 0 auto;
  transform: translateZ(0);
}

.text-row {
  position: relative;
  width: 100%;
  height: 140px;
  margin: 10px 0;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: visible;
  z-index: 100;
}

.text-content,
.char,
.char-inner {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-rendering: optimizeLegibility;
  transform: translateZ(0);
  will-change: transform;
  backface-visibility: hidden;
}

.text-content {
  position: relative;
  font-size: 10rem;
  font-weight: normal;
  text-transform: uppercase;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1;
  color: var(--text);
  letter-spacing: 0px;
  transition: letter-spacing 0.5s ease;
  visibility: hidden;
  transform: translate3d(0, 0, 0);
}

.text-row:hover .text-content {
  letter-spacing: 5px;
}

.interactive-area {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 10;
  cursor: pointer;
}

.char {
  display: inline-block;
  position: relative;
  overflow: hidden;
  max-width: 80px;
  transition: max-width 0.64s cubic-bezier(0.86, 0, 0.07, 1);
  margin-right: 0px;
}

.text-row.active .char::after {
  content: "";
  position: absolute;
  top: 0;
  right: 0;
  width: 1px;
  height: 80%;
  background-color: rgba(255, 204, 0, 0.2);
  transform: none;
  opacity: 0;
  animation: fadeIn 0.3s forwards;
  animation-delay: calc(var(--char-index, 0) * 0.05s);
}

@keyframes fadeIn {
  to {
    opacity: 1;
  }
}

.char.narrow-char {
  max-width: 40px;
}

.char:last-child::after {
  display: none;
}

.char-inner {
  position: relative;
  display: inline-block;
  width: 100%;
  height: 100%;
  will-change: transform;
  transform: translate3d(-20px, 0, 0);
}

.type {
  position: fixed;
  height: 100vmax;
  width: 100vmax;
  text-transform: uppercase;
  display: none;
  justify-content: center;
  align-content: center;
  text-align: center;
  top: 50%;
  left: 50%;
  margin-top: -50vmax;
  margin-left: -50vmax;
  will-change: transform;
  z-index: 5;
  transform-style: preserve-3d;
  pointer-events: none;
}

.type-line {
  white-space: nowrap;
  font-size: clamp(7rem, 18.75vh, 15rem);
  line-height: 0.75;
  font-weight: bold;
  font-family: "PP Neue Montreal", sans-serif;
  color: #ffffff;
  opacity: var(--type-line-opacity);
  user-select: none;
  will-change: transform, opacity;
  position: relative;
}

.type-line.odd {
  z-index: 50;
}

.type-line.even {
  z-index: 150;
}

/* Mobile Optimization */

/* For tablets and smaller screens */
@media screen and (max-width: 992px) {
  .text-content {
    font-size: 7rem;
  }

  .text-row {
    height: 110px;
  }

  .type-line {
    font-size: clamp(5rem, 12vh, 10rem);
  }
}

/* For mobile phones */
@media screen and (max-width: 768px) {
  .text-content {
    font-size: 5rem;
  }

  .text-row {
    height: 80px;
    margin: 8px 0;
  }

  .type-line {
    font-size: clamp(3.5rem, 8vh, 7rem);
  }

  .text-item {
    font-size: 0.7rem;
  }
}

/* For very small screens */
@media screen and (max-width: 480px) {
  .text-content {
    font-size: 3.5rem;
  }

  .text-row {
    height: 60px;
    margin: 6px 0;
  }

  .type-line {
    font-size: clamp(2.5rem, 6vh, 5rem);
  }

  .text-item {
    font-size: 0.6rem;
  }
}

</style>
<body>
  <div class="background-frame"></div>

<div class="background-image default" id="default-bg"></div>
<div class="background-image focus" id="focus-bg"></div>
<div class="background-image presence" id="presence-bg"></div>
<div class="background-image feel" id="feel-bg"></div>

<div class="bottom-gradient"></div>

<div class="text-background">
  <div class="text-item" style="top: 5%; left: 8%;" data-text="BE">BE</div>
  <div class="text-item" style="top: 5%; left: 15%;" data-text="PRESENT">PRESENT</div>
  <div class="text-item" style="top: 5%; left: 28%;" data-text="LISTEN">LISTEN</div>
  <div class="text-item" style="top: 5%; left: 42%;" data-text="DEEPLY">DEEPLY</div>
  <div class="text-item" style="top: 5%; left: 55%;" data-text="OBSERVE">OBSERVE</div>
  <div class="text-item" style="top: 5%; left: 75%;" data-text="&">& </div>
  <div class="text-item" style="top: 5%; left: 85%;" data-text="FEEL">FEEL</div>

  <div class="text-item" style="top: 10%; left: 12%;" data-text="MAKE">MAKE</div>
  <div class="text-item" style="top: 10%; left: 45%;" data-text="BETTER">BETTER</div>
  <div class="text-item" style="top: 10%; right: 20%;" data-text="DECISIONS">DECISIONS</div>

  <div class="text-item" style="top: 15%; left: 8%;" data-text="THE">THE</div>
  <div class="text-item" style="top: 15%; left: 30%;" data-text="CREATIVE">CREATIVE</div>
  <div class="text-item" style="top: 15%; left: 55%;" data-text="PROCESS">PROCESS</div>
  <div class="text-item" style="top: 15%; right: 20%;" data-text="IS">IS</div>
  <div class="text-item" style="top: 15%; right: 5%;" data-text="MYSTERIOUS">MYSTERIOUS</div>

  <div class="text-item" style="top: 25%; left: 5%;" data-text="S">S</div>
  <div class="text-item" style="top: 25%; left: 10%;" data-text="I">I</div>
  <div class="text-item" style="top: 25%; left: 15%;" data-text="M">M</div>
  <div class="text-item" style="top: 25%; left: 20%;" data-text="P">P</div>
  <div class="text-item" style="top: 25%; left: 25%;" data-text="L">L</div>
  <div class="text-item" style="top: 25%; left: 30%;" data-text="I">I</div>
  <div class="text-item" style="top: 25%; left: 35%;" data-text="C">C</div>
  <div class="text-item" style="top: 25%; left: 40%;" data-text="I">I</div>
  <div class="text-item" style="top: 25%; left: 45%;" data-text="T">T</div>
  <div class="text-item" style="top: 25%; left: 50%;" data-text="Y">Y</div>
  <div class="text-item" style="top: 25%; right: 5%;" data-text="IS THE KEY">IS THE KEY</div>

  <div class="text-item" style="top: 35%; left: 25%;" data-text="FIND YOUR VOICE">FIND YOUR VOICE</div>
  <div class="text-item" style="top: 35%; left: 65%;" data-text="TRUST INTUITION">TRUST INTUITION</div>

  <div class="text-item" style="top: 50%; left: 5%;" data-text="EMBRACE SILENCE">EMBRACE SILENCE</div>
  <div class="text-item" style="top: 50%; right: 5%;" data-text="QUESTION EVERYTHING">QUESTION EVERYTHING</div>

  <div class="text-item" style="top: 75%; left: 20%;" data-text="TRUTH">TRUTH</div>
  <div class="text-item" style="top: 75%; right: 20%;" data-text="WISDOM">WISDOM</div>

  <div class="text-item" style="top: 80%; left: 10%;" data-text="FOCUS">Unuversite</div>
  <div class="text-item" style="top: 80%; left: 35%;" data-text="ATTENTION">ATTENTION</div>
  <div class="text-item" style="top: 80%; left: 65%;" data-text="AWARENESS">AWARENESS</div>
  <div class="text-item" style="top: 80%; right: 10%;" data-text="PRESENCE">PRESENCE</div>

  <div class="text-item" style="top: 85%; left: 25%;" data-text="SIMPLIFY">SIMPLIFY</div>
  <div class="text-item" style="top: 85%; right: 25%;" data-text="REFINE">REFINE</div>
</div>

<div class="main-content">
  <div class="sliced-container">
    <div class="text-row" data-row-id="focus">
      <div class="text-content" data-text="FOCUS">OniFRA</div>
      <div class="interactive-area"></div>
    </div>

    <div class="text-row" data-row-id="presence">
      <div class="text-content" data-text="PRESENCE">Annexe</div>
      <div class="interactive-area"></div>
    </div>

    <div class="text-row" data-row-id="feel">
      <div class="text-content" data-text="FEEL">Mahajanga</div>
      <div class="interactive-area"></div>
    </div>
  </div>
</div>

<div class="type" id="kinetic-type" aria-hidden="true">
  <div class="type-line odd">focus focus focus</div>
  <div class="type-line even">presence presence presence</div>
  <div class="type-line odd">feel feel feel</div>
  <div class="type-line even">focus focus focus</div>
  <div class="type-line odd">presence presence presence</div>
  <div class="type-line even">focus focus focus</div>
  <div class="type-line odd">focus focus focus</div>
  <div class="type-line even">presence presence presence</div>
  <div class="type-line odd">feel feel feel</div>
  <div class="type-line even">focus focus focus</div>
  <div class="type-line odd">presence presence presence</div>
  <div class="type-line even">focus focus focus</div>
</div>
</body>
<script>
  // TODO: Fix mobile/touch optimization for better experience on touch devices
// TODO: Interactive area was removed due to issues with the middle title element and overall elements overlaping and causing sequence cancellation
// TODO: Fix issue where the text is not returning to initial position when quickly hovering

gsap.registerPlugin(CustomEase, SplitText, ScrambleTextPlugin);

document.addEventListener("DOMContentLoaded", function () {
  CustomEase.create("customEase", "0.86, 0, 0.07, 1");
  CustomEase.create("mouseEase", "0.25, 0.1, 0.25, 1");

  document.fonts.ready.then(() => {
    initializeAnimation();

    // Rediriger après 300ms
    setTimeout(function() {
      window.location.href = 'Couverture final.php';
    }, 300);
  });

  function initializeAnimation() {
    const backgroundTextItems = document.querySelectorAll(".text-item");
    const backgroundImages = {
      default: document.getElementById("default-bg"),
      focus: document.getElementById("focus-bg"),
      presence: document.getElementById("presence-bg"),
      feel: document.getElementById("feel-bg")
    };

    function switchBackgroundImage(id) {
      Object.values(backgroundImages).forEach((bg) => {
        gsap.to(bg, {
          opacity: 0,
          duration: 0.8,
          ease: "customEase"
        });
      });

      if (backgroundImages[id]) {
        gsap.to(backgroundImages[id], {
          opacity: 1,
          duration: 0.8,
          ease: "customEase",
          delay: 0.2
        });
      } else {
        gsap.to(backgroundImages.default, {
          opacity: 1,
          duration: 0.8,
          ease: "customEase",
          delay: 0.2
        });
      }
    }

    const alternativeTexts = {
      focus: {
        BE: "BECOME",
        PRESENT: "MINDFUL",
        LISTEN: "HEAR",
        DEEPLY: "INTENTLY",
        OBSERVE: "NOTICE",
        "&": "+",
        FEEL: "SENSE",
        MAKE: "CREATE",
        BETTER: "IMPROVED",
        DECISIONS: "CHOICES",
        THE: "YOUR",
        CREATIVE: "ARTISTIC",
        PROCESS: "JOURNEY",
        IS: "FEELS",
        MYSTERIOUS: "MAGICAL",
        S: "START",
        I: "INSPIRE",
        M: "MAKE",
        P: "PURE",
        L: "LIGHT",
        C: "CREATE",
        T: "TRANSFORM",
        Y: "YOURS",
        "IS THE KEY": "UNLOCKS ALL",
        "FIND YOUR VOICE": "SPEAK YOUR TRUTH",
        "TRUST INTUITION": "FOLLOW INSTINCT",
        "EMBRACE SILENCE": "WELCOME STILLNESS",
        "QUESTION EVERYTHING": "CHALLENGE NORMS",
        TRUTH: "HONESTY",
        WISDOM: "INSIGHT",
        FOCUS: "CONCENTRATE",
        ATTENTION: "AWARENESS",
        AWARENESS: "CONSCIOUSNESS",
        PRESENCE: "BEING",
        SIMPLIFY: "MINIMIZE",
        REFINE: "PERFECT"
      },
      presence: {
        BE: "EVOLVE",
        PRESENT: "ENGAGED",
        LISTEN: "ABSORB",
        DEEPLY: "FULLY",
        OBSERVE: "ANALYZE",
        "&": "→",
        FEEL: "EXPERIENCE",
        MAKE: "BUILD",
        BETTER: "STRONGER",
        DECISIONS: "SYSTEMS",
        THE: "EACH",
        CREATIVE: "ITERATIVE",
        PROCESS: "METHOD",
        IS: "BECOMES",
        MYSTERIOUS: "REVEALING",
        S: "STRUCTURE",
        I: "ITERATE",
        M: "METHOD",
        P: "PRACTICE",
        L: "LEARN",
        C: "CONSTRUCT",
        T: "TECHNIQUE",
        Y: "YIELD",
        "IS THE KEY": "DRIVES SUCCESS",
        "FIND YOUR VOICE": "DEVELOP YOUR STYLE",
        "TRUST INTUITION": "FOLLOW THE FLOW",
        "EMBRACE SILENCE": "VALUE PAUSES",
        "QUESTION EVERYTHING": "EXAMINE DETAILS",
        TRUTH: "CLARITY",
        WISDOM: "KNOWLEDGE",
        FOCUS: "DIRECTION",
        ATTENTION: "PRECISION",
        AWARENESS: "UNDERSTANDING",
        PRESENCE: "ENGAGEMENT",
        SIMPLIFY: "STREAMLINE",
        REFINE: "OPTIMIZE"
      },
      feel: {
        BE: "SEE",
        PRESENT: "FOCUSED",
        LISTEN: "UNDERSTAND",
        DEEPLY: "CLEARLY",
        OBSERVE: "PERCEIVE",
        "&": "=",
        FEEL: "KNOW",
        MAKE: "ACHIEVE",
        BETTER: "CLEARER",
        DECISIONS: "VISION",
        THE: "THIS",
        CREATIVE: "INSIGHTFUL",
        PROCESS: "THINKING",
        IS: "BRINGS",
        MYSTERIOUS: "ILLUMINATING",
        S: "SHARP",
        I: "INSIGHT",
        M: "MINDFUL",
        P: "PRECISE",
        L: "LUCID",
        C: "CLEAR",
        T: "TRANSPARENT",
        Y: "YES",
        "IS THE KEY": "REVEALS TRUTH",
        "FIND YOUR VOICE": "DISCOVER YOUR VISION",
        "TRUST INTUITION": "BELIEVE YOUR EYES",
        "EMBRACE SILENCE": "SEEK STILLNESS",
        "QUESTION EVERYTHING": "CLARIFY ASSUMPTIONS",
        TRUTH: "REALITY",
        WISDOM: "PERCEPTION",
        FOCUS: "CLARITY",
        ATTENTION: "OBSERVATION",
        AWARENESS: "RECOGNITION",
        PRESENCE: "ALERTNESS",
        SIMPLIFY: "DISTILL",
        REFINE: "SHARPEN"
      }
    };

    backgroundTextItems.forEach((item) => {
      item.dataset.originalText = item.textContent;
      item.dataset.text = item.textContent;

      // Make background text fully opaque by default
      gsap.set(item, { opacity: 1 });
    });

    const typeLines = document.querySelectorAll(".type-line");
    typeLines.forEach((line, index) => {
      if (index % 2 === 0) {
        line.classList.add("odd");
      } else {
        line.classList.add("even");
      }
    });

    const oddLines = document.querySelectorAll(".type-line.odd");
    const evenLines = document.querySelectorAll(".type-line.even");
    const TYPE_LINE_OPACITY = 0.015;

    const state = {
      activeRowId: null,
      kineticAnimationActive: false,
      activeKineticAnimation: null,
      textRevealAnimation: null,
      transitionInProgress: false // New state to track transitions
    };

    const textRows = document.querySelectorAll(".text-row");
    const splitTexts = {};

    textRows.forEach((row, index) => {
      const textElement = row.querySelector(".text-content");
      const text = textElement.dataset.text;
      const rowId = row.dataset.rowId;

      splitTexts[rowId] = new SplitText(textElement, {
        type: "chars",
        charsClass: "char",
        mask: true,
        reduceWhiteSpace: false,
        propIndex: true
      });

      textElement.style.visibility = "visible";
    });

    function updateCharacterWidths() {
      const isMobile = window.innerWidth < 1024;

      textRows.forEach((row, index) => {
        const rowId = row.dataset.rowId;
        const textElement = row.querySelector(".text-content");
        const computedStyle = window.getComputedStyle(textElement);
        const currentFontSize = computedStyle.fontSize;
        const chars = splitTexts[rowId].chars;

        chars.forEach((char, i) => {
          const charText =
            char.textContent ||
            (char.querySelector(".char-inner")
              ? char.querySelector(".char-inner").textContent
              : "");
          if (!charText && i === 0) return;

          let charWidth;

          if (isMobile) {
            const fontSizeValue = parseFloat(currentFontSize);
            const standardCharWidth = fontSizeValue * 0.6;
            charWidth = standardCharWidth;

            if (!char.querySelector(".char-inner") && charText) {
              char.textContent = "";
              const innerSpan = document.createElement("span");
              innerSpan.className = "char-inner";
              innerSpan.textContent = charText;
              char.appendChild(innerSpan);
              innerSpan.style.transform = "translate3d(0, 0, 0)";
            }

            char.style.width = `${charWidth}px`;
            char.style.maxWidth = `${charWidth}px`;
            char.dataset.charWidth = charWidth;
            char.dataset.hoverWidth = charWidth;
          } else {
            const tempSpan = document.createElement("span");
            tempSpan.style.position = "absolute";
            tempSpan.style.visibility = "hidden";
            tempSpan.style.fontSize = currentFontSize;
            tempSpan.style.fontFamily = "Longsile, sans-serif";
            tempSpan.textContent = charText;
            document.body.appendChild(tempSpan);

            const actualWidth = tempSpan.offsetWidth;
            document.body.removeChild(tempSpan);

            const fontSizeValue = parseFloat(currentFontSize);
            const fontSizeRatio = fontSizeValue / 160;
            const padding = 10 * fontSizeRatio;

            charWidth = Math.max(actualWidth + padding, 30 * fontSizeRatio);

            if (!char.querySelector(".char-inner") && charText) {
              char.textContent = "";
              const innerSpan = document.createElement("span");
              innerSpan.className = "char-inner";
              innerSpan.textContent = charText;
              char.appendChild(innerSpan);
              innerSpan.style.transform = "translate3d(0, 0, 0)";
            }

            char.style.width = `${charWidth}px`;
            char.style.maxWidth = `${charWidth}px`;
            char.dataset.charWidth = charWidth;

            const hoverWidth = Math.max(charWidth * 1.8, 85 * fontSizeRatio);
            char.dataset.hoverWidth = hoverWidth;
          }

          char.style.setProperty("--char-index", i);
        });
      });
    }

    updateCharacterWidths();

    window.addEventListener("resize", function () {
      clearTimeout(window.resizeTimer);
      window.resizeTimer = setTimeout(function () {
        updateCharacterWidths();
      }, 250);
    });

    textRows.forEach((row, rowIndex) => {
      const rowId = row.dataset.rowId;
      const chars = splitTexts[rowId].chars;

      gsap.set(chars, {
        opacity: 0,
        filter: "blur(15px)"
      });

      gsap.to(chars, {
        opacity: 1,
        filter: "blur(0px)",
        duration: 0.8,
        stagger: 0.09,
        ease: "customEase",
        delay: 0.15 * rowIndex
      });
    });

    function forceResetKineticAnimation() {
      if (state.activeKineticAnimation) {
        state.activeKineticAnimation.kill();
        state.activeKineticAnimation = null;
      }

      const kineticType = document.getElementById("kinetic-type");
      gsap.killTweensOf([kineticType, typeLines, oddLines, evenLines]);

      // FIXED: Always ensure kinetic type is visible and properly set up
      gsap.set(kineticType, {
        display: "grid",
        scale: 1,
        rotation: 0,
        opacity: 1,
        visibility: "visible" // Added visibility property
      });

      gsap.set(typeLines, {
        opacity: TYPE_LINE_OPACITY,
        x: "0%"
      });

      state.kineticAnimationActive = false;
    }

    function startKineticAnimation(text) {
      // First ensure any existing animation is properly cleaned up
      forceResetKineticAnimation();

      const kineticType = document.getElementById("kinetic-type");

      // FIXED: Explicitly ensure the element is visible with inline styles
      kineticType.style.display = "grid";
      kineticType.style.opacity = "1";
      kineticType.style.visibility = "visible";

      const repeatedText = `${text} ${text} ${text}`;

      typeLines.forEach((line) => {
        line.textContent = repeatedText;
      });

      // FIXED: Add a small delay before starting animation to ensure element is visible
      setTimeout(() => {
        const timeline = gsap.timeline({
          onComplete: () => {
            state.kineticAnimationActive = false;
          }
        });

        timeline.to(kineticType, {
          duration: 1.4,
          ease: "customEase",
          scale: 2.7,
          rotation: -90
        });

        timeline.to(
          oddLines,
          {
            keyframes: [
              { x: "20%", duration: 1, ease: "customEase" },
              { x: "-200%", duration: 1.5, ease: "customEase" }
            ],
            stagger: 0.08
          },
          0
        );

        timeline.to(
          evenLines,
          {
            keyframes: [
              { x: "-20%", duration: 1, ease: "customEase" },
              { x: "200%", duration: 1.5, ease: "customEase" }
            ],
            stagger: 0.08
          },
          0
        );

        timeline.to(
          typeLines,
          {
            keyframes: [
              { opacity: 1, duration: 1, ease: "customEase" },
              { opacity: 0, duration: 1.5, ease: "customEase" }
            ],
            stagger: 0.05
          },
          0
        );

        state.kineticAnimationActive = true;
        state.activeKineticAnimation = timeline;
      }, 20); // Small delay to ensure DOM updates
    }

    function fadeOutKineticAnimation() {
      if (!state.kineticAnimationActive) return;

      if (state.activeKineticAnimation) {
        state.activeKineticAnimation.kill();
        state.activeKineticAnimation = null;
      }

      const kineticType = document.getElementById("kinetic-type");

      // FIXED: Don't set display to none on fadeout completion
      const fadeOutTimeline = gsap.timeline({
        onComplete: () => {
          gsap.set(kineticType, {
            scale: 1,
            rotation: 0,
            opacity: 1
            // Removed setting display: none
          });

          gsap.set(typeLines, {
            opacity: TYPE_LINE_OPACITY,
            x: "0%"
          });

          state.kineticAnimationActive = false;
        }
      });

      fadeOutTimeline.to(kineticType, {
        opacity: 0,
        scale: 0.8,
        duration: 0.5,
        ease: "customEase"
      });
    }

    // FIXED: New function to handle transitions between rows
    function transitionBetweenRows(fromRow, toRow) {
      if (state.transitionInProgress) return;

      state.transitionInProgress = true;

      const fromRowId = fromRow.dataset.rowId;
      const toRowId = toRow.dataset.rowId;

      // 1. Clean up the previous row
      fromRow.classList.remove("active");
      const fromChars = splitTexts[fromRowId].chars;
      const fromInners = fromRow.querySelectorAll(".char-inner");

      gsap.killTweensOf(fromChars);
      gsap.killTweensOf(fromInners);

      // 2. Update state and prepare new row
      toRow.classList.add("active");
      state.activeRowId = toRowId;

      const toText = toRow.querySelector(".text-content").dataset.text;
      const toChars = splitTexts[toRowId].chars;
      const toInners = toRow.querySelectorAll(".char-inner");

      // 3. Force reset kinetic animation (don't fade out, just reset)
      forceResetKineticAnimation();

      // 4. Update background
      switchBackgroundImage(toRowId);

      // 5. Start new animations
      startKineticAnimation(toText);

      if (state.textRevealAnimation) {
        state.textRevealAnimation.kill();
      }
      state.textRevealAnimation = createTextRevealAnimation(toRowId);

      // 6. Reset the previous row instantly
      gsap.set(fromChars, {
        maxWidth: (i, target) => parseFloat(target.dataset.charWidth)
      });

      gsap.set(fromInners, {
        x: 0
      });

      // 7. Animate the new row
      const timeline = gsap.timeline({
        onComplete: () => {
          state.transitionInProgress = false;
        }
      });

      timeline.to(
        toChars,
        {
          maxWidth: (i, target) => parseFloat(target.dataset.hoverWidth),
          duration: 0.64,
          stagger: 0.04,
          ease: "customEase"
        },
        0
      );

      timeline.to(
        toInners,
        {
          x: -35,
          duration: 0.64,
          stagger: 0.04,
          ease: "customEase"
        },
        0.05
      );
    }

    function createTextRevealAnimation(rowId) {
      const timeline = gsap.timeline();

      // Fade out other background text items
      timeline.to(backgroundTextItems, {
        opacity: 0.3,
        duration: 0.5,
        ease: "customEase"
      });

      timeline.call(() => {
        backgroundTextItems.forEach((item) => {
          item.classList.add("highlight");
        });
      });

      timeline.call(
        () => {
          backgroundTextItems.forEach((item) => {
            const originalText = item.dataset.text;
            if (
              alternativeTexts[rowId] &&
              alternativeTexts[rowId][originalText]
            ) {
              item.textContent = alternativeTexts[rowId][originalText];
            }
          });
        },
        null,
        "+=0.5"
      );

      timeline.call(() => {
        backgroundTextItems.forEach((item) => {
          item.classList.remove("highlight");
          item.classList.add("highlight-reverse");
        });
      });

      timeline.call(
        () => {
          backgroundTextItems.forEach((item) => {
            item.classList.remove("highlight-reverse");
          });
        },
        null,
        "+=0.5"
      );

      return timeline;
    }

    function resetBackgroundTextWithAnimation() {
      const timeline = gsap.timeline();

      timeline.call(() => {
        backgroundTextItems.forEach((item) => {
          item.classList.add("highlight");
        });
      });

      timeline.call(
        () => {
          backgroundTextItems.forEach((item) => {
            item.textContent = item.dataset.originalText;
          });
        },
        null,
        "+=0.5"
      );

      timeline.call(() => {
        backgroundTextItems.forEach((item) => {
          item.classList.remove("highlight");
          item.classList.add("highlight-reverse");
        });
      });

      timeline.call(
        () => {
          backgroundTextItems.forEach((item) => {
            item.classList.remove("highlight-reverse");
          });
        },
        null,
        "+=0.5"
      );

      // Restore full opacity to all background text items
      timeline.to(backgroundTextItems, {
        opacity: 1,
        duration: 0.5,
        ease: "customEase"
      });

      return timeline;
    }

    // FIXED: Modified activateRow function to use the transition function
    function activateRow(row) {
      const rowId = row.dataset.rowId;

      // If already active, do nothing
      if (state.activeRowId === rowId) return;

      // If a transition is already in progress, don't start another one
      if (state.transitionInProgress) return;

      // Check if there's already an active row
      const activeRow = document.querySelector(".text-row.active");

      if (activeRow) {
        // Use the transition function to switch between rows
        transitionBetweenRows(activeRow, row);
      } else {
        // No active row, just activate this one normally
        row.classList.add("active");
        state.activeRowId = rowId;

        const text = row.querySelector(".text-content").dataset.text;
        const chars = splitTexts[rowId].chars;
        const innerSpans = row.querySelectorAll(".char-inner");

        switchBackgroundImage(rowId);
        startKineticAnimation(text);

        if (state.textRevealAnimation) {
          state.textRevealAnimation.kill();
        }
        state.textRevealAnimation = createTextRevealAnimation(rowId);

        // Simplified animation without mouse move effects
        const timeline = gsap.timeline();

        timeline.to(
          chars,
          {
            maxWidth: (i, target) => parseFloat(target.dataset.hoverWidth),
            duration: 0.64,
            stagger: 0.04,
            ease: "customEase"
          },
          0
        );

        timeline.to(
          innerSpans,
          {
            x: -35,
            duration: 0.64,
            stagger: 0.04,
            ease: "customEase"
          },
          0.05
        );
      }
    }

    function deactivateRow(row) {
      const rowId = row.dataset.rowId;

      if (state.activeRowId !== rowId) return;

      // If a transition is already in progress, don't interfere
      if (state.transitionInProgress) return;

      state.activeRowId = null;
      row.classList.remove("active");

      switchBackgroundImage("default");
      fadeOutKineticAnimation();

      if (state.textRevealAnimation) {
        state.textRevealAnimation.kill();
      }
      state.textRevealAnimation = resetBackgroundTextWithAnimation();

      const chars = splitTexts[rowId].chars;
      const innerSpans = row.querySelectorAll(".char-inner");

      const timeline = gsap.timeline();

      timeline.to(
        innerSpans,
        {
          x: 0,
          duration: 0.64,
          stagger: 0.03,
          ease: "customEase"
        },
        0
      );

      timeline.to(
        chars,
        {
          maxWidth: (i, target) => parseFloat(target.dataset.charWidth),
          duration: 0.64,
          stagger: 0.03,
          ease: "customEase"
        },
        0.05
      );
    }

    function initializeParallax() {
      const container = document.querySelector("body");
      const backgroundElements = [
        ...document.querySelectorAll("[id$='-bg']"),
        ...document.querySelectorAll(".bg-text-container")
      ];

      const parallaxLayers = [0.02, 0.03, 0.04, 0.05];
      backgroundElements.forEach((el, index) => {
        el.dataset.parallaxSpeed =
          parallaxLayers[index % parallaxLayers.length];

        gsap.set(el, {
          transformOrigin: "center center",
          force3D: true
        });
      });

      let lastParallaxTime = 0;
      const throttleParallax = 20;

      container.addEventListener("mousemove", (e) => {
        const now = Date.now();
        if (now - lastParallaxTime < throttleParallax) return;
        lastParallaxTime = now;

        const centerX = window.innerWidth / 2;
        const centerY = window.innerHeight / 2;
        const offsetX = (e.clientX - centerX) / centerX;
        const offsetY = (e.clientY - centerY) / centerY;

        backgroundElements.forEach((el) => {
          const speed = parseFloat(el.dataset.parallaxSpeed);

          if (el.id && el.id.endsWith("-bg") && el.style.opacity === "0") {
            return;
          }

          const moveX = offsetX * 100 * speed;
          const moveY = offsetY * 50 * speed;

          gsap.to(el, {
            x: moveX,
            y: moveY,
            duration: 1.0,
            ease: "mouseEase",
            overwrite: "auto"
          });
        });
      });

      container.addEventListener("mouseleave", () => {
        backgroundElements.forEach((el) => {
          gsap.to(el, {
            x: 0,
            y: 0,
            duration: 1.5,
            ease: "customEase"
          });
        });
      });

      backgroundElements.forEach((el, index) => {
        const delay = index * 0.2;
        const floatAmount = 5 + (index % 3) * 2;

        gsap.to(el, {
          y: `+=${floatAmount}`,
          duration: 3 + (index % 2),
          ease: "sine.inOut",
          repeat: -1,
          yoyo: true,
          delay: delay
        });
      });
    }

    // Keep the event listeners but remove the mouse move functionality
    textRows.forEach((row) => {
      const interactiveArea = row.querySelector(".interactive-area");

      interactiveArea.addEventListener("mouseenter", () => {
        activateRow(row);
      });

      interactiveArea.addEventListener("mouseleave", () => {
        if (state.activeRowId === row.dataset.rowId) {
          deactivateRow(row);
        }
      });

      // Add click event as a backup for mouseenter
      row.addEventListener("click", () => {
        activateRow(row);
      });
    });

    // Add a global function to manually test the animation
    window.testKineticAnimation = function (rowId) {
      const row = document.querySelector(`.text-row[data-row-id="${rowId}"]`);
      if (row) {
        activateRow(row);
        setTimeout(() => {
          deactivateRow(row);
        }, 3000);
      }
    };

    function scrambleRandomText() {
      const randomIndex = Math.floor(
        Math.random() * backgroundTextItems.length
      );
      const randomItem = backgroundTextItems[randomIndex];
      const originalText = randomItem.dataset.text;

      gsap.to(randomItem, {
        duration: 1,
        scrambleText: {
          text: originalText,
          chars: "■▪▌▐▬",
          revealDelay: 0.5,
          speed: 0.3
        },
        ease: "none"
      });

      const delay = 0.5 + Math.random() * 2;
      setTimeout(scrambleRandomText, delay * 1000);
    }

    setTimeout(scrambleRandomText, 1000);

    const simplicity = document.querySelector(
      '.text-item[data-text="IS THE KEY"]'
    );
    if (simplicity) {
      const splitSimplicity = new SplitText(simplicity, {
        type: "chars",
        charsClass: "simplicity-char"
      });

      gsap.from(splitSimplicity.chars, {
        opacity: 0,
        scale: 0.5,
        duration: 1,
        stagger: 0.015,
        ease: "customEase",
        delay: 1
      });
    }

    backgroundTextItems.forEach((item, index) => {
      const delay = index * 0.1;
      gsap.to(item, {
        opacity: 0.85,
        duration: 2 + (index % 3),
        repeat: -1,
        yoyo: true,
        ease: "sine.inOut",
        delay: delay
      });
    });

    initializeParallax();

    const style = document.createElement("style");
    style.textContent = `
      #kinetic-type {
        z-index: 200 !important;
        display: grid !important;
        visibility: visible !important;
        opacity: 1;
        pointer-events: none;
      }
    `;
    document.head.appendChild(style);
  }
});

</script>
</html>
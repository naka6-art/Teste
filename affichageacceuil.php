<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://unpkg.com/normalize.css') layer(normalize);

@import url('https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

@layer normalize, base, demo;

@layer demo {
  .arrow {
    display: inline-block;
    opacity: 0.6;
    position: fixed;
    font-size: 0.875rem;
    font-family: 'Gloria Hallelujah', cursive;
    transition: opacity 0.26s 0.26s ease-out;

    &.arrow--instruction {
      top: 50%;
      left: 50%;
      translate: -140% 150%;
      rotate: -10deg;
      svg {
        /* color: hsl(0 0% 65%); */
        scale: 1 1;
        top: 40%;
        rotate: 10deg;
        left: 90%;
        width: 90px;
        translate: 0% 20%;
        position: absolute;
      }
    }
  }

  .hover {
    border: 0;
    background: transparent;
    position: relative;
    color: var(--color);
    padding: 1rem 2rem;
    background: var(--bg);
    cursor: pointer;
    outline-color: canvasText;
    border-radius: 0;

    &::after {
      content: '';
      background: white;
      position: absolute;
      inset: 0;
      mix-blend-mode: difference;
      scale: 0 1;
      transform-origin: 100% 50%;
      transition: scale 0.2s ease-out;
      pointer-events: none;
    }
  }

  .hover:is(:hover, :focus-visible)::after {
    scale: 1 1;
    transform-origin: 0 50%;
  }

  [data-intent='true'] .hover:is(:hover, :focus-visible)::after {
    transition: scale 0.2s 0.15s ease-out;
  }

  [data-vertical='true'] .hover::after {
    scale: 1 0;
    transform-origin: 50% 0;
  }
  [data-vertical='true'] .hover:is(:hover, :focus-visible)::after {
    scale: 1 1;
    transform-origin: 50% 100%;
  }

  [data-revert='true'] .hover::after,
  [data-revert='true'] .hover:is(:hover, :focus-visible)::after {
    transform-origin: 0 50%;
  }

  [data-vertical='true'][data-revert='true'] .hover::after,
  [data-vertical='true'][data-revert='true']
    .hover:is(:hover, :focus-visible)::after {
    transform-origin: 50% 100%;
  }

  ::view-transition-old(root) {
    animation: none;
  }
  ::view-transition-new(root) {
    animation-name: bloom;
    animation-duration: 1.25s;
  }
  @keyframes bloom {
    0% {
      clip-path: circle(0 at 0 0);
    }
    100% {
      clip-path: circle(150vmax at 0 0);
    }
  }
}

@layer base {
  :root {
    --font-size-min: 16;
    --font-size-max: 20;
    --font-ratio-min: 1.2;
    --font-ratio-max: 1.33;
    --font-width-min: 375;
    --font-width-max: 1500;
  }

  html {
    color-scheme: light dark;
  }

  [data-theme='light'] {
    color-scheme: light only;
  }

  [data-theme='dark'] {
    color-scheme: dark only;
  }

  :where(.fluid) {
    --fluid-min: calc(
      var(--font-size-min) * pow(var(--font-ratio-min), var(--font-level, 0))
    );
    --fluid-max: calc(
      var(--font-size-max) * pow(var(--font-ratio-max), var(--font-level, 0))
    );
    --fluid-preferred: calc(
      (var(--fluid-max) - var(--fluid-min)) /
        (var(--font-width-max) - var(--font-width-min))
    );
    --fluid-type: clamp(
      (var(--fluid-min) / 16) * 1rem,
      ((var(--fluid-min) / 16) * 1rem) -
        (((var(--fluid-preferred) * var(--font-width-min)) / 16) * 1rem) +
        (var(--fluid-preferred) * var(--variable-unit, 100vi)),
      (var(--fluid-max) / 16) * 1rem
    );
    font-size: var(--fluid-type);
  }

  *,
  *:after,
  *:before {
    box-sizing: border-box;
  }

  body {
    background: light-dark(#fff, #000);
    display: grid;
    place-items: center;
    min-height: 100vh;
    font-family: 'SF Pro Text', 'SF Pro Icons', 'AOS Icons', 'Helvetica Neue',
      Helvetica, Arial, sans-serif, system-ui;
  }

  body::before {
    --size: 45px;
    --line: color-mix(in hsl, canvasText, transparent 80%);
    content: '';
    height: 100vh;
    width: 100vw;
    position: fixed;
    background: linear-gradient(
          90deg,
          var(--line) 1px,
          transparent 1px var(--size)
        )
        calc(var(--size) * 0.36) 50% / var(--size) var(--size),
      linear-gradient(var(--line) 1px, transparent 1px var(--size)) 0%
        calc(var(--size) * 0.32) / var(--size) var(--size);
    mask: linear-gradient(-20deg, transparent 50%, white);
    top: 0;
    transform-style: flat;
    pointer-events: none;
    z-index: -1;
  }

  .bear-link {
    color: canvasText;
    position: fixed;
    top: 1rem;
    left: 1rem;
    width: 48px;
    aspect-ratio: 1;
    display: grid;
    place-items: center;
    opacity: 0.8;
  }

  :where(.x-link, .bear-link):is(:hover, :focus-visible) {
    opacity: 1;
  }

  .bear-link svg {
    width: 75%;
  }

  /* Utilities */
  .sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border-width: 0;
  }
}

    </style>
</head>
<body>
    <span class="arrow arrow--instruction">
      <span
        >Partagez<br />Votre<br />Livre preferé<br />avec<br />l'intention<br />Clair</span
>
      <svg viewBox="0 0 97 52" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          fill-rule="evenodd"
          clip-rule="evenodd"
          d="M74.568 0.553803C74.0753 0.881909 73.6295 1.4678 73.3713 2.12401C73.1367 2.70991 72.3858 4.67856 71.6584 6.50658C70.9544 8.35803 69.4526 11.8031 68.3498 14.1936C66.1441 19.0214 65.839 20.2167 66.543 21.576C67.4581 23.3337 69.4527 23.9196 71.3064 22.9821C72.4797 22.3728 74.8965 19.5839 76.9615 16.4435C78.8387 13.5843 78.8387 13.6077 78.1113 18.3418C77.3369 23.4275 76.4687 26.2866 74.5915 30.0364C73.254 32.7316 71.8461 34.6299 69.218 37.3485C65.9563 40.6999 62.2254 42.9732 57.4385 44.4965C53.8718 45.6449 52.3935 45.8324 47.2546 45.8324C43.3594 45.8324 42.1158 45.7386 39.9805 45.2933C32.2604 43.7466 25.3382 40.9577 19.4015 36.9735C15.0839 34.0909 12.5028 31.7004 9.80427 27.9975C6.80073 23.9196 4.36038 17.2403 3.72682 11.475C3.37485 8.1471 3.1402 7.32683 2.43624 7.13934C0.770217 6.71749 0.183578 7.77211 0.0193217 11.5219C-0.26226 18.5996 2.55356 27.1304 7.17619 33.1066C13.8403 41.7545 25.432 48.4103 38.901 51.2696C41.6465 51.8555 42.2566 51.9023 47.4893 51.9023C52.3935 51.9023 53.426 51.832 55.5144 51.3867C62.2723 49.9337 68.5375 46.6292 72.949 42.1998C76.0464 39.1296 78.1113 36.2939 79.8946 32.7081C82.1942 28.0912 83.5317 23.3103 84.2591 17.17C84.3999 15.8576 84.6111 14.7795 84.7284 14.7795C84.8223 14.7795 85.4559 15.1311 86.1364 15.5763C88.037 16.7716 90.3835 17.8965 93.5748 19.0918C96.813 20.3339 97.3996 20.287 96.4141 18.9512C94.9123 16.9122 90.055 11.5219 87.1219 8.63926C84.0949 5.66288 83.8368 5.33477 83.5552 4.1864C83.3909 3.48332 83.0155 2.68649 82.6401 2.31151C82.0065 1.6553 80.4109 1.04595 79.9885 1.30375C79.8712 1.37406 79.2845 1.11626 78.6744 0.717845C77.2431 -0.172727 75.7413 -0.243024 74.568 0.553803Z"
          fill="currentColor"
        />
      </svg>
    </span>
    <div class="actions">
      <button class="hover" onclick="location.href='./listedeslivre.php'">Liste</button>
      <button class="hover" onclick="location.href='./formulaire_gestionnaire.php'">Ajoutez votre Livre</button>
        <button class="hover" onclick="location.href='./aperçu.php'">Apercçus</button>
      <button class="hover" onclick="location.href='./apropos.php'">Apropos</button>
    </div>
    <a
      aria-label="🇲🇬 Bëlhardo Ravelonantenaina 🇲🇬 󱢏 "
      class="bear-link"
      href="https://www.facebook.com/ravelonantenainabelhardo"
      target="_blank"
      rel="noreferrer noopener"
    >
      <svg
        class="w-9"
        viewBox="0 0 969 955"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
     
        <circle
          cx="161.191"
          cy="320.191"
          r="133.191"
          stroke="currentColor"
          stroke-width="20"
        ></circle>
        <circle
          cx="806.809"
          cy="320.191"
          r="133.191"
          stroke="currentColor"
          stroke-width="20"
        ></circle>
        <circle
          cx="695.019"
          cy="587.733"
          r="31.4016"
          fill="currentColor"
        ></circle>
        <circle
          cx="272.981"
          cy="587.733"
          r="31.4016"
          fill="currentColor"
        ></circle>
        <path
          d="M564.388 712.083C564.388 743.994 526.035 779.911 483.372 779.911C440.709 779.911 402.356 743.994 402.356 712.083C402.356 680.173 440.709 664.353 483.372 664.353C526.035 664.353 564.388 680.173 564.388 712.083Z"
          fill="currentColor"
        ></path>
        <rect
          x="310.42"
          y="448.31"
          width="343.468"
          height="51.4986"
          fill="#FF1E1E"
        ></rect>
        <path
          fill-rule="evenodd"
          clip-rule="evenodd"
          d="M745.643 288.24C815.368 344.185 854.539 432.623 854.539 511.741H614.938V454.652C614.938 433.113 597.477 415.652 575.938 415.652H388.37C366.831 415.652 349.37 433.113 349.37 454.652V511.741L110.949 511.741C110.949 432.623 150.12 344.185 219.845 288.24C289.57 232.295 384.138 200.865 482.744 200.865C581.35 200.865 675.918 232.295 745.643 288.24Z"
          fill="currentColor"
        ></path>
      </svg>
    </a>
</body>
</body>
<script>
    import { Pane } from 'https://cdn.skypack.dev/tweakpane@4.0.4'

const CONFIG = {
  revert: true,
  vertical: true,
  intent: true,
  theme: 'system',
}

const CTRL = new Pane({
  title: 'config',
})

CTRL.addBinding(CONFIG, 'vertical')
CTRL.addBinding(CONFIG, 'revert')
CTRL.addBinding(CONFIG, 'intent', {
  label: 'delay',
})
CTRL.addBinding(CONFIG, 'theme', {
  label: 'theme',
  options: {
    system: 'system',
    light: 'light',
    dark: 'dark',
  },
})

const update = () => {
  document.documentElement.dataset.vertical = CONFIG.vertical
  document.documentElement.dataset.revert = CONFIG.revert
  document.documentElement.dataset.intent = CONFIG.intent
  document.documentElement.dataset.theme = CONFIG.theme
}

const sync = (event) => {
  if (
    !document.startViewTransition ||
    event.target.controller.view.labelElement.innerText !== 'theme'
  )
    return update()
  document.startViewTransition(() => update())
}

CTRL.on('change', sync)

update()

</script>
</html>
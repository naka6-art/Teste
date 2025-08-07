<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>start</title>
</head>
<style>
    body {
  background: rgb(82, 138, 227);
  overflow: clip;
  min-height: 100vh;
  margin: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 5em;
  font-size: 1rem;
  background:
    /* fake texture */
    radial-gradient(70% 1% at 30% 5%, #c632 80%, #0000 0) 50% 50% / 100% 10%,
    radial-gradient(60% 1.3% at 30% 5%, #c631 80%, #0000 0) 30% 50% / 70% 7.5%,
    radial-gradient(50% 0.7% at 30% 5%, #c631 80%, #0000 0) 30% 50% / 50% 17.5%,
    radial-gradient(60% 1% at 30% 5%, #c631 80%, #0000 0) 0% 10% / 60% 9%,
    radial-gradient(80% 1.3% at 30% 5%, #a411 80%, #0000 0) 70% 20% / 66% 7.5%,
    radial-gradient(100% 1.1% at 30% 5%, #c631 80%, #0000 0) 0% 17% / 70% 12.5%,
    radial-gradient(60% 3% at 50% 0, #c631 80%, #0000 0) 0% 10% / 70% 7.5% repeat-y,
    radial-gradient(40% 4% at 70% 5%, #b521 80%, #0000 0) 100% 2% / 70% 5%,
    /* wood stains */
    radial-gradient(80% 50% at 20% 20%, #c0824334 10%, #0000 25%),
    radial-gradient(140% 50% at 90% 45%, #c0824324 10%, #0000 15%),
    radial-gradient(100% 50% at 70% 50%, #c0824324 10%, #0000 15%),
    /* base */
    linear-gradient(to top right, #0001, #ffc5),
    #457adc;
}

article {
  padding: 1.75em;
  position: relative;
  background: 
    linear-gradient(90deg, #8884, #aaa6, #ccc6, #bbb6),
    radial-gradient(70% 1% at 30% 5%, #c632 80%, #0000 0) 50% 50% / 100% 20%,
    radial-gradient(60% 1.3% at 30% 5%, #c631 80%, #0000 0) 30% 50% / 70% 17.5%,
    radial-gradient(50% 0.7% at 30% 5%, #c631 80%, #0000 0) 30% 50% / 50% 27.5%,
    radial-gradient(60% 1% at 30% 5%, #c631 80%, #0000 0) 0% 10% / 60% 19%,
    radial-gradient(80% 1.3% at 30% 5%, #a411 80%, #0000 0) 70% 20% / 66% 17.5%,
    radial-gradient(100% 1.1% at 30% 5%, #c631 80%, #0000 0) 0% 17% / 70% 22.5%,
    radial-gradient(60% 3% at 50% 0, #c631 80%, #0000 0) 0% 10% / 70% 17.5% repeat-y,
    radial-gradient(40% 4% at 70% 5%, #b521 80%, #0000 0) 100% 2% / 70% 15%,
    linear-gradient(#aaa, #ccc);
  border-radius: 1.5em;
  box-shadow: 
    inset 0 0 0.2em #ddd,
    inset 0 -0.25em 0.5em #0001,
    0 0 1em #0003,
    -0.35em -0.35em 1em #3212, 
    -0.25em -0.25em 0.25em #3211, 
    0 0 0 1px #ababab inset;
  
  &::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: calc(100% - 2.5em);
    height: calc(100% - 2.5em);
    background: #fff2;
    border-radius: 0.75em;
    box-shadow: 
      inset 0 0 0.6em #0008,
      inset -0.1em -0.1em 0.5em #0003,
      inset 0 0.5em 0.25em #fff3;
  }
  
  &::after {
    content: "";
    position: absolute;
    top: 0;
    left: 50%;
    transform: translate(-50%, -100vh);
    width: 1.25em;
    height: 100vh;
    background:
      linear-gradient(90deg, #ccc, #eee, #ddd) 0 100% / 100% 1.75em,
      linear-gradient(90deg, #0000 20%, #ccc 0, #ddd, #eee, #ddd 80%, #0000 0)
      
      ;
    background-repeat: no-repeat;
    filter: drop-shadow(-0.25em 0 0.5em #0005);
    z-index: -1;
  }
  
  button {
    position: relative;
    box-sizing: border-box;
    border-radius: 0.65em;
    font-size: 1em;
    padding: 1em;
    display: flex;
    align-items: flex-end;
    border: 0.125em solid #000;
    color: #eeec;
    width: 9em;
    height: 5em;
    background:
      radial-gradient(at 50% 10%, #fff1, #fff0),
      #333;
    box-shadow: 
      inset 0 0 0 0.1em #333,
      inset 0 0 0.25em 0.1em #fff3,
      -0.125em -0.125em 0.5em #000c;
    transition: all 0.125s;
    
    &:active {
      border: 0.05em solid #000;
      padding: 1.05em;
      box-shadow: 
      inset 0 0 0 0.1em #333,
      inset 0 0 0.25em 0.1em #fff3,
      -0.125em -0.125em 0.25em #000c;
    }
  }
}
</style>
<body>
    <article role="img" aria-label="illustration of an Apple-looking mini-keyboard with only the tab key">
  <button onclick="location.href='./progress.php'">START</button>
</article>
</body>
</html>
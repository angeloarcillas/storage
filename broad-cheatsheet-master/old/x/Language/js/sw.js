if (window.Worker) {
  // Create a new web worker
  let worker = new Worker("/sw.js");

  // Fire onMessage event handler
  worker.onmessage = function (event) {
    document.getElementById("result").innerHTML = event.data;
  };
} else {
  alert("Oops, service worker unsupported.");
}

/* Toggle service worker */
let worker;
function start() {
  // Initialize service worker
  worker = new Worker("/sw.js");

  // run update function
  worker.onmessage = update;

  // start service worker
  worker.postMessage("start");
}

function update(event) {
  document.getElementById("result").innerHTML = event.data;
}

function stop() {
  // Stop service worker
  worker.terminate();
}

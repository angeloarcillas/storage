/**
 * XMLHttpRequest
 */
let xhr = new XMLHttpRequest(); // create XMLHttpRequest
xhr.open(method, URL, [async, user, pwd]);
  method // http request method
  url // target url
  async // true(asynchronous), false(synchronous)
  user,pwd // basic http auth
  xhr.send([body]);

/**
 * XHR EVENTS
 */
xhr.onprogress = function(event) {
    event.loaded; // bytes downloaded
    event.lengthComputable; // true if the server sent Content-Length header
    event.total; // total number of bytes if(lengthComputable)
    }

xhr.onload = function() {
  xhr.status; // http status code
  xhr.statusText // http status message
  xhr.response; // server response
}

xhr.onerror = function() {
// throw error
}

/**
 * RESPONSE TYPE
 */
xhr.responseType = "";
  "arraybuffer" // as ArrayBuffer
  "blob" // as blob
  "document" // as document
  "json" //as JSON(parsed automatically)

/**
 * READY STATE
 */
xhr.onreadystatechange = function() {
  xhr.readyState;
    0 // initial state
    1 // xhr.open() called
    2 // response headers recieved
    3 // response loading
    4 //  request complete
}

/* TERMINATE REQUEST */
xhr.abort();

/* SET REQUEST TIMEOUT */
xhr.timeout = 1000 // timeout after 1sec

/**
 * HTTP REQUEST HEADER
 */
xhr.setRequestHeader(key,value);
xhr.getAllResponseHeaders()

/* HEADERS TO ARRAY FORMAT */
let headers = xhr
.getAllResponseHeaders()
.split('\r\n')
.reduce((result, current) => {
let [key, value] = current.split(': ');
result[key] = value;
return result;
}, {});

/**
 * JSON
 */
JSON.parse() // object to json
JSON.stringify() // json to object

/**
 * UPLOAD EVENT
 * 
 * track uploads events
 * triggers only on the downloading stage.
 */

xhr.upload.onprogress = function(event) {
    alert(`Uploaded ${event.loaded} of ${event.total} bytes`);
  };
  
  xhr.upload.onload = function() {
    alert(`Upload finished successfully.`);
  };
  
  xhr.upload.onerror = function() {
    alert(`Error during the upload: ${xhr.status}`);
  };
  
/*
It generates events similar to xhr,
but xhr.upload triggers them solely on uploading
*/
loadstart // upload started
progress // triggers periodically during the upload
abort // upload aborted
error // non-HTTP error
load // upload finished successfully
timeout // upload timed out (if timeout property is set)
loadend // upload finished with either success or error
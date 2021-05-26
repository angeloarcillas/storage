/**
 * ASYNC/AWAIT
 * 
 * async - ensure the function returns a promise
 * await - makes js wait until promise return its result
 */

async function foo() {
  let promise = new Promise((resolve, reject) => {
    setTimeout(() => resolve("done!"), 1000)
  });
  let result = await promise;
  alert(result);
}

(async () => { //anonymouse async function
    let request = await fetch('/foo/user.json'); // wait request
    let response = await request.json(); // wait response
    alert(response); // alert response
  })();
/**
 * PROMISE
 * 
 * resolve - success
 * reject - error
 */

let promise = new Promise(function(resolve, reject) {
    resolve("done");
    // There can be only a single result or an error
    reject(new Error("…")); // ignored
    setTimeout(() => resolve("…")); // ignored
  });


  /**
   * THEN,CATCH,FINALLY
   */
  promise.then(res => {
    // success
})
.catch(err => {
    // error
})
.finally(() => {
  // always executed
});

/**
 * STATIC METHODS
 */
Promise.all(iterable) // wait all promise to be resolved, stop if rejected
Promise.allSettled(iterable) // wait all to be resolved and rejected
Promise.race(iterable) // wait until any promise resolved or rejected
Promise.reject(reason) // return a new promise object that is rejected with the given reason
Promise.resolve(value) // Returns a new Promise object that is resolved with the given value

Promise.prototype.then()
Promise.prototype.catch() 
Promise.prototype.finally()

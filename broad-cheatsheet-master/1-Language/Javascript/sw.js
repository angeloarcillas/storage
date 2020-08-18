/**
 * Service Worker
 * 
 * A script that your browser runs in the background,
 * separate from a web page, opening the door to features
 * that don't need a web page or user interaction
 */

/**
 * Steps
 *
 * 1. check if service workers are supported
 * 2. register the service worker
 */
if ("serviceWorker" in navigator) {
  navigator.serviceWorker
    .register("./sw-test/sw.js")
    .then((reg) => {
      console.log("success");
    })
    .catch((err) => {
      console.log(err);
    });
}

/**
 * !NOTE: you can create many cache
 * Steps
 *
 * 1. Add install event listener to SW
 * 2. wait until caches.open() finish
 * 3. create a new cache called v1
 * 4. set origin-relative URLs to all the resources you want to cache
 * 5. on success activate SW
 */
self.addEventListener("install", (event) => {
  event.waitUntil(
    caches.open("v1").then((cache) => {
      return cache.addAll([
        "./sw-test/",
        "./sw-test/index.html",
        "./sw-test/style.css",
        "./sw-test/app.js",
        "./sw-test/image-list.js",
        "./sw-test/star-wars-logo.jpg",
        "./sw-test/gallery/",
        "./sw-test/gallery/bountyHunters.jpg",
        "./sw-test/gallery/myLittleVader.jpg",
        "./sw-test/gallery/snowTroopers.jpg",
      ]);
    })
  );
});

/**
 * fetch - Fires every time any resource controlled by a service worker is fetched
 * Steps
 *
 * 1.
 */
self.addEventListener("fetch", (event) => {
  event.respondWith(
    caches
      .match(event.request)
      .then((resp) => {
        return (
          resp ||
          fetch(event.request).then((response) => {
            let responseClone = response.clone();
            caches.open("v1").then((cache) => {
              cache.put(event.request, responseClone);
            });

            return response;
          })
        );
      })
      .catch(() => {
        return caches.match("./sw-test/gallery/fallback.jpg");
      })
  );
});

/**
 * Update to latest version
 * Steps
 *
 * 1. Add active event listener to SW
 * 2. map the caches.keys
 * 3. delete the keys you dont want to keep
 */
self.addEventListener("activate", (event) => {
  var cacheKeeplist = ["v2"];

  event.waitUntil(
    caches.keys().then((keyList) => {
      return Promise.all(
        keyList.map((key) => {
          if (cacheKeeplist.indexOf(key) === -1) {
            return caches.delete(key);
          }
        })
      );
    })
  );
});
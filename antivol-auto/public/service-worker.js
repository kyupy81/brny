const CACHE_NAME = 'antivol-v1';
const ASSETS_TO_CACHE = [
    '/',
    '/offline',
    '/css/app.css',
    '/js/app.js',
    '/manifest.json'
];

self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            return cache.addAll(ASSETS_TO_CACHE);
        })
    );
});

self.addEventListener('fetch', (event) => {
    event.respondWith(
        fetch(event.request)
            .catch(() => {
                return caches.match(event.request).then((response) => {
                    if (response) {
                        return response;
                    }
                    if (event.request.mode === 'navigate') {
                        return caches.match('/offline');
                    }
                });
            })
    );
});

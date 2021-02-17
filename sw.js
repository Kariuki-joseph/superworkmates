let cacheName = "v1.1";

self.addEventListener('install',(e)=>{
    console.log("Serviceworker installing");
});

self.addEventListener('activate',(e)=>{
    //clear old cache
    caches.keys().then(cacheName=>{
        return Promise.all(
            cacheName.map(cache=>{
                if(cache != cacheName){
                   return caches.delete(cache);
                }
            })
        )
    })
});

self.addEventListener('fetch', (e)=>{
    e.respondWith(
        fetch(e.request).then(response=>{
            console.log("Fetching from online");
            //add the request to cache
            let resClone = response.clone();
            caches.open(cacheName).then(cache=>{
                cache.put(e.request, resClone);
            });
            //return the fetched data
            return response;
        }).catch(err=>{
            //return cached data on network fail
            console.log("The error was "+err.type);
            console.log("Now fetching from offline");
            caches.match(e.request).then(resp=>{
                return resp;
            })
        })
    )
})
self.addEventListener('install',(e)=>{
    console.log("Serviceworker installing");
});

self.addEventListener('activate',(e)=>{
    console.log("Serviceworker actvating");
});

self.addEventListener('fetch', (e)=>{
    e.respondWith(
        fetch(e.reqest).then(resp=>{
            return resp;
        })
    )
})
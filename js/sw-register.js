if ('serviceWorker' in navigator) {
    window.addEventListener('load',()=>{
        navigator.serviceWorker.register('sw.js')
        .then(registration=>{
            console.log("Serviceworker registration");
        }).catch(err=>console.log(err))
    })
}else{
    console.log("Serviceworker not supported by your browser.");
}
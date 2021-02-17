<script>
let Toast = {
    makeToast : function(header="Add toast heading here...", body="Add toast message here..."){
    //clear any other toasts
    document.querySelectorAll('div.toast').forEach(toast=>toast.remove());
    //make and return new toast
    let toastElement = 
        `<div id="toast" class="toast" data-animation="true" data-delay="3000">
        <div class="toast-header">
            <h5 class="mr-auto text-primary">${(header != null)? header : "Heading of the toast"}</h5>
        </div>
        <div class="toast-body">
            <p>
            ${(body != null) ? body : "This is the body content of the toast body."}
            </p>
        </div>
        </div>`;

        return toastElement;
    },
    show: function(){
        return $('#toast').toast('show');
    }
}
</script>
//selector function
function _(elem){
	return document.querySelector(elem);
}
//selector All
function _A(elem){
	return document.querySelectorAll(elem);
}

//delete an item
function deleteItem(itemID){
    if(prompt("You are about to delete this item. Continue? ", ' ')){
     goTo('processDeleteItem.php?id='+itemID);
    };
}
//edit an item
function editItem(itemID){
    let btn = document.querySelector('#btnEditItem');
    btn.disabled=true;
    fetch('modals/update-pricelist.php?id='+itemID).then(response=>response.text())
    .then(response=>{
        $('#divUpdatePricelistModal').html(response);
        //call the modal
        $('#modalUpdatePricelist').modal('show');
        btn.disabled=false;
    }).catch(err=>console.log(err))
}
//update registration details
let form = _('#formUpdateAccInfo');
let submitBtn = _('#btnUpdateAccInfo');
form.addEventListener('submit',(e)=>{
    e.preventDefault();
    //capture form data 
    let formData = new FormData(form);
    fetch('processUpdateUserDetails.php',{
        method: "GET",
        body: formData
    }).then(response=>response.json())
    .then(response=>{
        let header = (response.status == 'fail') ? `<div class="alert alert-danger">Error</div>` : `<div class="alert alert-success">Sucess</div>`;
        _("#toastUpdateDetails").innerHTML=Toast.makeToast(header, response.msg);
        Toast.show();
    }).catch(err=>console.log(err));
})
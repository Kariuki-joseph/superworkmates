function _(elem){
 return document.querySelector(elem);
}
function _A(elems){
    return document.querySelectorAll(elems);
}
//hide errors on focus
function hideErrorsOnFocus(){
    for (let x = 0; x < _A('form#formPostEquipment input').length; x++) {
        _A('form#formPostEquipment input')[x].addEventListener('focus',()=>{
            _A('form#formPostEquipment input')[x].nextElementSibling.innerText='';
        });
    }
    _A('form#formPostEquipment textarea')[0].addEventListener('focus',()=>_A('form#formPostEquipment textarea')[0].nextElementSibling.innerText='');
}

//post equipment
//allow posting for logged in users
$('#btnPostLogg').on('click',()=>$('#modalEquipmentsPost').modal('show'));
//prompt for login for not logged in users
$('#btnPost').on('click',()=>login('Login to post your equipment'));

//capture form data on submit
$('#formPostEquipment').on('submit',(e)=>{
    e.preventDefault();
    //perform validations
    if(_A('form#formPostEquipment input')[0].value == ''){
        _A('#formPostEquipment input')[0].nextElementSibling.innerText='Title is required';
        return;
    }else if(_A('form#formPostEquipment textarea')[0].value == ''){
        _A('#formPostEquipment textarea')[0].nextElementSibling.innerText='Enter a brief description to continue';
        return;
    }else if(_A('form#formPostEquipment textarea')[0].value.length < 20 || _A('form#formPostEquipment textarea')[0].value.length > 200){
        _A('#formPostEquipment textarea')[0].nextElementSibling.innerText='Please enter a description that is between 20 and 200 characters.';
        return;
    }else if(_A('form#formPostEquipment input')[1].value == ''){
        _A('#formPostEquipment input')[1].nextElementSibling.innerText='Your pricing is required to continue.';
        return;
    }else if(_A('form#formPostEquipment input')[2].value == ''){
        _A('#formPostEquipment input')[2].nextElementSibling.innerText='Please enter your location to continue.';
        return;
    }
    
    //continue
    $('#formPostEquipment button#btnSubmit').css({'disabled':'true'}).html('<i>Sending...</i>');
        let fd = new FormData(_('form#formPostEquipment'));
        fd.append('submit','true');

    fetch('processAddEquipments.php',{
        method: 'POST',
        body: fd
    }).then(response=>response.json())
    .then(response=>{
    if(response.status == 'success'){
        $('div.post-equipment-response').text(response.msg).css({'display':'block'});
         //reset form
    _('#formPostEquipment').reset();
    }else if(response.status == 'fail'){
        $('div.post-equipment-response').text(response.msg).css({'display':'block', 'background-color':'red'});
    }
    //original button
    $('#formPostEquipment button#btnSubmit').css({'disabled':'false'}).html('Post <i class="fa fa-paper-plane"></i>');
    }).catch(err=>{
        console.log(err)
        //original button
        $('#formPostEquipment button#btnSubmit').css({'disabled':'false'}).html('Post <i class="fa fa-paper-plane"></i>');
        $('div.post-equipment-response').text(response.msg).css({'display':'block', 'background-color':'red'});
         //reset form
        _('#formPostEquipment').reset();

    });

});
//hide errors on focus
hideErrorsOnFocus();

//equipment search
$('#equipmentSearch').on('keyup', ()=>{
    //search value
    let searchValue = $('#equipmentSearch').val();
    if(searchValue != ''){
        fetch('processSearchEquipments.php?search='+searchValue)
        .then(response=>response.json())
        .then(response=>{
            if(response.status == 'fail'){
                //no results found
                let li = `<li>No results were found for <i><strong>${searchValue}</strong></i></li>`;
                $('.equipments-search-results').html(li).css({'display':'block'});
            }else if(response.status == 'success'){
                //some results found
                let ul = ``;
                for (let x = 0; x < response.data.length; x++) {
                    //create list items for the results
                    let li = `<li>${response.data[x].title}</li>`
                    ul += li;
                }
                //display the results
                $('.equipments-search-results').html(ul).css({'display':'block'});
            }
        })
    }else{
        //delete any response 
        $('.equipments-search-results').html('').css({'display':'none'});
    }
});
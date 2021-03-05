let chatInput = document.querySelector('#chatInput');
let btnSend = document.querySelector('#btnSend');
let users = document.querySelectorAll("ul.users li");
//prevent default action of form submission
document.querySelector('#formSendChat').addEventListener('submit',(e)=>{
    e.preventDefault();
    btnSend.click();
    clearInput();
});
//clearing the message box
function clearInput(){
    return chatInput.value='';
}
//scroll to last chat
function scrollToLastChat(){
 document.querySelector('.messages').scrollTo(0, 1e10);
}

//add chat into the chats before sending to the server
function appendChat(chatInput){
let chat = document.createElement('li');
chat.classList.add('message');
chat.classList.add('message-receiver');
chat.innerText=chatInput;
document.querySelector('.messages').append(chat);
scrollToLastChat();
}
//setting the receiver id
function setReceiver(id){
    let receiver = document.querySelector("div.receiver").setAttribute("data-receiver",id);
}
//get receiver
function getReceiver(){
    return document.querySelector("div.receiver").getAttribute("data-receiver");
}
//set active chat
function setActive(activeUser){
document.querySelectorAll('.users li').forEach(user=>{
user.classList.remove('user-active');
});
activeUser.classList.add('user-active');
document.querySelector('.receiver-name').innerText=activeUser.innerText;
//get chats of this user
getChats(activeUser.getAttribute('data-userid'));
// scrollToLastChat();
}
//set messages
function setMessages(messages){
let li='';
for (var i = 0; i < messages.length; i++) {
    let message = messages[i];
    li +=
    `
    <li class="message message-${message.status}">${message.message}</li>
    `
}
//clear existing chats
document.querySelectorAll('.messages li').forEach(message=>message.remove());
//add the new chats
document.querySelector('.messages').innerHTML=li;
}

//send message
function sendMessage(receiver, messageContent){
    let message = new FormData();
    message.append('message',messageContent);
    message.append('receiver',receiver);
    fetch('processSendChats.php', {
        method: 'POST',
        body: message
        
    }).then(response=>response.text())
    .then(response=>{
        console.log(response);
        clearInput();
    }).catch(err=>console.log(err));
}

//set user as receiver on click
for (let x = 0; x < users.length; x++) {
    const user = users[x];
    let userId = user.getAttribute("data-userId");
    user.addEventListener('click',()=>{
        setActive(user);
        setReceiver(userId);
    })
    
}

btnSend.addEventListener('click', ()=>{
    let receiver = document.querySelector('div.receiver').getAttribute("data-receiver");
    appendChat(chatInput.value);
    sendMessage(receiver, chatInput.value);
});

//auto load chat messages
function getChats(receiver){
    fetch('processGetChats.php?receiver='+receiver)
    .then(response=>response.json()).then(messages=>{
        setMessages(messages);
    }).catch(err=>console.log(err));
}
//set the first contact as the receiver on document load
window.addEventListener('DOMContentLoaded',()=>{
let receiverInitial = document.querySelectorAll('.users li')[0];
let receiverInitialId = receiverInitial.getAttribute('data-userId');
setReceiver(receiverInitialId);
setActive(receiverInitial);
})

//auto fetch messages for active user
let activeUser = null;
setInterval(()=>{
activeUser = document.querySelector('.users > .user-active ');
setActive(activeUser);
}, 1500)
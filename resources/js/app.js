import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


const { default: axios } = require('axios');

const form = document.getElementById('form');
const input_message = document.getElementById('input-message');
form.addEventListener('submit', function(event){
    event.preventDefault();
    const user_input = input_message.value;
    // send http request
    axios.post('/chat-message', {
        message: user_input
    })
});

const event_channel = Echo.channel('public.chat.1');

// listen to chat-message event
event_channel.subscribed(() => {
    console.log('subcribed!');
}).listen('.chat-message', (event) => {
    console.log(event); // with this, it will render the data that event publish, which is ['message' => $message]
});
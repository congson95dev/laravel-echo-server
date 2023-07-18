const { default: axios } = require('axios');

require('./bootstrap');

const channel = Echo.channel('public.playground.1');

// listen() will hear the event name, but we already set it by alias "playground", so we need to add a dot before the event alias name
// which now it will become listen(".playground")
channel.subscribed(() => {
    console.log('subcribed!');
}).listen('.playground', (event) => {
    console.log(event); // with this, it will render the data that event publish, which is ['test' => 'helloworld']
});

// ================================================

// handle form for "chat message"
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


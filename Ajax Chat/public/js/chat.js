document.addEventListener('DOMContentLoaded', function () {
    const chatWrapper = document.getElementById('chat-wrapper');
    const userId = chatWrapper.dataset.userId;
    const imagePath = chatWrapper.dataset.imagePath;
    const audioPath = chatWrapper.dataset.audioPath;
    const messagesContainer = document.getElementById('messages-container');
    const chatForm = document.getElementById('chat-form');
    const textarea = document.getElementById('myTextarea');

    function scrollToBottom() {
        const chatBody = document.getElementById('chat-body');
        chatBody.scrollTop = chatBody.scrollHeight;
    }

    scrollToBottom();

    function showMessages() {
        fetch('/get-messages')
            .then(response => response.json())
            .then(data => {
                messagesContainer.innerHTML = ''; // Limpa o container
                data.messages.forEach(message => {
                    const messageDiv = document.createElement('div');
                    messageDiv.className = `rounded p-2 mb-2 ${message.user_id == userId ? 'bg-success text-light' : 'bg-secondary text-light'}`;
                    messageDiv.style.maxWidth = '60%';
                    messageDiv.style.alignSelf = message.user_id == userId ? 'flex-end' : 'flex-start';

                    const messageContent = message.mesage ? message.mesage.replace(/\n/g, '<br>') : '';
                    messageDiv.innerHTML = `${messageContent}`;

                    if (message.image) {
                        const img = document.createElement('img');
                        img.src = `${imagePath}/${message.image}`;
                        img.alt = 'Image';
                        img.className = 'img-fluid mt-2';
                        messageDiv.appendChild(img);
                    }

                    if (message.audio) {
                        const audio = document.createElement('audio');
                        audio.controls = true;
                        audio.className = 'mt-2';
                        const source = document.createElement('source');
                        source.src = `${audioPath}/${message.audio}`;
                        source.type = 'audio/mpeg';
                        audio.appendChild(source);
                        audio.appendChild(document.createTextNode('Your browser does not support the audio element.'));
                        messageDiv.appendChild(audio);
                    }

                    messagesContainer.appendChild(messageDiv);
                });
            })
            .catch(error => console.error('Error fetching messages:', error));
    }

    chatForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(chatForm);
        fetch('/send-message/' + userId, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.errors) {
                console.error('Validation errors:', data.errors);
            } else {
                textarea.value = ''; // Limpa o campo de texto
                showMessages(); // Atualiza as mensagens
            }
        })
        .catch(error => console.error('Error sending message:', error));
        document.getElementById('myTextarea').focus();
    });

    function scrollToBottom() {
        const chatBody = document.getElementById('chat-body');
        chatBody.scrollTop = chatBody.scrollHeight;
    }

    setInterval(scrollToBottom);
    setInterval(showMessages, 5000);
    showMessages();
    scrollToBottom();
});

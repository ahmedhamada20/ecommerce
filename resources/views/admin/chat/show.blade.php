<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Firebase Chat</title>
    <script src="https://www.gstatic.com/firebasejs/9.1.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.1.1/firebase-database.js"></script>
</head>
<body>
    <div id="messages"></div>

    <input type="text" id="message" placeholder="Type your message">
    <button onclick="sendMessage()">Send</button>

    <script>
        // Firebase configuration (get this from your Firebase console)
        const firebaseConfig = {
            apiKey: 'YOUR_API_KEY',
            authDomain: 'YOUR_AUTH_DOMAIN',
            databaseURL: 'YOUR_DATABASE_URL',
            projectId: 'YOUR_PROJECT_ID',
            storageBucket: 'YOUR_STORAGE_BUCKET',
            messagingSenderId: 'YOUR_MESSAGING_SENDER_ID',
            appId: 'YOUR_APP_ID'
        };

        // Initialize Firebase
        const app = firebase.initializeApp(firebaseConfig);
        const database = firebase.database(app);
        const chatId = '{{$chatId}}'; // This will be dynamically passed from Laravel

        // Real-time listener for messages
        database.ref('chats/' + chatId).on('child_added', function(snapshot) {
            const message = snapshot.val();
            const messagesDiv = document.getElementById('messages');
            messagesDiv.innerHTML += `<p>${message.message} <span>(${message.timestamp})</span></p>`;
        });

        function sendMessage() {
            const messageInput = document.getElementById('message');
            const message = messageInput.value;

            if (message) {
                database.ref('chats/' + chatId).push({
                    message: message,
                    timestamp: new Date().toISOString()
                });

                messageInput.value = ''; // Clear input field
            }
        }
    </script>
</body>
</html>

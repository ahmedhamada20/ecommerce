<?php

namespace App\Services;
use Kreait\Firebase\Database;

class FirebaseService
{
    protected $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    // Store a message to Firebase
    public function storeMessage($chatId, $message)
    {
        $ref = $this->database->getReference('chats/' . $chatId);
        $newMessage = [
            'message' => $message,
            'timestamp' => now()->toDateTimeString(),
        ];
        $ref->push($newMessage);
    }

    // Get messages from a chat
    public function getMessages($chatId)
    {
        $ref = $this->database->getReference('chats/' . $chatId);
        return $ref->getValue();
    }
}

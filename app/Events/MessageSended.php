<?php

namespace App\Events;

use App\Message;
use App\Salon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSended implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Message $message;
    /**
     * Create a new event instance.
     *
     * @param Message $message
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('salon.'.$this->message->salon_id);
    }

    public function broadcastWith(){
        $files = $this->message->files();
        $events = $this->message->events();

        return [
            'id' => $this->message->id,
            'sender_id' => $this->message->user_id,
            'room_id' => $this->message->salon_id,
            'text' => $this->message->content,
            'date' => $this->message->created_at,
            'files' => $files,
            'events' => $events,
        ];
    }
}

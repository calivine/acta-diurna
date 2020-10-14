<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FileUploadSuccess
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $filename;
    public $hash;
    public $tags;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(String $filename, String $hash, Array $tags)
    {
        $this->filename = $filename;
        $this->hash = $hash;
        $this->tags = $tags;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}

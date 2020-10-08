<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FinishedUploadingChunks
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $path;
    public $path_to_thumb;
    public $path_to_gif;
    public $size;
    public $filename;
    public $hash;
    public $width;
    public $height;
    public $fps;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Array $file_paths, String $file_name, String $file_id, Array $file_attributes)
    {
        $this->path = $file_paths['file'];
        $this->path_to_thumb = $file_paths['thumbnail'];
        $this->path_to_gif = $file_paths['gif'];
        $this->size = $file_attributes['size'];
        $this->filename = $file_name;
        $this->hash = $file_id;
        $this->width = $file_attributes['width'];
        $this->height = $file_attributes['height'];
        $this->fps = $file_attributes['fps'];
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

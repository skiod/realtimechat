<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use \Carbon\Carbon;
class SendMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    protected $user;
    protected $msg;
    public function __construct($user,$msg)
    {
        $this->user = $user;
        $this->msg = $msg;
        \Log::info('__construct ..');
    }
    
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        \Log::info('___ broadcastOn');
        // return new Channel('test');
        return new PresenceChannel('chat');
    }

    public function broadcastWith()
    {
        return [
            'data' => $this->msg,
            'user' => $this->user,
            'time' => Carbon::today()->toDateString()
        ];
    }

}

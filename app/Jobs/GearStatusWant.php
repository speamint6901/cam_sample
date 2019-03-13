<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Gear;

class GearStatusWant implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $gear;
    protected $user;
    protected $type;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Gear $gear, $user, $type)
    {
        $this->gear = $gear;
        $this->user = $user;
        $this->type = $type;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // タイプ(足すor引く)で切り替え
        if ($this->type) {
            $this->gear->want_users()->sync([$this->user->id => ['type' => 'want']]);
        } else {
            $this->gear->want_users()->detach($this->user->id);
        }

        // カウント更新
        /*
        $this->gear->profile->want_count = $this->gear->want_users()->count();
        $this->gear->push();
        */
    }
}

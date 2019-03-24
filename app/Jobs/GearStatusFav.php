<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Gear;
use App\Models\GearProfile;

class GearStatusFav implements ShouldQueue
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
        \DB::beginTransaction();
        try {
            if ($this->type == "detach") {
                $this->gear->fav_users()->detach($this->user->id);
            } else {
                $this->gear->fav_users()->sync([$this->user->id => ['type' => 'fav']]);
            }

            // カウント更新
            $this->gear->profile->fav_count = $this->gear->fav_users()->count();
            $this->gear->push();
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            abort(500);
        }
    }
}

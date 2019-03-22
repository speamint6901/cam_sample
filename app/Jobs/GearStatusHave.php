<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Gear;
use App\Models\GearProfile;

class GearStatusHave implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $gear;
    protected $user;
    protected $params;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Gear $gear, $user, $params)
    {
        $this->gear = $gear;
        $this->user = $user;
        $this->params = $params;
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
            if ($this->params['type']) {
                $this->gear->have_users()->detach($this->user->id);
            } else {
                $this->gear->have_users()->sync([$this->user->id => 
                    [
                        'type' => 'have',
                        'have_comment' => isset($this->params['comment']) ? $this->params['comment'] : null,
                        'point' => isset($this->params['rating']) ? $this->params['rating'] : null,
                    ]
                ]);
            }

            // カウント更新
            if (!$this->gear->have_users()->count()) {
                $this->gear->profile->have_count = $this->gear->have_users()->count();
                $this->gear->push();
            }
            \DB::commit();

        } catch (\Exception $e) {
            \DB::rollback();
            throw $e;
            //abort(500);
        }
    }
}

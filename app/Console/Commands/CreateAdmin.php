<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'admin new create';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $name = $this->ask('名前を入力して下さい');
        $email = $this->ask('emailを入力して下さい');

        if (Admin::where('email', $email)->get()->count()) {
            $this->info('このメールアドレスは既に登録されています');
            return;
        }

        $password = $this->secret('パスワードを入力して下さい');

        $plac = Admin::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info('アカウントを作成しました');
    }
}

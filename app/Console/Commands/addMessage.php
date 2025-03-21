<?php

namespace App\Console\Commands;

use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Console\Command;

class addMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'message:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Guk guk mesajı';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currentTime = Carbon::now()->format('H:i'); // Geçerli tarih ve saat

        Message::create([
            'user_id' => 1, // Buraya mesajı atacak kullanıcının ID'sini yazın
            'message' => 'guk guk! saat '.$currentTime,
        ]);

        $this->info("Mesaj eklendi: {$currentTime}");
    }
}

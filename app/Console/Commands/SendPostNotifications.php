<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewPostNotification;
use App\Models\Website;
use App\Models\Post;
use App\Models\PostNotification;
use Illuminate\Database\Query\Builder;

class SendPostNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:post-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email notifications to subscribers for new posts.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $websites = Website::with([
            'posts.users', 'users'
        ])->get();

        foreach ($websites as $website) {
            foreach ($website->posts as $post) {
                foreach ($website->users as $user) {
                    if (!$post->users->contains($user)) {
                        Mail::to($user->email)->queue(new NewPostNotification($post));
                        $post->users()->attach($user);
                    }
                }
            }
        }

        $this->info('Post notification mail being send in the background');
    }
}

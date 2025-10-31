<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Activitylog\Models\Activity;

class TestActivityLogCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:activity-log';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test the activity log functionality with User model';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Testing Activity Log...');

        // Find or create a test user
        $user = User::firstOrCreate(
            ['email' => 'test_' . bin2hex(random_bytes(4)) . '@example.com'],
            ['name' => 'Test User e', 'password' => bcrypt(bin2hex(random_bytes(8)))]
        );

        // Update the user to trigger activity logging
        $oldName = $user->name;
        $user->name = 'Updated Test User';
        $user->save();

        $this->info("User name updated from '{$oldName}' to '{$user->name}'");

        // Get the latest activity
        $latestActivity = Activity::latest()->first();

        if ($latestActivity) {
            $this->info('Activity log created successfully:');
            $this->table(
                ['ID', 'Log Name', 'Description', 'Subject Type', 'Subject ID', 'Causer Type', 'Properties'],
                [
                    [
                        $latestActivity->id,
                        $latestActivity->log_name,
                        $latestActivity->description,
                        $latestActivity->subject_type,
                        $latestActivity->subject_id,
                        $latestActivity->causer_type,
                        json_encode($latestActivity->properties->toArray(), JSON_PRETTY_PRINT)
                    ]
                ]
            );

            $this->info('Activity log is working correctly!');
        } else {
            $this->error('No activity was logged. Please check your configuration.');
        }
    }
}

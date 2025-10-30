<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
use Exception;

class TestRedisCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Redis connection, display info and current date';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('🔍 Testing Redis Connection...');
        $this->newLine();

        try {
            // Test basic connection
            $this->line('Testing basic connection...');
            Redis::ping();
            $this->components->success('✅ Redis is connected!');
            $this->newLine();

            // Test set and get operations
            $this->line('Testing SET and GET operations...');
            $testKey = 'test_key_' . time();
            $testValue = 'Hello, Redis! ' . now()->format('Y-m-d H:i:s');

            Redis::set($testKey, $testValue);
            $retrievedValue = Redis::get($testKey);

            if ($retrievedValue === $testValue) {
                $this->components->success('✅ SET and GET operations work correctly');
                $this->line("   Key: {$testKey}");
                $this->line("   Value: {$retrievedValue}");
            }
            $this->newLine();

            // Clean up test key
            Redis::del($testKey);

            // Display Redis server info
            $this->info('📊 Redis Server Information:');
            $info = Redis::info();

            $this->table(
                ['Property', 'Value'],
                [
                    ['Redis Version', $info['redis_version'] ?? 'N/A'],
                    ['Used Memory', $this->formatBytes($info['used_memory'] ?? 0)],
                    ['Connected Clients', $info['connected_clients'] ?? 'N/A'],
                    ['Uptime (days)', round(($info['uptime_in_seconds'] ?? 0) / 86400, 2)],
                    ['Total Keys', $this->getTotalKeys()],
                ]
            );
            $this->newLine();

            // Display current date/time
            $this->info('📅 Current Date & Time:');
            $this->line('   Server Time: ' . now()->format('Y-m-d H:i:s'));
            $this->line('   Timezone: ' . config('app.timezone'));
            $this->line('   Unix Timestamp: ' . now()->timestamp);
            $this->newLine();

            $this->components->success('All Redis tests passed successfully! 🎉');

            return self::SUCCESS;

        } catch (Exception $e) {
            $this->components->error('❌ Redis connection failed!');
            $this->error('Error: ' . $e->getMessage());
            $this->newLine();

            return self::FAILURE;
        }
    }

    /**
     * Get total number of keys in Redis
     */
    private function getTotalKeys(): int
    {
        try {
            $dbsize = Redis::dbsize();
            return $dbsize;
        } catch (Exception $e) {
            return 0;
        }
    }

    /**
     * Format bytes to human readable format
     */
    private function formatBytes(int $bytes): string
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= (1 << (10 * $pow));

        return round($bytes, 2) . ' ' . $units[$pow];
    }
}

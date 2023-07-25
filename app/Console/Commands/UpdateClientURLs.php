<?php

namespace App\Console\Commands;

use App\Models\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class UpdateClientURLs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-client-u-r-ls';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get all existing clients
        $clients = Client::all();

        foreach ($clients as $client) {
            // Check if the client URL is empty or null
            if (empty($client->url)) {
                // Generate a slug from the client's name
                $slug = Str::slug($client->name, '-');

                // Append a random string to the slug for uniqueness
                $client->url = $slug . '-' . Str::random(4);

                // Save the updated client record
                $client->save();
            }
        }

        $this->info('Client URLs have been updated successfully.');
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ImportOuiDataCommand extends Command
{
    protected $signature = 'import:oui';

    protected $description = 'Import the latest version of the IEEE OUI data into the database';

    protected $connection = 'mysql'; // Specify the MySQL connection

    public function handle()
    {
        $handle = fopen('http://standards-oui.ieee.org/oui/oui.csv', 'r');

        // Skip the first row (headers)
        fgetcsv($handle);

        // Truncate the table to remove existing records
        DB::table('oui_data')->truncate();

        while (($fields = fgetcsv($handle)) !== false) {
            $registry = $fields[0];
            $assignment = $fields[1];
            $organizationName = $fields[2];
            $organizationAddress = isset($fields[3]) ? $fields[3] : '';

            // Insert the data into the MySQL table
            DB::table('oui_data')->insert([
                'Registry' => $registry,
                'Assignment' => $assignment,
                'OrganizationName' => $organizationName,
                'OrganizationAddress' => $organizationAddress,
            ]);
        }

        fclose($handle);

        $this->info('OUI data imported successfully.');
    }
}

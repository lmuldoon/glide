<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\OuiData;

class MacLookupController extends Controller
{
    public function lookup(Request $request)
    {
        // Retrieve the MAC addresses from the request
        $macAddresses = $request->input('mac_addresses');

        $macAddresses = strtoupper($macAddresses);
        
        // Ensure at least one MAC address is provided
        if (empty($macAddresses)) {
            return response()->json(['error' => 'At least one MAC address is required.'], 400);
        }
        // Split MAC addresses into an array
        $macAddresses = explode(',', $macAddresses);

        // Normalize MAC addresses to uppercase and remove any special characters
        $macAddresses = preg_replace('/[^A-Za-z0-9]/', '', $macAddresses);
        
        // Prepare the response array
        $response = [];

        // Retrieve the vendors for the given MAC addresses from the database
        foreach ($macAddresses as $macAddress) {
            $assignment = substr($macAddress, 0, 6); // Extract the first 6 characters from the MAC address
            $vendor = OuiData::where('Assignment', $assignment)
                ->pluck('OrganizationName')
                ->first();

            // If the vendor is not found, set a default value
            if (!$vendor) {
                $vendor = 'Vendor not found';
            }

            // Add the MAC address and vendor to the response array
            $response[] = [
                'mac_address' => $macAddress,
                'vendor' => $vendor,
            ];
        }

        return response()->json($response);
    }
}

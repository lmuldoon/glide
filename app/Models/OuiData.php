<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OuiData extends Model
{
    protected $table = 'oui_data';

    protected $fillable = [
        'Registry',
        'Assignment',
        'OrganizationName',
        'OrganizationAddress',
    ];
    
    // Add any additional model configuration or relationships here
}
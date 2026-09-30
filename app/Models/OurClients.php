<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurClients extends Model
{
    use HasFactory;
    protected $table = 'our_clients';
    protected $primarykey = 'id';
}

<?php

namespace App\Models;

use Database\Seeders\Category as SeedersCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    use HasFactory;

    public function run(): void
    {
        $this->call(SeedersCategory::class);
    }
}

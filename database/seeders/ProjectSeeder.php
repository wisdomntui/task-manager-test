<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $projects = [
            ['name' => 'Project Alpha', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Project Beta', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Project Gamma', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Project Delta', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Project Epsilon', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Project Zeta', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Project Eta', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Project Theta', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Project Iota', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Project Kappa', 'created_at' => now(), 'updated_at' => now()],
        ];

        Project::insert($projects);
    }
}

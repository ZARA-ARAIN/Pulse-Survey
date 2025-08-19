<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder {
    public function run() {
        Department::create(['name' => 'General']);
        Department::create(['name' => 'HR']);
        Department::create(['name' => 'IT']);
    }
}

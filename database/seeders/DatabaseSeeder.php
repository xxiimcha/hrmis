<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Department;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Department::insert([
            [ 'name' => 'OFFICE OF THE MUNICIPAL MAYOR' ],
            [ 'name' => 'OFFICE OF THE MUNICIPAL MAYOR (HOTEL OPERATION)' ],
            [ 'name' => 'OFFICE OF THE MUNICIPAL MAYOR (CIVIL SERVICE SECURITY UNIT)' ],
            [ 'name' => 'HUMAN RESOURCE MANAGEMENT OFFICE (HRMO)' ],
            [ 'name' => 'MUNICIPAL GENERAL SERVICES OFFICE (MGSO)' ],
            [ 'name' => 'MUNICIPAL ENVIRONMENTAL & NATURAL RESOURCES, OFFICE (MENRO)' ],
            [ 'name' => 'MUNICIPAL ENGINEERING OFFICE (MEO)' ],
            [ 'name' => 'MUNICIPAL CIVIL REGISTRAR OFFICE (MCRO)' ],
            [ 'name' => 'MUNICIPAL PLANNING & DEVELOPMENT OFFICE (MPDO)' ],
            [ 'name' => 'MUNICIPAL ACCOUNTANT OFFICE (MAO)' ],
            [ 'name' => 'MUNICIPAL BUDGET OFFICE (MIBO)' ],
            [ 'name' => 'MUNICIPAL ASSESSOR\'S OFFICE (MAO)' ],
            [ 'name' => 'MUNICIPAL TREASURER\'S OFFICE (MTC)' ],
            [ 'name' => 'SANGGUNIANG BAYAN (SECRETARY TO THE SANGGUNIANG BAYAN)' ],
            [ 'name' => 'MUNICIPAL HEALTH OFFICE (MHO)' ],
            [ 'name' => 'MUNICIPAL DISASTER RISK REDUCTION MANAGEMENT OFFICE (MORRMO)' ],
            [ 'name' => 'MUNICIPAL SOCIAL WELFARE & DEVELOPMENT OFFICE (MSWRO)' ],
            [ 'name' => 'MUNICIPAL AGRICULTURE\'S OFFICE' ],
            [ 'name' => 'MARKET OPERATIONS OFFICE' ],
            [ 'name' => 'SLAUGHTERHOUSE OPERATION\'S UNIT' ],
            [ 'name' => 'BUS TERMINAL & WHARF OPERATION' ],
        ]);

        $this->call([
            PhilippineBarangaysTableSeeder::class,
            PhilippineCitiesTableSeeder::class,
            PhilippineProvincesTableSeeder::class,
            PhilippineRegionsTableSeeder::class,
        ]);
    }
}

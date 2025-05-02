<?php

namespace Database\Seeders;

use App\Models\Access;
use App\Models\Acesso;
use App\Models\Address;
use App\Models\Municipality;
use App\Models\Province;
use App\Models\User;
use Database\Factories\AcessoFactory;
use Database\Factories\UserFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create access type
        $this->create_type_access("admin");
        $this->create_type_access("atendente");
        $this->create_type_access("supervisor");
        $this->create_type_access("cozinheiro");
        $this->create_type_access("cliente");

        // Create province 
        $this->create_province("Luanda");
        $this->create_province("Huambo");
        $this->create_province("Bié");
        $this->create_province("Záire");

        // Create municipality 
        $this->create_municipality("Cacuaco", 1);
        $this->create_municipality("Cazenga", 1);
        $this->create_municipality("Viana", 1);
        $this->create_municipality("Belas", 1);

        // Create address 
        $this->create_address("Talatona");

        // Create admin 
        $this->create_admin();
    }

    public function create_type_access($desc){
        Access::create([
            "description" => $desc
        ]);
    }

    public function create_province($desc){
        Province::create([
            "description" => $desc,
        ]);
    }

    public function create_municipality($desc, $province_id){
        Municipality::create([
            "description" => $desc,
            "province_id" => $province_id,
        ]);
    }
    
    public function create_address($desc){
        Address::create([
            "description" => $desc,
            "province_id" => 1,
            "municipality_id" => 1,
        ]);
    }

    public function create_admin(){
        User::create([
            "first_name" => "User",
            "last_name" => "Admin",
            'email' => "admin@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            "gender" => "Masculino",
            "birth_date" => "1990-04-02",
            "nif" => "123456789LA123",
            "address_id" => 1,
            "phone" => 911111111,
            "access_id" => 1
        ]);
    }
}

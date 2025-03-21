<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::create(['name' => 'Admin']);
        $clientRole = Role::create(['name' => 'Client']);

        
        $manageProducts = Permission::create(['name' => 'Gérer les produits']);
        $manageOrders = Permission::create(['name' => 'Gérer les commandes']);
        $viewStats = Permission::create(['name' => 'Voir les statistiques']);
        $placeOrders = Permission::create(['name' => 'Passer des commandes']);

      
        $adminRole->permissions()->attach([$manageProducts->id, $manageOrders->id, $viewStats->id]);
        $clientRole->permissions()->attach([$placeOrders->id]);

       
        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        
        $adminUser->roles()->attach($adminRole->id);

        $clientUser = User::create([
            'name' => 'Client User',
            'email' => 'client@example.com',
            'password' => Hash::make('password'), 
        ]);

        
        $clientUser->roles()->attach($clientRole->id);
    }
}
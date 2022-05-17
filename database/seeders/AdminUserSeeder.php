<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\User;
  
class AdminUserSeeder extends Seeder
{

    public function run()
    {

        $user    = User::create([
                                    'name'          => 'Sharjeel Ghouri',
                                    'email'         => 'sharjeel@gmail.com',
                                    'password'      => bcrypt('rootroot'),
                                ]);
    }
}
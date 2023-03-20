<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Masyarakat;
use App\Models\Petugas;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Petugas::create([
 
            'nama_petugas' => 'Joni',
            'username' => 'jonoJoni',
            'password' => Hash::make('Password'),
            'telp' => '085123456789',
            'level' => 'admin',
        ]);
        Petugas::create([

            'nama_petugas' => 'Bowo',
            'username' => 'bowoBowi',
            'password' => Hash::make('Password'),
            'telp' => '085123456789',
            'level' => 'admin',
        ]);
        Petugas::create([

            'nama_petugas' => 'Miko',
            'username' => 'mikaMiko',
            'password' => Hash::make('Password'),
            'telp' => '085123456789',
            'level' => 'admin',
        ]);
        Petugas::create([

            'nama_petugas' => 'Disa',
            'username' => 'disaDes',
            'password' => Hash::make('Password'),
            'telp' => '085123456789',
            'level' => 'petugas',
        ]);
        Petugas::create([

            'nama_petugas' => 'Cole',
            'username' => 'colaCole',
            'password' => Hash::make('Password'),
            'telp' => '085123456789',
            'level' => 'petugas',
        ]);
        Petugas::create([

            'nama_petugas' => 'Keisa',
            'username' => 'keisaKeisi',
            'password' => Hash::make('Password'),
            'telp' => '085123456789',
            'level' => 'petugas',
        ]);

        masyarakat::create([
            'nik'=> '123456789',
            'nama'=> 'Budianto',
            'username'=> 'budiBud',
            'password'=> Hash::make('Password'),
            'telp'=> '0852123456',
        ]);
        
        Masyarakat::create([
            'nik'=> '456789123',
            'nama'=> 'Makima',
            'username'=> 'makiMa',
            'password'=> Hash::make('Password'),
            'telp'=> '0852789456',
        ]);

        Masyarakat::create([
            'nik'=> '789456123',
            'nama'=> 'ani',
            'username'=> 'anuani',
            'password'=> Hash::make('Password'),
            'telp'=> '0852456123',
        ]);
    }
}
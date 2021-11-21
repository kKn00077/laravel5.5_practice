<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 어떤 시더를 호출할 것인지에 대한 정의
        $this->call([
            UserSeeder::class,
        ]);
        
    }
}

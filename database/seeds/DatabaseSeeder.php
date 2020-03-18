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
        // La creación de datos de roles debe ejecutarse primero
        //$this->call(RoleTableSeeder::class);
        //factory(App\Proveedor::class,50)->create();
        //$this->call(RentaTableSeeder::class);
        //$this->call(EmpleadoSeeder::class);

        //$this->call(ContribuyentesTableSeeder::class);
        $this->call(InmuebleTableSeeder::class); 
        //factory(App\Contribuyente::class,50)->create();
        //factory(App\Inmueble::class,50)->create();
               
    }
}

<?php

use Illuminate\Database\Seeder;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('instalations')->insert([
        	'id' => 1,
            'description' => 'Supensión Aérea',
        ]);


        DB::table('instalations')->insert([
        	'id' => 2,
            'description' => 'Piso Falso',
        ]);


        DB::table('instalations')->insert([
        	'id' => 3,
            'description' => 'Pared',
        ]);

    	DB::table('products')->insert([
    		'id' => 1,
            'code' => 'CT-010',
            'description' => 'Escalerilla PTM(0.05m x 0.10m x 2.4m)',
            'unit' => 'm',
            'width' => 0.10,
            'long' => 2.4,
            'type' => 1,
            'photo' => 'CT-010.jpg',
        ]);

        DB::table('products')->insert([
        	'id' => 2,
            'code' => 'CT-015',
            'description' => 'Escalerilla PTM(0.05m x 0.15m x 2.4m)',
            'unit' => 'm',
            'width' => 0.15,
            'long' => 2.4,
            'type' => 1,
            'photo' => 'CT-015.jpg',
        ]);

        DB::table('products')->insert([
        	'id' => 3,
            'code' => 'CT-020',
            'description' => 'Escalerilla PTM(0.05m x 0.20m x 2.4m)',
            'unit' => 'm',
            'width' => 0.20,
            'long' => 2.4,
            'type' => 1,
            'photo' => 'CT-020.jpg',
        ]);

        DB::table('products')->insert([
        	'id' => 4,
            'code' => 'CT-030',
            'description' => 'Escalerilla PTM(0.05m x 0.30m x 2.4m)',
            'unit' => 'm',
            'width' => 0.30,
            'long' => 2.4,
            'type' => 1,
            'photo' => 'CT-030.jpg',
        ]);

        DB::table('products')->insert([
        	'id' => 5,
            'code' => 'CT-040',
            'description' => 'Escalerilla PTM(0.05m x 0.40m x 2.4m)',
            'unit' => 'm',
            'width' => 0.40,
            'long' => 2.4,
            'type' => 1,
            'photo' => 'CT-040.jpg',
        ]);

        DB::table('products')->insert([
        	'id' => 6,
            'code' => 'CT-CDA',
            'description' => 'Cascada o llegada de cable a rack',
            'unit' => 'Piezas',
            'count' => 1,
            'type' => 2,
            'photo' => 'CT-CDA.jpg',
        ]);

        DB::table('products')->insert([
        	'id' => 7,
            'code' => 'CT-RE3/8',
            'description' => 'Ramplus expansible 3/8',
            'unit' => 'Piezas',
            'count' => 1,
            'type' => 3,
            'photo' => 'CT-RE38.jpg',
        ]);

        DB::table('products')->insert([
        	'id' => 8,
            'code' => 'CT-BR3/8',
            'description' => 'Barra roscada 3/8 2m',
            'unit' => '2m 3/8',
            'count' => 1,
            'type' => 3,
            'photo' => 'CT-BR38.jpg',
        ]);


        DB::table('products')->insert([
        	'id' => 9,
            'code' => 'CT-A3/8',
            'description' => 'Arandela estructural 3/8',
            'unit' => 'Piezas',
            'count' => 1,
            'type' => 3,
            'photo' => 'CT-A38.jpg',
        ]);


        DB::table('products')->insert([
        	'id' => 10,
            'code' => 'CT-BP',
            'description' => 'Barra perforadora para curvas de 90°',
            'unit' => '',
            'count' => 1,
            'type' => 3,
            'photo' => 'CT-BP.jpg',
        ]);


        DB::table('accesories')->insert([
        	'id' => 1,
            'code' => 'CT-KKTCF',
            'description' => 'Kit de Klema Cablotech',
            'unit' => 'KIT',
            'photo' => 'CT-KKTCF.jpg',
            'type' => 1,
        ]);


        DB::table('accesories')->insert([
        	'id' => 2,
            'code' => 'CT-FCC',
            'description' => 'Faslock o cierre de curva',
            'unit' => 'Piezas',
            'photo' => 'CT-FCC.jpg',
            'type' => 2,
        ]);


        DB::table('accesories')->insert([
        	'id' => 3,
            'code' => 'CT-CCG',
            'description' => 'Clema cuadrada grande',
            'unit' => 'Piezas',
            'photo' => 'CT-CCG.jpg',
            'type' => 1,
        ]);


        DB::table('accesories')->insert([
        	'id' => 4,
            'code' => 'CT-GSA',
            'description' => 'Grapa de suspension aerea',
            'unit' => 'Piezas',
            'photo' => 'CT-GSA.jpg',
            'type' => 1,
        ]);


        DB::table('accesories')->insert([
        	'id' => 5,
            'code' => 'CT-T3/8',
            'description' => 'Tuerca estructural 3/8',
            'unit' => 'Piezas',
            'photo' => 'CT-T38.jpg',
            'type' => 1,
        ]);


        DB::table('accesories')->insert([
        	'id' => 6,
            'code' => 'CT-T3/8',
            'description' => 'Tuerca estructural 3/8',
            'unit' => 'Piezas',
            'photo' => 'CT-T38.jpg',
            'type' => 1,
        ]);
        
        DB::table('accesories')->insert([
        	'id' => 7,
            'code' => 'CT-PU',
            'description' => 'Perfil Unistrut Liviano',
            'unit' => 'Piezas',
            'photo' => 'CT-PU.jpg',
            'type' => 1,
        ]);


        DB::table('calculations')->insert([
            'position' => 0,
            'count' => 2,
            'type_relation' => 1,
            'count_product' => 1.6,
            'accesory_id' => 1,
        ]);

        DB::table('calculations')->insert([
            'position' => 0,
            'count' => 3,
            'type_relation' => 2,
            'count_product' => 1,
            'accesory_id' => 2,
        ]);

        DB::table('calculations')->insert([
            'position' => 0,
            'count' => 2,
            'type_relation' => 1,
            'count_product' => 1.6,
            'accesory_id' => 3,
        ]);

        DB::table('calculations')->insert([
            'position' => 0,
            'count' => 2,
            'type_relation' => 1,
            'count_product' => 1.6,
            'accesory_id' => 4,
        ]);

        DB::table('calculations')->insert([
            'position' => 0,
            'count' => 4,
            'type_relation' => 1,
            'count_product' => 1.6,
            'accesory_id' => 5,
        ]);

        DB::table('calculations')->insert([
            'position' => 0,
            'count' => 2,
            'type_relation' => 1,
            'count_product' => 1.6,
            'accesory_id' => 6,
        ]);

        DB::table('calculations')->insert([
            'position' => 0,
            'count' => 1,
            'type_relation' => 4,
            'count_product' => 1.6,
            'accesory_id' => 7,
        ]);

        DB::table('calculations')->insert([
            'position' => 1,
            'count' => 1,
            'type_relation' => 3,
            'count_product' => 16,
            'accesory_id' => 7,
            'product_condition_id' => 1
        ]);


        DB::table('calculations')->insert([
            'position' => 1,
            'count' => 1,
            'type_relation' => 3,
            'count_product' => 12,
            'accesory_id' => 7,
            'product_condition_id' => 2
        ]);


        DB::table('calculations')->insert([
            'position' => 1,
            'count' => 1,
            'type_relation' => 3,
            'count_product' => 9,
            'accesory_id' => 7,
            'product_condition_id' => 3
        ]);


        DB::table('calculations')->insert([
            'position' => 1,
            'count' => 1,
            'type_relation' => 3,
            'count_product' => 6,
            'accesory_id' => 7,
            'product_condition_id' => 4
        ]);


        DB::table('calculations')->insert([
            'position' => 1,
            'count' => 1,
            'type_relation' => 3,
            'count_product' => 5,
            'accesory_id' => 7,
            'product_condition_id' => 5
        ]);

        DB::table('accesory_product')->insert([
            'product_id' => 1,
            'accesory_id' => 1,
        ]);


        DB::table('accesory_product')->insert([
            'product_id' => 2,
            'accesory_id' => 1,
        ]);


        DB::table('accesory_product')->insert([
            'product_id' => 3,
            'accesory_id' => 1,
        ]);



        DB::table('accesory_product')->insert([
            'product_id' => 4,
            'accesory_id' => 1,
        ]);


        DB::table('accesory_product')->insert([
            'product_id' => 5,
            'accesory_id' => 1,
        ]);


        DB::table('accesory_product')->insert([
            'product_id' => 1,
            'accesory_id' => 3,
        ]);


        DB::table('accesory_product')->insert([
            'product_id' => 1,
            'accesory_id' => 4,
        ]);


        DB::table('accesory_product')->insert([
            'product_id' => 2,
            'accesory_id' => 4,
        ]);


        DB::table('accesory_product')->insert([
            'product_id' => 3,
            'accesory_id' => 4,
        ]);


        DB::table('accesory_product')->insert([
            'product_id' => 4,
            'accesory_id' => 4,
        ]);


        DB::table('accesory_product')->insert([
            'product_id' => 5,
            'accesory_id' => 4,
        ]);

        DB::table('accesory_product')->insert([
            'product_id' => 2,
            'accesory_id' => 5,
        ]);

        DB::table('accesory_product')->insert([
            'product_id' => 3,
            'accesory_id' => 5,
        ]);

        DB::table('accesory_product')->insert([
            'product_id' => 4,
            'accesory_id' => 5,
        ]);

        DB::table('accesory_product')->insert([
            'product_id' => 5,
            'accesory_id' => 5,
        ]);


        DB::table('accesory_product')->insert([
            'product_id' => 1,
            'accesory_id' => 6,
        ]);

        DB::table('accesory_product')->insert([
            'product_id' => 1,
            'accesory_id' => 7,
        ]);

        DB::table('accesory_product')->insert([
            'product_id' => 2,
            'accesory_id' => 7,
        ]);

        DB::table('accesory_product')->insert([
            'product_id' => 3,
            'accesory_id' => 7,
        ]);

        DB::table('accesory_product')->insert([
            'product_id' => 4,
            'accesory_id' => 7,
        ]);

        DB::table('accesory_product')->insert([
            'product_id' => 5,
            'accesory_id' => 7,
        ]);


        DB::table('accesory_instalation')->insert([
            'instalation_id' => 1,
            'accesory_id' => 1,
        ]);


        DB::table('accesory_instalation')->insert([
            'instalation_id' => 1,
            'accesory_id' => 2,
        ]);


        DB::table('accesory_instalation')->insert([
            'instalation_id' => 1,
            'accesory_id' => 3,
        ]);


        DB::table('accesory_instalation')->insert([
            'instalation_id' => 1,
            'accesory_id' => 4,
        ]);


        DB::table('accesory_instalation')->insert([
            'instalation_id' => 1,
            'accesory_id' => 5,
        ]);


        DB::table('accesory_instalation')->insert([
            'instalation_id' => 1,
            'accesory_id' => 6,
        ]);


        DB::table('accesory_instalation')->insert([
            'instalation_id' => 1,
            'accesory_id' => 7,
        ]);



        DB::table('accesory_instalation')->insert([
            'instalation_id' => 2,
            'accesory_id' => 1,
        ]);


        DB::table('accesory_instalation')->insert([
            'instalation_id' => 2,
            'accesory_id' => 2,
        ]);


        DB::table('accesory_instalation')->insert([
            'instalation_id' => 2,
            'accesory_id' => 4,
        ]);


        DB::table('accesory_instalation')->insert([
            'instalation_id' => 2,
            'accesory_id' => 7,
        ]);


        DB::table('accesory_instalation')->insert([
            'instalation_id' => 3,
            'accesory_id' => 1,
        ]);


        DB::table('accesory_instalation')->insert([
            'instalation_id' => 3,
            'accesory_id' => 2,
        ]);


        DB::table('accesory_instalation')->insert([
            'instalation_id' => 3,
            'accesory_id' => 4,
        ]);


        DB::table('accesory_instalation')->insert([
            'instalation_id' => 3,
            'accesory_id' => 7,
        ]);

    }
}

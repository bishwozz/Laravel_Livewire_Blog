<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class masterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->clean_tables();
        // $this->post();
        $this->category();
        $this->tag();
        
    }

    private function clean_tables(){

        DB::table('categories')->delete();
        DB::table('tags')->delete();
    }
    private function category()
    {
        DB::table('categories')->insert(
            [
                array('id' => 1, 'name' => 'Fashion' ),
                array('id' => 2, 'name' => 'Beauty' ),
                array('id' => 3, 'name' => 'Travel' ),
                array('id' => 4, 'name' => 'Lifestyle' ),
                array('id' => 5, 'name' => 'Tech' ),
            ]
        );
    }
    private function tag()
    {
        DB::table('tags')->insert(
            [
                array('id' => 1, 'name' => 'Sustainable fashion', 'category_id' => 1),
                array('id' => 2, 'name' => 'Street style', 'category_id' => 1),
                array('id' => 3, 'name' => 'Plus-size fashion', 'category_id' => 1 ),
                array('id' => 4, 'name' => 'Luxury fashion', 'category_id' => 1 ),

                array('id' => 5, 'name' => 'Natural beauty' , 'category_id' => 2),
                array('id' => 6, 'name' => 'Skincare specific', 'category_id' => 2),
                array('id' => 7, 'name' => 'Makeup tutorials', 'category_id' => 2),
                array('id' => 8, 'name' => 'Haircare', 'category_id' => 2),

                array('id' => 9, 'name' => 'Solo travel' , 'category_id' => 3),
                array('id' => 10, 'name' => 'Adventure travel', 'category_id' => 3),
                array('id' => 11, 'name' => 'Luxury travel', 'category_id' => 3),
                array('id' => 12, 'name' => 'Budget travel', 'category_id' => 3),

                array('id' => 13, 'name' => 'Home Decor' , 'category_id' => 4),
                array('id' => 14, 'name' => 'Parenting', 'category_id' => 4),
                array('id' => 15, 'name' => 'Minimalism', 'category_id' => 4),
                array('id' => 16, 'name' => 'Self-care', 'category_id' => 4),

                array('id' => 17, 'name' => 'Software development' , 'category_id' => 5),
                array('id' => 18, 'name' => 'Mobile apps', 'category_id' => 5),
                array('id' => 19, 'name' => 'Artificial intelligence', 'category_id' => 5),
                array('id' => 20, 'name' => 'Gadgets and devices', 'category_id' => 5),
            ]
        );
    }
}

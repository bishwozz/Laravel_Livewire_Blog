<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $this->user();
        $this->post();
        $this->category();
        $this->tag();
        
    }

    private function clean_tables(){

        DB::table('users')->delete();
        DB::table('posts')->delete();
        DB::table('categories')->delete();
        DB::table('tags')->delete();
    }

    private function user(){

        DB::table('users')->insert(
            [
                array('id' => 1, 'name' => 'ram', 'email'=>'ram@gmail.com', 'password' => Hash::make(111)),
                array('id' => 2, 'name' => 'sita', 'email'=>'sita@gmail.com', 'password' => Hash::make(111)),
            ]

        );
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

    private function post(){

        DB::table('posts')->insert(
            [
                array('id' => 1, 'content' => 'Ashleighs blog is full of advice for the regular woman to make better fashion choices, 
                    whether it is “Dressing Better With the Clothes You Have” or starting a capsule wardrobe. Along with her blog posts, she has also published e-books and has even held online webinars to help people improve their fashion sense.',
                    'title'=>'Fashion Blog',
                    'image' => "images/xycLEie07gdp9ahJVUPB81pItdBXS4bVddBHBjOq.jpg",
                    'user_id' => 1, 
                    'category_id' => 1,
                    'tag_id' =>["1","2","3","4"],
                    'created_at'=>Carbon::now()->toDateTimeString(),
                    'updated_at'=>Carbon::now()->toDateTimeString()
                ),

                array('id' => 2, 'title' => 'Beauty Blog', 'content'=>'what would the beauty world be without the best beauty blogs? On 
                    the weekend (or whenever—who are we kidding?), we love nothing more than checking out what our favorite influencers are posting, from the products they are raving about or the makeup tutorials they are loving. While makeup and skincare blogs launch all the time, we continue to go back to certain experts over and over again, whether thats because they have been pillars of the beauty community for a long time or their expert knowledge is simply unrivaled. Because it is rude not to share, we thought would let you in on the Byrdie edit of the worlds best beauty bloggers.',
                    'image' => "images/DbcUc6qcETypvZbiP19mknzQBPfGM8KFCLT2wdpf.jpg",
                    'user_id' => 1,
                    'category_id' => 2,
                    'tag_id' =>["5","6","7"],
                    'created_at'=>Carbon::now()->toDateTimeString(),
                    'updated_at'=>Carbon::now()->toDateTimeString()
                ),

                array('id' => 3, 'title' => 'Travel Blog', 'content'=>'Well we managed quite well to sleep under the mosquito netting. 
                    We actually used a light blanket because of the fan. Never did see a mosquito either. Up at 5:15 but David heard the howler monkeys while dozing before that – thought it was wind kicking up! I forgot to mention that yesterday it did thunder around us at 4ish but must have jumped over this mountain – it never rained then. Yet the weather forecasts always say it’s raining, every day. Just coffee and ½ nutrition bar before meeting Wendy at 6, though she also brought us 2 bananas. Hiked just down the road and across into the neighbor’s area, slowly and listening the entire way. The dogs came with us.',
                    'image' => "images/2FvWrAzWImQ8t33NN34Uvm2SLAppqwyAVvZ9ZVIh.jpg",
                    'user_id' => 2,
                    'category_id' => 3,
                    'tag_id' =>["9","10"],
                    'created_at'=>Carbon::now()->toDateTimeString(),
                    'updated_at'=>Carbon::now()->toDateTimeString()
                ),

                array('id' => 4, 'title' => 'Lifestyle Blog', 'content'=>'Well we managed quite well to sleep under the mosquito netting. 
                    We actually used a light blanket because of the fan. Never did see a mosquito either. Up at 5:15 but David heard the howler monkeys while dozing before that – thought it was wind kicking up! I forgot to mention that yesterday it did thunder around us at 4ish but must have jumped over this mountain – it never rained then. Yet the weather forecasts always say it’s raining, every day. Just coffee and ½ nutrition bar before meeting Wendy at 6, though she also brought us 2 bananas. Hiked just down the road and across into the neighbor’s area, slowly and listening the entire way. The dogs came with us.',
                    'image' => null,
                    'user_id' => 2,
                    'category_id' => 4,
                    'tag_id' =>["13","14","15","16"],
                    'created_at'=>Carbon::now()->toDateTimeString(),
                    'updated_at'=>Carbon::now()->toDateTimeString()
                ),

                array('id' => 5, 'title' => 'Tech Blog', 'content'=>'Well, millions of tech enthusiasts, as well as businesses from all 
                    sectors, befriend technology blogs that bring the latest news regarding technology updates faster than any other source.
                    These technology blogs not only embrace high-tech discoveries but also help readers in staying consistently ahead of the curve by determining modern-day tech trends!
                    Therefore, we have rounded up a list of the 10 best technology blogs, that would bring you the latest information from across the world.',
                    'image' => "images/xycLEie07gdp9ahJVUPB81pItdBXS4bVddBHBjOq.jpg",
                    'user_id' => 2,
                    'category_id' => 5,
                    'tag_id' =>["20"],
                    'created_at'=>Carbon::now()->toDateTimeString(),
                    'updated_at'=>Carbon::now()->toDateTimeString()
                ),
            ]

        );
    }

}

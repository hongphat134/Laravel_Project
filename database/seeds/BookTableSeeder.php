<?php

use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('book')->truncate();

        $data = [
        	[
        		'book_name' => 'Từ Điển mẫu câu tiếng Nhật', 
        		'book_url' => 'tu-dien-mau-cau-tieng-nhat', 
        		'book_img' => 'td01.jpg',
        		'book_description' => 'Tập hợp tất cả các mẫu câu tiếng Nhật',
                'book_price' => 50000,
        		'book_promotion' => 1,
                'book_highlight' => 1,
        		'book_quantity' => 65,
        		'pub_id' => 3,
        		'cat_id' => 3
        	],
            [
                'book_name' => 'How to be a bawse', 
                'book_url' => 'how-to-be-a-bawse', 
                'book_img' => 'img1.jpg',
                'book_description' => 'Sách rất hay.....',
                'book_price' => 75000,
                'book_promotion' => 0,
                'book_highlight' => 1,
                'book_quantity' => 55,
                'pub_id' => 1,
                'cat_id' => 3
            ],
            [
                'book_name' => 'How to write a bestselling', 
                'book_url' => 'how-to-write-a-bestselling', 
                'book_img' => 'img2.jpg',
                'book_description' => 'Sách rất hay.....',
                'book_price' => 40000,
                'book_promotion' => 1,
                'book_highlight' => 1,
                'book_quantity' => 55,
                'pub_id' => 3,
                'cat_id' => 2
            ], 
            [
                'book_name' => '7 day self publishing mini course', 
                'book_url' => '7-day-self-publishing-mini-course', 
                'book_img' => 'img3.jpg',
                'book_description' => 'Sách rất hay.....',
                'book_price' => 90000,
                'book_promotion' => 0,
                'book_highlight' => 0,
                'book_quantity' => 55,
                'pub_id' => 2,
                'cat_id' => 2
            ],
            [
                'book_name' => 'The ring of truth', 
                'book_url' => 'the-ring-of-truth', 
                'book_img' => 'img4.jpg',
                'book_description' => 'Sách rất hay.....',
                'book_price' => 75000,
                'book_promotion' => 1,
                'book_highlight' => 0,
                'book_quantity' => 55,
                'pub_id' => 1,
                'cat_id' => 1
            ],
            [
                'book_name' => 'Keepers of the kalachakra', 
                'book_url' => 'keepers-of-the-kalachakra', 
                'book_img' => 'r1.jpg',
                'book_description' => 'Sách rất hay.....',
                'book_price' => 35000,
                'book_promotion' => 1,
                'book_highlight' => 1,
                'book_quantity' => 55,
                'pub_id' => 2,
                'cat_id' => 1
            ],
            [
                'book_name' => 'Fisher queen\'s dynaspy', 
                'book_url' => 'fisher-queens-dynaspy', 
                'book_img' => 'r2.jpg',
                'book_description' => 'Sách rất hay.....',
                'book_price' => 25000,
                'book_promotion' => 0,
                'book_highlight' => 1,
                'book_quantity' => 55,
                'pub_id' => 2,
                'cat_id' => 2
            ],
            [
                'book_name' => 'Zero sum', 
                'book_url' => 'zero-sum', 
                'book_img' => 'r3.jpg',
                'book_description' => 'Sách rất hay.....',
                'book_price' => 85000,
                'book_promotion' => 1,
                'book_highlight' => 1,
                'book_quantity' => 55,
                'pub_id' => 2,
                'cat_id' => 1
            ],
            [
                'book_name' => 'Ps from Paris', 
                'book_url' => 'ps-from-paris', 
                'book_img' => 'r4.jpg',
                'book_description' => 'Sách rất hay.....',
                'book_price' => 50000,
                'book_promotion' => 0,
                'book_highlight' => 0,
                'book_quantity' => 55,
                'pub_id' => 2,
                'cat_id' => 3
            ],
            [
                'book_name' => 'Trust me not', 
                'book_url' => 'trust-me-not', 
                'book_img' => 'r5.jpg',
                'book_description' => 'Sách rất hay.....',
                'book_price' => 20000,
                'book_promotion' => 1,
                'book_highlight' => 1,
                'book_quantity' => 55,
                'pub_id' => 2,
                'cat_id' => 4
            ],
            [
                'book_name' => 'Harry potter', 
                'book_url' => 'harry-potter', 
                'book_img' => 'product1.jpg',
                'book_description' => 'Truyện kể về Harry Potter ở thế giới phù thuỷ',
                'book_price' => 150000,
                'book_promotion' => 1,
                'book_highlight' => 1,
                'book_quantity' => 55,
                'pub_id' => 4,
                'cat_id' => 4
            ]                 
        ];

        foreach ($data as $v) {
        	DB::table('book')->insert(
        		[
        			'book_name' => $v['book_name'],
        			'book_url' => $v['book_url'],
        			'book_img' => $v['book_img'],
        			'book_description' => $v['book_description'], 
                    'book_price' => $v['book_price'],       			
        			'book_promotion' => $v['book_promotion'],
                    'book_highlight' => $v['book_highlight'],
        			'book_quantity' => $v['book_quantity'],
        			'pub_id' => $v['pub_id'],
        			'cat_id' => $v['cat_id'],
        			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        			'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        		]
        	);
        }      

        Schema::enableForeignKeyConstraints();
    }
}

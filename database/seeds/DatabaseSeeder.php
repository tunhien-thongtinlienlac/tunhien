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
        $this->call(addcategoryseeder::class);
    }
}

class addcategoryseeder extends Seeder
{
    public function run()
    {
        DB::table('category')->insert([
        	array('name_cate'=>'Áo','amount'=>'150' ),
        	array('name_cate'=>'Quần','amount'=>'200' ),
        	array('name_cate'=>'Giày','amount'=>'660' ),
        	array('name_cate'=>'Balo','amount'=>'1500' )
        ]);
    }
}

class addproductseeder extends Seeder
{
    public function run()
    {
        DB::table('product')->insert([
        	array('name_pro'=>'Áo Sơ Mi','cate_id'=>'1','price'=>50000),
        	array('name_pro'=>'Áo Thun','cate_id'=>'1','price'=>25000),
        	array('name_pro'=>'Quần Bò','cate_id'=>'2','price'=>150000),
        	array('name_pro'=>'Giày Adidas','cate_id'=>'3','price'=>350000),
        	array('name_pro'=>'Giày Nike','cate_id'=>'3','price'=>250000),
        	array('name_pro'=>'Balo kitty','cate_id'=>'4','price'=>100000)
        ]);
    }
}

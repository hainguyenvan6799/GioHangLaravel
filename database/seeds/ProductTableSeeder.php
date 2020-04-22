<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
        	'imagePath'=>'https://image.phimmoi.net/film/1869/poster.medium.jpg',
        	'title'=>'Harry Potter',
        	'description'=>'Lorem ispum...',
        	'price'=>17
        ]);
        $product = new \App\Product([
            'imagePath'=>'https://307a0e78.vws.vegacdn.vn/view/v2/image/img.media/dac-nhan-tam.jpg',
            'title'=>'Đắc Nhân Tâm',
            'description'=>'Lorem ispum...',
            'price'=>18
        ]);
        $product = new \App\Product([
            'imagePath'=>'https://rodbooks.com/FileUploads/imgfile/review-sach-khi-moi-diem-tua-deu-mat-sach-hay-thang-nay-hinh-anh-rodbooks.jpg',
            'title'=>'Khi mọi điểm tựa đều mất',
            'description'=>'Lorem ispum...',
            'price'=>22
        ]);
        $product = new \App\Product([
            'imagePath'=>'https://lh3.googleusercontent.com/proxy/VSxf-6s5AvEd6T4fteTMJDxkxjuW6pBpmwxApwciEzSvHruBXpOnt3uZWfVCNnNkGRcy2a7m_HSv2hLR5QxM5F1zIsFCOqN6KuWRvvJW0f67d4EGStEu5w',
            'title'=>'Tư duy phản biện',
            'description'=>'Lorem ispum...',
            'price'=>179
        ]);
        $product = new \App\Product([
            'imagePath'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRG06YANKvxQtTu-z3yrWuUEh5SXwIxWTJ-kwumERBHJNNzIcgu&usqp=CAU',
            'title'=>'Bản đồ mây',
            'description'=>'Lorem ispum...',
            'price'=>10
        ]);
        $product->save();

    }
}

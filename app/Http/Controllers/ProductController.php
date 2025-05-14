<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show()
    {
        $product = [
            'name' => 'Tape Singkong Khas Desa Cikasungka',
            'ratings' => [
                'rasa' => 4.7,
                'harga' => '20K - 30K',
                'kemasan' => 4.5,
                'pelayanan' => 4.8,
            ],
            'location' => 'Perum Bukit Cikasungka Blok Ae C01 No 17, RT.04/RW.09, Pasanggrahan, Kec. Solear, Kabupaten Tangerang, Banten 15730',
            'open' => 'Minggu (08.30 - 21.00)',
            'platforms' => ['Go-food', 'Grab Food', 'Shoppe Food'],
            'menus' => [
                ['name' => 'Tape Madu', 'price' => 22000, 'image' => 'tape-madu.jpg'],
                ['name' => 'Tape Pandan', 'price' => 25000, 'image' => 'tape-pandan.jpg'],
                ['name' => 'Ketan Hitam', 'price' => 26000, 'image' => 'ketan-hitam.jpg'],
            ],
            'review' => [
                'name' => 'Muhammad Rendra Saputra',
                'wilayah' => 'RT10/RW12',
                'username' => '@Rendra',
                'views' => 530,
                'rating' => 4.5,
                'text' => 'Jika Anda mencari tape singkong dengan cita rasa autentik dan kualitas terbaik, Tape Singkong Khas Desa Cikasungka adalah pilihan yang tidak boleh dilewatkan. Dibuat dengan proses fermentasi tradisional, tape ini memiliki tekstur lembut, rasa manis alami, dan aroma khas yang menggugah selera.',
            ]
        ];

        return view('product.tape-cikasungka', compact('product'));
    }
}
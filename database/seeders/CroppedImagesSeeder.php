<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CroppedImage;

class CroppedImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CroppedImage::create([
            'cropped_image_data' => 'cropped image data',
            'margin_top' => 10,
            'margin_bottom' => 20,
            'margin_left' => 5,
            'margin_right' => 15,
        ]);
    }
}

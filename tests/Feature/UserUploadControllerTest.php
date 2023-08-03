<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class UserUploadControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    use RefreshDatabase;

    /**
     * Test saveCroppedImage method.
     *
     * @return void
     */
    public function testSaveCroppedImage()
    {
        // Mock a file and set it in the request
        $file = UploadedFile::fake()->image('test.jpg');
        $data = [
            'croppedImageData' => 'cropped image data',
            'marginTop' => 10,
            'marginBottom' => 20,
            'marginLeft' => 5,
            'marginRight' => 15,
        ];

        // Make a POST request to the save-cropped-image route
        $response = $this->post(route('save.cropped.image'), $data);

        // Assert that the response is successful (status code 200)
        $response->assertStatus(200);

        // Assert that the data is properly saved or processed in your controller method
        // For example, you can check if the data is correctly stored in the database or some other logic.
        $this->assertDatabaseHas('cropped_images', [
            'cropped_image_data' => 'cropped image data',
            'margin_top' => 10,
            'margin_bottom' => 20,
            'margin_left' => 5,
            'margin_right' => 15,
        ]);
    }
}

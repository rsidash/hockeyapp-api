<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Models\Image;
use App\Services\v1\ImageService;
use Illuminate\Http\JsonResponse;

class ImageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param ImageRequest $request
     * @return array
     */
    public function store(ImageRequest $request)
    {
        $imageService = new ImageService();
        $data = $imageService->store($request->validated());

        Image::create(['path' => $data['path']]);

        $id = Image::where('path', $data['path'])->first()->id;

        return [
            'id' => $id,
            'url' => $data['url'],
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Image $image
     * @return JsonResponse
     */
    public function destroy(Image $image)
    {
        $image->delete();

        return response()->deleteSuccess();
    }
}

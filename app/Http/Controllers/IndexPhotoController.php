<?php

namespace App\Http\Controllers;

use App\Models\IndexPhoto;
use Illuminate\Http\JsonResponse;

class IndexPhotoController extends Controller
{
    public function show(): JsonResponse
    {
        $indexPhoto = IndexPhoto::find(1);

        return response()->json(
            $indexPhoto ? [
                'id' => $indexPhoto->id,
                'title' => $indexPhoto->title,
                'image' => asset('storage/' . $indexPhoto->image),
                'created_at' => $indexPhoto->created_at,
                'updated_at' => $indexPhoto->updated_at,
            ] : ['error' => 'Image not found'],
            $indexPhoto ? 200 : 404
        );
    }
}

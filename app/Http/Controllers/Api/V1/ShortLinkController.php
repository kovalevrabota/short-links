<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ShortLink;
use App\Http\Requests\StoreShortLinkRequest;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShortLinkRequest $request)
    {
        $shortLink = ShortLink::create([
            'link' => $request->link,
            'code' => Str::random(6),
        ]);

        return response()->json([
            'url' => $request->schemeAndHttpHost() . '/' . $shortLink->code
        ], 201);
    }
}

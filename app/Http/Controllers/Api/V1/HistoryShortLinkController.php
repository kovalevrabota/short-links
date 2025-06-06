<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\HistoryShortLink;
use Illuminate\Http\Request;

class HistoryShortLinkController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function statistics(Request $request)
    {
        $lists = HistoryShortLink::groupBy('short_link_id')
            ->selectRaw('short_links.code, short_links.link, short_links.created_at, count(*) count')
            ->leftJoin('short_links', 'short_links.id', '=', 'short_link_id')
            ->get();

        return response()->json($lists);
    }
}

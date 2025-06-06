<?php

namespace App\Http\Controllers;

use App\Models\HistoryShortLink;
use App\Models\shortLink;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
    /**
     * Redirect short link.
     */
    public function shortenLink(Request $request)
    {
        $link = ShortLink::where('code', $request->code)->first();

        if($link) {
            HistoryShortLink::create([
                'ip' => $request->ip(),
                'short_link_id' => $link->id,
            ]);
        }else {
            return abort(403, 'Link does not exist');
        }

        return redirect($link->link);
    }
}

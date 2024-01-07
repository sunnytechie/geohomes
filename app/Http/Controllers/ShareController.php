<?php

namespace App\Http\Controllers;

use Jorenvh\Share\Share;
use Illuminate\Http\Request;
//use Jorenvh\Share\ShareFacade;

class ShareController extends Controller
{
    public function index()
    {
        $share = new Share();

        // Use the instance to generate share links
        $shareLinks = $share
        ->page('http://jorenvanhocht.be', 'Share title')
        ->facebook()
        ->twitter()
        ->linkedin('Extra linkedin summary can be passed here')
        ->whatsapp()
        ->getRawLinks();
        dd($shareLinks);

        return view('snippets.share', compact('shareLinks'));
    }

    public function facebook(Request $request)
    {
        //dd($request->all());
        $facebookShareUrl = "https://www.facebook.com/sharer/sharer.php?u=https://FBILTDgroup.com/$request->url";

        return redirect($facebookShareUrl);
    }

    public function whatsapp(Request $request)
    {
        //dd($request->all());
        $whatsappShareUrl = "https://wa.me/?text=https://FBILTDgroup.com/$request->url";

        return redirect($whatsappShareUrl);
    }

    public function twitter(Request $request)
    {
        //dd($request->all());
        $twitterShareUrl = "https://twitter.com/intent/tweet?text=Share+title&url=https://FBILTDgroup.com/$request->url";

        return redirect($twitterShareUrl);
    }
}

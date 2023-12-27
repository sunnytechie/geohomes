<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShareController extends Controller
{
    public function facebook($title)
    {
        $facebookShareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode(url()->current());

        return redirect($facebookShareUrl);
    }

    public function whatsapp($title)
    {
        $whatsappShareUrl = 'https://api.whatsapp.com/send?text=' . urlencode($title . ' ' . url()->current());

        return redirect($whatsappShareUrl);
    }

    public function twitter($title)
    {
        $twitterShareUrl = 'https://twitter.com/intent/tweet?url=' . urlencode(url()->current()) . '&text=' . urlencode($title);

        return redirect($twitterShareUrl);
    }
}

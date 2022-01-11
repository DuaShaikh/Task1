<?php

namespace App\Services;

use App\Models\Deferral;

class DeferralService
{    //
    function getDeferrals(){
        return Deferral::get();
    }
}

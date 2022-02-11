<?php

/**
 * Deferral service Doc Comment
 * 
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://laravel.me/
 */

namespace App\Services;

use App\Models\Deferral;
use Illuminate\Http\Request;

    /**
     * This is a Deferral service class
     * 
     * @category PHP
     * @package  Laravel
     * @author   Dua <dua@example.com>
     * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
     * @link     http://laravel.me/
     */
class DeferralService
{
    /**
     * Get deferrals data from deferral table
     * 
     * @param Illuminate\Http\Request $req 
     * 
     * @return Deferral
     */
    function getDeferrals($req)
    {
        $search = $req['searchBar'] ?? "";
        if ($search != '') {
            return Deferral::where(
                'name',
                'LIKE',
                '%' . $search . '%'
            )
                ->orderByDesc('id')->paginate(5);
        } else {
            return Deferral::orderByDesc('id')
                ->paginate(5);
        }
    } 

    /**
     * Create deferrals record
     * 
     * @param Illuminate\Http\Request $request 
     * 
     * @return Deferral
     */
    function postDeferrals($request)
    {
        return Deferral::create($request->all());
    }
    /**
     * Delete deferral record by id
     * 
     * @param $id passing deferral id
     * 
     * @return Deferral
     */
    function deleteDeferrals($id)
    {
        return Deferral::find($id)->delete();
    }
    /**
     * Replicate deferral data by id and save it to deferral table
     * 
     * @param $id passing deferral id
     * 
     * @return Deferral 
     */
    function replicateDeferrals($id)
    {
        return Deferral::find($id)
            ->replicate()->save();
    }

    /**
     * Show Deferral record in form input field by id to update record
     * 
     * @param $id passing deferral id
     * 
     * @return Deferral
     */
    function showDeferrals($id)
    {
         return Deferral::find($id);
    }

    /**
     * Update deferral record by id
     * 
     * @param $id      passing deferral id
     * @param Illuminate\Http\Request $request 
     * 
     * @return Deferral
     */
    function updateDeferrals($id, $request)
    {
        return Deferral::find($id)
            ->update($request->all())->save();
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
class DashboardShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Shop::query();

        // // OPTIONAL filter (nanti kepake)
        // if ($request->filled('kecamatan')) {
        //     $query->where('kecamatan', $request->kecamatan);
        // }

        // if ($request->filled('desa')) {
        //     $query->where('desa', $request->desa);
        // }

        return $query->select(
            'id',
            'user_id',
            'shop_name',
            'shop_description',
            'shop_address',
            'latitude',
            'longitude'
        )
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->get();
    }
}

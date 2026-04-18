<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Jobs\ProductSyncJob;

class AdminSyncController extends Controller
{
    /**
     * Trigger a manual WHMCS product sync.
     */
    public function sync()
    {
        ProductSyncJob::dispatch();

        return back()->with('success', 'Product synchronization job has been dispatched.');
    }
}

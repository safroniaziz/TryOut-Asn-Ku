<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Tryout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $hasPremium = $user->hasActivePremiumSubscription();
        
        $materis = Materi::active()
            ->with('tryout')
            ->paginate(12);

        return view('materis.index', compact('materis', 'hasPremium'));
    }

    public function show(Materi $materi)
    {
        $user = Auth::user();
        $canAccess = $materi->canBeDownloadedBy($user);
        
        return view('materis.show', compact('materi', 'canAccess'));
    }

    public function download(Materi $materi)
    {
        $user = Auth::user();
        
        if (!$materi->canBeDownloadedBy($user)) {
            if ($materi->is_premium) {
                return redirect()->route('subscription.premium')
                    ->with('info', 'Anda perlu berlangganan premium untuk mengakses materi ini.');
            }
            return back()->with('error', 'Anda tidak memiliki akses ke materi ini.');
        }

        if (!$materi->file_path || !Storage::exists($materi->file_path)) {
            return back()->with('error', 'File tidak ditemukan.');
        }

        // Increment download count
        $materi->incrementDownloadCount();

        return Storage::download($materi->file_path, $materi->file_name);
    }

    public function byTryout(Tryout $tryout)
    {
        $user = Auth::user();
        $hasPremium = $user->hasActivePremiumSubscription();
        
        $materis = $tryout->materis()
            ->active()
            ->get();

        return view('materis.by-tryout', compact('tryout', 'materis', 'hasPremium'));
    }
}

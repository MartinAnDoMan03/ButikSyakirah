<?php

namespace App\Http\Controllers;

use App\Models\Seam;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSeamRequest;
use App\Http\Requests\UpdateSeamRequest;
use Illuminate\Support\Facades\Auth;


class SeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_detail_id' => 'required|exists:order_details,order_detail_id',

            'seam_name' => 'required|string|max:255',
            'cloth_type' => 'required|string|max:255',
            'seamer_id' => [
                'required',
                function ($attribute, $value, $fail) {
                    $penjahit = \App\Models\User::where('user_id', $value)->where('role', 'penjahit')->exists();
                    if (!$penjahit) {
                        $fail('Penjahit tidak valid atau tidak ditemukan.');
                    }
                },
            ],
            'seam_size' => 'required|integer',
            'seam_status' => 'required|in:Belum-Selesai,Selesai',

        ]);

        // Simpan data ke database
        Seam::create([
            'order_detail_id' => $validated['order_detail_id'],
            'seam_name' => $validated['seam_name'],
            'cloth_type' => $validated['cloth_type'],
            'seamer_id' => $validated['seamer_id'],
            'seam_size' => $validated['seam_size'],
            'seam_status' => $validated['seam_status'],
        ]);

        return redirect()->route('penggunting.data_pesanan')->with('success', 'Pesanan berhasil ditambahkan.');
    }


    public function getOrdersWithSeam()
    {
        $user = Auth::user();

        // Check if the logged-in user has the role 'pemayet'
        if ($user->role !== 'penjahit' && $user->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        // Query the orders and sequin tables
        $orders = \DB::table('seamer_view')
            ->where('seam_status', 'diproses')
            ->where('seamer_id', $user->user_id)
            ->get();

        return view('penjahit.data_pesanan', ['orders' => $orders]);
    }
    public function updateStatus(Request $request, $order_detail_id)
    {
        // Validate the request
        $request->validate([
            'seam_status' => 'required|in:Selesai',
        ]);

        // Update the order status
        $order = Seam::findOrFail($order_detail_id);
        $order->seam_status = $request->seam_status;
        $order->save();

        // Call the stored procedure after update
        $userId = auth()->user()->user_id; // Assuming the user is authenticated
        $jobType = 'seaming'; // Example job type
        $startDate = now()->toDateString(); // Current date

        \DB::statement('CALL InsertJob(?, ?, ?)', [
            $userId,
            $jobType,
            $startDate
        ]);

        return redirect()->back()->with('success', 'Order status updated and job recorded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Seam $seam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seam $seam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSeamRequest $request, Seam $seam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seam $seam)
    {
        //
    }
}

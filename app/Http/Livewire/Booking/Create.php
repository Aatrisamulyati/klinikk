<?php

namespace App\Http\Livewire\Booking;

use App\Models\User;
use App\Models\Service;
use Livewire\Component;

class Create extends Component
{
    public $tanggal="";

    public function render()
    {
        $services = Service::get();
        $dokters = User::where('level', 'Dokter')->latest()->get();
        $pasiens = User::where('level', 'Pasien',)->latest()->get();
        return view('livewire.booking.create',[
            'service' => $services,
            'dokter' => $dokters,
            'pasien' => $pasiens,
        ]);
    }
}

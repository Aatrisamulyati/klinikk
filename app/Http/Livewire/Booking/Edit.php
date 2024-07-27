<?php

namespace App\Http\Livewire\Booking;

use App\Models\User;
use App\Models\Service;
use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
        $services = Service::get();
        $dokters = User::where('level', 'Dokter')->latest()->get();
        $pasiens = User::where('level', 'Pasien',)->latest()->get();

        return view('livewire.booking.edit',[
            'service' => $services,
            'dokter' => $dokters,
            'pasien' => $pasiens,
            'booking' => ',,',
        ]);
    }
}

<?php

namespace App\Http\Livewire\Bookingpasien;

use App\Models\User;
use App\Models\Booking;
use App\Models\Service;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class Create extends Component
{

    public $tanggal = "";
    public $selectedSlots = [];
    public $currentStep = 1;
    public $pasien, $dokter, $service, $selectedService, $selectedDokter, $selectedTanggal, $selectedJam, $jam, $status = 'booking';
    public $services, $dokters, $pasiens, $name, $email, $phone, $disableForm = false;
    
    public function render()
    {
        $this->services = Service::get();
        $this->dokters = User::where('level', 'Dokter')->latest()->get();
        $this->pasiens = User::where('level', 'Pasien')->latest()->get();
        return view('livewire.bookingpasien.create',[
            'service' => $this->services,
            'dokter' => $this->dokters,
            'pasien' => $this->pasiens,
        ]);
    }

//     public function getAvailableSlots()
//     {
//         // Inisialisasi array untuk menyimpan jam
//         $allSlots = array();

//         // Waktu awal
//         $startTime = strtotime('08:00:00');

//         // Waktu akhir
//         $endTime = strtotime('21:00:00');

//         // Loop untuk menambahkan jam ke dalam array
//         for ($i = $startTime; $i <= $endTime; $i += 7200) { // 3600 detik = 1 jam
//             $allSlots[] = date('H:i:s', $i);
//         }

//         // Jika tidak ada tanggal yang dipilih, kembalikan semua slot
//         if (empty($this->selectedTanggal)) {
//             return $allSlots;
//         }

//         // Ambil slot yang sudah dibooking pada tanggal yang dipilih di langkah 3
//         $bookedSlots = $this->getBookedSlots();

//         // Ambil slot yang belum dibooking
//         $availableSlots = [];

//         foreach ($allSlots as $data) {
//             $isSimilar = false;

//             foreach ($bookedSlots as $dataSlot) {
//                 if ($data == $dataSlot) {
//                     $isSimilar = true;
//                     break;
//                 } else {
//                     $isSimilar = false;
//                 }
//             }

//             if (!$isSimilar) {

//                 if ($this->selectedTanggal == now()->toDateString()) {

//                     if ($data >= date('H:00:00')) {
//                         $availableSlots[] = $data;
//                     }
//                 } else {
//                     $availableSlots[] = $data;
//                 }
//             }
//         }

//         return $availableSlots;
//     }


//     private function getBookedSlots()
// {
//     // Ambil ID pengguna yang sedang login
//     $authUserId = Auth::id(); // Mendapatkan ID pengguna secara langsung

//     // Ambil slot yang sudah dibooking pada tanggal yang dipilih di langkah 3
//     $bookedSlots = Booking::where('tanggal', $this->selectedTanggal)
//         ->where('dokter_id', $this->selectedDokter) // Pastikan $this->selectedDokter adalah ID dokter yang dipilih
//         ->where('status', '!=', 'Batal') // Perhatikan bahwa 'Dibatalkan' mungkin tidak ada di enum status, pastikan ini konsisten
//         ->where('pasien_id', '!=', $authUserId) // Menggunakan ID pengguna untuk memastikan slot tidak diambil oleh pengguna yang sama
//         ->pluck('jam')
//         ->toArray();

//     // Ambil slot yang sudah dibooking untuk tanggal-tanggal selanjutnya dari hari ini
//     $futureBookedSlots = Booking::where('tanggal', '>', now()->toDateString())
//         ->where('status', '!=', 'Batal') // Pastikan 'Dibatalkan' konsisten dengan enum status
//         ->pluck('jam')
//         ->toArray();

//     // Menggabungkan slot yang sudah dibooking pada tanggal yang dipilih dan slot untuk tanggal-tanggal selanjutnya
//     return array_merge($bookedSlots, $futureBookedSlots);
// }

    public function getAvailableSlots()
    {
        // Inisialisasi array untuk menyimpan jam
        $allSlots = array();

        // Waktu awal
        $startTime = strtotime('08:00:00');

        // Waktu akhir
        $endTime = strtotime('21:00:00');

        // Loop untuk menambahkan jam ke dalam array
        for ($i = $startTime; $i < $endTime; $i += 3600) { // 3600 detik = 1 jam
            $allSlots[] = date('H:i:s', $i);
        }

        // Jika tidak ada tanggal yang dipilih, kembalikan semua slot
        if (empty($this->selectedTanggal)) {
            return $allSlots;
        }

        // Ambil slot yang sudah dibooking pada tanggal yang dipilih di langkah 3
        $bookedSlots = $this->getBookedSlots();

        // Ambil slot yang belum dibooking
        $availableSlots = [];

        foreach ($allSlots as $data) {
            $isSimilar = false;

            foreach ($bookedSlots as $dataSlot) {
                if ($data == $dataSlot) {
                    $isSimilar = true;
                    break;
                }
            }

            if (!$isSimilar) {
                // Cek apakah tanggal yang dipilih adalah hari ini
                if ($this->selectedTanggal == now()->toDateString()) {
                    // Cek apakah slot waktu lebih besar atau sama dengan waktu sekarang
                    if ($data >= date('H:i:s')) {
                        $availableSlots[] = $data;
                    }
                } else {
                    $availableSlots[] = $data;
                }
            }
        }

        return $availableSlots;
    }

    private function getBookedSlots()
    {
        // Ambil ID pengguna yang sedang login
        $authUserId = Auth::id(); // Mendapatkan ID pengguna secara langsung

        // Ambil slot yang sudah dibooking pada tanggal yang dipilih di langkah 3
        $bookedSlots = Booking::where('tanggal', $this->selectedTanggal)
            ->where('dokter_id', $this->selectedDokter) // Pastikan $this->selectedDokter adalah ID dokter yang dipilih
            ->where('status', '!=', 'Batal') // Perhatikan bahwa 'Dibatalkan' mungkin tidak ada di enum status, pastikan ini konsisten
            ->where('pasien_id', '!=', $authUserId) // Menggunakan ID pengguna untuk memastikan slot tidak diambil oleh pengguna yang sama
            ->pluck('jam')
            ->toArray();

        // Ambil slot yang sudah dibooking untuk tanggal-tanggal selanjutnya dari hari ini
        $futureBookedSlots = Booking::where('tanggal', '>', now()->toDateString())
            ->where('status', '!=', 'Batal') // Pastikan 'Dibatalkan' konsisten dengan enum status
            ->pluck('jam')
            ->toArray();

        // Menggabungkan slot yang sudah dibooking pada tanggal yang dipilih dan slot untuk tanggal-tanggal selanjutnya
        return array_merge($bookedSlots, $futureBookedSlots);
    }



    public function selectService($serviceId)
    {
        $this->selectedService = $serviceId;
        
    }
    public function selectDokter($dokterId)
    {
        $this->selectedDokter = $dokterId;
    }

    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'selectedService' => 'required',
        ]);

        // Setelah validasi, perbarui properti
        $this->service = $this->selectedService;

        // Pindah ke langkah berikutnya
        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'selectedDokter' => 'required',
        ]);

        $this->dokter = $this->selectedDokter;

        $this->currentStep = 3;
    }

    public function thirdStepSubmit()
    {
        $validatedData = $this->validate([
            'selectedTanggal' => 'required',
            'selectedJam' => 'required',
        ]);

        $this->tanggal = $validatedData['selectedTanggal'];
        $this->jam = $validatedData['selectedJam'];

        // Dapatkan slot yang sudah dibooking pada tanggal yang dipilih di langkah 3
        $bookedSlots = $this->getBookedSlots();

        // Periksa apakah slot yang dipilih sudah dibooking oleh pelanggan lain
        if (in_array($this->jam, $bookedSlots)) {
            // Handle kasus di mana slot sudah dibooking
            // Anda dapat menambahkan pesan kesalahan atau mengambil tindakan tertentu
            // Contoh: return redirect()->back()->with('error', 'Slot ini sudah dibooking.');
        } else {
            // Slot belum dibooking, simpan slot yang dipilih oleh pelanggan
            $this->selectedSlots[] = $this->jam;
        }

        // Pindah ke langkah berikutnya
        $this->currentStep = 4;
    }


    public function submitForm(Request $request)
    {
        
        $pasien = Auth::user();

        Booking::create([
            'pasien_id' => $pasien->id,
            'service_id' => $this->service,
            'dokter_id' => $this->dokter,
            'tanggal' => $this->selectedTanggal,
            'jam' => $this->selectedJam,
            'status' => $this->status,
        ]);

        $this->clearForm();

        $this->currentStep = 1;
        return redirect('/my-booking')->with('success', 'Kamu Berhasil Booking!');
    }

    public function getServiceName()
    {
        if ($this->selectedService) {
            $services = Service::find($this->selectedService);
            return $services ? $services->nama : null;
        }

        return null;
    }

    public function getDokterName()
    {
        if ($this->selectedDokter) {
            $dokters = User::find($this->selectedDokter);
            return $dokters ? $dokters->nama : null;
        }

        return null;
    }


    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function clearForm()
    {
        $this->service = null;
        $this->dokter = null;
        $this->selectedTanggal = null;
        $this->selectedJam = null;
        $this->status = 'belum dikonfirmasi';
    }
}



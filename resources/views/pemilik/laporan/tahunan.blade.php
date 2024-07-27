<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5>Laporan Data Pemasukan Harian</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('laporan.harian') }}" method="get" target="_blank">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal_awal">Tanggal Awal:</label>
                                <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal_akhir">Tanggal Akhir:</label>
                                <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">

                            <button type="submit" class="btn btn-primary">laporan Harian</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Laporan Data Pemasukan Bulanan</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('laporan.bulanan') }}" method="GET" target="_blank">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bulan">Pilih Bulan:</label>
                                        <input type="month" name="bulan" id="bulan" class="form-control">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">laporan Bulanan</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>laporan Data Pemasukan Tahunan</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('laporan.tahunan') }}" method="GET" target="_blank">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tahun">Pilih Tahun:</label>
                                        <input type="number" name="tahun" id="tahun" class="form-control"
                                            placeholder="Tahun">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Laporan Tahunan</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
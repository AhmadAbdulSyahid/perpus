<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    // Metode untuk menampilkan daftar peminjaman
    public function index() {
        $peminjamans = Peminjaman::paginate(10);
        return view('peminjaman.index', compact('peminjamans'));
    }

    // Metode untuk menyimpan peminjaman baru
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'peminjaman_id' => 'required|unique:peminjaman,PeminjamanID', // pastikan PeminjamanID unik
            'nama_peminjam' => 'required|string|max:255',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'nullable|date|after_or_equal:tanggal_peminjaman',
        ]);

        // Simpan data ke database
        Peminjaman::create([
            'PeminjamanID' => $request->peminjaman_id, // Menyimpan PeminjamanID dari form
            'NamaPeminjam' => $request->nama_peminjam,
            'TanggalPeminjaman' => $request->tanggal_peminjaman,
            'TanggalPengembalian' => $request->tanggal_pengembalian,
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan!');
    }

    // Metode untuk menampilkan form tambah peminjaman
    public function create()
    {
        return view('peminjaman.create'); // Mengarahkan ke tampilan form pembuatan peminjaman
    }

    // Metode untuk menampilkan form edit peminjaman
    public function edit($id) {
        $peminjaman = Peminjaman::find($id);

        // Cek apakah data peminjaman ditemukan
        if (!$peminjaman) {
            return redirect()->route('peminjaman.index')->with('error', 'Peminjaman tidak ditemukan.');
        }

        return view('peminjaman.edit', compact('peminjaman'));
    }

    // Metode untuk menghapus peminjaman
    public function destroy(string $PeminjamanID)
    {
        $peminjaman = Peminjaman::find($PeminjamanID);

        try {
            // Hapus peminjaman
            $peminjaman->delete();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Peminjaman gagal dihapus');
        }
        
        return redirect()->back()->with('success', 'Peminjaman berhasil dihapus');
    }

    // Metode untuk memperbarui data peminjaman
    public function update(Request $request, $id)
    {
        // Validasi data yang dikirimkan melalui form
        $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'nullable|date|after_or_equal:tanggal_peminjaman',
        ]);

        // Temukan peminjaman berdasarkan ID
        $peminjaman = Peminjaman::find($id);

        // Pastikan data peminjaman ditemukan
        if (!$peminjaman) {
            return redirect()->route('peminjaman.index')->with('error', 'Peminjaman tidak ditemukan.');
        }

        // Update data peminjaman
        $peminjaman->NamaPeminjam = $request->nama_peminjam;
        $peminjaman->TanggalPeminjaman = $request->tanggal_peminjaman;
        $peminjaman->TanggalPengembalian = $request->tanggal_pengembalian;
        $peminjaman->save();

        // Redirect ke halaman index peminjaman dengan pesan sukses
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diperbarui.');
    }
}

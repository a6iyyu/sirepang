<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Kader;
use App\Models\Kecamatan;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Surveyor extends Controller
{
    public function index(): RedirectResponse|View
    {
        try {
            $data = User::where('tipe', 'kader')->paginate(request()->input('per_page', 10));
            return view('pages.admin.kelola-surveyor', compact('data'));
        } catch (ModelNotFoundException $exception) {
            report($exception);
            return redirect()->back()->withErrors(['errors' => 'Data surveyor tidak ditemukan!']);
        } catch (Exception $exception) {
            report($exception);
            return redirect()->back()->withErrors(['errors' => 'Terjadi kesalahan saat mengambil data surveyor karena kesalahan pada sistem.']);
        }
    }

    public function detail(Request $request, string $id): RedirectResponse|View
    {
        try {
            $surveyor = Kader::where('id_kader', $id)->first();
            return view('pages.admin.detail-surveyor', compact('surveyor'));
        } catch (Exception $exception) {
            report($exception);
            return redirect()->back()->withErrors(['errors' => 'Data tidak ditemukan!']);
        }
    }

    public function create(): RedirectResponse|View
    {
        try {
            $kecamatan = Kecamatan::all()->pluck('nama_kecamatan', 'id_kecamatan')->toArray();
            return view('pages.admin.tambah-surveyor', compact('kecamatan'));
        } catch (ModelNotFoundException $exception) {
            report($exception);
            return redirect()->back()->withErrors(['errors' => 'Data surveyor tidak ditemukan!']);
        } catch (Exception $exception) {
            report($exception);
            return redirect()->back()->withErrors(['errors' => 'Terjadi kesalahan saat mengambil data surveyor karena kesalahan pada sistem.']);
        }
    }

    public function store(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'nama'            => 'required|string|max:50',
                'nip'             => 'required|unique:kader,nip|string|size:18',
                'id_kecamatan'    => 'required',
                'contact_info'    => 'required|string|max:15',
                'password'        => 'required|string|size:8',
            ], [
                'nama.required'           => 'Nama surveyor harus diisi.',
                'nip.required'            => 'NIP surveyor harus diisi.',
                'nip.unique'              => 'NIP surveyor sudah terdaftar.',
                'nip.size'                => 'NIP harus 18 karakter.',
                'contact_info.required'   => 'Nomor HP harus diisi.',
                'password.required'       => 'Kata sandi harus diisi.',
                'password.size'           => 'Kata sandi harus 8 karakter.',
                'id_kecamatan.required'   => 'Kecamatan harus dipilih.',
            ]);

            $user = new User();
            $user->username = $request->nip;
            $user->password = bcrypt($request->password);
            $user->tipe = 'kader';
            $user->save();

            $kader = new Kader();
            $kader->nama = $request->nama;
            $kader->nip = $request->nip;
            $kader->id_kecamatan = $request->id_kecamatan;
            $kader->contact_info = $request->contact_info;
            $kader->save();

            $user->id_kader = $kader->id_kader;
            $user->save();

            DB::commit();
            return to_route('kelola-surveyor')->with('success', 'Data surveyor berhasil disimpan!');
        } catch (Exception $exception) {
            DB::rollBack();
            report($exception);
            return redirect()->back()->withErrors(['errors' => 'Data surveyor gagal disimpan!']);
        }
    }

    public function edit(): RedirectResponse|View
    {
        try {
            $kecamatan = Kecamatan::all()->pluck('nama_kecamatan', 'id_kecamatan')->toArray();
            $surveyor = Kader::where('id_kader', request()->id)->first();
            return view('pages.admin.edit-surveyor', compact('kecamatan', 'surveyor'));
        } catch (ModelNotFoundException $exception) {
            report($exception);
            return redirect()->back()->withErrors(['errors' => 'Data surveyor tidak ditemukan!']);
        } catch (Exception $exception) {
            report($exception);
            return redirect()->back()->withErrors(['errors' => 'Terjadi kesalahan saat mengambil data surveyor karena kesalahan pada sistem.']);
        }
    }

    public function update(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'nama'            => 'required|string|max:50',
                'nip'             => "required|string|size:18|unique:kader,nip,{$request->id_kader},id_kader",
                'id_kecamatan'    => 'required',
                'contact_info'    => 'required|string|max:15',
                'password'        => 'nullable|string|size:8',
            ], [
                'nama.required'           => 'Nama surveyor harus diisi.',
                'nip.required'            => 'NIP surveyor harus diisi.',
                'nip.unique'              => 'NIP surveyor sudah terdaftar.',
                'nip.size'                => 'NIP harus 18 karakter.',
                'contact_info.required'   => 'Nomor HP harus diisi.',
                'id_kecamatan.required'   => 'Kecamatan harus dipilih.',
                'password.size'           => 'Kata sandi harus 8 karakter.',
            ]);

            $surveyor = Kader::where('id_kader', $request->id_kader)->firstOrFail();
            $surveyor->nama = $request->nama;
            $surveyor->nip = $request->nip;
            $surveyor->id_kecamatan = $request->id_kecamatan;
            $surveyor->contact_info = $request->contact_info;
            $surveyor->save();

            $user = User::where('id_kader', $request->id_kader)->firstOrFail();
            $user->username = $request->nip;

            if ($request->filled('password')) $user->password = bcrypt($request->password);
            $user->save();
            return to_route('kelola-surveyor')->with('success', 'Data surveyor berhasil diperbarui!');
        } catch (Exception $exception) {
            report($exception);
            Log::info($exception->getMessage());
            return redirect()->back()->withErrors(['errors' => 'Data surveyor gagal diperbarui!']);
        }
    }

    public function destroy(): RedirectResponse
    {
        try {
            User::where('id_kader', request()->id)->delete();
            $surveyor = Kader::where('id_kader', request()->id)->firstOrFail();
            $surveyor->delete();
            return redirect()->back()->with('success', 'Data surveyor berhasil dihapus!');
        } catch (ModelNotFoundException $exception) {
            report($exception);
            return redirect()->back()->withErrors(['errors' => 'Data surveyor tidak ditemukan!']);
        } catch (Exception $exception) {
            report($exception);
            return redirect()->back()->withErrors(['errors' => 'Data surveyor gagal dihapus!']);
        }
    }
}
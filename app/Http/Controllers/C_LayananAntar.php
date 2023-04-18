<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_LayananAntar;
use Validator;

class C_LayananAntar extends Controller
{
    //
    public function index()
    {
    	return view('layananantar.index');
    }

    //post method
    public function search(Request $request)
    {
        $keyword = $request->input('cari');
        $result = $this->getBarbuk($keyword);
        if (empty($result->data)) {
            $result = null;
        } else {
            $result = $result->data;
        }

        $data = [
            'title' => 'Barang Bukti',
            'result' => $result,
            'keyword' => $keyword,
        ];

        // dd($data);
        return view('layananantar.index', $data);
    }

    private function getBarbuk($keyword)
    {
        $ch = curl_init();
        $url = 'https://pbbbr.kejari-kediri.go.id/status';

        $data = array(
            'cari' => $keyword
        );

        curl_setopt_array($ch, [
            CURLOPT_HEADER => false,
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data
        ]);
        $result = curl_exec($ch);
        curl_close($ch);
        // return json_encode(json_decode($result));
        return json_decode($result);
    }

    public function store(Request $request)
    {
        //store ke database layananantar
        $layantar = new M_LayananAntar();
        $layantar->nama_pemilik = $request->nama_pemilik;
        $layantar->alamat = $request->alamat;
        $layantar->keterangan = $request->keterangan;
        $layantar->status_pemilik = $request->status_pemilik;
        $layantar->notelp = $request->notelp;
        $layantar->no_reg = $request->no_reg;
        $layantar->status_pengembalian = 'Belum Diantar';
        $layantar->save();



        return redirect()->back()->with('success', 'BERHASIL! | Anda Berhasil Mengajukan Layanan Antar Barang Bukti. Tunggu Konfirmasi Dari Kami Melalui Telepon. Terimakasih.');
    }

    public function indexadminlay()
    {
        $tabsId = "custom-tabs-one-home-tab";
        $belum = M_LayananAntar::all()->where('status_pengembalian', 'Belum Diantar')->sortByDesc('created_at');
        $sudah = M_LayananAntar::all()->where('status_pengembalian', 'Sudah Diantar')->sortByDesc('updated_at');

        return view('layananantar.indexadmin', ['belum' => $belum, 'sudah' => $sudah, 'tabsId' => $tabsId]);
    }

    public function adminsearchtab1(Request $request)
    {
        $tabsId = $request->input('tabId');
        $cari = $request->caritab1;
        $belum = M_LayananAntar::where('nama_pemilik', 'like', "%".$cari."%")
                            ->orwhere('keterangan', 'like', "%".$cari."%")
                            ->orwhere('alamat', 'like', "%".$cari."%")
                            ->orwhere('keterangan', 'like', "%".$cari."%")
                            ->where('status_pengembalian', 'Belum Diantar')
                            ->paginate();

        $sudah = M_LayananAntar::all()->where('status_pengembalian', 'Sudah Diantar');
        return view('layananantar.indexadmin', ['belum' => $belum, 'sudah' => $sudah, 'tabsId' => $tabsId]);
    }

    public function adminsearchtab2(Request $request)
    {
        $tabsId = $request->input('tabId');
        $cari = $request->caritab2;
        $belum = M_LayananAntar::all()->where('status_pengembalian', 'Belum Diantar');

        $sudah = M_LayananAntar::where('keterangan', 'like', "%".$cari."%")
                            ->orwhere('alamat', 'like', "%".$cari."%")
                            ->orwhere('keterangan', 'like', "%".$cari."%")
                            ->orwhere('nama_pemilik', 'like', "%".$cari."%")
                            ->where('status_pengembalian', 'Sudah Diantar')
                            ->paginate();
        return view('layananantar.indexadmin', ['belum' => $belum, 'sudah' => $sudah, 'tabsId' => $tabsId]);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $layantar = M_LayananAntar::where('id', $id)->first();

        $layantar->status_pengembalian = $request->status_pengembalian;
        $layantar->save();

        return redirect(url('/layananantar/admin'))->with('success', 'BERHASIL! | ');
    }
}

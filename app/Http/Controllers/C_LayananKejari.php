<?php

namespace App\Http\Controllers;

use App\Models\M_LayananKejari;
use App\Models\M_PanjaluLampiranDokumen;
use App\Models\M_PanjaluLampiranFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Validator;

class C_LayananKejari extends Controller
{
    public function index()
    {
        return view('panjalu.create');
    }

    public function create()
    {
        return view('panjalu.index');
    }

    public function store(Request $request)
    {
        $rules = [
            'nama_lengkap'      => 'required',
            'email'             => 'required',
            'nohp'              => 'required',
            'alamat'            => 'required',
            'judul_pengaduan'   => 'required',
            'detail_pengaduan'  => 'required',
            'file'              => 'required',
        ];

        $messages = [
            'nama_lengkap.required'     => 'Nama tidak boleh kosong',
            'email.required'            => 'Email tidak boleh kosong',
            'nohp.required'             => 'Nomor Telepon tidak boleh kosong',
            'alamat.required'           => 'Alamat tidak boleh kosong',
            'judul_pengaduan.required'  => 'Judul Pengaduan tidak boleh kosong',
            'detail_pengaduan.required' => 'Detail Pengaduan tidak boleh kosong',
            'file.required'             => 'Foto KTP tidak boleh kosong',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = new M_LayananKejari;

        $file = $request->file('file');
        $nama_file = time()."_".$file->getClientOriginalName();
        // lokasi folder public/foto_ktp
        $tujuan_upload = 'panjalu/foto_ktp';
        $file->move(public_path('panjalu/foto_ktp'),$nama_file);

        $today = Carbon::today();
        $number = mt_rand(1000, 9999);
        $random = strtoupper(substr(md5($number), 7, 7));

        $noregistrasi = "ZAS/".$today->month."".$today->day."/".$random;
        $data->noregistrasi = $noregistrasi;
        $data->nama_lengkap = $request->nama_lengkap;
        $data->email = $request->email;
        $data->nohp = $request->nohp;
        $data->alamat =$request->alamat;
        $data->judul_pengaduan = $request->judul_pengaduan;
        $data->detail_masalah = $request->detail_pengaduan;
        $data->ktp = $nama_file;
        $data->status = "Belum Ditindaklanjuti";
        $data->save();

        if ($request->hasFile('lampiran_foto')) {
            $files = [];
            foreach ($request->file('lampiran_foto') as $file_lf) {
                if ($file_lf->isValid()) {
                    $filename_lf = $random."_".$file_lf->getClientOriginalName();
                    $file_lf->move(public_path('panjalu/lampiran_foto'), $filename_lf);
                    $files[] = [
                        'noregistrasi' => $noregistrasi,
                        'nama_file' => $filename_lf
                    ];
                }
            }
            M_PanjaluLampiranFoto::insert($files);
        }

        if ($request->hasFile('lampiran_dokumen')) {
            $files = [];
            foreach ($request->file('lampiran_dokumen') as $file_lf) {
                if ($file_lf->isValid()) {
                    $filename_ld = $random."_".$file_lf->getClientOriginalName();
                    $file_lf->move(public_path('panjalu/lampiran_dokumen'), $filename_ld);
                    $files[] = [
                        'noregistrasi' => $noregistrasi,
                        'nama_file' => $filename_ld
                    ];
                }
            }
            M_PanjaluLampiranDokumen::insert($files);
        }

        $isi = [
            'email' => $request->email,
            'kode' => $noregistrasi
        ];

        Mail::send('mails.testmail', $isi, function ($message) use ($isi) {
            $message->from('panjalu@gmail.com', 'Panjalu Kejari Kota Kediri');
            $message->to($isi['email']);
            $message->subject('Kode Registrasi');
        });

        return redirect()->back()->with('success', 'Berhasil Mengajukan Pengaduan ');
    }

    public function search(Request $request){
        $cari = $request->cari;
        $data = M_LayananKejari::where('noregistrasi', $cari)->paginate();
        if (empty($data)) {
            $cari = null;
        } else {
            $cari = $data;
        }
        session()->flashInput($request->input());
        return view('panjalu.create', ['data' => $data, 'cari' => $cari]);
    }

    public function indexAdmin()
    {
        $data = M_LayananKejari::orderBy('created_at', 'desc')->paginate(20);

        return view('panjalu.admin.index', ['data' => $data]);
    }

    public function updateAdmin(Request $request)
    {
        $myId = $request->myId;
        $data = M_LayananKejari::where('noregistrasi', '=', $myId)->first();
        $data->status = $request->status;
        $data->save();

        return redirect()->back()->with('success', 'Berhasil Edit Status '.$request->status);
    }

    public function searchAdmin(Request $request){
        $cari = $request->cari;
        $data = M_LayananKejari::where('noregistrasi', 'like', "%".$cari."%")
                                ->orwhere('nama_lengkap', 'like', "%".$cari."%")->paginate(10);
        session()->flashInput($request->input());
        return view('panjalu.admin.index', ['data' => $data]);
    }

    public function show($id)
    {
        $data = M_LayananKejari::where('noregistrasi', '=', $id)->get();
        $doc = M_PanjaluLampiranDokumen::where('noregistrasi', '=', $id)->get();
        $pic = M_PanjaluLampiranFoto::where('noregistrasi', '=', $id)->get();

        return view('panjalu.admin.show', ['data' => $data, 'doc' => $doc, 'pic' => $pic]);
    }
}

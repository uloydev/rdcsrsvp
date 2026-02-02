<?php

namespace App\Http\Controllers;

use App\Mail\ParticipantVerification;
use App\Mail\ParticipantVerified;
use App\Models\Participant;
use App\Models\ShirtStock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $pagination = $req->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1',
            'sortBy' => 'nullable|string|in:id,name,email,phone,nik,customer_code',
            'sortType' => 'nullable|string|in:asc,desc',
            'search' => 'nullable|string',
        ]);

        $pagination['page'] = $pagination['page'] ?? 1;
        $pagination['per_page'] = $pagination['per_page'] ?? 10;

        $query = Participant::query();
        if (isset($pagination['search']) && $pagination['search']) {
            $query->where('name', 'like', "%{$pagination['search']}%")->orWhere('email', 'like', "%{$pagination['search']}%");
        } else {
            $pagination['search'] = '';
        }
        $numSearch = (int) $pagination['search'];
        if ($numSearch) {
            $query->orWhere('id', $numSearch);
        }

        if (isset($pagination['sortBy']) && $pagination['sortBy']) {
            if (isset($pagination['sortType']) && $pagination['sortType'] === 'desc') {
                $query->orderByDesc($pagination['sortBy']);
            } else {
                $query->orderBy($pagination['sortBy']);
                $pagination['sortType'] = 'asc';
            }
        } else {
            $query->orderBy('id');
            $pagination['sortBy'] = '';
        }

        // dd($query->toSql());

        $participants = $query->paginate($pagination['per_page'] ?? 10)->withQueryString();

        // check if ajax request
        if ($req->expectsJson()) {
            return $participants;
        }

        return view('dashboard.participant', [
            'participants' => $participants,
            'pagination' => $pagination,
            'title' => 'Participants',
        ]);
    }

    public function customer(Request $req)
    {
        $pagination = $req->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1',
            'sortBy' => 'nullable|string|in:id,name,email,phone,nik,customer_code',
            'sortType' => 'nullable|string|in:asc,desc',
            'search' => 'nullable|string',
        ]);

        $pagination['page'] = $pagination['page'] ?? 1;
        $pagination['per_page'] = $pagination['per_page'] ?? 10;

        $query = Participant::with('shirtStock')
            ->where('customer_code', 'IS NOT', null)
            ->where('email_verified_at', 'IS NOT', null);
        if (isset($pagination['search']) && $pagination['search']) {
            $query->where('name', 'like', "%{$pagination['search']}%");
        } else {
            $pagination['search'] = '';
        }
        $numSearch = (int) $pagination['search'];
        if ($numSearch) {
            $query->orWhere('id', $numSearch);
        }

        if (isset($pagination['sortBy']) && $pagination['sortBy']) {
            if (isset($pagination['sortType']) && $pagination['sortType'] === 'desc') {
                $query->orderByDesc($pagination['sortBy']);
            } else {
                $query->orderBy($pagination['sortBy']);
                $pagination['sortType'] = 'asc';
            }
        } else {
            $query->orderBy('id');
            $pagination['sortBy'] = '';
        }

        $participants = $query->withQueryString()->paginate($pagination['per_page'] ?? 10);

        // check if ajax request
        if ($req->expectsJson()) {
            return $participants;
        }

        return view('dashboard.participant', [
            'participants' => $participants,
            'pagination' => $pagination,
            'title' => 'Peserta Pelanggan',
            'type' => 'customer',
        ]);
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
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:participants,email',
            'phone' => 'required|string|max:20',
            'category' => 'required|string',
            "additional_participant" => "required|numeric|min:0|max:2",
        ], [
            'name.required' => 'Harap masukkan nama',
            'name.max' => 'Nama maksimal 100 karakter',
            'email.required' => 'Harap masukkan email',
            'email.email' => 'Email tidak valid',
            'email.max' => 'Email maksimal 100 karakter',
            'email.unique' => 'Email sudah terdaftar sebagai peserta',
            'phone.required' => 'Harap masukkan nomor telepon',
            'phone.max' => 'Nomor telepon maksimal 20 karakter',
            'category.required' => 'Harap masukkan Kategori',
            'additional_participant.required' => 'Harap masukkan jumlah tambahan orang',
            'additional_participant.numeric' => 'Harap masukkan jumlah tambahan orang',
            'additional_participant.min' => 'Jumlah tambahan orang minimal 0',
            'additional_participant.max' => 'Jumlah tambahan orang maksimal 2',

        ]);

        // token with uuid
        $data['token'] = Str::uuid();

        // create participant
        $participant = Participant::create($data);
        
        $link = route('participant.verify') . '?token=' . $participant->token;

        // send email
        Mail::to($participant->email)->send(new ParticipantVerification($participant, $link));

        return response()->json([
            'message' => 'Participant created successfully',
            'data' => $participant,
        ]);
    }

    public  function verify(Request $request)
    {
        $data = $request->validate([
            'token' => 'required|string|exists:participants,token',
        ], [
            'token.required' => 'Token tidak ditemukan',
            'token.exists' => 'Token tidak valid',
        ]);

        $participant = Participant::where('token', $data['token'])->first();

        if ($participant->email_verified_at) {
            return redirect()->route('index')->with('alert', [
                "title" => 'Maaf...',
                "text" => 'Email sudah terverifikasi sebelumnya',
                "icon" => 'warning',
                "confirmButtonText" => 'Kembali'
            ]);
        }

        $participant->email_verified_at = now();
        $participant->save();

        return redirect()->route('index')->with('alert', [
            "title" => 'Thank You !',
            "html" => '<p>Your email has been confirmed <br/>See you at <b>The Kick Off Day</b></p>',
            "imageUrl"=> "/assets/icon/check.svg",
            "confirmButtonText" => 'Close'
        ]);
    }

    public function pickupKit(String $id)
    {
        $id = (int) $id;
        $participant = Participant::find($id);
        if (!$participant) {
            return response()->json([
                'message' => 'Peserta tidak ditemukan',
            ], 404);
        }

        // check if not verified
        if (!$participant->email_verified_at) {
            return response()->json([
                'message' => 'Peserta belum terverifikasi',
            ], 400);
        }

        $participant->update([
            'kit_received_at' => Carbon::now(),
        ]);

        return response()->json([
            'message' => 'Kit received successfully',
            'data' => $participant,
            'timestamp' =>
            $participant->kit_received_at->addHours(7)->format('d M Y H:i:s'),
        ]);
    }

    public function checkin(String $id)
    {
        $id = (int) $id;
        $participant = Participant::find($id);
        if (!$participant) {
            return response()->json([
                'message' => 'Peserta tidak ditemukan',
            ], 404);
        }

        // check if not verified
        // if (!$participant->email_verified_at) {
        //     return response()->json([
        //         'message' => 'Peserta belum terverifikasi',
        //     ], 400);
        // }

        $participant->checkin_at = Carbon::now();
        $participant->save();

        return response()->json([
            'message' => 'Checkin successfully',
            'data' => $participant,
            'timestamp' =>
            $participant->checkin_at->addHours(7)->format('d M Y H:i:s'),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Participant $participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Participant $participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Participant $participant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Participant $participant)
    {
        //
    }
}

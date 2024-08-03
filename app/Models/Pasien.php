<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Utility;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 'pasien';
    protected $fillable = [
        'wni',
        'nik',
        'no_kk',
        'no_bpjs',
        'no_telpon',
        'tanggal_lahir',
        'tempat_lahir',
        'alamat',
        'nama',
        'jenis_kelamin',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'desa',
        'alamat',
        'agama',
        'status_pernikahan',
        'pendidikan_terkahir',
        'profesi',
    ];

    public function setTanggalLahirAttribute($value)
    {
        $this->attributes['tanggal_lahir'] =  \Carbon\Carbon::parse($value);
    }

    //Automatic No Rekam Medis
    public static function boot()
    {
        parent::boot();
        //while creating/inserting item into db
        static::creating(function ($item) {
            $item->no_rekam_medis = Utility::generateCode($item, 'no_rekam_medis', null, 6);
            $item->created_by = auth()->user()->id;
        });
    }
}

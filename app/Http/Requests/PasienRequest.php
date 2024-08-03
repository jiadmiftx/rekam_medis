<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use DB;
use Illuminate\Validation\Rule;

class PasienRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'wni' => 'required|boolean',
            'nik' => 'nullable|min:16|max:16|unique:pasien',
            'no_kk' => 'nullable|min:16|max:16',
            'no_bpjs' => 'nullable|unique:pasien',
            'no_telpon' => 'nullable|digits_between:10,12|numeric',
            'tanggal_lahir' => 'required|date_format:d-m-Y',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            // 'gol_darah' => 'required|max:2',
           'provinsi' => ['required', function ($attr, $value, $fail) {

               $provinsi = \App\Models\WilayahIndonesia::where(DB::raw('LENGTH(kode)'), '=', '2')
                   ->where('nama', $this->request->get('provinsi'))->first();

               if (!$provinsi) {
                   $fail($attr . ' tidak valid.');
               }

           }],
            'kabupaten' => [ 'required', function ($attr, $value, $fail) {
                $kabupaten = \App\Models\WilayahIndonesia::where(DB::raw('LENGTH(kode)'), '=', '5')
                    ->where('nama', $this->request->get('kabupaten'))->first();
                if (!$kabupaten) {
                    $fail($attr . ' tidak valid.');
                }

            }],
            'kecamatan' => [ 'required', function ($attr, $value, $fail) {

                $kecamatan = \App\Models\WilayahIndonesia::where(DB::raw('LENGTH(kode)'), '=', '8')
                    ->where('nama', $this->request->get('kecamatan'))->first();
                if (!$kecamatan) {
                    $fail($attr . ' tidak valid.');
                }
            }],
            'desa' => [ 'required', function ($attr, $value, $fail) {
                $desa = \App\Models\WilayahIndonesia::where(DB::raw('LENGTH(kode)'), '=', '13')
                    ->where('nama', $this->request->get('desa'))->first();
                if (!$desa) {
                    $fail($attr . ' tidak valid.');
                }
            }],
            'agama' => [
                'required_if:wni,1',
                Rule::in(['ISLAM', 'KRISTEN', 'HINDU', 'BUDHA', 'KATOLIK', 'KONGHUCU']),
                // 'nullable_if:wni,0', // Remove this as nullable_if is not working
            ],
            'status_pernikahan' => 'required_if:wni,1',
            'pendidikan_terkahir' => 'required_if:wni,1',
            'profesi' => 'required_if:wni,1',
        ];
    }
}

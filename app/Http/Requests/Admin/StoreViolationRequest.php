<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreViolationRequest extends FormRequest
{
    public function authorize(): bool
    {
        $user = $this->user();
        if (!$user) return false;

        // Tanpa package: asumsi users.role = 'admin'
        return ($user->role ?? null) === 'admin';
    }

    public function rules(): array
    {
        return [
            'plat_no'          => ['required', 'string', 'max:20'],
            'jenis_pelanggaran'=> ['required', 'string', 'max:100'],
            'deskripsi'        => ['nullable', 'string', 'max:1000'],
            'denda'            => ['nullable', 'numeric', 'min:0'],
            'foto'             => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'], // 4MB
        ];
    }

    public function messages(): array
    {
        return [
            'plat_no.required' => 'Plat nomor wajib diisi.',
            'jenis_pelanggaran.required' => 'Jenis pelanggaran wajib diisi.',
            'foto.required'    => 'Foto pelanggaran wajib diupload.',
            'foto.image'       => 'File foto harus berupa gambar.',
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('plat_no')) {
            $this->merge([
                'plat_no' => Str::upper(trim((string) $this->input('plat_no'))),
            ]);
        }

        if ($this->has('jenis_pelanggaran')) {
            $this->merge([
                'jenis_pelanggaran' => trim((string) $this->input('jenis_pelanggaran')),
            ]);
        }

        if ($this->has('deskripsi')) {
            $this->merge([
                'deskripsi' => trim((string) $this->input('deskripsi')),
            ]);
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Override;

class Member extends Model
{
    #[Override]
    public static function boot()
    {
        parent::boot();

        static::creating(function ($member) {
            // Format kode: LIB + tahun + 5 digit random
            $year = now()->format('Y');
            $random = str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
            $member->member_code = 'LIB' . $year . $random;

            // Isi tanggal daftar otomatis
            $member->registered_at = now();
            // Expired default 1 tahun ke depan
            $member->expired_at = now()->addYear();
        });
    }


    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}

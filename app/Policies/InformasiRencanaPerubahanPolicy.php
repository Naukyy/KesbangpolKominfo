<?php
// app/Policies/InformasiRencanaPerubahanPolicy.php

namespace App\Policies;

use App\Models\InformasiRencanaPerubahan;
use App\Models\User;

class InformasiRencanaPerubahanPolicy
{
    public function view(User $user, InformasiRencanaPerubahan $informasiRencanaPerubahan)
    {
        return $user->id === $informasiRencanaPerubahan->user_id;
    }

    public function update(User $user, InformasiRencanaPerubahan $informasiRencanaPerubahan)
    {
        return $user->id === $informasiRencanaPerubahan->user_id;
    }

    public function delete(User $user, InformasiRencanaPerubahan $informasiRencanaPerubahan)
    {
        return $user->id === $informasiRencanaPerubahan->user_id;
    }
}
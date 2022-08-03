<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Tugas;

class TugasObserver
{
    /**
     * Handle the Tugas "created" event.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return void
     */
    public function created(Tugas $tugas)
    {
        $tugas->users()->sync(User::pluck('id'));
    }

    /**
     * Handle the Tugas "updated" event.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return void
     */
    public function updated(Tugas $tugas)
    {
        //
    }

    /**
     * Handle the Tugas "deleted" event.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return void
     */
    public function deleted(Tugas $tugas)
    {
        //
    }

    /**
     * Handle the Tugas "restored" event.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return void
     */
    public function restored(Tugas $tugas)
    {
        //
    }

    /**
     * Handle the Tugas "force deleted" event.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return void
     */
    public function forceDeleted(Tugas $tugas)
    {
        //
    }
}

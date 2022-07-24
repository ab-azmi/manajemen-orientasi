<?php

namespace App\Observers;

use App\Models\Submission;

class SubmissionObserver
{
    /**
     * Handle the Submission "created" event.
     *
     * @param  \App\Models\Submission  $submission
     * @return void
     */
    public function created(Submission $submission)
    {
        $users = $submission->tugas->users->count();
        $usersCompleted = $submission->tugas->usersCompleted->count();

        if($users == $usersCompleted){
            $submission->tugas->update(['status' => 1]);
        }else{
            $submission->tugas->update(['status' => 0]);
        }
    }

    /**
     * Handle the Submission "updated" event.
     *
     * @param  \App\Models\Submission  $submission
     * @return void
     */
    public function updated(Submission $submission)
    {
        //
    }

    /**
     * Handle the Submission "deleted" event.
     *
     * @param  \App\Models\Submission  $submission
     * @return void
     */
    public function deleted(Submission $submission)
    {
        //
    }

    /**
     * Handle the Submission "restored" event.
     *
     * @param  \App\Models\Submission  $submission
     * @return void
     */
    public function restored(Submission $submission)
    {
        //
    }

    /**
     * Handle the Submission "force deleted" event.
     *
     * @param  \App\Models\Submission  $submission
     * @return void
     */
    public function forceDeleted(Submission $submission)
    {
        //
    }
}

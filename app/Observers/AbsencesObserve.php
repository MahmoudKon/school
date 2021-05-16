<?php

namespace App\Observers;

use App\Models\Absence;

class AbsencesObserve
{
    public function created(Absence $absence)
    {
        $absence->update([
            'day' => $absence->created_at->format('d'),
            'month' => $absence->created_at->format('F'),
        ]);
        $absence->save();
    } //  Call The Image Method IN Down When Create New User And Create Generate Unique Code
}

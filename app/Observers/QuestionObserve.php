<?php

namespace App\Observers;

use App\Models\Question;

class QuestionObserve
{
    public function created(Question $question)
    {
        $this->attach($question);
    } //  Call The Image Method IN Down When Create New User And Create Generate Unique Code

    public function updated(Question $question)
    {
        $this->attach($question);
    } //  Call The Image Method IN Down When Update The User

    public function deleted(Question $question)
    {
        // removeImage($question->attach, 'questions');
    } // Remove The Image From Folder When Delete The User

    protected function attach($question)
    {
        if (substr($question->attach, 0, 5) == '/tmp/') {
            $question->update([
                'attach' => uploadImage($question->attach, 'questions')
            ]);
            $question->save();
        }
    } // To Check If The User Has IN Database New Image Upload to To Folder
}

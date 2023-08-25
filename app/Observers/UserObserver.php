<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        $user->profile()->create([
            'gravatar_image' => $this->generateGravatar($user->email),
        ]);
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        if ($user->wasChanged('email')) {
            $user->profile()->update([
                'gravatar_image' => $this->generateGravatar($user->email),
            ]);
        }
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        $user->profile()->delete();
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        $user->profile()->restore();
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        $user->profile()->forceDelete();
    }

    private function generateGravatar(string $email): string
    {
        return sprintf('https://www.gravatar.com/avatar/%s?d=identicon', md5($email));
    }
}

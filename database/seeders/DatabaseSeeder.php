<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Notes;
use App\Models\Contact;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()
            ->count(1)
            ->sequence(
                [
                    'name' => 'Flavia Rira',
                    'email' => 'falvia@contactbox.art',
                ],
            )
            ->afterCreating(function (User $user) {
                Contact::factory()
                    ->times(250)
                    ->afterCreating(function (Contact $contact) use ($user) {
                        Notes::factory()
                            ->times(rand(1, 5))
                            ->create(['user_id' => $user->id, 'contact_id' => $contact->id]);
                    })
                    ->create(['user_id' => $user->id]);
            })
            ->create();
    }
}

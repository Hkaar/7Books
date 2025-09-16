<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run()
    {
        $faqs = [
            [
                'question' => 'What is Seven Books?',
                'answer' => 'Seven Books is a digital physical book lending web service a.k.a a web service that let\'s you lend a book from a physical library thorough the internet.',
                'order' => 1,
                'active' => true
            ],
            [
                'question' => 'How do I lend a book?',
                'answer' => 'To lend a book, (1) first you must already have an account registered with us. Then (2) second go to the browse page to search for a book or pick a book you already have in mind. Finally (3) third after clicking the book you want to lend, just simply press lend and pick a library of your choice, and then your all done.',
                'order' => 2,
                'active' => true
            ],
            [
                'question' => 'How does it work?',
                'answer' => 'Seven Books works by being a bridge between you and the library as the handler for all the communication and handling of tracking lendings and other things that are cumbersome and complicated between the parties.',
                'order' => 3,
                'active' => true
            ],
            [
                'question' => 'How do I pickup my order?',
                'answer' => 'To pickup an order you\'ve made before hand. Just go to the library of question and hand them the code that was provided with the order.',
                'order' => 4,
                'active' => true
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
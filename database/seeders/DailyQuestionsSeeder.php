<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DailyQuestion;

class DailyQuestionsSeeder extends Seeder
{
    public function run(): void
    {
        $questions = [
            // May
            ['date' => '2024-05-03', 'question' => 'On this day, which famous footballer was born in 1983?', 'options' => json_encode(['Cristiano Ronaldo', 'Lionel Messi', 'Zinedine Zidane', 'David Beckham']), 'correct_answer' => 'Cristiano Ronaldo'],
            ['date' => '2024-05-04', 'question' => 'Which legendary footballer, born on this day in 1969, is known for playing for Manchester United?', 'options' => json_encode(['Ryan Giggs', 'Paul Scholes', 'Gary Neville', 'Eric Cantona']), 'correct_answer' => 'Ryan Giggs'],
            
            ['date' => '2025-05-11', 'question' => 'Which legendary footballer, born on this day in 1969, is known for playing for Manchester United?', 'options' => json_encode(['Ryan Giggs', 'Paul Scholes', 'Gary Neville', 'Eric Cantona']), 'correct_answer' => 'Ryan Giggs'],

            // June
            ['date' => '2024-06-01', 'question' => 'On this day in 1992, which Spanish footballer was born, later to play for Barcelona?', 'options' => json_encode(['Gerard Piqué', 'Sergio Ramos', 'David Villa', 'Andrés Iniesta']), 'correct_answer' => 'Gerard Piqué'],
            ['date' => '2024-06-05', 'question' => 'Which Brazilian footballer, born on this day in 1981, is widely considered one of the greatest players of all time?', 'options' => json_encode(['Ronaldo Nazário', 'Ronaldinho', 'Kaká', 'Cafu']), 'correct_answer' => 'Ronaldo Nazário'],

            // July
            ['date' => '2024-07-01', 'question' => 'On this day in 1981, which famous Italian goalkeeper was born?', 'options' => json_encode(['Gianluigi Buffon', 'Dino Zoff', 'Francesco Toldo', 'Gianluca Pagliuca']), 'correct_answer' => 'Gianluigi Buffon'],
            ['date' => '2024-07-09', 'question' => 'Which footballer, born on this day in 1993, is known for playing for Paris Saint-Germain?', 'options' => json_encode(['Marco Verratti', 'Kylian Mbappé', 'Neymar', 'Edinson Cavani']), 'correct_answer' => 'Marco Verratti'],
            ['date' => '2024-07-15', 'question' => 'On this day in 1991, which talented French forward was born, later to play for Chelsea?', 'options' => json_encode(['Olivier Giroud', 'Antoine Griezmann', 'Kylian Mbappé', 'Karim Benzema']), 'correct_answer' => 'Olivier Giroud'],
        ];

        // Insert all questions at once
        DailyQuestion::insert($questions);
    }
}

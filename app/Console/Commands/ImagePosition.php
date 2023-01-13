<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Podcast;

class ImagePosition extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix:positions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix duplicate image positions';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
        $podcasts = Podcast::all();
        
        
        foreach($podcasts as $podcast) {
            $current = 1;
            $last = 0;
            $digitCounter = 0;

            $fixedPositionCounter = 0;

            $positions = $podcast->images->pluck('position');
            $total = $positions->max() ? $positions->max()+1 : 0;

            
            foreach($podcast->images->sortBy('position') as $image) {
                if($image->filename != $podcast->thumbnail && $image->position) {
                    $current = $image->position;
                    //$this->line('Checking image ' . $image->id . ' ' . $current . ' against ' . $last);
                    if ($current == $last) {
                        //$this->line($image->position);
                        $image->position = $total + $digitCounter;
                        //$this->line($image->position . ' = ' . $total . ' + ' . $digitCounter);
                        //$this->line($image->position);
                        $image->save();
                        //$this->line('Fixed duplicate position.' . $last . ' now ' . $image->position);
                        $digitCounter++;
                        $fixedPositionCounter++;
                    }
                    
                    $last = $current;

                }

            }
            $this->line($podcast->title . ': ' . $total . ' images. ' . $fixedPositionCounter . ' fixed positions');

        }
        
    }
}

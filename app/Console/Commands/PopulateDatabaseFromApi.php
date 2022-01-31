<?php

namespace App\Console\Commands;

use App\Models\Character;
use App\Models\Quote;
use App\Services\BreakingBad\CharacterService;
use App\Services\BreakingBad\DeathService;
use App\Services\BreakingBad\QuoteService;
use Illuminate\Console\Command;

class PopulateDatabaseFromApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:populate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate database from Breaking Bad external api.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(protected CharacterService $characterService,
                                protected QuoteService     $quoteService,
                                protected DeathService     $deathService)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Checking if there are existing records in the database...');
        if (Character::count() > 0) {
            $this->info('Purging previous records...');
            Character::query()->delete();
        }

        $this->info('Database population initialized.');
        $this->info('Retrieving all needed information from external api.');
        $apiCharacters = $this->characterService->getAllCharacters();
        $apiQuotes = $this->quoteService->getAllQuotes();
        $apiDeaths = $this->deathService->getAllDeaths();

        $this->info('Population started...');
        $progressBar = $this->output->createProgressBar(count($apiCharacters));
        $progressBar->start();

        foreach ($apiCharacters as $apiCharacter) {
            $character = new Character();
            $character->fill(collect($apiCharacter)->except('birthday')->toArray());
            $character->birthday = $this->getBirthday($apiCharacter);
            $character->save();

            $this->setQuotesByAuthor($character, $apiQuotes);
            $this->setDeathToCharacter($character, $apiDeaths);

            $progressBar->advance();
        }

        $progressBar->finish();
    }

    protected function getBirthday($character): ?string
    {
        if (! str_contains($character['birthday'], '-')) {
            return null;
        }

        $date = explode('-', $character['birthday']);
        return $date[2] . '-' . $date[0] . '-' . $date[1];
    }

    protected function setQuotesByAuthor($character, $unfilteredQuotes)
    {
        $quotes = [];
        $filteredQuotes = collect($unfilteredQuotes)->filter(fn ($value) => $value['author'] === $character->name);

        foreach ($filteredQuotes as $filteredQuote) {
            $quote = new Quote();
            $quote->fill($filteredQuote);

            $quotes[] = $quote;
        }
        $character->quotes()->saveMany($quotes);
    }

    protected function setDeathToCharacter($character, $unfilteredDeaths)
    {
        $death = collect($unfilteredDeaths)->first(fn ($value) => $value['death'] === $character->name);
        if (! $death) return;

        $character->death()->create($death);
    }
}

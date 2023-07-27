<?php

namespace App\Http\Livewire\PopulationEntry;

use App\Models\Atoll;
use App\Models\Island;
use Livewire\Component;

class Edit extends Component
{
    public $populationEntry;

    public $atoll_id;
    public $island_id;

    public $men_count;
    public $women_count;
    public $expat_count;
    public $local_count;
    public $logged_date;

    public $description;


    public $islands;
    public $atolls;

    public $formValidationStatus;

    protected $rules = [
        'atoll_id' => 'required',
        'island_id' => 'required',
        'men_count' => 'required|numeric',
        'women_count' => 'required|numeric',
        'expat_count' => 'required|numeric',
        'local_count' => 'required|numeric',
        'logged_date' => 'required',
    ];

    protected $messages =
        [
            'atoll_id.required' => 'Select the atoll',
            'island_category_id.required' => 'Select the island category',
            'men_count' => 'Enter the population count for men',
            'women_count' => 'Enter the population count for women',
            'expat_count' => 'Enter the population count for expats',
            'local_count' => 'Enter the population count for locals',
            'logged_date' => 'Enter the logged date',
        ];

    public function mount($populationEntry)
    {
        $this->formValidationStatus = false;
        $this->islands = Island::all();
        $this->atolls = Atoll::all();

        $this->atoll_id = $populationEntry->atoll_id;
        $this->island_id = $populationEntry->island_id;
        $this->men_count = $populationEntry->men_count;
        $this->women_count = $populationEntry->women_count;

        $this->local_count = $populationEntry->local_count;
        $this->expat_count = $populationEntry->expat_count;
        $this->logged_date = $populationEntry->logged_date;
    }

    public function updatedAtollId()
    {
        $this->islands = Island::where('atoll_id', $this->atoll_id)->get();
    }

    public function updatedIslandId()
    {
        $this->atoll_id = Island::find($this->island_id)->atoll_id;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function validateForm()
    {
        $totalPopulation = $this->men_count + $this->women_count;

        if ($this->expat_count + $this->local_count != $totalPopulation) {
            $this->addError('expat_count', 'Expat count and local count should be equal to total population');
            $this->addError('local_count', 'Expat count and local count should be equal to total population');

            $this->formValidationStatus = false;
            return;
        }

        if ($this->validate()) {
            $this->formValidationStatus = true;
        } else {
            $this->formValidationStatus = false;
        }
    }


    public function render()
    {
        return view('livewire.population-entry.edit');
    }
}

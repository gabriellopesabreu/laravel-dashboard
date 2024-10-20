<?php
 
namespace App\Livewire;
 
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;
 
class ExemploComponent extends Component implements HasForms
{
    use InteractsWithForms;
    
    public ?array $data = [];
    
    public function mount(): void
    {
        $this->form->fill();
    }
    
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label("Nome"),
                TextInput::make('tax1')
                    ->numeric()
                    ->label("Taxa 1"),
                TextInput::make('tax2')
                    ->numeric()
                    ->label("Taxa 2"),
                TextInput::make('tax3')
                    ->numeric()
                    ->label("Taxa 3"),
                TextInput::make('tax4')
                    ->numeric()
                    ->label("Taxa 4"),
                TextInput::make('tax5')
                    ->numeric()
                    ->label("Taxa 5"),
                
            ]);
    }
    
    public function create(): void
    {
        dd($this->form->getState());
    }
    
    public function render()
    {
        return view('livewire.exemplo-component');
    }
}

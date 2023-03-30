<?php

namespace App\Filament\Pages;


use Debugbar;
use App\Models\User;
use Filament\Pages\Page;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Concerns\InteractsWithForms;
use robertogallea\LaravelCodiceFiscale\CodiceFiscale;

class Profile extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $title = 'Profilo';

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'Account';

    protected static string $view = 'filament.pages.profile';

    // protected static ?string $slug = '../profilo';


    protected static string | array  $middlewares = ['web'];



    public User $user;

    public $name;

    public $email;

    public $qualifica_id;

    public $team_id;

    public $data_nascita;

    public $sesso;

    public $cf;




    public function mount()
    {
        $_user= auth()->user();
        $this->form->fill([
            'name' => $_user->name,
            'email' => $_user->email,
            'data_nascita' => $_user->data_nascita,
            'sesso' => $_user->sesso,
            'qualifica_id' => $_user->qualifica->id ?? 0,
            'team_id' => $_user->area?->id,
            //'cf' => CodiceFiscale::generate()

        ]);
    }

    protected function getFormModel(): string
    {
        return User::class;
    }

    public function submit()
    {
        $this->form->getState();

        $state = array_filter([
            'name' => $this->name,
            'email' => $this->email,
            'team_id' => $this->team_id,
            'qualifica_id' => $this->qualifica_id,
            'data_nascita' => $this->data_nascita,
            'sesso' => $this->sesso,
        ]);

        auth()->user()->update($state);

        // $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
        redirect()->intended(url()->previous());
        $this->notify('success', 'Il tuo profilo è stato aggiornato.', isAfterRedirect: true);
    }

    public function getCancelButtonUrlProperty()
    {
        return static::getUrl();
    }

    protected function getBreadcrumbs(): array
    {
        return [
            url()->current() => 'Profile',
        ];
    }

    protected function getFormSchema(): array
    {
        return [
            Section::make('Generale')
                ->columns(2)
                ->schema([
                    TextInput::make('name')
                        ->required(),
                    TextInput::make('email')
                        ->label('Email')
                        ->required(),
                    TextInput::make('data_nascita')->type('date'),
                    Select::make('sesso')
                    ->options([
                        'M' => 'Maschio',
                        'F' => 'Femmina',
                    ]),
                ]),

            Section::make('Dati Ufficio')
                ->columns(2)
                ->schema([
                    Select::make('team_id')
                        ->label('Ufficio di Appartenenza')
                        ->relationship('area', 'name')
                        ->required()
                        ->default(''),
                    Select::make('qualifica_id')
                        ->relationship('qualifica', 'name')
                        ->required()
                        ->default(''),
                ]),
        ];
    }
}

<?php

namespace App\Filament\Pages;


use App\Models\User;
use Filament\Pages\Page;

use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Concerns\InteractsWithForms;

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




    public function mount()
    {
        $this->form->fill([
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'qualifica_id' => auth()->user()->qualifica->id ?? 0,
            'team_id' => auth()->user()->area?->id,

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
                ]),

            Section::make('Dati Ufficio')
                ->columns(2)
                ->schema([
                    BelongsToSelect::make('team_id')
                        ->label('Ufficio di Appartenenza')
                        ->relationship('area', 'name')
                        ->required()
                        ->default(''),
                    BelongsToSelect::make('qualifica_id')
                        ->relationship('qualifica', 'name')
                        ->required()
                        ->default(''),
                ]),

        ];
    }
}

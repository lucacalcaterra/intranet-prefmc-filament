<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReportResource\Pages;
use App\Filament\Resources\ReportResource\RelationManagers;

use App\Models\Report;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\LinkAction;

use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;


class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form

            ->schema([
                Forms\Components\Card::make()->columns(1)->schema([
                    Forms\Components\Hidden::make('user_id')->default(Auth::user()->id),
                    Forms\Components\DatePicker::make('data')->required()->displayFormat('d-m-Y')->default(now())
                        ->unique(callback: function (Unique $rule) {
                            // x constraint check -  verifica che non ci sia già un  report per coppia (stesso utente e data)
                            return $rule
                                ->where('user_id', Auth::user()->id)
                                ->where('data', date('y-m-d'));
                        }),
                    Forms\Components\RichEditor::make('testo')->disableToolbarButtons([
                        'attachFiles',
                        'codeBlock',
                    ])->required(),
                ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('user_id')->sortable(),
                Tables\Columns\TextColumn::make('data')->sortable()->date()->dateTime('d-m-Y'),
                Tables\Columns\TextColumn::make('created_at')->label('Creato il')
                    ->dateTime('d-m-Y H:i:s'),
                Tables\Columns\TextColumn::make('updated_at')->label('Modificato il')
                    ->dateTime('d-m-Y H:i:s'),
                Tables\Columns\BadgeColumn::make('stato')
                    ->colors([
                        'primary',
                        'warning' => 'INSERITO',
                        'success' => 'INVIATO',
                        //'published' => 'Published',
                    ])

                // // VALIDA Report
                // ->action(function (Report $record) {
                //     dd("ciao");
                //     $record->stato = "INVIATO";
                //     $record->save();
                // })
            ])
            ->filters([
                //
            ])
            ->actions([
                // LinkAction::make('a')
                //     // VALIDA Report
                //     ->action(function (Report $record) {
                //         $record->stato = "INVIATO";
                //         $record->save();
                //     })
                //     ->requiresConfirmation()
            ])
            ->defaultSort('data', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReports::route('/'),
            'create' => Pages\CreateReport::route('/create'),
            'edit' => Pages\EditReport::route('/{record}/edit'),
        ];
    }
}

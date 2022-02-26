<?php

namespace App\Filament\Resources\ReportResource\Pages;

use Illuminate\Database\Eloquent\Builder;

use App\Filament\Resources\ReportResource;
use Filament\Resources\Pages\ListRecords;

use Illuminate\Support\Facades\Auth;
class ListReports extends ListRecords
{
    protected static string $resource = ReportResource::class;

    protected function getTableQuery(): Builder
    {
        return static::getResource()::getEloquentQuery()->where('user_id', Auth::user()->id);
    }

}

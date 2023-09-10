<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BanchResource\RelationManagers\UserRelationManager;
use App\Filament\Resources\BranchResource\Pages;
use App\Filament\Resources\BranchResource\RelationManagers;
use App\Models\Branch;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BranchResource extends Resource
{
    protected static ?string $model = Branch::class;

    protected static ?string $navigationGroup = 'Maintenance Module';

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make("ref_region_id")
                        ->relationship('regions', 'regDesc')
                        ->label("Region"),
                Forms\Components\Select::make("ref_region_id")
                        ->relationship('regions', 'regDesc')
                        ->label("Region"),
                Forms\Components\Select::make("ref_region_id")
                        ->relationship('regions', 'regDesc')
                        ->label("Region"),
                Forms\Components\TextInput::make("branch_address")
                        ->label("Address"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("id")
                        ->label("ID"),
                Tables\Columns\TextColumn::make("branch_address")
                        ->label("Address"),
                Tables\Columns\TextColumn::make("created_at")
                        ->label("Date Created")
                        ->dateTime('d-M-Y'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            UserRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBranches::route('/'),
            'create' => Pages\CreateBranch::route('/create'),
            'edit' => Pages\EditBranch::route('/{record}/edit'),
        ];
    }    
}

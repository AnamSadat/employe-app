<?php

namespace App\Filament\Resources\Employees\Schemas;

use App\Models\Employee;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EmployeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')
                    ->label('First Name')
                    ->required()
                    ->minLength(2)
                    ->maxLength(50),
                TextInput::make('last_name')
                    ->label('Last Name')
                    ->required()
                    ->minLength(2)
                    ->maxLength(50),
                TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->email()
                    ->maxLength(50)
                    ->unique(Employee::class, 'email', ignoreRecord: true),
                TextInput::make('phone')
                    ->label('Phone')
                    ->required()
                    ->tel()
                    ->maxLength(50)
                    ->unique(Employee::class, 'phone', ignoreRecord: true)
                    ->rules(['required', 'digit:10', 'numeric'])
                    ->helperText('Enter a 10-digit phone number(numbers only, no space or symbols)')
                    ->validationAttribute('phone number'),
                TextInput::make('position')
                    ->label('Job Title')
                    ->required()
                    ->minLength(4)
                    ->maxLength(50),
                TextInput::make('salary')
                    ->label('Email')
                    ->required()
                    ->numeric()
                    ->minValue(1000)
                    ->maxValue(999999999999999.99)
                    ->step(0.01)
                    ->placeholder('5000.00')
                    ->helperText('Enter a salary between 1000.00 and 99,999'),
            ]);
    }
}

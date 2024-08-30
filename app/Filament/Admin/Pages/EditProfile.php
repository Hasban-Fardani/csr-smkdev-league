<?php

namespace App\Filament\Admin\Pages;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;

class EditProfile extends Page implements HasForms
{
    use InteractsWithForms;
    
    protected static bool $shouldRegisterNavigation = false;

    protected static string $view = 'filament.admin.pages.edit-profile';

    public ?array $data = []; 

    public function mount(): void
    {
        $this->form->fill(auth()->user()->attributesToArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('avatar')
                    ->label('Foto')
                    ->image()
                    ->maxSize(10 * 1024) // 10 MB
                    ->preserveFilenames()
                    ->helperText('Klik untuk unggah atau seret dan lepas ke sini. PNG, JPG up to 10MB.'),
                TextInput::make('name')
                    ->label('Nama')
                    ->required(),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required(),
                Textarea::make('bio')
                    ->label('Deskripsi')
                    ->rows(3),
            ])
            ->statePath('data');
    }

    public function submit()
    {
        $data = $this->form->getState();

        if (!empty($data['avatar'])) {
            $data['avatar'] = $data['avatar']->getFullUrl();
        } else {
            unset($data['avatar']);
        }

        $usr =auth()->user()->update($data);

        $this->redirect(route('filament.admin.pages.profile'));
    }
}

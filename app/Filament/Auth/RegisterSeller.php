<?php
namespace App\Filament\Auth;

use Coderflex\FilamentTurnstile\Forms\Components\Turnstile;
use Filament\Pages\Auth\Register as BaseRegister;
use Filament\Forms;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Section;
use Filament\Infolists\Infolist;

class RegisterSeller extends BaseRegister {
    protected string $userModel = "App\Models\Partner";
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                    $this->getNameFormComponent(),
                    $this->getEmailFormComponent(),
                    $this->getPasswordFormComponent()
                        ->columnSpanFull(),
                    $this->getPasswordConfirmationFormComponent()
                        ->columnSpanFull(),
                ])
                ->statePath('data'),
            ),
        ];
    }

    protected function handleRegistration(array $data): Model
    {
        return $this->getUserModel()::create($data);
    }
    
    // if you want to reset the captcha in case of validation error
    protected function throwFailureValidationException(): never
    {
        $this->dispatch('reset-captcha');
 
        parent::throwFailureValidationException();
    }
}
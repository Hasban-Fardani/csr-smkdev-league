<?php
namespace App\Filament\Auth;

use Coderflex\FilamentTurnstile\Forms\Components\Turnstile;
use Filament\Pages\Auth\Register as BaseRegister;
 
class Register extends BaseRegister {
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                        Turnstile::make('captcha')
                            ->label('Captcha')
                            ->theme('auto'),
                    ])
                    ->statePath('data'),
            ),
        ];
    }
    
    // if you want to reset the captcha in case of validation error
    protected function throwFailureValidationException(): never
    {
        $this->dispatch('reset-captcha');
 
        parent::throwFailureValidationException();
    }
}
<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    public function test_user_can_login_with_correct_credentials()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'admin@example.com')
                ->type('password', 'secret')
                ->press('Entrar')
                ->assertPathIs('/') // redirige al home
                ->assertSee('Cerrar sesión'); // prueba visible solo si login correcto
        });
    }

    public function test_user_cannot_login_with_invalid_credentials()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'admin@example.com')
                ->type('password', 'wrong-password')
                ->press('Entrar')
                ->assertPathIs('/login')
                ->assertSee('Credenciales incorrectas');
        });
    }
}

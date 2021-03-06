<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        Form::component('bsText', 'components.form.text', ['name', 'value' => null, 'attributes' => []]);
        Form::component('bsTextarea', 'components.form.textarea', ['name', 'value' => null, 'attributes' => []]);
        Form::component('bsSubmit', 'components.form.submit', ['value' => 'GO', 'attributes' => []]);
        Form::component('hidden', 'components.form.hidden', ['name', 'value' => null, 'attributes' => []]);
        Form::component('bsInput', 'components.form.fileinput', ['name']);
        Form::component('bsCheckbox', 'components.form.checkbox', ['name', 'label', 'value', 'checked']);
        Form::component('bsDropdown', 'components.form.dropdown', ['name', 'values', 'attributes' => []]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

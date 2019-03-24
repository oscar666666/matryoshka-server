@extends('layouts.app')

@section('title', 'Editing App: ' . $androidApp->name)

@section('html')
    {{-- Login, Register tabs --}}
    <div id="page-android-apps-create" class="page-content page-content-android-apps">
        <div class="mdc-layout-grid page-content-item">
            {{-- Controls --}}
            <div class="mdc-layout-grid__inner">
                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1">
                    @button([
                        'classes' => 'mdc-button mdc-button--outlined',
                        'onClick' => 'window.history.back()'
                    ])
                        Back
                    @endbutton
                </div>
            </div>
        </div>

        <div class="mdc-layout-grid page-content-item">
            <h1 class="page-title mdc-typography--headline4 text-center">Editing App: {{ $androidApp->name }}</h1>
        </div>

        <div class="mdc-layout-grid__inner page-content-item">
            @if ($errors->any())
                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 errors">
                    <span>Please correct the errors below and try again:</span>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="error">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
                <p class="required-warning">
                    Fields marked * are required.
                </p>
            </div>
        </div>

        <div class="mdc-layout-grid__inner page-content-item">
            <div id="tab-login" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 tab">
                <form method="POST" action="/android_apps/{{ $androidApp->id }}" enctype="multipart/form-data">
                    @method("patch")
                    @csrf
                    <input type="hidden" name="g-recaptcha-token" class="g-recaptcha-token">

                    {{-- Name --}}
                    @textfield([
                        "name" => "name",
                        "required" => true,
                        "value" => $androidApp->name
                    ])
                        Name
                    @endtextfield

                    {{-- Description --}}
                    <div class="mdc-text-field mdc-text-field--textarea">
                        <textarea name="description" class="mdc-text-field__input" rows="8" cols="40">{{ $androidApp->description }}</textarea>
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="description" class="mdc-floating-label">Description</label>
                                </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>

                    {{-- Version --}}
                    @textfield([
                        "name" => "version",
                        "required" => true,
                        "value" => $androidApp->version
                    ])
                        Version
                    @endtextfield

                    {{-- Price --}}
                    @textfield([
                        "name" => "price",
                        "required" => true,
                        "value" => $androidApp->price
                    ])
                        Price
                    @endtextfield

                    <label for="avatar" class="mdc-typography--subtitle1">
                        Avatar
                    </label>
                    <input type="file" name="avatar">

                    <label for="file" class="mdc-typography--subtitle1">
                        File
                    </label>
                    <input type="file" name="file">

                    {{-- Submit button --}}
                    <button class="mdc-button mdc-button--raised submit" type="submit" disabled>
                        <span class="mdc-button__label">Submit</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
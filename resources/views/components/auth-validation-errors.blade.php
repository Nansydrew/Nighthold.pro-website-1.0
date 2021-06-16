@props(['errors'])

@if ($errors->any())
    <div id="js-errors" {{ $attributes }} role="alert" aria-relevant="additions removals" data-support-aria="Перейти по ссылке сайта поддержки, внешней ссылке.">

        @foreach ($errors->all() as $error)
            <p class="error-message-heading" tabindex="0">{{ $error }}</p>
        @endforeach
    </div>
@endif

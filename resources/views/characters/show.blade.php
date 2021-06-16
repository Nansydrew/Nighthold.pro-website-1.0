<x-app-layout>
    @push('css')
        <link href="{{ asset('static/5.60a3b147f091048d9af5.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('static/8.e30c2327d4d9ba9aab80.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('static/17.f40c232ffe8c6c1deb61.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('static/character-profile.1d8296fc2a8ba6d8b1c1.css') }}" rel="stylesheet" type="text/css"/>
        <style>
            .CharacterProfileApp > .Pane-bg {
                background-color: #07050c;
                background-image: url(data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAf/AABEIAAgACgMBEQACEQEDEQH/xAGiAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgsQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+gEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoLEQACAQIEBAMEBwUEBAABAncAAQIDEQQFITEGEkFRB2FxEyIygQgUQpGhscEJIzNS8BVictEKFiQ04SXxFxgZGiYnKCkqNTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqCg4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2dri4+Tl5ufo6ery8/T19vf4+fr/2gAMAwEAAhEDEQA/AP435/DnwniuNae51fwS0t5cwNoyafqjS6bY20t4txMbjyIXm8yO0VLeOFMqm+VZdsvCftGMlwhPEZjiI0MvgqmKVXB4bCVVHDUaFWu6kqfLUUatqVLlpU48y0Tv7zsvKUcxaw8faVNKbVWWt5VIw5dHezUpc0m7L7NtFr7c3w//AGUyzGD4ofClISxMKXC+PGuEiJ/drOyeFHQzKmBKUZlLhirEYJ9n2fh19mnhlH7KliKcpKPRSl9qVt5dXqccVnfLH2lZe05Vz8sKijz297lV9I3vZdEf/9k=);
            }
        </style>
    @endpush
    @push('characters')
        <script type="text/javascript" id="character-profile-mount-initial-state">var characterProfileInitialState = {!! $data !!};
        </script>
    @endpush
   <div class="Pane CharacterProfileApp Pane--staticContent Pane--full"><div class="Pane-bg"><div class="Pane-overlay"></div></div><div class="Pane-content"><div class="CharacterProfileApp-spinnerWrapper"><div class="Spinner Spinner--large Spinner--donut position-centered"><div class="Spinner-orange"></div><div class="Spinner-donut"><div class="Spinner-donut-icon"><div class="Spinner-donut-cut"><div class="Spinner-donut-donut"></div></div></div></div></div></div><div class="react-mount CharacterProfileApp-mount" id="character-profile-mount" data-initial-state-variable-name="characterProfileInitialState"></div></div></div>
    @push('scripts')
        <script src="{{ asset('static/runtime.c86dff083122a451b1af.js') }}"></script>
        <script src="{{ asset('static/three-js.4b7d5b26089177f0176e.js') }}"></script>
        <script src="{{ asset('static/react-reconciler.8db5c1448de6d035b949.js') }}"></script>
        <script src="{{ asset('static/react-three-fiber.ecbcaa69d057d704b706.js') }}"></script>
        <script src="{{ asset('static/wow-tooltip-ui.8cf7f624a100d49e98b1.js') }}"></script>
        <script src="{{ asset('static/fast-png.231b31b557a651b9eb3f.js') }}"></script>
        <script src="{{ asset('static/lottie-web.0fa813caa0d880c1c09a.js') }}"></script>
        <script src="{{ asset('static/vendor.ac7a75610385e9b40211.js') }}"></script>
        <script src="{{ asset('static/5.f2235536ffbfe6a4c3c6.js') }}"></script>
        <script src="{{ asset('static/1.3ac3d2c8bf0a2058a0b8.js') }}"></script>
        <script src="{{ asset('static/3.20dec79f412b658fa525.js') }}"></script>
        <script src="{{ asset('static/4.6313dbc7dd37a1f5669a.js') }}"></script>
        <script src="{{ asset('static/6.ce7a00cb4923516682bb.js') }}"></script>
        <script src="{{ asset('static/8.4055c98746d08b7640ae.js') }}"></script>
        <script src="{{ asset('static/9.a6d99ec7616faaa96b3c.js') }}"></script>
        <script src="{{ asset('static/20.77649652a4eeab75a26c.js') }}"></script>
        <script src="{{ asset('static/17.0ca0073acc0df7e42a6d.js') }}"></script>
        <script src="{{ asset('static/character-profile.305c4832986421e6d106.js') }}"></script>
    @endpush
</x-app-layout>

<x-app-layout>
    @push('css')
        <link href="{{ asset('static/5.60a3b147f091048d9af5.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('static/realm-status.9802a5aa1ebc394c24c4.css') }}" rel="stylesheet" type="text/css"/>
    @endpush
   <div class="Pane Pane--dirtDark Pane--full z-index-above" queryselectoralways="31">
      <div class="Pane-bg">
         <div class="Pane-overlay"></div>
      </div>
      <div class="Pane-content">
         <div class="react-mount" id="realm-status-mount" data-initial-state-variable-name="realmStatusInitialState"></div>
      </div>
   </div>

    @push('scripts')
        <script src="{{ asset('static/runtime.c86dff083122a451b1af.js') }}"></script>
        <script src="{{ asset('static/vendor.ac7a75610385e9b40211.js') }}"></script>
        <script src="{{ asset('static/1.3ac3d2c8bf0a2058a0b8.js') }}"></script>
        <script src="{{ asset('static/3.20dec79f412b658fa525.js') }}"></script>
        <script src="{{ asset('static/4.6313dbc7dd37a1f5669a.js') }}"></script>
        <script src="{{ asset('static/6.ce7a00cb4923516682bb.js') }}"></script>
        <script src="{{ asset('static/22.27e5ae9382f828eda23f.js') }}"></script>
        <script src="{{ asset('static/realm-status.d449c6e2f8ed4c0011ce.js') }}"></script>
    @endpush
</x-app-layout>

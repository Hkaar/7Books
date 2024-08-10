<section class="d-flex min-vh-100">
  <x-dashboard-side-bar selected="{{ $active }}" class="bg-primary"></x-dashboard-side-bar>

  <div class="flex-fill mw-100 d-flex flex-column">
    <x-dashboard-navigation></x-dashboard-navigation>

    <div {{ $attributes->merge(["class" => "container my-4 flex-fill d-flex flex-column"]) }}>
      {{ $slot }}
    </div>
  </div>
</section>

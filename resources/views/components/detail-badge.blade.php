<div {{ $attributes->merge(['class' => 'row']) }}>
  <div class="col-4 rounded-start border-body-tertiary d-flex bg-body-tertiary fw-semibold border p-3">
    {{ $title }}
  </div>
  <div class="col-8 rounded-end border-body-tertiary border p-3">
    {{ $slot }}
  </div>
</div>

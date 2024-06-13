<div class="accordion accordion-flush d-lg-none w-100" id="queryAccordion">
  <div class="accordion-item w-100">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mainFlush" aria-expanded="false" aria-controls="mainFlush">
        Show available filters
      </button>
    </h2>
    <div id="mainFlush" class="accordion-collapse collapse bg-body-tertiary" data-bs-parent="#queryAccordion">
      <div class="container">
        {{ $slot }}
      </div>
    </div>
  </div>
</div>

<div class="d-none d-lg-block">
  {{ $slot }}
</div>
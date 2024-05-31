<div class="row h-100">
  <div class="col-12 col-lg-6">
    <article class="d-flex flex-column gap-1 flex-fill mb-3">
      <b>User ID :</b>
      {{ $order->user_id }}
    </article>
  </div>

  <div class="col-12 col-lg-6">
    <article class="d-flex flex-column gap-1 flex-fill mb-3">
      <b>Token :</b>
      {{ $order->token }}
    </article>
  </div>

  <div class="col-12 col-lg-6">
    <article class="d-flex flex-column gap-1 flex-fill mb-3">
      <b>Return by :</b>
      {{ $order->return_date }}
    </article>
  </div>

  <div class="col-12 col-lg-6">
    <article class="d-flex flex-column gap-1 flex-fill mb-3">
      <b>Placed at :</b>
      {{ $order->placed }}
    </article>
  </divcol-12>

  <div class="col-12 col-lg-6">
    <article class="d-flex flex-column gap-1 flex-fill mb-3">
      <b>Status :</b>
      {{ $order->status }}
    </article>
  </div>

  <div class="col-12">
    <button type="button" class="btn btn-primary"
      hx-get="{{ route('orders.items', $order->id) }}" 
      hx-target="#detailsBody" 
      hx-swap="innerHTML"
      >Show Books
    </button>
  </div>
</div>
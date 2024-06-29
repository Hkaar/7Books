<div class="row">
  <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
    <div id="preview" class="profile">
      <img src="{{ Storage::url($user->img) }}" alt="Image not available">
    </div>
  </div>

  <div class="col-12 col-lg-6">
    <div class="shadow-sm p-3 d-flex flex-column p-3 gap-2">
      <article class="d-flex flex-column gap-1 flex-fill">
        <b>Display Name</b>
        {{ $user->name }}
      </article>

      <article class="d-flex flex-column gap-1 flex-fill">
        <b>Username</b>
        {{ $user->username }}    
      </article>
      
      <article class="d-flex flex-column gap-1 flex-fill">
        <b>Email</b>
        {{ $user->email }}
      </article>

      <article class="d-flex flex-column gap-1 flex-fill">
        <b>Level</b>
        {{ $user->role }}
      </article>
    </div>
  </div>
</div>
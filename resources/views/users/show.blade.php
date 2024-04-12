<div class="row">
  <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
    <div id="preview" class="profile">
      <img src="{{ Storage::url($user->img) }}" alt="Image not available">
    </div>
  </div>

  <div class="col-12 col-lg-6">
    <div class="d-flex flex-column p-3">
      <article class="info mb-3">
        <b>Name</b>
        {{ $user->name }}
      </article>

      <article class="info mb-3">
        <b>Level</b>
        {{ $user->level }}
      </article>

      <article class="info mb-3">
        <b>Email</b>
        {{ $user->email }}
      </article>

      <article class="info mb-3">
        <b>Password</b>
        <p class="max-width: 200px;">
          {{ $user->password }}
        </p>
      </article>
    </div>
  </div>
</div>
<div class="row h-100">
  <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
    <div id="preview" class="profile">
      <img src="{{ Storage::url($author->img) }}" alt="Profile picture not available">
    </div>
  </div>

  <div class="col-12 col-md-6 d-flex align-items-center">
    <div class="d-flex flex-column p-3 align-items-start">
      <article class="d-flex flex-column gap-1 flex-fill mb-3">
        <b>Name</b>
        {{ $author->name }}
      </article>

      <article class="d-flex flex-column gap-1 flex-fill mb-3">
        <b>Address</b>
        {{ $author->address }}
      </article>

      <article class="d-flex flex-column gap-1 flex-fill mb-3">
        <b>Phone</b>
        {{ $author->phone }}
      </article>
      
      <button type="button" class="btn btn-primary"
        hx-get="{{ URL::to('/manage/authors/authored', $author->id) }}" 
        hx-target="#detailsBody" 
        hx-swap="innerHTML"
        >Show Books
      </button>
    </div>
  </div>
</div>
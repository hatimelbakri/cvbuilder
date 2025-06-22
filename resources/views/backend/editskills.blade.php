@extends('backend.dashboard')
@section('main')
<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row">
          <div class="col-md-8">
            <div class="card shadow mb-4">
              <div class="card-header">
                <strong class="card-title">Edit Skills</strong>
              </div>

              <div class="card-body">
                <form id="skills-form" method="POST" action="{{ route('update.skills') }}">
                  @csrf
                  {{-- if your route is PUT use @method('PUT') here --}}
                  
                  {{-- hidden inputs for IDs marked for deletion --}}
                  <div id="deleted-ids"></div>

                  <div id="skills-container">
                    @foreach ($skills as $index => $skill)
                      <div class="skill-entry mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="flex-grow-1 me-3">
                            <label>Name</label>
                            <input  type="text"
                                    name="skills[{{ $index }}][name]"
                                    class="form-control mb-2"
                                    value="{{ $skill->name }}"
                                    required>

                            <input type="hidden"
                                   name="skills[{{ $index }}][level]"
                                   class="level-input"
                                   value="{{ $skill->level }}">

                            <input type="hidden"
                                   name="skills[{{ $index }}][id]"
                                   value="{{ $skill->id }}">

                            <div class="level">
                              @for ($i = 1; $i <= 5; $i++)
                                <i class="star fa fa-star {{ $i <= $skill->level ? 'checked' : '' }}"
                                   data-value="{{ $i }}"></i>
                              @endfor
                            </div>
                          </div>

                          {{-- Delete button --}}
                          <button type="button"
                                  class="btn btn-outline-danger btn-sm delete-skill ms-1"  {{-- ⬅ ms‑1 = 0.25 rem ≈ 4 px --}}
                                  style="margin-left:5px;"           {{-- or use this exact 5 px if you prefer --}}
                                  data-id="{{ $skill->id }}">
                            <i class="fa fa-trash"></i>
                          </button>

                        </div>
                        <hr>
                      </div>
                    @endforeach
                  </div>

                  <button type="submit" class="btn btn-primary float-end">Update</button>
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

{{-- simple star‑rating styling --}}
<style>
  .level .fa-star        { color:#ddd; cursor:pointer; font-size:20px; }
  .level .fa-star.checked{ color:orange; }
</style>

{{-- jQuery & JS logic --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
/* click on star => change rating */
$(document).on('click', '.star', function () {
  const $star     = $(this);
  const value     = $star.data('value');
  const $levelDiv = $star.closest('.level');

  $levelDiv.find('.star').each(function () {
      $(this).toggleClass('checked', $(this).data('value') <= value);
  });
  $levelDiv.siblings('.level-input').val(value);
});

/* click on trash => mark for deletion + remove from DOM */
$(document).on('click', '.delete-skill', function () {
  const id = $(this).data('id');   // DB id
  if (id) {
      $('#deleted-ids').append(
          `<input type="hidden" name="deleted_ids[]" value="${id}">`
      );
  }
  $(this).closest('.skill-entry').remove();
});
</script>
@endsection

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
                <strong class="card-title">Skills</strong>
                <p>Add your top professional key skills</p>
              </div>
              <div class="card-body">
                <form id="skills-form" method="POST" action="{{ route('save.skills') }}">
                  @csrf
                  <div id="skills-container">
                    <div class="skill-entry mb-3">
                      <label>Name</label>
                      <input type="text" name="skills[0][name]" class="form-control mb-2" placeholder="Skill name" required>
                      <input type="hidden" name="skills[0][level]" class="level-input" value="5">
                      <div class="level">
                        @for($i = 1; $i <= 5; $i++)
                          <i class="star fa fa-star {{ $i <= 5 ? 'checked' : '' }}" data-value="{{ $i }}"></i>
                        @endfor
                      </div>
                      <hr>
                    </div>
                  </div>
                  <button type="button" class="btn btn-outline-primary btn-sm" onclick="addSkill()">+ Add More Skill</button>
                  <button type="button" class="btn btn-outline-danger btn-sm" onclick="removeSkill()">- Remove</button>
                  <button type="submit" class="btn btn-primary float-right">Save</button>
                  <br>
                  <br>
                
                  <div class="d-flex justify-content-end">
                    <a class="btn btn-danger" href="{{route('user.language')}}">Add Language</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<style>
  .level .fa-star {
    color: #ddd;
    cursor: pointer;
    font-size: 20px;
  }
  .level .fa-star.checked {
    color: orange;
  }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
let skillIndex = 1;

function addSkill() {
  let html = `
    <div class="skill-entry mb-3">
      <label>Name</label>
      <input type="text" name="skills[${skillIndex}][name]" class="form-control mb-2" placeholder="Skill name" required>
      <input type="hidden" name="skills[${skillIndex}][level]" class="level-input" value="5">
      <div class="level">
        ${[1,2,3,4,5].map(i => `<i class="star fa fa-star checked" data-value="${i}"></i>`).join('')}
      </div>
      <hr>
    </div>`;
  $('#skills-container').append(html);
  skillIndex++;
}

function removeSkill() {
  if ($('.skill-entry').length > 1) {
    $('.skill-entry').last().remove();
    skillIndex--;
  }
}

$(document).on('click', '.star', function () {
  const $star = $(this);
  const value = $star.data('value');
  const $levelDiv = $star.closest('.level');
  $levelDiv.find('.star').each(function () {
    const $s = $(this);
    $s.toggleClass('checked', $s.data('value') <= value);
  });
  $levelDiv.siblings('.level-input').val(value);
});
</script>
@endsection

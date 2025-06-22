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
                <strong class="card-title">Languages</strong>
                <p>Add the languages you speak and your proficiency level.</p>
              </div>

              <div class="card-body">
                <form id="language-form" method="POST" action="{{ route('save.language') }}">
                  @csrf

                  <div id="language-container">
                    {{-- first entry --}}
                    <div class="language-entry mb-3 border-bottom pb-3">
                      <label>Language</label>
                      <input type="text"
                             name="languages[0][language]"
                             class="form-control mb-2"
                             placeholder="e.g. English"
                             required>

                      <label>Proficiency</label>
                      <select name="languages[0][proficiency]" class="form-control" required>
                          <option value="">Select level</option>
                          <option value="beginner">Beginner</option>
                          <option value="intermediate">Intermediate</option>
                          <option value="advanced">Advanced</option>
                          <option value="native">Native</option>
                      </select>
                    </div>
                  </div>

                  {{-- add / remove buttons --}}
                  <button type="button" class="btn btn-outline-primary btn-sm" onclick="addLanguage()">+ Add More</button>
                  <button type="button" class="btn btn-outline-danger btn-sm" onclick="removeLanguage()">− Remove</button>

                  <button type="submit" class="btn btn-primary float-right">Save</button>
                  <br>
                  <br>
                  <div class="d-flex justify-content-end">
                    <a class="btn btn-danger" href="{{route('user.project')}}">Add project</a>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
let langIndex = 1;

function addLanguage() {
  const html = `
    <div class="language-entry mb-3 border-bottom pb-3">
      <label>Language</label>
      <input type="text"
             name="languages[${langIndex}][language]"
             class="form-control mb-2"
             placeholder="e.g. Spanish"
             required>

      <label>Proficiency</label>
      <select name="languages[${langIndex}][proficiency]" class="form-control" required>
          <option value="">Select level</option>
          <option value="beginner">Beginner</option>
          <option value="intermediate">Intermediate</option>
          <option value="advanced">Advanced</option>
          <option value="native">Native</option>
      </select>
    </div>`;
  $('#language-container').append(html);
  langIndex++;
}

function removeLanguage() {
  if ($('.language-entry').length > 1) {
      $('.language-entry').last().remove();
      langIndex--;
  }
}
</script>
@endsection

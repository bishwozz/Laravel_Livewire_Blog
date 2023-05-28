<main class="layout layout--3">
  <div class="container">
    <!-- Topics Start -->
    @include('Page.topic_components')

    <!-- Topics End -->

    <!-- Room List Start -->
    <div class="roomList">
      <div class="mobile-menu">
        <form action="#" method="GET" class="header__search">
          <label>
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
              <title>search</title>
              <path
                d="M32 30.586l-10.845-10.845c1.771-2.092 2.845-4.791 2.845-7.741 0-6.617-5.383-12-12-12s-12 5.383-12 12c0 6.617 5.383 12 12 12 2.949 0 5.649-1.074 7.741-2.845l10.845 10.845 1.414-1.414zM12 22c-5.514 0-10-4.486-10-10s4.486-10 10-10c5.514 0 10 4.486 10 10s-4.486 10-10 10z">
              </path>
            </svg>
            <input name="q" placeholder="Search for posts" />
          </label>
        </form>
        <div class="mobile-menuItems">
          <a class="btn btn--main btn--pill" href="#">Browse Topics</a>
          <a class="btn btn--main btn--pill" href="#">Recent Activities</a>
        </div>
      </div>

      <div class="roomList__header">
        <div>
          <h2>Blog</h2>
          <p> ({{ count($posts) }})Blog available</p>
        </div>
        @if(!$addPost && !$updatePost)
            <a class="btn btn--main" wire:click="addPost()">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                <title>add</title>
                <path
                d="M16.943 0.943h-1.885v14.115h-14.115v1.885h14.115v14.115h1.885v-14.115h14.115v-1.885h-14.115v-14.115z">
                </path>
            </svg>
            Add New Post
            </a>
        @endif

      </div>
        <!-- excel upload -->
        <div class="excel_upload">
          <h1>Import Excel Data</h1>

            <form wire:submit.prevent="import">
                <input type="file" wire:model="file" accept=".xls, .xlsx">
                @error('file') <span class="error">{{ $message }}</span> @enderror

                <button type="submit">Import</button>
            </form>

            @if (session()->has('message'))
                <div class="success" style="color:green;">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <br>

      <!-- filter -->
      <div class="post-filter" style="margin-bottom:1em;">
        <div class="form__control">
          <label for="searchTitle">Title</label>
          <input wire:model="searchTitle" type="text">
        </div>

        <div class="form__control">
          <label for="searchTitle">User</label>
          <select wire:model="userFilter" multiple>
            <option value = "" >Any</option>
            @foreach ($userData as $user)
              <option value = "{{ $user->id }}" >{{ $user->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form__control">
          <label for="searchTitle">Category</label>
          <select wire:model="categoryFilter" multiple class="custom-select">
            <option value = "" >Any</option>
            @foreach ($categories as $category)
              <option value = "{{ $category->id }}" >{{ $category->name }}</option>
            @endforeach
          </select>
        
        </div>

        <div class="form__control">
            <label for="searchTitle">Tag</label>
            <select multiple wire:model="tagFilter" class="select2" wire:ignore>
              <option value="">All Tags</option>
              @foreach ($tagsDetail as $tag)
                  <option value="{{ $tag->id }}">{{ $tag->name }}</option>
              @endforeach
          </select>
        </div>

        


      </div>
      <div class="form__control" style="margin-bottom:1em;">
        <br>
          <button wire:click="clearFilters" class="">Clear Filters</button>
        </div>
        @include('livewire.extend-list')
        {{ $posts->links() }}
       
    </div>
    <!-- Room List End -->

    <!-- Activities Start -->
    @include('Page.topic_components')
    <!-- Activities End -->

  </div>
</main>
<script lang="javascript" src="https://cdn.sheetjs.com/xlsx-latest/package/dist/xlsx.full.min.js" ></script>
/* resources\views\livewire\excel-importer.blade.php */
<script>

window.addEventListener('import-processing', event => {
  alert('Data has been sent for processing!');
});

  // Reader and File Reference
  var reader = new FileReader();
  var fileElement = document.querySelector('#myFile');

  function process(){
    // Content as an ArrayBuffer
    reader.readAsArrayBuffer(fileElement.files[0]);
    reader.onload = function(event) {
        // Parse raw content
        var workbook = XLSX.read( event.target.result );
        // Release after read
        event.target.result = null; 
        workbook.SheetNames.forEach(function(sheetName) {
            // Current sheet
            var sheet = workbook.Sheets[sheetName];

            // Include header param to return array of arrays
            var rows  = XLSX.utils.sheet_to_json(sheet, {header:1});
        });
        
    } // End reader.onload 
  } // End process()
</script>

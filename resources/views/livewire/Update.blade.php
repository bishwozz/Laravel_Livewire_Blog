<main class="create-room layout" style="margin-top:1em;">
  <div class="container">
    <div class="layout__box">
      <div class="layout__boxHeader">
        <div class="layout__boxTitle">
          <a href="#">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
              <title>arrow-left</title>
              <path
                d="M13.723 2.286l-13.723 13.714 13.719 13.714 1.616-1.611-10.96-10.96h27.625v-2.286h-27.625l10.965-10.965-1.616-1.607z">
              </path>
            </svg>
          </a>
          <h3>Create/Update Post</h3>
        </div>
      </div>
      <div class="layout__body">
        <form class="form">
          <div class="form__group">
            <label for="title">Title</label>
            <input type="text" wire:model="title" id="title" class="@error('title') is-invalid @enderror"  required >
              @error('title') <span class="error">{{ $message }}</span> @enderror
          </div>

          <div class="form__group">
              <label for="category_id">Category:</label>
              <select wire:model="category_id" id="category_id" class="@error('category_id') is-invalid @enderror">
                  <option value="">Select a category</option>
                  @foreach ($categories as $category)
                      <option value="{{ $category->id }}" >{{ $category->name }}</option>
                  @endforeach
              </select>
              @error('category_id') <span class="error">{{ $message }}</span> @enderror

              <label for="tags">Tags:</label>
              <select wire:model="tags" id="tags" multiple class="@error('tags') is-invalid @enderror">
                  @foreach ($tags_list as $tag_id => $tag_name)
                    <option value="{{ $tag_id }}" @if (in_array($tag_id, $tags_list)) selected @endif>{{ $tag_name }}</option>
                  @endforeach
              </select>
              @error('tags') <span class="error">{{ $message }}</span> @enderror

          </div>

          <div class="form__group">
            <label for="image">Image:</label>
            <input type="file" wire:model="image" id="image" class="@error('image') is-invalid @enderror" value="{{ $image }}">
            @if ($image)
                <!-- <img src="{{ asset('storage/' . $image) }}" alt="Current Image"> -->
                <img src="/image/{{ $image }}" width="300px">
            @endif
            @error('image') <span class="error">{{ $message }}</span> @enderror
          </div>

          <div class="form__group">
            <label for="content">Content:</label>
            <textarea wire:model="content" id="content" class="@error('content') is-invalid @enderror" required></textarea>
            @error('content') <span class="error">{{ $message }}</span> @enderror
          </div>


          <div class="form__action">
            <a class="btn btn--dark" wire:click.prevent="cancelPost()">Cancel</a>
            <button class="btn btn--main" type="submit" wire:click.prevent="updatePost()">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>

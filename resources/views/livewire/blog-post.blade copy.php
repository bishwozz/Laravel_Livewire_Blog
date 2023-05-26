<main class="create-room layout">
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
            <input type="text" wire:model="title" id="title" required>
              @error('title') <span class="error">{{ $message }}</span> @enderror
          </div>

          <div class="form__group">
            <label for="user">User:</label>
            <select wire:model="user_id" id="user" required>
                    <option value="{{ $user->id }}" selected >{{ $user->name }}</option>
            </select>
            @error('user_id') <span class="error">{{ $message }}</span> @enderror
          </div>

          <div class="form__group">
              <label for="category_id">Category:</label>
              <select wire:model="category_id" id="category_id">
                  <option value="">Select a category</option>
                  @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
              </select>
              @error('category_id') <span class="error">{{ $message }}</span> @enderror

              <label for="tags">Tags:</label>
              <select wire:model="tags" id="tags" multiple>
                  <option value="">Select tags</option>
                  @foreach ($tags as $tag)
                      <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                  @endforeach
              </select>
              @error('tags') <span class="error">{{ $message }}</span> @enderror
          </div>

          <div class="form__group">
            <label for="image">Image:</label>
            <input type="file" wire:model="image" id="image">
            @error('image') <span class="error">{{ $message }}</span> @enderror
          </div>

          <div class="form__group">
            <label for="content">Content:</label>
            <textarea wire:model="content" id="content" required></textarea>
            @error('content') <span class="error">{{ $message }}</span> @enderror
          </div>


          <div class="form__action">
            <a class="btn btn--dark" href="#">Cancel</a>
            <button class="btn btn--main" type="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
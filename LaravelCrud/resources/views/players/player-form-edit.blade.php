<form method="POST" action="{{ url('players/' . $player->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group col-xl-5 col-lg-6 col-md-8 col-sm-12 mx-auto text-left form p-4">
        <h1 class="text-center bg-dark text-white">Edit Player</h1>

        <div class="form-group">
            <label for="name">Image</label>
            @if($player->image)
                <img src={{asset("storage/$player->image")}}>
            @endif
            <input
                type="file"
                id="image"
                name="image"
                autocomplete="image"
                class="form-control
        @error('image') is-invalid @enderror"
                value="{{ old('image') }}"
                required>
            @error('image')
            <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input
                value="{{$player->name}}"
                type="text"
                id="name"
                name="name"
                autocomplete="name"
                placeholder="Type your name"
                class="form-control
             @error('name') is-invalid @enderror"
                value="{{ old('name') }}"
                required
                aria-describedby="nameHelp">
            <p id="nameHelp" class="form-text text-muted">We'll never share your data with anyone else.</p>
            @error('name')
            <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input
                value="{{ $player->address }}"
                type="text"
                id="address"
                name="address"
                autocomplete="address"
                placeholder="Type your address"
                class="form-control
            @error('address') is-invalid @enderror"
                value="{{ old('address') }}"
                required
                aria-describedby="nameHelp">
            @error('address')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea
                class="form-control"
                name="description"
                id="description"
                rows="5"
                value="{{old('description')}}"
                placeholder="Type your description"
                autocomplete="description">{{$player->description}}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div>
            <label for="retired">Retired</label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="retired" id="retired1" value="1"
                       @if($player->retired==1){
                       checked="checked"}
                    @endif>
                <label class="form-check-label" for="retired1">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="retired" id="retired0" value="0"
                       @if($player->retired==0){
                       checked="checked"}
                    @endif>
                <label class="form-check-label" for="retired0">No</label>
            </div>
            @error('retired')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <br>
        <button type="update" class="mt-2 mb-5 btn btn-primary">Update</button>
    </div>

</form>

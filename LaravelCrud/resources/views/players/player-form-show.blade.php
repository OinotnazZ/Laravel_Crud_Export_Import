<fieldset disabled>
    <div class="form-group col-xl-5 col-lg-6 col-md-8 col-sm-12 mx-auto text-left form p-4">
        <h1>Show Player</h1>
        <div class="form-group">
            <label for="name">Name</label>
            <input
                type="text"
                id="name"
                name="name"
                autocomplete="name"
                placeholder="Type your name"
                class="form-control"
                value="{{$player->name}}"
            required
            aria-describedby="nameHelp">
            <p id="nameHelp" class="form-text text-muted">We'll never share your data with anyone else.</p>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input
                type="text"
                id="address"
                name="address"
                autocomplete="address"
                placeholder="Type your address"
                class="form-control"
                value="{{ $player->address}}"
            required
            aria-describedby="nameHelp">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea
                class="form-control"
                name="description"
                id="description"
                rows="5"
                placeholder="Type your description"
                autocomplete="description">{{$player->description}}</textarea>
        </div>

        <div>
            <label for="retired">Retired</label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="retired" id="retired1"
                       @if($player->retired==1){
                       checked="checked"}
                       @endif>
                <label class="form-check-label" for="retired1">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="retired" id="retired0"
                       @if($player->retired==0){
                       checked="checked"}
                    @endif>
                <label class="form-check-label" for="retired0">No</label>
            </div>
        </div>
    </div>
</fieldset>
<div class="button col-xl-5 col-lg-6 col-md-8 col-sm-12 mx-auto text-left form p-4">
    <a class="btn btn-primary" href="{{url('players')}}" role="button">Back</a>
</div>




